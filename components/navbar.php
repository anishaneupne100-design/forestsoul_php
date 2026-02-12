<?php
// components/navbar.php
// Reusable navbar component. Included in pages after head.php
?>
<header class="header sticky top-0 z-40 bg-surface-light/80 dark:bg-surface-dark/80 backdrop-blur-md border-b border-border-light dark:border-border-dark">
    <div class="row gap-md txt px-6 py-3 max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="<?php echo url(''); ?>" class="row gap-md items-center group">
            <div class="icon-md text-primary transition-transform group-hover:scale-110">
                <span class="material-symbols-outlined" style="font-size: 32px;">forest</span>
            </div>
            <h2 class="txt-xl font-bold tracking-tight">ForestSoul</h2>
        </a>
        
        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-6 items-center">
            <a class="nav-link" href="<?php echo url('meditation/'); ?>">Meditation</a>
            <a class="nav-link" href="<?php echo url('yoga/'); ?>">Yoga</a>
            <a class="nav-link" href="<?php echo url('therapy/'); ?>">Therapy</a>
            <a class="nav-link" href="<?php echo url('games/'); ?>">Games</a>
            <a class="nav-link" href="<?php echo url('events/'); ?>">Events</a>
            <a class="nav-link" href="<?php echo url('community/'); ?>">Community</a>
        </nav>
        
        <!-- User Actions -->
        <div class="flex items-center gap-4">
            <?php if (Auth::check()): $user = Auth::user(); ?>
                <div class="relative" id="user-menu-container">
                    <button class="row gap-2 items-center px-3 py-2 rounded-full hover:bg-primary/10 transition-colors" id="user-menu-btn">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center overflow-hidden border-2 border-transparent hover:border-primary">
                            <?php if (!empty($user['avatar'])): ?>
                                <img src="<?php echo htmlspecialchars($user['avatar']); ?>" alt="Avatar" class="w-full h-full object-cover">
                            <?php else: ?>
                                <span class="material-symbols-outlined text-primary text-sm">person</span>
                            <?php endif; ?>
                        </div>
                        <span class="hidden md:block txt-sm font-medium"><?php echo htmlspecialchars($user['name']); ?></span>
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </button>
                    
                    <!-- Dropdown -->
                    <div id="user-dropdown" class="absolute right-0 top-full mt-2 w-56 rounded-xl surface shadow-2xl border border-border-light dark:border-border-dark hidden p-2 z-[100] transform scale-95 opacity-0 transition-all duration-200">
                        <div class="flex flex-col">
                            <a href="<?php echo url('profile/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">account_circle</span> Profile
                            </a>
                            <a href="<?php echo url('user_progress/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">trending_up</span> My Progress
                            </a>
                            <a href="<?php echo url('questionnaire/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">quiz</span> Assessment
                            </a>
                            <?php if (Auth::isStaff()): ?>
                                <hr class="my-2 border-border-light dark:border-border-dark">
                                <a href="<?php echo url('staff/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                    <span class="material-symbols-outlined text-sm">admin_panel_settings</span> Staff Panel
                                </a>
                            <?php endif; ?>
                            <hr class="my-2 border-border-light dark:border-border-dark">
                            <a href="<?php echo url('logout.php'); ?>" class="w-full text-left row gap-3 px-4 py-2 txt-sm text-red-500 rounded-lg hover:bg-red-500/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">logout</span> Log Out
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="hidden md:flex gap-3">
                    <a href="<?php echo url('login/'); ?>" class="px-5 py-2 rounded-full border border-primary text-primary hover:bg-primary/10 transition-colors font-medium">Log In</a>
                    <a href="<?php echo url('signup/'); ?>" class="px-5 py-2 rounded-full bg-primary text-white hover:bg-primary-dark transition-colors font-medium shadow-lg shadow-primary/30">Sign Up</a>
                </div>
            <?php endif; ?>

            <!-- Mobile Menu Btn -->
            <button class="md:hidden p-2 hover:bg-primary/10 rounded-lg" id="mobile-menu-btn">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" class="hidden md:hidden fixed inset-0 bg-black/50 z-[100]">
        <div id="mobile-menu" class="absolute right-0 top-0 h-full w-72 surface shadow-xl p-4 flex flex-col gap-4">
            <div class="row items-center justify-between border-b border-border-light dark:border-border-dark pb-4">
                <h2 class="txt-lg font-bold">Menu</h2>
                <button class="p-2 hover:bg-primary/10 rounded-lg" id="mobile-menu-close">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <nav class="flex flex-col gap-1">
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('meditation/'); ?>">Meditation</a>
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('yoga/'); ?>">Yoga</a>
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('therapy/'); ?>">Therapy</a>
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('games/'); ?>">Games</a>
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('events/'); ?>">Events</a>
                <a class="p-3 rounded-lg hover:bg-primary/10 transition-colors" href="<?php echo url('community/'); ?>">Community</a>
            </nav>

            <div class="mt-auto border-t border-border-light dark:border-border-dark pt-4 mb-4">
                <?php if (Auth::check()): $user = Auth::user(); ?>
                    <a href="<?php echo url('profile/'); ?>" class="row gap-3 px-2 py-3 mb-4 rounded-xl hover:bg-primary/10 transition-colors">
                        <div class="w-10 h-10 rounded-full bg-primary/20 center overflow-hidden">
                            <span class="material-symbols-outlined text-primary text-lg">person</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="txt-sm font-bold"><?php echo htmlspecialchars($user['name']); ?></span>
                            <span class="txt-xs txt-2"><?php echo htmlspecialchars($user['email']); ?></span>
                        </div>
                    </a>
                    <a href="<?php echo url('logout.php'); ?>" class="btn-secondary w-full justify-start gap-3 text-red-500">
                        <span class="material-symbols-outlined">logout</span> Log Out
                    </a>
                <?php else: ?>
                    <div class="flex flex-col gap-2">
                        <a href="<?php echo url('login/'); ?>" class="btn-secondary w-full">Log In</a>
                        <a href="<?php echo url('signup/'); ?>" class="btn-primary w-full">Sign Up</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<script>
    $(document).ready(function() {
        // User Dropdown Logic
        const $userBtn = $('#user-menu-btn');
        const $userDropdown = $('#user-dropdown');

        $userBtn.on('click', function(e) {
            e.stopPropagation();
            const isHidden = $userDropdown.hasClass('hidden');
            
            if (isHidden) {
                $userDropdown.removeClass('hidden').addClass('flex');
                setTimeout(() => {
                    $userDropdown.removeClass('scale-95 opacity-0').addClass('scale-100 opacity-100');
                }, 10);
            } else {
                closeUserMenu();
            }
        });

        function closeUserMenu() {
            $userDropdown.removeClass('scale-100 opacity-100').addClass('scale-95 opacity-0');
            setTimeout(() => {
                $userDropdown.addClass('hidden').removeClass('flex');
            }, 200);
        }

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#user-menu-container').length) {
                closeUserMenu();
            }
        });

        // Mobile Menu Logic
        const $btnOpen = $('#mobile-menu-btn');
        const $btnClose = $('#mobile-menu-close');
        const $overlay = $('#mobile-menu-overlay');

        $btnOpen.on('click', () => $overlay.removeClass('hidden').fadeIn(200));
        $btnClose.on('click', () => $overlay.fadeOut(200, () => $overlay.addClass('hidden')));
        $overlay.on('click', (e) => {
            if (e.target === $overlay[0]) $btnClose.trigger('click');
        });
    });

</script>
