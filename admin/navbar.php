<?php
// admin/navbar.php
$admin_user = Auth::user();
?>
<nav class="h-20 bg-admin-surface/80 backdrop-blur-xl border-b border-white/5 sticky top-0 z-[1000] px-6 flex items-center justify-between">
    <div class="flex items-center gap-8">
        <a href="<?php echo url('admin/'); ?>" class="flex items-center gap-3 group">
            <div class="size-10 rounded-xl bg-admin-primary center shadow-lg shadow-admin-primary/20 rotate-3 group-hover:rotate-0 transition-transform">
                <i class="fa-solid fa-shield-halved text-white text-lg"></i>
            </div>
            <div class="flex flex-col">
                <span class="font-black text-lg leading-none tracking-tight">ForestSoul</span>
                <span class="text-[10px] uppercase font-black tracking-widest text-admin-primary">Admin Control</span>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-1 bg-admin-bg/50 p-1 rounded-xl border border-white/5">
            <a href="<?php echo url('admin/'); ?>" class="px-5 py-2 rounded-lg text-sm font-bold <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'bg-admin-primary text-white' : 'text-white/50 hover:text-white'; ?> transition-all">Dashboard</a>
            <a href="<?php echo url('admin/events.php'); ?>" class="px-5 py-2 rounded-lg text-sm font-bold <?php echo basename($_SERVER['PHP_SELF']) == 'events.php' ? 'bg-admin-primary text-white' : 'text-white/50 hover:text-white'; ?> transition-all">Events</a>
            <a href="<?php echo url('admin/experts.php'); ?>" class="px-5 py-2 rounded-lg text-sm font-bold <?php echo basename($_SERVER['PHP_SELF']) == 'experts.php' ? 'bg-admin-primary text-white' : 'text-white/50 hover:text-white'; ?> transition-all">Experts</a>
            <a href="<?php echo url('admin/community.php'); ?>" class="px-5 py-2 rounded-lg text-sm font-bold <?php echo basename($_SERVER['PHP_SELF']) == 'community.php' ? 'bg-admin-primary text-white' : 'text-white/50 hover:text-white'; ?> transition-all">Feed</a>
        </div>
    </div>

    <div class="flex items-center gap-4">
        <div class="hidden lg:flex flex-col text-right">
            <span class="text-sm font-bold text-white"><?php echo htmlspecialchars($admin_user['name']); ?></span>
            <span class="text-[10px] text-admin-primary font-black uppercase tracking-widest">Master Admin</span>
        </div>
        <div class="size-11 rounded-xl bg-white/5 border border-white/10 center">
            <i class="fa-solid fa-user-shield text-admin-primary"></i>
        </div>
        <a href="<?php echo url(''); ?>" class="size-11 rounded-xl border border-white/5 center hover:bg-white/5 transition-colors text-white/50" title="Back to Site">
            <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
        </a>
    </div>
</nav>

<div class="pt-4"></div>
