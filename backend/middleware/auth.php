<?php
/**
 * Auth Middleware
 * Include this file at the top of protected pages
 */

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../controllers/Auth.php';

// Require user to be authenticated
Auth::requireAuth();
