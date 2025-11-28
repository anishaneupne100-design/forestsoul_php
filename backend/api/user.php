<?php
/**
 * User API Handler
 * Get current user data
 */

require_once __DIR__ . '/../init.php';

header('Content-Type: application/json');

if (!Auth::check()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not authenticated']);
    exit;
}

$user = Auth::user();
echo json_encode(['success' => true, 'user' => $user]);
