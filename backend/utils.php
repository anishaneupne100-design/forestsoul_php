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
        // Silently fail or log to file
        return false;
    }
}
