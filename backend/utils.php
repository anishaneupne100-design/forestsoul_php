<?php
require_once __DIR__ . '/db.php';

function json_response($data, $status = 200) {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
}

function log_activity($userId, $action, $details = null) {
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO activity_logs (user_id, action, details) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $action, $details]);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function upload_file($file, $subDir) {
    if (!$file || $file['error'] !== UPLOAD_ERR_OK) return null;
    
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
