<?php
/**
 * Logout API Handler
 * Handles user logout
 */

require_once __DIR__ . '/../init.php';

// Logout user
$result = Auth::logout();

// Check if AJAX request
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');
    $result['redirect'] = url('home');
    echo json_encode($result);
    exit;
}

// Regular redirect for non-AJAX
setFlash('success', 'You have been logged out successfully');
redirect('home');
