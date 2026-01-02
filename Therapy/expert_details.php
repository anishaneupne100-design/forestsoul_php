<?php
// therapy/expert_details.php
require_once '../backend/init.php';

$expertId = $_GET['id'] ?? null;
if (!$expertId) {
    header('Location: ' . url('therapy/'));
    exit;
}

$pdo = get_db_connection();
$stmt = $pdo->prepare("SELECT * FROM experts WHERE id = ?");
$stmt->execute([$expertId]);
$expert = $stmt->fetch();

if (!$expert) {
    die("Expert not found.");
}

$success_msg = '';
$error_msg = '';

// Handle Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'book_session') {
    if (!Auth::check()) {
        header('Location: ' . url('login/'));
        exit;
    }
    
    $res = book_therapy_session(Auth::id(), $expertId, $_POST);
    if ($res['success']) {
        $success_msg = $res['message'];
    } else {
        $error_msg = $res['error'];
    }
}

$title = "Therapy with " . htmlspecialchars($expert['name']) . " - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <a href="<?php echo url('therapy/'); ?>" class="row gap-2 items-center text-white/40 hover:text-primary transition-colors text-xs font-bold uppercase tracking-widest mb-10">
            <i class="fa-solid fa-chevron-left text-[10px]"></i> Back to Experts
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Expert Profile -->
            <div class="lg:col-span-7 col gap-10">
                <div class="col gap-6">
                    <div class="row gap-8 items-center flex-wrap">
                        <div class="size-32 rounded-[2.5rem] bg-primary/10 center overflow-hidden border-4 border-white/5 shadow-2xl">
                            <?php if ($expert['profile_picture']): ?>
                                <img src="<?php echo url($expert['profile_picture']); ?>" class="size-full object-cover">
                            <?php else: ?>
                                <i class="fa-solid fa-user-doctor text-5xl"></i>
                            <?php endif; ?>
                        </div>
                        <div class="col gap-2">
                            <h1 class="txt-4xl font-black text-white italic"><?php echo htmlspecialchars($expert['name'] . ' ' . $expert['lastname']); ?></h1>
                            <div class="row gap-3">
                                <span class="px-3 py-1 rounded-lg bg-primary/20 text-primary text-[10px] font-black uppercase tracking-widest"><?php echo htmlspecialchars($expert['degree']); ?></span>
                                <span class="px-3 py-1 rounded-lg bg-secondary/20 text-secondary text-[10px] font-black uppercase tracking-widest"><?php echo htmlspecialchars($expert['specialization']); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="prose prose-invert max-w-none">
                        <h3 class="txt-xl font-bold text-white mb-4">Professional Bio</h3>
                        <p class="txt-lg txt-2 leading-relaxed italic">"<?php echo nl2br(htmlspecialchars($expert['bio'])); ?>"</p>
                    </div>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="card bg-surface-dark border-white/5 p-6 rounded-2xl">
                            <p class="text-[10px] font-black uppercase tracking-widest text-white/20 mb-1">Experience</p>
                            <p class="txt-xl font-bold text-white"><?php echo $expert['experience_years']; ?>+ Years</p>
                        </div>
                        <div class="card bg-surface-dark border-white/5 p-6 rounded-2xl">
                            <p class="text-[10px] font-black uppercase tracking-widest text-white/20 mb-1">Response Time</p>
                            <p class="txt-xl font-bold text-white">< 24 Hours</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Section -->
            <aside class="lg:col-span-5">
                <div class="sticky top-24">
                    <?php if ($success_msg): ?>
                        <div class="card bg-primary text-background-dark p-10 rounded-[3rem] text-center col gap-6 animate-scale-in shadow-2xl shadow-primary/20">
                            <div class="size-20 rounded-full bg-white/20 center mx-auto">
                                <i class="fa-solid fa-check text-4xl"></i>
                            </div>
                            <div class="col gap-2">
                                <h3 class="txt-2xl font-black italic">Request Sent!</h3>
                                <p class="text-sm font-medium opacity-80"><?php echo $success_msg; ?></p>
                            </div>
                            <a href="<?php echo url('profile/'); ?>" class="btn-ghost bg-white/20 h-12 rounded-xl font-bold center">View My Sessions</a>
                        </div>
                    <?php else: ?>
                        <div class="card bg-surface-dark border border-white/10 p-10 rounded-[3rem] shadow-2xl">
                            <h3 class="txt-2xl font-black mb-8 italic">Book a Session</h3>
                            
                            <?php if ($error_msg): ?>
                                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl text-xs font-bold"><?php echo $error_msg; ?></div>
                            <?php endif; ?>

                            <form action="" method="POST" class="col gap-6">
                                <input type="hidden" name="action" value="book_session">
                                
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="col gap-2">
                                        <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Choice of Date</span>
                                        <input type="date" name="date" class="input h-12 bg-white/5 border-white/10 px-4" required min="<?php echo date('Y-m-d'); ?>">
                                    </label>
                                    <label class="col gap-2">
                                        <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Preferred Time</span>
                                        <input type="time" name="time" class="input h-12 bg-white/5 border-white/10 px-4" required>
                                    </label>
                                </div>

                                <label class="col gap-2">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Reason for Visit (Brief)</span>
                                    <textarea name="remarks" class="input p-4 min-h-[120px] text-sm" placeholder="Tell us what's on your mind..." required></textarea>
                                </label>

                                <button type="submit" class="btn-primary w-full h-16 rounded-2xl font-black uppercase tracking-widest text-sm shadow-xl shadow-primary/20 group">
                                    Finalize Request
                                    <i class="fa-solid fa-leaf ml-2 group-hover:rotate-45 transition-transform"></i>
                                </button>
                                
                                <p class="text-center text-[10px] text-white/20 font-medium px-4">By booking, you agree to our 24-hour cancellation policy.</p>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php put_footer(); ?>
