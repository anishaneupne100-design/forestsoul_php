<?php
/**
 * Auth Class
 * Handles authentication, sessions, and authorization
 */

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../models/User.php';

class Auth {
    private static $user = null;
    private static $userModel = null;
    
    /**
     * Initialize the auth system
     */
    public static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        self::$userModel = new User();
    }
    
    /**
     * Attempt to login a user
     */
    public static function attempt($email, $password) {
        self::init();
        
        $user = self::$userModel->findByEmail($email);
        
        if (!$user) {
            return ['success' => false, 'message' => 'User not found'];
        }
        
        if (!self::$userModel->verifyPassword($password, $user['password'])) {
            return ['success' => false, 'message' => 'Invalid password'];
        }
        
        // Set session data
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_avatar'] = $user['avatar'] ?? null;
        $_SESSION['logged_in'] = true;
        $_SESSION['login_time'] = time();
        
        // Update last login
        self::$userModel->updateLastLogin($user['id']);
        
        // Regenerate session ID for security
        session_regenerate_id(true);
        
        return ['success' => true, 'message' => 'Login successful', 'user' => self::user()];
    }
    
    /**
     * Register a new user
     */
    public static function register($name, $email, $password, $role = 'user') {
        self::init();
        
        // Check if email already exists
        if (self::$userModel->exists('email', $email)) {
            return ['success' => false, 'message' => 'Email already registered'];
        }
        
        // Create user
        $user = self::$userModel->register([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);
        
        if ($user) {
            // Auto login after registration
            return self::attempt($email, $password);
        }
        
        return ['success' => false, 'message' => 'Registration failed'];
    }
    
    /**
     * Logout the current user
     */
    public static function logout() {
        self::init();
        
        // Clear session data
        $_SESSION = [];
        
        // Destroy session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        // Destroy session
        session_destroy();
        
        return ['success' => true, 'message' => 'Logged out successfully'];
    }
    
    /**
     * Check if user is logged in
     */
    public static function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
    }
    
    /**
     * Get current user data
     */
    public static function user() {
        if (!self::check()) {
            return null;
        }
        
        return [
            'id' => $_SESSION['user_id'] ?? null,
            'name' => $_SESSION['user_name'] ?? null,
            'email' => $_SESSION['user_email'] ?? null,
            'role' => $_SESSION['user_role'] ?? null,
            'avatar' => $_SESSION['user_avatar'] ?? null,
        ];
    }
    
    /**
     * Get current user ID
     */
    public static function id() {
        return self::check() ? $_SESSION['user_id'] : null;
    }
    
    /**
     * Get full user data from database
     */
    public static function userFull() {
        if (!self::check()) {
            return null;
        }
        
        self::init();
        return self::$userModel->getSafe($_SESSION['user_id']);
    }
    
    /**
     * Check if current user is admin
     */
    public static function isAdmin() {
        return self::check() && $_SESSION['user_role'] === 'admin';
    }
    
    /**
     * Check if current user is staff (admin, staff, or therapist)
     */
    public static function isStaff() {
        return self::check() && in_array($_SESSION['user_role'], ['admin', 'staff', 'therapist']);
    }
    
    /**
     * Check if current user has a specific role
     */
    public static function hasRole($role) {
        return self::check() && $_SESSION['user_role'] === $role;
    }
    
    /**
     * Require authentication (redirect if not logged in)
     */
    public static function requireAuth($redirectTo = 'login') {
        if (!self::check()) {
            // Store intended URL
            $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
            setFlash('error', 'Please login to continue');
            redirect($redirectTo);
        }
    }
    
    /**
     * Require admin role
     */
    public static function requireAdmin($redirectTo = 'home') {
        self::requireAuth();
        
        if (!self::isAdmin()) {
            setFlash('error', 'Access denied. Admin privileges required.');
            redirect($redirectTo);
        }
    }
    
    /**
     * Require staff role
     */
    public static function requireStaff($redirectTo = 'home') {
        self::requireAuth();
        
        if (!self::isStaff()) {
            setFlash('error', 'Access denied. Staff privileges required.');
            redirect($redirectTo);
        }
    }
    
    /**
     * Redirect if already logged in
     */
    public static function redirectIfAuth($redirectTo = 'home') {
        if (self::check()) {
            redirect($redirectTo);
        }
    }
    
    /**
     * Get intended URL after login
     */
    public static function intendedUrl($default = 'home') {
        $url = $_SESSION['intended_url'] ?? url($default);
        unset($_SESSION['intended_url']);
        return $url;
    }
    
    /**
     * Update session user data
     */
    public static function refreshUser() {
        if (!self::check()) {
            return;
        }
        
        self::init();
        $user = self::$userModel->find($_SESSION['user_id']);
        
        if ($user) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_avatar'] = $user['avatar'] ?? null;
        }
    }
}
