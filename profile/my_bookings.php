<?php
// profile/my_bookings.php
require_once __DIR__ . '/../backend/init.php';
require_login();

$title = "My Therapy Journey - ForestSoul";
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../components/navbar.php';

$sessionsRes = get_my_therapy_sessions(Auth::id());
$sessions = $sessionsRes['data'] ?? [];
?>

<main class="flex-grow py-12 px-4">
    <div class="max-w-5xl mx-auto">
        <header class="mb-12">
            <h1 class="txt-4xl font-black text-white italic mb-2">My Sessions</h1>
            <p class="txt-2 font-medium tracking-wide uppercase text-xs">Track your healing journey and upcoming appointments.</p>
        </header>

        <div class="grid grid-cols-1 gap-6">
            <?php if (empty($sessions)): ?>
                <div class="card bg-surface-dark border-white/5 border-dashed p-20 center flex-col gap-4 text-center">
                    <div class="size-20 rounded-full bg-white/5 center text-white/10 mb-2">
                        <i class="fa-solid fa-calendar-xmark text-4xl"></i>
                    </div>
                    <p class="txt-lg txt-2 italic">You haven't booked any sessions yet.</p>
                    <a href="<?php echo url('therapy/'); ?>" class="btn-primary mt-4 px-8 font-bold">Find a Specialist</a>
                </div>
            <?php else: foreach($sessions as $session): 
                $statusColor = 'text-amber-500 bg-amber-500/10';
                if ($session['status'] === 'approved') $statusColor = 'text-green-500 bg-green-500/10';
                if ($session['status'] === 'rejected') $statusColor = 'text-red-500 bg-red-500/10';
            ?>
                <div class="card bg-surface-dark border-white/5 p-8 row gap-8 items-center group hover:border-primary/30 transition-all cursor-pointer" onclick="location.href='<?php echo url('profile/booking_details.php?id=' . $session['id']); ?>'">
                    <div class="size-20 rounded-2xl bg-primary/10 center text-primary group-hover:bg-primary group-hover:text-background-dark transition-all shadow-xl">
                        <i class="fa-solid fa-user-doctor text-2xl"></i>
                    </div>
                    
                    <div class="col flex-1 gap-1">
                        <div class="between mb-1">
                            <span class="px-3 py-1 rounded-lg <?php echo $statusColor ?> text-[10px] font-black uppercase tracking-widest border border-current/10">
                                <?php echo ucfirst($session['status']); ?>
                            </span>
                            <span class="text-[10px] font-mono text-white/20 uppercase"><?php echo date('M d, Y', strtotime($session['created_at'])); ?></span>
                        </div>
                        <h3 class="txt-xl font-bold group-hover:text-primary transition-colors"><?php echo htmlspecialchars($session['expert_name'] . ' ' . $session['expert_lastname']); ?></h3>
                        <div class="row gap-4 mt-2">
                            <span class="row gap-2 items-center text-xs text-white/40 font-medium">
                                <i class="fa-solid fa-calendar text-primary text-[10px]"></i>
                                <?php echo date('D, M d', strtotime($session['desired_date'])); ?>
                            </span>
                            <span class="row gap-2 items-center text-xs text-white/40 font-medium">
                                <i class="fa-solid fa-clock text-primary text-[10px]"></i>
                                <?php echo date('h:i A', strtotime($session['desired_time'])); ?>
                            </span>
                        </div>
                    </div>

                    <div class="size-12 rounded-xl border border-white/5 center text-white/10 group-hover:text-primary group-hover:border-primary/50 transition-all">
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</main>

<?php if (isset($_GET['success'])): ?>
    <script>setTimeout(() => showToast('Session request submitted successfully!', 'success'), 100);</script>
<?php endif; ?>

<?php put_footer(); ?>
