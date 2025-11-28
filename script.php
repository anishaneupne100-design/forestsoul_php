<script>

/**
 * ForestSoul Navigation & Utility Scripts
 * Uses APP_CONFIG from head.php for routes and user state
 */

// Use routes from APP_CONFIG (defined in head.php) or fallback to dynamic detection
const BASE_URL = (typeof APP_CONFIG !== 'undefined' && APP_CONFIG.BASE_URL) 
    ? APP_CONFIG.BASE_URL 
    : window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/forestsoul_php/') + '/forestsoul_php/'.length);

// Route constants - use APP_CONFIG routes if available
const ROUTES = (typeof APP_CONFIG !== 'undefined' && APP_CONFIG.routes) ? APP_CONFIG.routes : {};

// Convenience constants for backward compatibility
const HOME = ROUTES.home || BASE_URL + "index.php";
const COMMUNITY = ROUTES.community || BASE_URL + "community/index.php";
const DONATION = ROUTES.donation || BASE_URL + "donation/index.php";
const ADMIN_DONATION = ROUTES.admin_donation || BASE_URL + "admin donation/index.php";
const GAMES = ROUTES.games || BASE_URL + "games/index.php";
const MEDITATION = ROUTES.meditation || BASE_URL + "meditation/index.php";
const YOGA = ROUTES.yoga || BASE_URL + "yoga/index.php";
const QUESTIONNAIRE = ROUTES.questionnaire || BASE_URL + "questionnaire/index.php";
const PROFILE = ROUTES.profile || BASE_URL + "profile/index.php";
const USER_PROGRESS = ROUTES.user_progress || BASE_URL + "user progress/index.php";
const STAFF = ROUTES.staff || BASE_URL + "staff/index.php";

// Auth Pages
const AUTH = ROUTES.auth || BASE_URL + "auth/index.php";
const LOGIN = ROUTES.login || BASE_URL + "login/index.php";
const SIGNUP = ROUTES.signup || BASE_URL + "signup/index.php";

// API Endpoints
const API = {
    login: ROUTES.api_login || BASE_URL + "backend/api/login.php",
    signup: ROUTES.api_signup || BASE_URL + "backend/api/signup.php",
    logout: ROUTES.api_logout || BASE_URL + "backend/api/logout.php",
    user: ROUTES.api_user || BASE_URL + "backend/api/user.php"
};

// Components (for reference, not typically navigated to)
const NAVBAR = BASE_URL + "navbar/index.php";
const FOOTER_COMPONENT = BASE_URL + "components/footer.php";

/**
 * Navigate to a page
 * @param {string} page - URL or route constant
 */
function gotoPage(page) {
    window.location.href = page;
}

/**
 * Navigate using route name from APP_CONFIG
 * @param {string} routeName - Name of the route (e.g., 'meditation', 'profile')
 */
function navigateTo(routeName) {
    if (ROUTES[routeName]) {
        window.location.href = ROUTES[routeName];
    } else {
        console.error(`Route "${routeName}" not found`);
    }
}

/**
 * Open URL in new tab
 * @param {string} url - URL to open
 */
function openInNewTab(url) {
    var win = window.open(url, '_blank');
    if (win) win.focus();
}

function goBack() {
    window.history.back();
}

function goForward() {
    window.history.forward();
}

function reloadPage() {
    location.reload();
}

function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function scrollToBottom() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
}

function scrollToElement(elementId) {
    const element = document.getElementById(elementId);
    if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
    }
}

function gotoFooter() {
    scrollToElement('footer');
}

/**
 * Authentication Helpers
 */
function isLoggedIn() {
    return typeof APP_CONFIG !== 'undefined' && APP_CONFIG.isLoggedIn === true;
}

function getCurrentUser() {
    if (typeof APP_CONFIG !== 'undefined' && APP_CONFIG.user) {
        return APP_CONFIG.user;
    }
    return null;
}

function isAdmin() {
    const user = getCurrentUser();
    return user && user.role === 'admin';
}

function isStaff() {
    const user = getCurrentUser();
    return user && (user.role === 'staff' || user.role === 'admin');
}

/**
 * Logout the user
 */
async function logout() {
    try {
        const response = await fetch(API.logout, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        });
        const data = await response.json();
        if (data.success) {
            gotoPage(HOME);
        } else {
            console.error('Logout failed:', data.message);
        }
    } catch (error) {
        console.error('Logout error:', error);
        // Fallback: redirect anyway
        gotoPage(HOME);
    }
}

/**
 * API Helper for making authenticated requests
 */
async function apiRequest(url, method = 'GET', body = null) {
    const options = {
        method: method,
        headers: { 'Content-Type': 'application/json' }
    };
    
    if (body && (method === 'POST' || method === 'PUT' || method === 'PATCH')) {
        options.body = JSON.stringify(body);
    }
    
    const response = await fetch(url, options);
    return response.json();
}

/**
 * Show toast notification
 */
function showToast(message, type = 'info', duration = 3000) {
    // Remove existing toasts
    const existingToast = document.querySelector('.forest-toast');
    if (existingToast) existingToast.remove();
    
    const toast = document.createElement('div');
    toast.className = 'forest-toast fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transition-all transform translate-y-0 opacity-100';
    
    // Set color based on type
    const colors = {
        success: 'bg-green-600 text-white',
        error: 'bg-red-600 text-white',
        warning: 'bg-yellow-500 text-black',
        info: 'bg-blue-600 text-white'
    };
    toast.className += ' ' + (colors[type] || colors.info);
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Auto-remove after duration
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(20px)';
        setTimeout(() => toast.remove(), 300);
    }, duration);
}

/**
 * Form validation helpers
 */
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password, minLength = 6) {
    return password && password.length >= minLength;
}

/**
 * Loading state helpers
 */
function showLoading(element) {
    if (element) {
        element.dataset.originalText = element.textContent;
        element.textContent = 'Loading...';
        element.disabled = true;
    }
}

function hideLoading(element) {
    if (element) {
        element.textContent = element.dataset.originalText || 'Submit';
        element.disabled = false;
    }
}

</script>