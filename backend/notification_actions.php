<?php
require_once __DIR__ . '/db.php';

function create_notification($user_id, $message) {
    try {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("INSERT INTO notifications (user_id, message) VALUES (?, ?)");
        $stmt->execute([$user_id, $message]);
    } catch (PDOException $e) {
        // Log error, but don't stop execution
        error_log("Notification Error: " . $e->getMessage());
    }
}

function get_user_notifications($userId) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("SELECT * FROM notifications WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}

function mark_notification_read($userId, $notificationId) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("UPDATE notifications SET is_read = 1 WHERE id = ? AND user_id = ?");
        $stmt->execute([$notificationId, $userId]);
        return ['success' => true];
    } catch (PDOException $e) {
        return ['error' => 'Database error', 'status' => 500];
    }
}
