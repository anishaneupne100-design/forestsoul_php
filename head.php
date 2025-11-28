<?php
// Initialize backend
require_once __DIR__ . '/backend/init.php';

// Set default title if not set
$title = $title ?? 'ForestSoul - Mental Wellness';

// Get user data for JS
$jsUser = Auth::check() ? json_encode(Auth::user()) : 'null';
$isLoggedIn = Auth::check() ? 'true' : 'false';

// Determine paths based on current directory
$currentPath = $_SERVER['SCRIPT_NAME'];
$basePath = parse_url(BASE_URL, PHP_URL_PATH) ?? '/';
$depth = substr_count($currentPath, '/') - substr_count($basePath, '/');
$assetPrefix = $depth > 0 ? '../' : '';

echo <<<HTML
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>{$title}</title>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<link href="{$assetPrefix}assets/output.css" rel="stylesheet"/>

<link href="./assets/output.css" rel="stylesheet"/>
<link href="../assets/output.css" rel="stylesheet"/>

<script>
// App Configuration from PHP
const APP_CONFIG = {
    BASE_URL: '{$basePath}',
    isLoggedIn: {$isLoggedIn},
    user: {$jsUser},
    routes: {
        home: '{$basePath}',
        community: '{$basePath}community/',
        donation: '{$basePath}donation/',
        admin_donation: '{$basePath}admin%20donation/',
        games: '{$basePath}games/',
        meditation: '{$basePath}meditation/',
        yoga: '{$basePath}yoga/',
        questionnaire: '{$basePath}questionnaire/',
        profile: '{$basePath}profile/',
        user_progress: '{$basePath}user%20progress/',
        staff: '{$basePath}staff/',
        login: '{$basePath}login/',
        signup: '{$basePath}signup/',
        auth: '{$basePath}auth/',
        api_login: '{$basePath}backend/api/login.php',
        api_signup: '{$basePath}backend/api/signup.php',
        api_logout: '{$basePath}backend/api/logout.php',
        api_user: '{$basePath}backend/api/user.php'
    }
};

// Legacy constants for backward compatibility
const BASE_URL = APP_CONFIG.BASE_URL;
const ASSET_PREFIX = '{$assetPrefix}';
const IS_LOGGED_IN = APP_CONFIG.isLoggedIn;
const CURRENT_USER = APP_CONFIG.user;

// Route Constants (legacy)
const ROUTES = {
    HOME: APP_CONFIG.routes.home,
    COMMUNITY: APP_CONFIG.routes.community,
    DONATION: APP_CONFIG.routes.donation,
    ADMIN_DONATION: APP_CONFIG.routes.admin_donation,
    GAMES: APP_CONFIG.routes.games,
    MEDITATION: APP_CONFIG.routes.meditation,
    YOGA: APP_CONFIG.routes.yoga,
    QUESTIONNAIRE: APP_CONFIG.routes.questionnaire,
    PROFILE: APP_CONFIG.routes.profile,
    USER_PROGRESS: APP_CONFIG.routes.user_progress,
    STAFF: APP_CONFIG.routes.staff,
    LOGIN: APP_CONFIG.routes.login,
    SIGNUP: APP_CONFIG.routes.signup,
    LOGOUT: APP_CONFIG.routes.api_logout
};

// Navigation helper
function gotoPage(route) {
    window.location.href = route;
}

function gotoRoute(routeName) {
    if (ROUTES[routeName]) {
        window.location.href = ROUTES[routeName];
    }
}

// Auth helpers
function requireAuth(callback) {
    if (!IS_LOGGED_IN) {
        sessionStorage.setItem('intended_url', window.location.href);
        gotoPage(ROUTES.LOGIN);
        return false;
    }
    if (callback) callback();
    return true;
}

function logout() {
    window.location.href = ROUTES.LOGOUT;
}

// Navigation functions
function goBack() { window.history.back(); }
function goForward() { window.history.forward(); }
function reloadPage() { location.reload(); }
function scrollToTop() { window.scrollTo({top: 0, behavior: 'smooth'}); }
function scrollToBottom() { window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth'}); }

// API helper
async function api(endpoint, options = {}) {
    const url = BASE_URL + 'backend/api/' + endpoint;
    const defaultOptions = {
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    };
    const response = await fetch(url, {...defaultOptions, ...options});
    return response.json();
}

// Form submission helper
async function submitForm(form, endpoint) {
    const formData = new FormData(form);
    const data = Object.fromEntries(formData);
    
    try {
        const response = await api(endpoint, {
            method: 'POST',
            body: JSON.stringify(data)
        });
        return response;
    } catch (error) {
        return { success: false, message: 'Network error' };
    }
}
</script>

<style>
.material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
}
</style>
</head>
HTML;