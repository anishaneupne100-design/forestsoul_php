<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/notification_actions.php';

function create_event($userId, $data) {
    $pdo = get_db_connection();

    try {
        $stmt = $pdo->prepare("INSERT INTO events (title, description, start_date, deadline, location, latitude, longitude, created_by, needs_approval, thumbnail) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $data['title'],
            $data['description'] ?? '',
            $data['start_date'],
            $data['deadline'] ?? null,
            $data['location'] ?? '',
            $data['latitude'] ?? null,
            $data['longitude'] ?? null,
            $userId,
            isset($data['needs_approval']) ? 1 : 0,
            $data['thumbnail'] ?? null
        ]);

        return ['success' => true, 'message' => 'Event created successfully', 'event_id' => $pdo->lastInsertId()];

    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function get_events($filters = []) {
    $pdo = get_db_connection();
    
    $where = ["1=1"];
    $params = [];

    if (!empty($filters['date_from'])) {
        $where[] = "e.start_date >= ?";
        $params[] = $filters['date_from'];
    }
    if (!empty($filters['date_to'])) {
        $where[] = "e.start_date <= ?";
        $params[] = $filters['date_to'];
    }

    $whereSql = implode(" AND ", $where);
    $sql = "SELECT e.*, u.name as creator_name 
            FROM events e 
            LEFT JOIN users u ON e.created_by = u.id 
            WHERE $whereSql
            ORDER BY e.start_date ASC";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function register_for_event($userId, $eventId, $remarks, $planToJoinAt) {
    if (!$userId || !$eventId) return ['error' => 'User ID and Event ID required', 'status' => 400];

    $pdo = get_db_connection();

    try {
        // Check event details
        $stmt = $pdo->prepare("SELECT needs_approval, title, deadline FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch();

        if (!$event) {
            return ['error' => 'Event not found', 'status' => 404];
        }
        
        if ($event['deadline'] && new DateTime($event['deadline']) < new DateTime()) {
             return ['error' => 'Registration deadline has passed', 'status' => 400];
        }

        $isApproved = $event['needs_approval'] ? 0 : 1;

        $stmt = $pdo->prepare("INSERT INTO event_registrations (user_id, event_id, remarks, plan_to_join_at, is_approved) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $eventId, $remarks, $planToJoinAt, $isApproved]);

        if ($isApproved) {
            create_notification($userId, "You have successfully registered for '{$event['title']}'.");
        } else {
            create_notification($userId, "Your registration for '{$event['title']}' is pending approval.");
        }

        return ['success' => true, 'message' => $isApproved ? 'Registered successfully' : 'Registration pending approval'];

    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            return ['error' => 'Already registered for this event', 'status' => 409];
        }
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}

function get_my_registrations($userId) {
    $pdo = get_db_connection();
    try {
        $sql = "SELECT r.*, e.title as event_title, e.start_date, e.location 
                FROM event_registrations r 
                JOIN events e ON r.event_id = e.id 
                WHERE r.user_id = ? 
                ORDER BY r.created_at DESC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userId]);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => 'Database error: ' . $e->getMessage(), 'status' => 500];
    }
}
function get_admin_events() {
    $pdo = get_db_connection();
    $sql = "SELECT e.*, 
            (SELECT COUNT(*) FROM event_registrations r WHERE r.event_id = e.id) as total_applicants,
            (SELECT COUNT(*) FROM event_registrations r WHERE r.event_id = e.id AND r.is_approved = 0) as pending_applicants
            FROM events e 
            ORDER BY e.created_at DESC";
    try {
        $stmt = $pdo->query($sql);
        return ['success' => true, 'data' => $stmt->fetchAll()];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}

function get_event_with_registrations($eventId) {
    $pdo = get_db_connection();
    try {
        // Event info
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch();
        if (!$event) return ['error' => 'Not found'];

        // Registrations
        $stmt = $pdo->prepare("SELECT r.*, u.name, u.lastname, u.email 
                               FROM event_registrations r 
                               JOIN users u ON r.user_id = u.id 
                               WHERE r.event_id = ?");
        $stmt->execute([$eventId]);
        $event['registrations'] = $stmt->fetchAll();

        return ['success' => true, 'data' => $event];
    } catch (PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
