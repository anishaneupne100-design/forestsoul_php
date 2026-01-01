<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/notification_actions.php';

function apply_to_be_expert($userId, $data, $files) {
    $pdo = get_db_connection();
    
    // Check if already an expert or has pending application
    $stmt = $pdo->prepare("SELECT id FROM experts WHERE user_id = ?");
    $stmt->execute([$userId]);
    if ($stmt->fetch()) {
        return ['error' => 'You are already an expert.', 'status' => 400];
    }
    
    $stmt = $pdo->prepare("SELECT id FROM expert_applications WHERE user_id = ? AND status = 'pending'");
    $stmt->execute([$userId]);
    if ($stmt->fetch()) {
        return ['error' => 'You already have a pending application.', 'status' => 400];
    }

    // Handle file uploads (profile picture and proof)
    $profilePic = null;
    $proofFile = null;

    if (!empty($files['profile_picture']['name'])) {
        $profilePic = upload_file($files['profile_picture'], 'experts/profiles/');
    }
    if (!empty($files['proof']['name'])) {
        $proofFile = upload_file($files['proof'], 'experts/proofs/');
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO expert_applications 
            (user_id, name, lastname, email, phone_1, phone_2, address, degree, specialization, experience_years, bio, profile_picture, proof_url, remarks) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $userId,
            $data['name'],
            $data['lastname'] ?? '',
            $data['email'],
            $data['phone_1'],
            $data['phone_2'] ?? null,
            $data['address'] ?? null,
            $data['degree'],
            $data['specialization'],
            $data['experience_years'],
            $data['bio'],
            $profilePic,
            $proofFile,
            $data['remarks'] ?? null
        ]);

        log_activity($userId, 'applied_to_be_expert', 'Applied with degree: ' . $data['degree']);
        create_notification($userId, "Your application to be an expert has been submitted and is under review.");

        return ['success' => true, 'message' => 'Application submitted successfully.'];
    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function upload_file($file, $subDir) {
    if ($file['error'] !== UPLOAD_ERR_OK) return null;
    
    $uploadDir = __DIR__ . '/../media/' . $subDir;
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '.' . $extension;
    $targetPath = $uploadDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return 'media/' . $subDir . $filename;
    }
    return null;
}

function get_active_experts() {
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("SELECT * FROM experts WHERE is_active = 1 ORDER BY name ASC");
    $stmt->execute();
    return ['success' => true, 'data' => $stmt->fetchAll()];
}

function get_user_expert_status($userId) {
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("SELECT * FROM experts WHERE user_id = ?");
    $stmt->execute([$userId]);
    $expert = $stmt->fetch();
    
    if ($expert) {
        return ['success' => true, 'is_expert' => true, 'data' => $expert];
    }
    
    // Check for pending application
    $stmt = $pdo->prepare("SELECT status FROM expert_applications WHERE user_id = ? ORDER BY created_at DESC LIMIT 1");
    $stmt->execute([$userId]);
    $app = $stmt->fetch();
    
    return [
        'success' => true, 
        'is_expert' => false, 
        'has_pending_app' => ($app && $app['status'] === 'pending'),
        'app_status' => $app ? $app['status'] : null
    ];
}

function toggle_expert_pause($userId, $isPaused) {
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("UPDATE experts SET is_active = ? WHERE user_id = ?");
    $stmt->execute([$isPaused ? 0 : 1, $userId]);
    
    $action = $isPaused ? 'paused_expert_profile' : 'resumed_expert_profile';
    log_activity($userId, $action);
    
    return ['success' => true, 'message' => $isPaused ? 'Profile paused.' : 'Profile resumed.'];
}

function approve_expert_application($appId) {
    $pdo = get_db_connection();
    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare("SELECT * FROM expert_applications WHERE id = ?");
        $stmt->execute([$appId]);
        $app = $stmt->fetch();
        
        if (!$app) throw new Exception("Application not found.");

        // Move to experts table
        $stmt = $pdo->prepare("INSERT INTO experts 
            (user_id, name, lastname, email, phone_1, phone_2, address, degree, specialization, experience_years, bio, profile_picture) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->execute([
            $app['user_id'],
            $app['name'],
            $app['lastname'],
            $app['email'],
            $app['phone_1'],
            $app['phone_2'],
            $app['address'],
            $app['degree'],
            $app['specialization'],
            $app['experience_years'],
            $app['bio'],
            $app['profile_picture']
        ]);

        // Delete application
        $stmt = $pdo->prepare("DELETE FROM expert_applications WHERE id = ?");
        $stmt->execute([$appId]);

        create_notification($app['user_id'], "Congratulations! Your expert application has been approved.");
        log_activity($app['user_id'], 'expert_app_approved');

        $pdo->commit();
        return ['success' => true];
    } catch (Exception $e) {
        $pdo->rollBack();
        return ['error' => $e->getMessage()];
    }
}
