<?php
// expert_dashboard.php
require_once 'backend/init.php';

if (!Auth::check() || !Auth::isExpert()) {
    header('Location: ' . url('login/'));
    exit;
}

$user = Auth::user();
$expertRes = get_user_expert_status($user['id']);
$expert = $expertRes['data'] ?? null;

if (!$expert) {
    die("Expert profile not found. Please contact admin.");
}

// Handle Status Updates
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'update_session') {
        $sessionId = $_POST['session_id'];
        $status = $_POST['status'];
        $remarks = $_POST['remarks'] ?? '';
        $link = $_POST['meeting_link'] ?? '';
        
        $res = update_session_status($sessionId, $status, $remarks, $link);
        if ($res['success']) {
            $success_msg = "Session updated successfully!";
        } else {
            $error_msg = "Failed to update session.";
        }
    }
}

$pendingSessions = get_expert_sessions($user['id'], 'pending')['data'] ?? [];
$approvedSessions = get_expert_sessions($user['id'], 'approved')['data'] ?? [];

$title = "Expert Control Panel - ForestSoul";
include_once 'head.php';
include_once 'components/navbar.php';
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-7xl mx-auto col gap-12">
        
        <!-- Welcome Header -->
        <div class="card bg-primary text-background-dark p-10 rounded-[3rem] shadow-2xl shadow-primary/20 animate-slide-up relative overflow-hidden">
            <div class="absolute right-0 top-0 size-64 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
            <div class="relative z-10 row gap-8 items-center flex-wrap">
                <div class="size-20 rounded-2xl overflow-hidden border-4 border-white/20 shadow-xl bg-white/10 center">
                    <?php if ($expert['profile_picture']): ?>
                        <img src="<?php echo url($expert['profile_picture']); ?>" class="size-full object-cover">
                    <?php else: ?>
                        <i class="fa-solid fa-user-doctor text-4xl"></i>
                    <?php endif; ?>
                </div>
                <div class="col gap-1">
                    <h1 class="txt-4xl font-black italic l-tight">Namaste, <?php echo htmlspecialchars($expert['name']); ?></h1>
                    <p class="font-bold opacity-60 uppercase tracking-[0.2em] text-xs">Certified <?php echo htmlspecialchars($expert['specialization']); ?></p>
                </div>
            </div>
        </div>

        <?php if (isset($success_msg)): ?>
            <div class="p-4 bg-green-500/10 border border-green-500/20 text-green-500 rounded-2xl text-center font-bold animate-fade-in">
                <?php echo $success_msg; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            <!-- Left: Session Requests -->
            <div class="lg:col-span-8 col gap-8">
                <div class="col gap-6">
                    <div class="between px-2">
                        <h2 class="txt-xl font-bold row gap-3 items-center">
                            <i class="fa-solid fa-clock-rotate-left text-primary"></i>
                            Pending Requests
                            <span class="text-xs px-2 py-0.5 rounded-full bg-white/5 text-white/40"><?php echo count($pendingSessions); ?></span>
                        </h2>
                    </div>

                    <?php if (empty($pendingSessions)): ?>
                        <div class="card bg-surface-dark/50 border-dashed border-white/10 p-12 text-center rounded-[2.5rem]">
                            <p class="txt-2 italic">No pending requests at the moment.</p>
                        </div>
                    <?php else: foreach($pendingSessions as $session): ?>
                        <div class="card bg-surface-dark border-white/5 p-8 rounded-[2.5rem] hover:border-primary/20 transition-all group">
                            <div class="row gap-6 items-start flex-wrap">
                                <div class="size-16 rounded-2xl bg-white/5 center text-white/20 group-hover:bg-primary/20 group-hover:text-primary transition-colors">
                                    <i class="fa-solid fa-user text-2xl"></i>
                                </div>
                                <div class="col gap-1 flex-1 min-w-[200px]">
                                    <h3 class="txt-xl font-bold"><?php echo htmlspecialchars($session['name'] . ' ' . $session['lastname']); ?></h3>
                                    <p class="txt-sm txt-2"><?php echo htmlspecialchars($session['email']); ?></p>
                                    <div class="row gap-3 mt-3 flex-wrap">
                                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/5 text-[10px] font-black uppercase text-white/40">
                                            <i class="fa-solid fa-calendar mr-1"></i> <?php echo $session['desired_date']; ?>
                                        </span>
                                        <span class="px-3 py-1 rounded-lg bg-white/5 border border-white/5 text-[10px] font-black uppercase text-white/40">
                                            <i class="fa-solid fa-clock mr-1"></i> <?php echo $session['desired_time']; ?>
                                        </span>
                                    </div>
                                    <?php if ($session['remarks']): ?>
                                        <p class="mt-4 p-4 rounded-xl bg-white/5 border border-white/5 text-xs txt-2 leading-relaxed italic">
                                            "<?php echo htmlspecialchars($session['remarks']); ?>"
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="col gap-3">
                                    <button onclick="openActionModal(<?php echo $session['id']; ?>, 'approved')" class="btn-primary h-12 px-6 rounded-xl font-bold">Approve</button>
                                    <button onclick="openActionModal(<?php echo $session['id']; ?>, 'rejected')" class="btn-ghost h-12 px-6 border border-white/5 text-red-500 hover:bg-red-500/10 rounded-xl font-bold">Reject</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                </div>

                <!-- Upcoming Approved Sessions -->
                <div class="col gap-6 mt-6">
                    <h2 class="txt-xl font-bold row gap-3 items-center px-2">
                        <i class="fa-solid fa-calendar-check text-green-500"></i>
                        Scheduled Sessions
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php foreach($approvedSessions as $session): ?>
                            <div class="card bg-surface-dark/80 border-white/5 p-6 rounded-[2rem]">
                                <div class="row gap-4 mb-4">
                                    <div class="size-12 rounded-xl bg-green-500/10 center text-green-500">
                                        <i class="fa-solid fa-video"></i>
                                    </div>
                                    <div class="col">
                                        <h4 class="font-bold"><?php echo htmlspecialchars($session['name']); ?></h4>
                                        <p class="text-[10px] uppercase font-black tracking-widest text-white/20"><?php echo $session['desired_date']; ?> @ <?php echo $session['desired_time']; ?></p>
                                    </div>
                                </div>
                                <?php if ($session['meeting_link']): ?>
                                    <a href="<?php echo $session['meeting_link']; ?>" target="_blank" class="btn-primary h-11 w-full rounded-xl text-xs font-bold center">Join Session</a>
                                <?php else: ?>
                                    <button disabled class="w-full h-11 rounded-xl bg-white/5 text-white/20 text-xs font-bold border border-white/5 capitalize">Link Pending</button>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Right: Performance & Stats -->
            <aside class="lg:col-span-4 col gap-8">
                <div class="card bg-surface-dark border-white/5 p-8 rounded-[2.5rem]">
                    <h3 class="txt-lg font-bold mb-6">Expertise Overview</h3>
                    <div class="col gap-6">
                        <div class="row items-center justify-between p-4 rounded-2xl bg-white/5">
                            <span class="txt-sm txt-2">Total Patients</span>
                            <span class="txt-2xl font-black text-white"><?php echo count($approvedSessions) + count($pendingSessions); ?></span>
                        </div>
                        <div class="row items-center justify-between p-4 rounded-2xl bg-white/5">
                            <span class="txt-sm txt-2">Yrs Experience</span>
                            <span class="txt-2xl font-black text-white"><?php echo $expert['experience_years']; ?></span>
                        </div>
                    </div>
                </div>

                <div class="card bg-surface-dark border-white/5 p-8 rounded-[2.5rem]">
                    <h3 class="txt-lg font-bold mb-4 italic text-primary">Need a Break?</h3>
                    <p class="txt-xs txt-2 mb-6 leading-relaxed">Pausing your profile will hide you from new patient bookings but keep your current appointments.</p>
                    <button class="w-full h-14 rounded-2xl border border-white/10 hover:bg-white/5 transition-all font-bold text-sm">
                        Pause My Profile
                    </button>
                </div>
            </aside>
        </div>
    </div>
</main>

<!-- Action Modal -->
<div id="action-modal" class="fixed inset-0 z-[1000] center hidden p-6">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-md" onclick="closeModal()"></div>
    <div class="relative card bg-surface-dark border border-white/10 w-full max-w-lg p-10 rounded-[3rem] animate-scale-in">
        <h2 id="modal-title" class="txt-2xl font-black mb-6">Approve Session</h2>
        <form action="" method="POST" class="col gap-6">
            <input type="hidden" name="action" value="update_session">
            <input type="hidden" name="session_id" id="modal-session-id">
            <input type="hidden" name="status" id="modal-status">

            <label class="col gap-2" id="link-field">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Meeting Link (Zoom/Google Meet)</span>
                <input type="url" name="meeting_link" class="input h-14" placeholder="https://meet.google.com/..." required>
            </label>

            <label class="col gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Remarks / Instructions</span>
                <textarea name="remarks" class="input p-4 min-h-[100px]" placeholder="Add any notes for the patient..."></textarea>
            </label>

            <div class="row gap-4 pt-4">
                <button type="button" onclick="closeModal()" class="flex-1 h-14 rounded-2xl font-black border border-white/5 hover:bg-white/5 uppercase tracking-widest text-xs">Cancel</button>
                <button type="submit" id="submit-btn" class="flex-1 h-14 rounded-2xl font-black bg-primary text-background-dark uppercase tracking-widest text-xs shadow-xl shadow-primary/20">Confirm</button>
            </div>
        </form>
    </div>
</div>

<script>
function openActionModal(id, status) {
    $('#modal-session-id').val(id);
    $('#modal-status').val(status);
    $('#modal-title').text(status === 'approved' ? 'Approve Session' : 'Reject Session');
    
    if (status === 'rejected') {
        $('#link-field').hide().find('input').removeAttr('required');
        $('#submit-btn').removeClass('bg-primary').addClass('bg-red-500').text('Reject Now');
    } else {
        $('#link-field').show().find('input').attr('required', 'required');
        $('#submit-btn').removeClass('bg-red-500').addClass('bg-primary').text('Approve Now');
    }
    
    $('#action-modal').removeClass('hidden').addClass('flex');
}

function closeModal() {
    $('#action-modal').fadeOut(200, function() {
        $(this).addClass('hidden').css('display', '');
    });
}
</script>

<?php put_footer(); ?>
