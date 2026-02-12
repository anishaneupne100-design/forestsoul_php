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

function reject_registration($adminId, $registrationId, $remarks) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$adminId]);
        if (!$stmt->fetchColumn()) return ['error' => 'Unauthorized'];

        $sql = "SELECT r.*, e.title 
                FROM event_registrations r 
                JOIN events e ON r.event_id = e.id 
                WHERE r.id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$registrationId]);
        $reg = $stmt->fetch();
        if (!$reg) return ['error' => 'Not found'];

        // We can either DELETE or set a status 'rejected'. 
        // Let's UPDATE with is_approved = -1 (Rejected) and store remarks
        $stmt = $pdo->prepare("UPDATE event_registrations SET is_approved = -1, remarks = ? WHERE id = ?");
        $stmt->execute([$remarks, $registrationId]);

        create_notification($reg['user_id'], "Important: Your registration for '{$reg['title']}' was not accepted. Reason: $remarks");
        log_activity($reg['user_id'], 'registration_rejected', "Event: {$reg['title']}");

        return ['success' => true];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
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

function get_pending_expert_applications($adminId) {
    $pdo = get_db_connection();
    try {
        $stmt = $pdo->prepare("SELECT is_admin FROM users WHERE id = ?");
        $stmt->execute([$adminId]);
        $user = $stmt->fetch();
        if (!$user || !$user['is_admin']) return ['error' => 'Unauthorized'];

        $stmt = $pdo->query("SELECT * FROM expert_applications WHERE status = 'pending' ORDER BY created_at DESC");
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
function get_admin_dashboard_stats() {
    $pdo = get_db_connection();
    $stats = [];
    
    // Total Users
    $stats['total_users'] = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    // Pending Expert Apps
    $stats['pending_experts'] = $pdo->query("SELECT COUNT(*) FROM expert_applications WHERE status = 'pending'")->fetchColumn();
    // Total Experts
    $stats['total_experts'] = $pdo->query("SELECT COUNT(*) FROM experts")->fetchColumn();
    // Pending Event Regs
    $stats['pending_registrations'] = $pdo->query("SELECT COUNT(*) FROM event_registrations WHERE is_approved = 0")->fetchColumn();
    // Total Events
    $stats['total_events'] = $pdo->query("SELECT COUNT(*) FROM events")->fetchColumn();
    // Total Posts
    $stats['total_posts'] = $pdo->query("SELECT COUNT(*) FROM community_posts")->fetchColumn();

    return ['success' => true, 'data' => $stats];
}

function get_recent_admin_activity($limit = 10) {
    $pdo = get_db_connection();
    try {
        $sql = "SELECT a.*, u.name, u.lastname 
                FROM activity_logs a 
                JOIN users u ON a.user_id = u.id 
                ORDER BY a.created_at DESC 
                LIMIT ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$limit]);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}
