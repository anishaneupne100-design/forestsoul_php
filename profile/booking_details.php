<?php
// profile/booking_details.php
require_once __DIR__ . '/../backend/init.php';
require_login();

$sessionId = $_GET['id'] ?? null;
if (!$sessionId) {
    header('Location: ' . url('profile/my_bookings.php'));
    exit;
}

$pdo = get_db_connection();
$stmt = $pdo->prepare("SELECT s.*, e.name as expert_name, e.lastname as expert_lastname, e.specialization, e.profile_picture 
                       FROM therapy_sessions s 
                       JOIN experts e ON s.expert_id = e.id 
                       WHERE s.id = ? AND s.user_id = ?");
$stmt->execute([$sessionId, Auth::id()]);
$session = $stmt->fetch();

if (!$session) {
    die("Session not found or unauthorized.");
}

$title = "Booking Details - ForestSoul";
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../components/navbar.php';

$statusColor = 'text-amber-500 bg-amber-500/10';
if ($session['status'] === 'approved') $statusColor = 'text-green-500 bg-green-500/10';
if ($session['status'] === 'rejected') $statusColor = 'text-red-500 bg-red-500/10';
?>

<main class="flex-grow py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <a href="<?php echo url('profile/my_bookings.php'); ?>" class="row gap-2 items-center text-white/40 hover:text-primary transition-colors text-xs font-black uppercase tracking-widest mb-10">
            <i class="fa-solid fa-arrow-left text-[10px]"></i> Back to My Journey
        </a>

        <div class="col gap-10">
            <div class="card bg-surface-dark border-white/5 p-10 rounded-[3rem] shadow-2xl">
                <div class="between flex-wrap gap-6 border-b border-white/5 pb-10 mb-10">
                    <div class="row gap-6 items-center">
                        <div class="size-20 rounded-3xl bg-primary/10 center overflow-hidden border-2 border-white/5">
                            <?php if ($session['profile_picture']): ?>
                                <img src="<?php echo url($session['profile_picture']); ?>" class="size-full object-cover">
                            <?php else: ?>
                                <i class="fa-solid fa-user-doctor text-3xl text-primary"></i>
                            <?php endif; ?>
                        </div>
                        <div class="col gap-1">
                            <h2 class="txt-2xl font-black text-white"><?php echo htmlspecialchars($session['expert_name'] . ' ' . $session['expert_lastname']); ?></h2>
                            <p class="text-[10px] font-black uppercase tracking-[0.2em] text-primary"><?php echo htmlspecialchars($session['specialization']); ?></p>
                        </div>
                    </div>
                    <span class="px-6 py-2 rounded-2xl <?php echo $statusColor ?> text-xs font-black uppercase tracking-widest border border-current/10">
                        <?php echo $session['status']; ?>
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                    <div class="col gap-8">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-white/20 mb-3">Appointment Logistics</p>
                            <div class="col gap-4">
                                <div class="row gap-4 items-center p-4 bg-white/2 rounded-2xl border border-white/5">
                                    <i class="fa-solid fa-calendar-day text-primary"></i>
                                    <div class="col">
                                        <span class="text-[10px] text-white/40 uppercase font-bold">Planned Date</span>
                                        <span class="text-sm font-bold text-white"><?php echo date('l, F d, Y', strtotime($session['desired_date'])); ?></span>
                                    </div>
                                </div>
                                <div class="row gap-4 items-center p-4 bg-white/2 rounded-2xl border border-white/5">
                                    <i class="fa-solid fa-clock text-primary"></i>
                                    <div class="col">
                                        <span class="text-[10px] text-white/40 uppercase font-bold">Preferred Time</span>
                                        <span class="text-sm font-bold text-white"><?php echo date('h:i A', strtotime($session['desired_time'])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if ($session['meeting_link']): ?>
                            <div class="p-8 bg-primary/5 rounded-[2rem] border-2 border-primary/20 col gap-4">
                                <div class="row gap-3 items-center">
                                    <i class="fa-solid fa-video text-primary"></i>
                                    <h3 class="font-black italic uppercase text-xs tracking-widest">Digital Sanctuary Link</h3>
                                </div>
                                <a href="<?php echo $session['meeting_link']; ?>" target="_blank" class="btn-primary w-full h-12 rounded-xl font-black text-xs uppercase tracking-widest shadow-xl shadow-primary/20">
                                    Join Session Room
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col gap-8">
                        <div>
                            <p class="text-[10px] font-black uppercase tracking-widest text-white/20 mb-3">Your Notes</p>
                            <div class="p-6 bg-white/2 rounded-2xl border border-white/5 min-h-[100px]">
                                <p class="text-xs text-white/60 italic leading-relaxed">"<?php echo nl2br(htmlspecialchars($session['remarks'] ?: 'No notes provided.')); ?>"</p>
                            </div>
                        </div>

                        <?php if ($session['status'] === 'rejected' && $session['remarks']): ?>
                            <div class="p-6 bg-red-500/5 rounded-2xl border border-red-500/20">
                                <p class="text-[10px] font-black uppercase tracking-widest text-red-500 mb-2">Expert Feedback / Reason</p>
                                <p class="text-xs text-white/80 leading-relaxed"><?php echo htmlspecialchars($session['remarks']); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="center gap-4 py-10 opacity-20 hover:opacity-100 transition-opacity">
                <i class="fa-solid fa-shield-halved text-primary"></i>
                <p class="text-[10px] font-bold uppercase tracking-widest">End-to-End Secure Transaction & Journey</p>
            </div>
        </div>
    </div>
</main>

<?php put_footer(); ?>
