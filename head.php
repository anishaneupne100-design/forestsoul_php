<?php
require_once __DIR__ . '/backend/init.php';

// Set default title if not set
$title = $title ?? 'ForestSoul - Mental Wellness';

// Get user data for JS
$jsUser = Auth::check() ? json_encode(Auth::user()) : 'null';
$isLoggedInJs = Auth::check() ? 'true' : 'false';

// Base URL for JS
$basePath = ROOT_URL;
?>
<!DOCTYPE html>
<html class="dark" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title><?php echo htmlspecialchars($title); ?></title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
    
    <!-- Icons & Libs -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- Styles -->
    <link href="<?php echo url('assets/output.css'); ?>" rel="stylesheet"/>

    <script>
    // App Configuration from PHP
    const APP_CONFIG = {
        BASE_URL: '<?php echo $basePath; ?>',
        isLoggedIn: <?php echo $isLoggedInJs; ?>,
        user: <?php echo $jsUser; ?>,
        routes: {
            home: '<?php echo url(''); ?>',
            community: '<?php echo url('community/'); ?>',
            games: '<?php echo url('games/'); ?>',
            meditation: '<?php echo url('meditation/'); ?>',
            yoga: '<?php echo url('yoga/'); ?>',
            therapy: '<?php echo url('therapy/'); ?>',
            questionnaire: '<?php echo url('questionnaire/'); ?>',
            profile: '<?php echo url('profile/'); ?>',
            user_progress: '<?php echo url('user_progress/'); ?>',
            staff: '<?php echo url('staff/'); ?>',
            login: '<?php echo url('login/'); ?>',
            signup: '<?php echo url('signup/'); ?>',
            logout: '<?php echo url('login/?action=logout'); ?>',
            api_login: '<?php echo url('backend/api.php?action=login'); ?>',
            api_signup: '<?php echo url('backend/api.php?action=signup'); ?>',
            api_logout: '<?php echo url('backend/api.php?action=logout'); ?>',
            api_user: '<?php echo url('backend/api.php?action=user'); ?>'
        }
    };

    // Route Constants
    const ROUTES = APP_CONFIG.routes;

    // Navigation helper
    function gotoPage(route) {
        window.location.href = route;
    }

    // Auth helpers
    function requireAuth(callback) {
        if (!APP_CONFIG.isLoggedIn) {
            sessionStorage.setItem('intended_url', window.location.href);
            gotoPage(ROUTES.login);
            return false;
        }
        if (callback) callback();
        return true;
    }

    // API helper
    async function api(action, options = {}) {
        const url = ROUTES['api_' + action] || APP_CONFIG.BASE_URL + 'backend/api.php?action=' + action;
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
    async function submitForm(form, action) {
        // Clean action name if it ends in .php
        const cleanAction = action.replace('.php', '');
        const formData = new FormData(form);
        const data = Object.fromEntries(formData);
        
        try {
            const response = await api(cleanAction, {
                method: 'POST',
                body: JSON.stringify(data)
            });
            return response;
        } catch (error) {
            console.error('API Error:', error);
            return { success: false, message: 'Network error or invalid response' };
        }
    }

    // Scroll helper
    function scrollToElement(id) {
        const el = document.getElementById(id);
        if (el) el.scrollIntoView({ behavior: 'smooth' });
    }

    // Modern Toast Message System
    function showToast(message, type = 'info') {
        const id = 'toast-' + Date.now();
        const colors = {
            success: 'bg-green-500',
            error: 'bg-red-500',
            info: 'bg-primary',
            warning: 'bg-orange-500'
        };
        const icons = {
            success: 'check_circle',
            error: 'error',
            info: 'info',
            warning: 'warning'
        };
        
        const toast = `
            <div id="${id}" class="fixed bottom-4 right-4 z-[200] transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none">
                <div class="${colors[type]} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-4 min-w-[300px]">
                    <span class="material-symbols-outlined">${icons[type]}</span>
                    <span class="font-bold flex-1">${message}</span>
                </div>
            </div>
        `;
        
        $('body').append(toast);
        const $el = $('#' + id);
        setTimeout(() => $el.removeClass('translate-y-20 opacity-0').addClass('translate-y-0 opacity-100'), 100);
        setTimeout(() => {
            $el.addClass('translate-y-20 opacity-0');
            setTimeout(() => $el.remove(), 400);
        }, 4000);
    }
    </script>

    <style>
        .material-symbols-outlined {
            font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
        }
    </style>
</head>
<body class="body txt">
<?php
// Global helper for footer
function put_footer() {
    include_once __DIR__ . '/components/footer.php';
}
?>