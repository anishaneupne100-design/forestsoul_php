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
    
    // Check if running on localhost with subdirectory or root
    // This simple logic assumes the script is running in a way where relative paths from root work
    // best approach for PHP SSR often starts with / if we know the root.
    // If user is running php -S localhost:8000, root is /.
    // If xampp/htdocs/project, root is /project/.
    
    // Let's try to detect base URL dynamically for robustness
    $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    // This is rough. For now, assuming relative to root of the project is what we want.
    // Ideally, we define a constant manually or use relative paths.
    
    return ROOT_URL . $path; 
}

// Global Variables for Templates
$currentUser = current_user();
$isLoggedIn = is_logged_in();
