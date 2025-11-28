<?php
/**
 * Application Configuration
 * Central configuration for the application
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Base path configuration
define('BASE_PATH', dirname(dirname(__DIR__)) . '/');
define('BACKEND_PATH', BASE_PATH . 'backend/');

// Get base URL dynamically
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$script_name = $_SERVER['SCRIPT_NAME'];

// Find the base URL (works for both root and subdirectory installations)
$base_url = $protocol . '://' . $host;
if (strpos($script_name, '/forestsoul_php/') !== false) {
    $base_url .= '/forestsoul_php';
} else {
    // Get directory path from script name
    $path = dirname($script_name);
    while ($path !== '/' && $path !== '\\' && $path !== '.') {
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $path . '/head.php')) {
            $base_url .= $path;
            break;
        }
        $path = dirname($path);
    }
}

define('BASE_URL', rtrim($base_url, '/') . '/');

// Route definitions (for PHP use)
define('ROUTES', [
    'home' => '',
    'community' => 'community/',
    'donation' => 'donation/',
    'admin_donation' => 'admin donation/',
    'games' => 'games/',
    'meditation' => 'meditation/',
    'yoga' => 'yoga/',
    'questionnaire' => 'questionnaire/',
    'profile' => 'profile/',
    'user_progress' => 'user progress/',
    'staff' => 'staff/',
    'auth' => 'auth/',
    'login' => 'login/',
    'signup' => 'signup/',
]);

// Protected routes (require authentication)
define('PROTECTED_ROUTES', [
    'profile',
    'questionnaire',
    'user_progress',
    'admin_donation',
    'staff',
]);

// Admin only routes
define('ADMIN_ROUTES', [
    'admin_donation',
    'staff',
]);

/**
 * Get full URL for a route
 */
function url($route = 'home') {
    $routes = ROUTES;
    $path = isset($routes[$route]) ? $routes[$route] : '';
    return BASE_URL . $path;
}

/**
 * Redirect to a route
 */
function redirect($route = 'home') {
    header('Location: ' . url($route));
    exit;
}

/**
 * Redirect to a full URL
 */
function redirectTo($url) {
    header('Location: ' . $url);
    exit;
}

/**
 * Check if current route matches
 */
function isRoute($route) {
    $current = $_SERVER['REQUEST_URI'];
    $check = parse_url(url($route), PHP_URL_PATH);
    return strpos($current, $check) !== false;
}

/**
 * Flash message helpers
 */
function setFlash($type, $message) {
    $_SESSION['flash'] = [
        'type' => $type,
        'message' => $message
    ];
}

function getFlash() {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

function hasFlash() {
    return isset($_SESSION['flash']);
}
