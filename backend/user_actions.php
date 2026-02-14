<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/notification_actions.php'; // For welcome notification

function register_user($data) {
    $pdo = get_db_connection();
    
    if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
        return ['error' => 'Missing required fields', 'status' => 400];
    }

    $passwordHash = password_hash($data['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, lastname, email, password, age, phone_number, address, is_admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['name'],
            $data['lastname'] ?? '',
            $data['email'],
            $passwordHash,
            $data['age'] ?? null,
            $data['phone_number'] ?? '',
            $data['address'] ?? '',
            isset($data['is_admin']) ? 1 : 0
        ]);
        
        $userId = $pdo->lastInsertId();
        create_notification($userId, "Welcome to ForestSoul! Your account has been created.");
        
        return ['success' => true, 'message' => 'User registered successfully', 'user_id' => $userId];

    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return ['error' => 'Email already exists', 'status' => 409];
        }
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function login_user($email, $password) {
    if (empty($email) || empty($password)) {
        return ['error' => 'Email and password required', 'status' => 400];
    }

    $pdo = get_db_connection();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        unset($user['password']);
        return ['success' => true, 'user' => $user];
    }
    return ['error' => 'Invalid credentials', 'status' => 401];
}

function get_user_profile($userId) {
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("SELECT id, name, lastname, email, age, phone_number, address, is_admin, created_at FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    
    if ($user) return ['success' => true, 'data' => $user];
    return ['error' => 'User not found', 'status' => 404];
}

function get_user_activity($userId) {
    $pdo = get_db_connection();
    
    // 1. Posts
    $stmt = $pdo->prepare("SELECT * FROM community_posts WHERE posted_by = ? AND is_archived = 0 ORDER BY created_at DESC");
    $stmt->execute([$userId]);
    $posts = $stmt->fetchAll();

    // 2. Comments
    $stmt = $pdo->prepare("SELECT c.*, p.title as post_title FROM community_comments c JOIN community_posts p ON c.post_id = p.id WHERE c.posted_by = ? ORDER BY c.created_at DESC");
    $stmt->execute([$userId]);
    $comments = $stmt->fetchAll();

    // 3. Likes
    $stmt = $pdo->prepare("SELECT l.*, p.title as post_title FROM community_likes l JOIN community_posts p ON l.post_id = p.id WHERE l.created_by = ? ORDER BY l.created_at DESC");
    $stmt->execute([$userId]);
    $likes = $stmt->fetchAll();

    // 4. Activity Logs
    $stmt = $pdo->prepare("SELECT * FROM activity_logs WHERE user_id = ? ORDER BY created_at DESC LIMIT 50");
    $stmt->execute([$userId]);
    $logs = $stmt->fetchAll();

    // 5. Notifications
    $stmt = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC LIMIT 50");
    $stmt->execute([$userId]);
    $notifications = $stmt->fetchAll();

    return [
        'success' => true,
        'data' => [
            'posts' => $posts,
            'comments' => $comments,
            'likes' => $likes,
            'logs' => $logs,
            'notifications' => $notifications
        ]
    ];
}

function update_user_profile($userId, $data) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, lastname = ?, age = ?, phone_number = ?, address = ? WHERE id = ?");
        $stmt->execute([
            $data['name'],
            $data['lastname'],
            $data['age'],
            $data['phone_number'],
            $data['address'],
            $userId
        ]);
        log_activity($userId, 'updated_profile');
        return ['success' => true, 'message' => 'Profile updated successfully.'];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage(), 'status' => 500];
    }
}

function delete_user_account($userId) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        // All related data will be deleted due to ON DELETE CASCADE
        return ['success' => true, 'message' => 'Account deleted successfully.'];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage(), 'status' => 500];
    }
}
