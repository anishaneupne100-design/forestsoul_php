<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/notification_actions.php';

function approve_registration($adminId, $registrationId) {
    // Ideally check if adminId is actually an admin
    $pdo = get_db_connection();
    
    try {
        $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$adminId]);
        $user = $stmt->fetch();
        if (!$user || !$user['is_admin']) {
            return ['error' => 'Unauthorized access', 'status' => 403];
        }

        // Get registration details with event title
        $sql = "SELECT r.*, e.title 
                FROM event_registrations r 
                JOIN events e ON r.event_id = e.id 
                WHERE r.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$registrationId]);
        $reg = $stmt->fetch();

        if (!$reg) return ['error' => 'Registration not found', 'status' => 404];

        // Update
        $stmt = $pdo->prepare("UPDATE event_registrations SET is_approved = 1 WHERE id = ?");
        $stmt->execute([$registrationId]);

        // Notify user
        create_notification($reg['user_id'], "Your registration for '{$reg['title']}' has been approved!");

        return ['success' => true, 'message' => 'Registration approved'];

    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function get_pending_approvals($adminId) {
    $pdo = get_db_connection();
    try {
        // Verify admin
        $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$adminId]);
        $user = $stmt->fetch();
        if (!$user || !$user['is_admin']) return ['error' => 'Unauthorized', 'status' => 403];

        $sql = "SELECT r.id as reg_id, r.user_id, r.remarks, u.name, u.lastname, e.title as event_title 
                FROM event_registrations r 
                JOIN users u ON r.user_id = u.id 
                JOIN events e ON r.event_id = e.id 
                WHERE r.is_approved = 0 AND e.needs_approval = 1";
        $stmt = $pdo->query($sql);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}
