<?php
// backend/api.php
require_once __DIR__ . '/init.php';

// Simple API Router
$action = $_GET['action'] ?? '';
$method = $_SERVER['REQUEST_METHOD'];

// Get JSON Input
$input = json_decode(file_get_contents('php://input'), true) ?? [];

$response = ['success' => false, 'message' => 'Invalid action'];

switch ($action) {
    case 'login':
        if ($method === 'POST') {
            $email = $input['email'] ?? '';
            $password = $input['password'] ?? '';
            
            $loginResponse = login_user($email, $password);
            if (isset($loginResponse['success']) && $loginResponse['success']) {
                $_SESSION['user_id'] = $loginResponse['user']['id'];
                $_SESSION['user'] = $loginResponse['user'];
                $response = [
                    'success' => true, 
                    'message' => 'Login successful',
                    'redirect' => url('')
                ];
            } else {
                $response = ['success' => false, 'message' => $loginResponse['error'] ?? 'Login failed'];
            }
        }
        break;

    case 'signup':
        if ($method === 'POST') {
            $signupResponse = register_user($input);
            if (isset($signupResponse['success']) && $signupResponse['success']) {
                // Auto login after signup
                $userRes = get_user_profile($signupResponse['user_id']);
                if ($userRes['success']) {
                    $_SESSION['user_id'] = $userRes['data']['id'];
                    $_SESSION['user'] = $userRes['data'];
                }
                
                $response = [
                    'success' => true, 
                    'message' => 'Registration successful',
                    'redirect' => url('')
                ];
            } else {
                $response = ['success' => false, 'message' => $signupResponse['error'] ?? 'Registration failed'];
            }
        }
        break;

    case 'logout':
        session_destroy();
        $response = ['success' => true, 'message' => 'Logged out'];
        break;

    case 'community_post':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            $postResponse = create_community_post($_SESSION['user_id'], $input);
            $response = $postResponse;
        }
        break;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
