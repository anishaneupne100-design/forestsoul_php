<?php
// This is a reusable navbar component
// Include this file after head.php in any page

$isLoggedIn = Auth::check();
$user = Auth::user();
?>

<header class="header">
    <div class="row gap-md txt">
        <a href="<?php echo url('home'); ?>" class="row gap-md">
            <div class="icon-md">
                <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_6_319)">
                        <path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_6_319">
                            <rect fill="white" height="48" width="48"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h2 class="txt-xl">ForestSoul</h2>
        </a>
    </div>
    
    <div class="hidden-mobile flex-1 justify-end gap-x2">
        <nav class="nav">
            <a class="nav-link" href="<?php echo url('meditation'); ?>">Meditation</a>
            <a class="nav-link" href="<?php echo url('yoga'); ?>">Yoga</a>
            <a class="nav-link" href="<?php echo url('therapy'); ?>">Therapy</a>
            <a class="nav-link" href="<?php echo url('games'); ?>">Games</a>
            <a class="nav-link" href="<?php echo url('donation'); ?>">Donate</a>
            <a class="nav-link" href="<?php echo url('community'); ?>">Community</a>
        </nav>
        
        <div class="row gap-sm">
            <?php if ($isLoggedIn): ?>
                <!-- Logged in state -->
                <div class="relative" id="user-menu-container">
                    <button class="row gap-2 items-center btn-ghost px-3 py-2" id="user-menu-btn">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center overflow-hidden">
                            <?php if (!empty($user['avatar'])): ?>
                                <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="w-full h-full object-cover">
                            <?php else: ?>
                                <span class="material-symbols-outlined text-primary">person</span>
                            <?php endif; ?>
                        </div>
                        <span class="txt txt-sm"><?php echo htmlspecialchars($user['name']); ?></span>
                        <span class="material-symbols-outlined txt-2" style="font-size: 18px;">expand_more</span>
                    </button>
                    
                    <div class="absolute right-0 top-full mt-2 w-48 rounded-lg surface shadow-lg border border-border-light dark:border-border-dark hidden z-50" id="user-dropdown">
                        <div class="py-2">
                            <a href="<?php echo url('profile'); ?>" class="row gap-2 px-4 py-2 txt-sm txt hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined" style="font-size: 18px;">person</span>
                                Profile
                            </a>
                            <a href="<?php echo url('user_progress'); ?>" class="row gap-2 px-4 py-2 txt-sm txt hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined" style="font-size: 18px;">trending_up</span>
                                My Progress
                            </a>
                            <a href="<?php echo url('questionnaire'); ?>" class="row gap-2 px-4 py-2 txt-sm txt hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined" style="font-size: 18px;">quiz</span>
                                Questionnaire
                            </a>
                            <?php if (Auth::isAdmin() || Auth::isStaff()): ?>
                                <hr class="my-2 border-border-light dark:border-border-dark">
                                <a href="<?php echo url('staff'); ?>" class="row gap-2 px-4 py-2 txt-sm txt hover:bg-primary/10 transition-colors">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">admin_panel_settings</span>
                                    Staff Panel
                                </a>
                            <?php endif; ?>
                            <?php if (Auth::isAdmin()): ?>
                                <a href="<?php echo url('admin_donation'); ?>" class="row gap-2 px-4 py-2 txt-sm txt hover:bg-primary/10 transition-colors">
                                    <span class="material-symbols-outlined" style="font-size: 18px;">volunteer_activism</span>
                                    Manage Donations
                                </a>
                            <?php endif; ?>
                            <hr class="my-2 border-border-light dark:border-border-dark">
                            <a href="<?php echo url('logout'); ?>" class="row gap-2 px-4 py-2 txt-sm text-red-500 hover:bg-red-500/10 transition-colors">
                                <span class="material-symbols-outlined" style="font-size: 18px;">logout</span>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Guest state -->
                <button class="btn-secondary" onclick="gotoPage(ROUTES.LOGIN)">
                    <span class="truncate">Log In</span>
                </button>
                <button class="btn-primary" onclick="gotoPage(ROUTES.SIGNUP)">
                    <span class="truncate">Sign Up</span>
                </button>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Mobile menu button -->
    <button class="md:hidden btn-ghost p-2" id="mobile-menu-btn">
        <span class="material-symbols-outlined">menu</span>
    </button>
</header>

<!-- Mobile menu -->
<div class="md:hidden fixed inset-0 bg-black/50 z-40 hidden" id="mobile-menu-overlay">
    <div class="absolute right-0 top-0 h-full w-64 surface shadow-xl transform transition-transform" id="mobile-menu">
        <div class="col h-full">
            <div class="row justify-end p-4">
                <button class="btn-ghost p-2" id="mobile-menu-close">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <nav class="col gap-1 px-4 flex-1">
                <a href="<?php echo url('home'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">home</span>
                    Home
                </a>
                <a href="<?php echo url('meditation'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">self_improvement</span>
                    Meditation
                </a>
                <a href="<?php echo url('yoga'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">fitbit_yoga</span>
                    Yoga
                </a>
                <a href="<?php echo url('therapy'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">spa</span>
                    Therapy
                </a>
                <a href="<?php echo url('games'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">psychology</span>
                    Games
                </a>
                <a href="<?php echo url('donation'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">volunteer_activism</span>
                    Donate
                </a>
                <a href="<?php echo url('community'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                    <span class="material-symbols-outlined">groups</span>
                    Community
                </a>
                
                <?php if ($isLoggedIn): ?>
                    <hr class="my-2 border-border-light dark:border-border-dark">
                    <a href="<?php echo url('profile'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                        <span class="material-symbols-outlined">person</span>
                        Profile
                    </a>
                    <a href="<?php echo url('questionnaire'); ?>" class="row gap-3 px-4 py-3 txt rounded-lg hover:bg-primary/10">
                        <span class="material-symbols-outlined">quiz</span>
                        Questionnaire
                    </a>
                <?php endif; ?>
            </nav>
            
            <div class="p-4 border-t border-border-light dark:border-border-dark">
                <?php if ($isLoggedIn): ?>
                    <div class="row gap-3 px-4 py-2 mb-3">
                        <div class="w-10 h-10 rounded-full bg-primary/20 center overflow-hidden">
                            <?php if (!empty($user['avatar'])): ?>
                                <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="w-full h-full object-cover">
                            <?php else: ?>
                                <span class="material-symbols-outlined text-primary">person</span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <p class="txt txt-sm font-medium"><?php echo htmlspecialchars($user['name']); ?></p>
                            <p class="txt-2 txt-xs"><?php echo htmlspecialchars($user['email']); ?></p>
                        </div>
                    </div>
                    <a href="<?php echo url('logout'); ?>" class="btn-secondary w-full">
                        <span class="material-symbols-outlined" style="font-size: 18px;">logout</span>
                        Log Out
                    </a>
                <?php else: ?>
                    <div class="col gap-2">
                        <button class="btn-primary w-full" onclick="gotoPage(ROUTES.SIGNUP)">Sign Up</button>
                        <button class="btn-secondary w-full" onclick="gotoPage(ROUTES.LOGIN)">Log In</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
// User dropdown toggle
const userMenuBtn = document.getElementById('user-menu-btn');
const userDropdown = document.getElementById('user-dropdown');

if (userMenuBtn && userDropdown) {
    userMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        userDropdown.classList.toggle('hidden');
    });
    
    document.addEventListener('click', () => {
        userDropdown.classList.add('hidden');
    });
}

// Mobile menu toggle
const mobileMenuBtn = document.getElementById('mobile-menu-btn');
const mobileMenuClose = document.getElementById('mobile-menu-close');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');

if (mobileMenuBtn && mobileMenuOverlay) {
    mobileMenuBtn.addEventListener('click', () => {
        mobileMenuOverlay.classList.remove('hidden');
    });
    
    mobileMenuClose.addEventListener('click', () => {
        mobileMenuOverlay.classList.add('hidden');
    });
    
    mobileMenuOverlay.addEventListener('click', (e) => {
        if (e.target === mobileMenuOverlay) {
            mobileMenuOverlay.classList.add('hidden');
        }
    });
}
</script>