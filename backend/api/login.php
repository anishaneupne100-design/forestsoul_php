<?php
/**
 * Login API Handler
 * Handles login form submission
 */

require_once __DIR__ . '/../init.php';

header('Content-Type: application/json');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get input data
$input = json_decode(file_get_contents('php://input'), true);

// If not JSON, try form data
if (!$input) {
    $input = $_POST;
}

$email = trim($input['email'] ?? '');
$password = $input['password'] ?? '';

// Validation
$errors = [];

if (empty($email)) {
    $errors['email'] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Invalid email format';
}

if (empty($password)) {
    $errors['password'] = 'Password is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Attempt login
$result = Auth::attempt($email, $password);

if ($result['success']) {
    // Get redirect URL
    $redirectUrl = Auth::intendedUrl('profile');
    $result['redirect'] = $redirectUrl;
    
    http_response_code(200);
} else {
    http_response_code(401);
}

echo json_encode($result);
