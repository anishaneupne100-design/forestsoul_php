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

function is_admin_logged_in() {
    return isset($_SESSION['admin_id']);
}

function is_admin_user() {
    $user = current_admin();
    return $user && isset($user['is_admin']) && $user['is_admin'] == 1;
}

function is_expert_user() {
    $user = current_user();
    return $user && isset($user['is_expert']) && $user['is_expert'] == 1;
}

function current_user() {
    if (!is_logged_in()) return null;
    
    if (!isset($_SESSION['user_lazy_verified'])) {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
        if (!$user) {
            unset($_SESSION['user_id']);
            unset($_SESSION['user']);
            return null;
        }
        $_SESSION['user'] = $user;
        $_SESSION['user_lazy_verified'] = true;
    }

    return $_SESSION['user'] ?? null;
}

function current_admin() {
    if (!is_admin_logged_in()) return null;
    
    if (!isset($_SESSION['admin_lazy_verified'])) {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND is_admin = 1");
        $stmt->execute([$_SESSION['admin_id']]);
        $user = $stmt->fetch();
        if (!$user) {
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_user']);
            return null;
        }
        $_SESSION['admin_user'] = $user;
        $_SESSION['admin_lazy_verified'] = true;
    }

    return $_SESSION['admin_user'] ?? null;
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

    public static function adminCheck() {
        return is_admin_logged_in();
    }

    public static function user() {
        return current_user();
    }

    public static function admin() {
        return current_admin();
    }

    public static function id() {
        return $_SESSION['user_id'] ?? null;
    }

    public static function adminId() {
        return $_SESSION['admin_id'] ?? null;
    }

    public static function isAdmin() {
        return is_admin_user();
    }

    public static function isExpert() {
        return is_expert_user();
    }

    public static function isStaff() {
        return self::isAdmin() || self::isExpert();
    }
}

// Global Variables for Templates
$currentUser = Auth::user();
$isLoggedIn = Auth::check();
