<?php
/**
 * Staff Middleware
 * Include this file at the top of staff-only pages
 */

require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../controllers/Auth.php';

// Require user to be staff (admin, staff, or therapist)
Auth::requireStaff();
