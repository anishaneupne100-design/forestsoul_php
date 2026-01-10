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
        header('Location: ' . url('profile/my_bookings.php?success=1'));
        exit;
    } else {
        $error_msg = $res['error'];
    }
}

// Handle Rating Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'submit_rating') {
    if (!Auth::check()) {
        header('Location: ' . url('login/'));
        exit;
    }
    
    $rating = (int)$_POST['rating'];
    $feedback = $_POST['feedback'] ?? '';
    $res = add_expert_rating(Auth::id(), $expertId, $rating, $feedback);
    if ($res['success']) {
        $success_msg = "Thank you for your feedback!";
    } else {
        $error_msg = $res['error'];
    }
}

$analytics = get_expert_analytics($expertId);
$ratings = get_expert_ratings($expertId);

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
                            <div class="row gap-2 items-center mt-2">
                                <div class="row gap-1 text-amber-500 text-sm">
                                    <?php for($i=1; $i<=5; $i++): ?>
                                        <i class="fa-<?php echo $i <= $analytics['avg_rating'] ? 'solid' : 'regular'; ?> fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <span class="text-xs font-black text-white/40 uppercase tracking-widest">(<?php echo $analytics['total_ratings']; ?> Reviews)</span>
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
                            <p class="text-[10px] font-black uppercase tracking-widest text-white/20 mb-1">Expert Rating</p>
                            <p class="txt-xl font-bold text-white"><?php echo $analytics['avg_rating']; ?> / 5.0</p>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="col gap-8 mt-6">
                        <div class="between items-center">
                            <h3 class="txt-xl font-bold text-white italic">Patient Feedback</h3>
                            <button onclick="$('#rating-form-card').slideToggle()" class="text-[10px] font-black uppercase tracking-widest text-primary hover:opacity-80 transition-opacity">Share Your Experience</button>
                        </div>

                        <!-- Add Rating Form (Hidden by default) -->
                        <div id="rating-form-card" class="hidden card bg-primary/5 border border-primary/20 p-8 rounded-[2rem] shadow-inner">
                            <form action="" method="POST" class="col gap-6">
                                <input type="hidden" name="action" value="submit_rating">
                                <div class="col gap-4">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Your Rating</span>
                                    <div class="row gap-4">
                                        <?php for($i=1; $i<=5; $i++): ?>
                                            <input type="radio" name="rating" value="<?php echo $i; ?>" id="r<?php echo $i; ?>" class="hidden peer/r<?php echo $i; ?>" <?php echo $i===5?'checked':''; ?>>
                                            <label for="r<?php echo $i; ?>" class="size-12 rounded-xl bg-white/5 border border-white/10 center cursor-pointer text-white/20 peer-checked/r<?php echo $i; ?>:bg-primary peer-checked/r<?php echo $i; ?>:text-background-dark peer-checked/r<?php echo $i; ?>:border-primary transition-all font-black"><?php echo $i; ?></label>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <label class="col gap-2">
                                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Your Review</span>
                                    <textarea name="feedback" class="input p-4 min-h-[100px] text-sm" placeholder="How was your session?" required></textarea>
                                </label>
                                <button type="submit" class="btn-primary h-12 rounded-xl font-black uppercase tracking-widest text-[10px] shadow-lg shadow-primary/20">Submit Review</button>
                            </form>
                        </div>

                        <div class="col gap-6">
                            <?php if (empty($ratings)): ?>
                                <p class="txt-sm txt-2 italic opacity-40">No reviews yet. Be the first to share your thoughts!</p>
                            <?php else: foreach($ratings as $review): ?>
                                <div class="p-6 rounded-[2rem] bg-white/2 border border-white/5 col gap-3 group hover:bg-white/5 transition-all">
                                    <div class="between">
                                        <div class="row gap-3 items-center">
                                            <div class="size-8 rounded-lg bg-primary/10 center text-primary font-black text-[10px] uppercase">
                                                <?php echo substr($review['name'], 0, 1); ?>
                                            </div>
                                            <span class="text-xs font-bold text-white"><?php echo htmlspecialchars($review['name']); ?></span>
                                        </div>
                                        <div class="row gap-0.5 text-amber-500 text-[10px]">
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <i class="fa-<?php echo $i <= $review['rating'] ? 'solid' : 'regular'; ?> fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <p class="text-xs txt-2 leading-relaxed"><?php echo nl2br(htmlspecialchars($review['feedback'])); ?></p>
                                    <span class="text-[9px] font-black uppercase tracking-widest text-white/10"><?php echo date('M d, Y', strtotime($review['created_at'])); ?></span>
                                </div>
                            <?php endforeach; endif; ?>
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
