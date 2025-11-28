<?php
/**
 * Guest Middleware
 * Include this file for pages that should redirect if user is logged in
 */

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../controllers/Auth.php';

// Redirect to home if already logged in
Auth::redirectIfAuth();
