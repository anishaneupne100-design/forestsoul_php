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
