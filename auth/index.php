<?php
/**
 * Auth Index - Redirects to login page
 * 
 * The auth logic has been moved to backend/controllers/Auth.php
 * This file now serves as a redirect to the login page
 */

require_once __DIR__ . '/../backend/init.php';

// If already logged in, redirect to profile
if (Auth::check()) {
    redirect(url('profile'));
}

// Otherwise, redirect to login
redirect(url('login'));
