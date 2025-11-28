<?php
/**
 * Admin Middleware
 * Include this file at the top of admin-only pages
 */

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../controllers/Auth.php';

// Require user to be admin
Auth::requireAdmin();
