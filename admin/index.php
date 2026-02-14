<?php
// admin/index.php
$title = "Dashboard - ForestSoul Admin";
require_once 'head.php';
require_once 'navbar.php';

$stats = get_admin_dashboard_stats()['data'];
$recentActivity = get_recent_admin_activity(8)['data'] ?? [];
?>

<main class="px-6 pb-20 max-w-7xl mx-auto">
    <!-- Hero Header -->
    <div class="py-10 animate-fade-in">
        <h1 class="text-4xl font-black tracking-tight text-white mb-2">Welcome Back, Overseer.</h1>
        <p class="text-white/40 font-medium">Here's a snapshot of the ForestSoul ecosystem today.</p>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Experts -->
        <div class="admin-card p-6 col gap-4 shadow-xl cursor-pointer hover:border-admin-primary/50 transition-all" onclick="location.href='<?php echo url('admin/experts.php'); ?>'">
            <div class="between">
                <div class="size-12 rounded-2xl bg-admin-primary/10 center text-admin-primary">
                    <i class="fa-solid fa-user-doctor text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-admin-primary bg-admin-primary/10 px-2 py-1 rounded">Action Needed</span>
            </div>
            <div class="col gap-1">
                <span class="text-4xl font-black"><?php echo $stats['pending_experts']; ?></span>
                <span class="text-xs font-bold text-white/40 uppercase tracking-widest">Pending Expert Apps</span>
            </div>
        </div>

        <!-- Registrations -->
        <div class="admin-card p-6 col gap-4 shadow-xl cursor-pointer hover:border-amber-500/50 transition-all" onclick="location.href='<?php echo url('admin/events.php'); ?>'">
            <div class="between">
                <div class="size-12 rounded-2xl bg-amber-500/10 center text-amber-500">
                    <i class="fa-solid fa-calendar-check text-xl"></i>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-amber-500 bg-amber-500/10 px-2 py-1 rounded">Waitlist</span>
            </div>
            <div class="col gap-1">
                <span class="text-4xl font-black"><?php echo $stats['pending_registrations']; ?></span>
                <span class="text-xs font-bold text-white/40 uppercase tracking-widest">Pending Event Regs</span>
            </div>
        </div>

        <!-- Users -->
        <div class="admin-card p-6 col gap-4 shadow-xl">
            <div class="size-12 rounded-2xl bg-white/5 center text-white/40">
                <i class="fa-solid fa-users text-xl"></i>
            </div>
            <div class="col gap-1">
                <span class="text-4xl font-black"><?php echo $stats['total_users']; ?></span>
                <span class="text-xs font-bold text-white/40 uppercase tracking-widest">Total Community Members</span>
            </div>
        </div>

        <!-- Posts -->
        <div class="admin-card p-6 col gap-4 shadow-xl cursor-pointer hover:border-admin-primary/50 transition-all" onclick="location.href='<?php echo url('admin/community.php'); ?>'">
            <div class="size-12 rounded-2xl bg-white/5 center text-white/40">
                <i class="fa-solid fa-quote-left text-xl"></i>
            </div>
            <div class="col gap-1">
                <span class="text-4xl font-black"><?php echo $stats['total_posts']; ?></span>
                <span class="text-xs font-bold text-white/40 uppercase tracking-widest">Total Stories Shared</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Recent Activity Feed -->
        <div class="lg:col-span-8 col gap-6">
            <div class="admin-card p-8 min-h-[500px]">
                <div class="between mb-8">
                    <h3 class="text-xl font-black uppercase tracking-tight text-white/80">Pulse of the Forest</h3>
                    <button class="text-[10px] font-black text-admin-primary uppercase tracking-widest hover:underline">View All Activity</button>
                </div>
                <div class="col gap-4">
                    <?php if (empty($recentActivity)): ?>
                        <p class="text-center py-20 text-white/20 italic font-medium">The forest is quiet...</p>
                    <?php else: foreach($recentActivity as $log): 
                        $targetPage = url('admin/index.php');
                        if (str_contains($log['action'], 'expert')) $targetPage = url('admin/experts.php');
                        elseif (str_contains($log['action'], 'event') || str_contains($log['action'], 'registration')) $targetPage = url('admin/events.php');
                        elseif (str_contains($log['action'], 'post') || str_contains($log['action'], 'comment')) $targetPage = url('admin/community.php');
                    ?>
                        <div class="row gap-6 p-5 rounded-2xl bg-white/2 border border-white/5 items-center group transition-all hover:bg-white/5 cursor-pointer" onclick="location.href='<?php echo $targetPage; ?>'">
                            <div class="size-12 rounded-xl bg-admin-bg center text-admin-primary font-black uppercase shadow-inner">
                                <?php echo $log['name'][0]; ?>
                            </div>
                            <div class="col flex-1 gap-1">
                                <div class="between">
                                    <p class="text-sm font-bold text-white group-hover:text-admin-primary transition-colors"><?php echo htmlspecialchars($log['name'] . ' ' . $log['lastname']); ?></p>
                                    <span class="text-[10px] font-mono text-white/20 uppercase"><?php echo date('H:i', strtotime($log['created_at'])); ?></span>
                                </div>
                                <p class="text-xs text-white/60">
                                    <span class="text-admin-primary font-bold uppercase tracking-tighter mr-2"><?php echo str_replace('_', ' ', $log['action']); ?></span> 
                                    <?php echo htmlspecialchars($log['details'] ?? ''); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>

        <!-- Overview / Mini Tools -->
        <aside class="lg:col-span-4 col gap-8">
            <!-- Quick Actions -->
            <div class="admin-card p-8 bg-gradient-to-br from-admin-primary/20 to-transparent">
                <h3 class="text-lg font-black mb-6 uppercase tracking-tight">Rapid Response</h3>
                <div class="col gap-3">
                    <a href="<?php echo url('admin/events.php?open=modal'); ?>" class="btn-admin-primary w-full shadow-lg center">
                        <i class="fa-solid fa-plus"></i> New Event
                    </a>
                    <button class="w-full p-4 rounded-xl border border-white/10 text-white/50 text-sm font-bold hover:bg-white/5 transition-all text-left row gap-3 items-center">
                        <i class="fa-solid fa-envelope-open-text text-admin-primary"></i>
                        Blast Notification
                    </button>
                </div>
            </div>

            <!-- Health Snapshot -->
            <div class="admin-card p-8">
                <h3 class="text-lg font-black mb-6 uppercase tracking-tight">System Status</h3>
                <div class="col gap-6">
                    <div class="col gap-2">
                        <div class="between text-[10px] font-black uppercase tracking-widest text-white/30">
                            <span>Database Load</span>
                            <span class="text-admin-primary">Optimal</span>
                        </div>
                        <div class="h-1 w-full bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-admin-primary w-[35%] rounded-full shadow-[0_0_10px_rgba(99,102,241,0.5)]"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

<script>
    $(document).ready(function() {
        console.log("Admin Dashboard Loaded.");
    });
</script>
</body>
</html>
