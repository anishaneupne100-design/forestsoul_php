<?php
// events/details.php
require_once '../backend/init.php';

$eventId = $_GET['id'] ?? null;
if (!$eventId) {
    header('Location: index.php');
    exit;
}

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
    if (!Auth::check()) {
        header('Location: ' . url('login/'));
        exit;
    }
    
    $res = register_for_event(Auth::id(), $eventId, $_POST['remarks'] ?? '', $_POST['join_at'] ?? 'Online');
    if ($res['success']) {
        header("Location: details.php?id=$eventId&registered=1");
        exit;
    }
    $error_msg = $res['error'] ?? 'Failed to register';
}

$title = "Event Details - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

$res = get_event_with_registrations($eventId);
$event = $res['data'] ?? null;

if (!$event) {
    echo "<div class='p-20 text-center txt-2'>Event not found.</div>";
    include_once '../footer.php';
    exit;
}

$isRegistered = false;
if (Auth::check()) {
    foreach($event['registrations'] as $reg) {
        if ($reg['user_id'] == Auth::id()) {
            $isRegistered = true;
            $regStatus = $reg['is_approved'];
            break;
        }
    }
}
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Back Link -->
        <a href="index.php" class="row gap-2 items-center text-white/40 hover:text-primary transition-colors text-xs font-bold uppercase tracking-widest mb-10">
            <i class="fa-solid fa-chevron-left text-[10px]"></i> Back to Events
        </a>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <!-- Event Info -->
            <div class="md:col-span-8 col gap-8">
                <div class="col gap-6">
                    <h1 class="txt-5xl font-black text-white"><?php echo htmlspecialchars($event['title']); ?></h1>
                    
                    <div class="flex flex-wrap gap-4">
                        <span class="row gap-2 items-center px-4 py-2 rounded-xl bg-primary/10 text-primary text-sm font-bold border border-primary/20">
                            <i class="fa-solid fa-calendar"></i> <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                        </span>
                        <span class="row gap-2 items-center px-4 py-2 rounded-xl bg-white/5 text-white/60 text-sm font-bold border border-white/5">
                            <i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($event['location']); ?>
                        </span>
                    </div>

                    <div class="prose prose-invert max-w-none mb-10">
                        <p class="txt-lg txt-2 leading-relaxed"><?php echo nl2br(htmlspecialchars($event['description'])); ?></p>
                    </div>

                    <!-- Guidelines -->
                    <div class="card bg-surface-dark border-white/5 p-8 rounded-[2rem]">
                        <h3 class="txt-xl font-bold mb-4">Event Guidelines</h3>
                        <ul class="col gap-4">
                            <li class="row gap-3 items-start text-sm txt-2">
                                <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                                <span>Arrive 10 minutes early to settle in.</span>
                            </li>
                            <li class="row gap-3 items-start text-sm txt-2">
                                <i class="fa-solid fa-circle-check text-primary mt-1"></i>
                                <span>Wear comfortable clothing suitable for movement.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Registration Side -->
            <aside class="md:col-span-4">
                <div class="sticky top-24">
                    <?php if (isset($_GET['registered'])): ?>
                        <div class="card bg-primary text-background-dark p-8 rounded-[2rem] text-center col gap-4 animate-scale-in shadow-2xl shadow-primary/20">
                            <i class="fa-solid fa-circle-check text-5xl"></i>
                            <h3 class="txt-xl font-bold">Successfully Registered!</h3>
                            <p class="text-sm font-medium">We've sent you a notification. See you there!</p>
                        </div>
                    <?php elseif ($isRegistered): ?>
                        <div class="card bg-surface-dark border-white/5 p-8 rounded-[2rem] text-center col gap-4 shadow-xl">
                            <div class="size-16 rounded-3xl bg-white/5 center text-white/40 mx-auto">
                                <i class="fa-solid fa-calendar-check text-3xl"></i>
                            </div>
                            <h3 class="txt-xl font-bold">Already Registered</h3>
                            <?php if ($regStatus == 1): ?>
                                <p class="text-xs text-primary font-bold uppercase tracking-widest">Status: Approved</p>
                            <?php elseif ($regStatus == -1): ?>
                                <p class="text-xs text-red-500 font-bold uppercase tracking-widest">Status: Rejected</p>
                            <?php else: ?>
                                <p class="text-xs text-amber-500 font-bold uppercase tracking-widest">Status: Pending Approval</p>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="card bg-surface-dark border border-white/10 p-8 rounded-[2.5rem] shadow-2xl shadow-black/40">
                            <h3 class="txt-xl font-bold mb-6">Join Event</h3>
                            
                            <?php if (isset($error_msg)): ?>
                                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl text-xs font-bold"><?php echo $error_msg; ?></div>
                            <?php endif; ?>

                            <form action="" method="POST" class="col gap-6">
                                <input type="hidden" name="action" value="register">
                                
                                <label class="col gap-2">
                                    <span class="text-[10px] font-black uppercase tracking-widest txt-2 ml-1">Plan to Join At</span>
                                    <select name="join_at" class="input h-12 bg-white/5 border-white/10 px-4">
                                        <option value="Forest Soul Sanctuary">Forest Soul Sanctuary</option>
                                        <option value="Online via Zoom">Online (Zoom)</option>
                                    </select>
                                </label>

                                <label class="col gap-2">
                                    <span class="text-[10px] font-black uppercase tracking-widest txt-2 ml-1">Remarks (Optional)</span>
                                    <textarea name="remarks" class="input p-4 min-h-[100px] text-sm" placeholder="Any dietary requirements or special needs?"></textarea>
                                </label>

                                <button type="submit" class="btn-primary w-full h-14 rounded-2xl font-bold text-lg shadow-xl shadow-primary/20 group">
                                    Register Now
                                    <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </aside>
        </div>
    </div>
</main>

<?php put_footer(); ?>
