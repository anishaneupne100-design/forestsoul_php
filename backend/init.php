<?php
// backend/init.php
session_start();

// Define Base Path for Includes
define('BASE_PATH', dirname(__DIR__));
define('BACKEND_PATH', __DIR__);
define('ROOT_URL', '/'); // Adjust based on actual server path

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Require Core Files
require_once BACKEND_PATH . '/db.php';
require_once BACKEND_PATH . '/utils.php';
require_once BACKEND_PATH . '/user_actions.php';
require_once BACKEND_PATH . '/event_actions.php';
require_once BACKEND_PATH . '/community_actions.php';
require_once BACKEND_PATH . '/admin_actions.php';
require_once BACKEND_PATH . '/notification_actions.php';
require_once BACKEND_PATH . '/expert_actions.php';

// Auth Helper Functions
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function is_admin_user() {
    if (!is_logged_in()) return false;
    return isset($_SESSION['user']['is_admin']) && $_SESSION['user']['is_admin'] == 1;
}

function current_user() {
    if (!is_logged_in()) return null;
    return $_SESSION['user'] ?? null;
}

function require_login() {
    if (!is_logged_in()) {
        header("Location: " . url('login/'));
        exit;
    }
}

function url($path = '') {
    // Clean path
    $path = ltrim($path, '/');
    return ROOT_URL . $path; 
}

/**
 * Auth Class - Wrapper for session-based authentication
 * Provides a clean interface for frontend components
 */
class Auth {
    public static function check() {
        return is_logged_in();
    }

    public static function user() {
        return current_user();
    }

    public static function id() {
        return $_SESSION['user_id'] ?? null;
    }

    public static function isAdmin() {
        return is_admin_user();
    }

    public static function isStaff() {
        if (!self::check()) return false;
        $user = self::user();
        return (isset($user['is_admin']) && $user['is_admin'] == 1) || (isset($user['is_staff']) && $user['is_staff'] == 1);
    }
}

// Global Variables for Templates
$currentUser = Auth::user();
$isLoggedIn = Auth::check();
