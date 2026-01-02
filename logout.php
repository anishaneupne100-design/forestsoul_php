<?php
// logout.php
require_once 'backend/init.php';

// Log activity before destroying
if (Auth::check()) {
    log_activity(Auth::id(), 'logout', 'User logged out through formal portal.');
}

session_unset();
session_destroy();

header('Location: ' . url(''));
exit;
