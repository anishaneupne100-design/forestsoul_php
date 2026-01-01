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

    case 'get_user_activity':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        $response = get_user_activity($_SESSION['user_id']);
        break;

    case 'update_profile':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            $response = update_user_profile($_SESSION['user_id'], $input);
            // Update session data
            if ($response['success']) {
                $userRes = get_user_profile($_SESSION['user_id']);
                if ($userRes['success']) {
                    $_SESSION['user'] = $userRes['data'];
                }
            }
        }
        break;

    case 'delete_account':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            $response = delete_user_account($_SESSION['user_id']);
            if ($response['success']) {
                session_destroy();
            }
        }
        break;

    case 'apply_expert':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            // Since this might be a multipart form, we use $_POST and $_FILES
            $data = !empty($input) ? $input : $_POST;
            $response = apply_to_be_expert($_SESSION['user_id'], $data, $_FILES);
        }
        break;

    case 'get_expert_status':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        $response = get_user_expert_status($_SESSION['user_id']);
        break;

    case 'toggle_expert_pause':
        if (!is_logged_in()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            $isPaused = $input['is_paused'] ?? false;
            $response = toggle_expert_pause($_SESSION['user_id'], $isPaused);
        }
        break;

    case 'admin_get_expert_apps':
        if (!is_admin_user()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        $response = get_pending_expert_applications($_SESSION['user_id']);
        break;

    case 'admin_approve_expert':
        if (!is_admin_user()) {
            $response = ['success' => false, 'message' => 'Unauthorized'];
            break;
        }
        if ($method === 'POST') {
            $appId = $input['app_id'] ?? null;
            $response = approve_expert_application($appId);
        }
        break;
}

header('Content-Type: application/json');
echo json_encode($response);
exit;
