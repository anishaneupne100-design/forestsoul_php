<?php
// navbar/index.php
// Assumes init.php is included by parent page
?>
<header class="header sticky top-0 z-50 bg-surface/80 backdrop-blur-md border-b border-border-light dark:border-border-dark">
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
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('meditation/'); ?>">Meditation</a>
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('yoga/'); ?>">Yoga</a>
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('therapy/'); ?>">Therapy</a>
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('games/'); ?>">Games</a>
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('donation/'); ?>">Donate</a>
            <a class="nav-link hover:text-primary transition-colors font-medium" href="<?php echo url('community/'); ?>">Community</a>
        </nav>
        
        <!-- User Actions -->
        <div class="flex items-center gap-4">
            <?php if (is_logged_in()): ?>
                <div class="relative group" id="user-menu-container">
                    <button class="row gap-2 items-center px-3 py-2 rounded-full hover:bg-primary/10 transition-colors">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center overflow-hidden">
                            <span class="material-symbols-outlined text-primary text-sm">person</span>
                        </div>
                        <span class="hidden md:block txt-sm font-medium"><?php echo htmlspecialchars($currentUser['name']); ?></span>
                        <span class="material-symbols-outlined text-sm">expand_more</span>
                    </button>
                    
                    <!-- Dropdown -->
                    <div class="absolute right-0 top-full mt-2 w-56 rounded-xl surface shadow-xl border border-border-light dark:border-border-dark hidden group-hover:block p-2">
                        <div class="flex flex-col">
                            <a href="<?php echo url('profile/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">person</span> Profile
                            </a>
                            <a href="<?php echo url('user_progress/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                <span class="material-symbols-outlined text-sm">trending_up</span> My Progress
                            </a>
                            <?php if (is_admin_user()): ?>
                                <hr class="my-2 border-border-light dark:border-border-dark">
                                <a href="<?php echo url('admin_donation/'); ?>" class="row gap-3 px-4 py-2 txt-sm rounded-lg hover:bg-primary/10 transition-colors">
                                    <span class="material-symbols-outlined text-sm">volunteer_activism</span> Manage Donations
                                </a>
                            <?php endif; ?>
                            <hr class="my-2 border-border-light dark:border-border-dark">
                            <!-- Helper for logging out is usually a link to logout script -->
                            <a href="<?php echo url('login/?action=logout'); ?>" class="row gap-3 px-4 py-2 txt-sm text-red-500 rounded-lg hover:bg-red-500/10 transition-colors">
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
            <button class="md:hidden p-2 hover:bg-primary/10 rounded-lg" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full surface border-b border-border-light dark:border-border-dark shadow-xl p-4 flex flex-col gap-2">
        <a class="p-3 rounded-lg hover:bg-primary/10" href="<?php echo url('meditation/'); ?>">Meditation</a>
        <a class="p-3 rounded-lg hover:bg-primary/10" href="<?php echo url('yoga/'); ?>">Yoga</a>
        <a class="p-3 rounded-lg hover:bg-primary/10" href="<?php echo url('therapy/'); ?>">Therapy</a>
        <a class="p-3 rounded-lg hover:bg-primary/10" href="<?php echo url('community/'); ?>">Community</a>
        <?php if (!is_logged_in()): ?>
            <div class="grid grid-cols-2 gap-3 mt-2">
                <a href="<?php echo url('login/'); ?>" class="text-center p-3 rounded-lg border border-primary text-primary">Log In</a>
                <a href="<?php echo url('signup/'); ?>" class="text-center p-3 rounded-lg bg-primary text-white">Sign Up</a>
            </div>
        <?php else: ?>
             <a href="<?php echo url('login/?action=logout'); ?>" class="p-3 rounded-lg text-red-500 hover:bg-red-500/10">Log Out</a>
        <?php endif; ?>
    </div>
</header>