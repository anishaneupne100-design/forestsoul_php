<?php
// profile/index.php
require_once '../backend/init.php';

// HANDLE REQUESTS AT TOP
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Auth::check()) {
        header('Location: ' . url('login/'));
        exit;
    }

    $action = $_POST['action'] ?? '';
    $userId = $_SESSION['user_id'];

    if ($action === 'update_profile') {
        $res = update_user_profile($userId, $_POST);
        if ($res['success']) {
            header("Location: " . url('profile/?msg=updated'));
            exit;
        }
        $error_msg = $res['message'] ?? 'Update failed';
    }

    if ($action === 'toggle_expert_pause') {
        $isPaused = ($_POST['is_paused'] === 'true');
        $res = toggle_expert_pause($userId, $isPaused);
        if ($res['success']) {
            header("Location: " . url('profile/?msg=status_updated'));
            exit;
        }
    }

    if ($action === 'delete_account') {
        // Simple password check for deletion logic would go here
        $res = delete_user_account($userId);
        if ($res['success']) {
            Auth::logout();
            header("Location: " . url('?msg=account_deleted'));
            exit;
        }
    }
}

// UI PARTS
$title = "My Dashboard - ForestSoul";
include_once '../head.php';

if (!Auth::check()) {
    header('Location: ' . url('login/'));
    exit;
}

$user = Auth::user();
$memberSince = date('M Y', strtotime($user['created_at'] ?? 'now'));

include_once '../components/navbar.php';

// Fetch stats and expert status
$expertStatus = get_user_expert_status($user['id']);
$isExpert = $expertStatus['is_expert'];
$expertData = $isExpert ? $expertStatus['data'] : null;
$hasPendingApp = $expertStatus['has_pending_app'] ?? false;

// Data for tabs (Direct fetch instead of API call)
$activityRes = get_user_activity($user['id']);
$activityData = $activityRes['data'] ?? ['posts' => [], 'comments' => [], 'likes' => [], 'logs' => [], 'notifications' => []];
?>

<main class="flex-grow bg-background-light dark:bg-background-dark min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <?php if (isset($error_msg)): ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl text-center font-bold">
                <?php echo htmlspecialchars($error_msg); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['msg'])): ?>
            <div class="mb-6 p-4 bg-primary/10 border border-primary/20 text-primary rounded-xl text-center font-bold">
                <?php 
                    if ($_GET['msg'] === 'updated') echo 'Profile updated successfully!';
                    if ($_GET['msg'] === 'status_updated') echo 'Expert status updated!';
                ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-6">
                <div class="card bg-surface-light dark:bg-surface-dark p-6 text-center border border-white/5 shadow-xl">
                    <div class="relative mx-auto size-24 mb-4">
                        <div class="size-24 rounded-full bg-primary/20 center overflow-hidden border-2 border-primary">
                            <?php if ($isExpert && !empty($expertData['profile_picture'])): ?>
                                <img src="<?php echo url($expertData['profile_picture']); ?>" class="size-full object-cover">
                            <?php else: ?>
                                <i class="fa-solid fa-user text-4xl text-primary"></i>
                            <?php endif; ?>
                        </div>
                    </div>
                    <h2 class="txt-xl font-bold"><?php echo htmlspecialchars($user['name'] . ' ' . ($user['lastname'] ?? '')); ?></h2>
                    <p class="txt-sm txt-2 mb-4"><?php echo htmlspecialchars($user['email']); ?></p>
                    
                    <div class="col gap-2">
                        <button onclick="openModal('edit-profile-modal')" class="btn-ghost w-full justify-start gap-3 h-11 px-4">
                            <i class="fa-solid fa-user-pen text-sm"></i>
                            <span class="txt-sm">Edit Profile</span>
                        </button>
                        
                        <?php if ($isExpert): ?>
                            <form action="" method="POST">
                                <input type="hidden" name="action" value="toggle_expert_pause">
                                <input type="hidden" name="is_paused" value="<?php echo $expertData['is_active'] ? 'true' : 'false'; ?>">
                                <button type="submit" class="btn-ghost w-full justify-start gap-3 h-11 px-4 <?php echo $expertData['is_active'] ? 'text-orange-400' : 'text-green-400'; ?>">
                                    <i class="fa-solid <?php echo $expertData['is_active'] ? 'fa-pause' : 'fa-play'; ?> text-sm"></i>
                                    <span class="txt-sm"><?php echo $expertData['is_active'] ? 'Pause Expert Profile' : 'Resume Expert Profile'; ?></span>
                                </button>
                            </form>
                            <a href="<?php echo url('expert_dashboard.php'); ?>" class="btn-primary w-full justify-center gap-3 h-11 px-4 bg-indigo-600 hover:bg-indigo-700 shadow-indigo-500/20">
                                <i class="fa-solid fa-gauge-high"></i>
                                <span class="txt-sm font-bold">Expert Dashboard</span>
                                <?php 
                                $pendingCount = count(get_expert_sessions($user['id'], 'pending')['data'] ?? []);
                                if ($pendingCount > 0): ?>
                                    <span class="size-5 rounded-full bg-white text-indigo-600 text-[10px] center font-black ml-auto"><?php echo $pendingCount; ?></span>
                                <?php endif; ?>
                            </a>
                        <?php elseif ($hasPendingApp): ?>
                            <div class="card bg-orange-500/10 border border-orange-500/20 p-3 text-left">
                                <p class="text-orange-400 text-xs font-bold mb-1">Expert Application Pending</p>
                                <p class="txt-xs txt-2">We are currently reviewing your qualifications.</p>
                            </div>
                        <?php else: ?>
                            <a href="<?php echo url('profile/apply_expert.php'); ?>" class="btn-primary w-full justify-center gap-3 h-11 px-4">
                                <i class="fa-solid fa-award"></i>
                                <span class="txt-sm">Apply as Expert</span>
                            </a>
                        <?php endif; ?>

                        <form action="" method="POST" onsubmit="return confirm('DANGER: This will permanently delete your account. Proceed?')">
                            <input type="hidden" name="action" value="delete_account">
                            <button type="submit" class="btn-ghost w-full justify-start gap-3 h-11 px-4 text-red-400 hover:bg-red-400/10">
                                <i class="fa-solid fa-trash-can text-sm"></i>
                                <span class="txt-sm">Delete Account</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Stats -->
                <div class="card bg-surface-light dark:bg-surface-dark p-6 border border-white/5 shadow-xl">
                    <h3 class="txt-sm font-bold uppercase tracking-widest text-primary mb-4">Quick Stats</h3>
                    <div class="col gap-4">
                        <div class="between">
                            <span class="txt-sm txt-2">Posts Made</span>
                            <span class="font-bold"><?php echo count($activityData['posts']); ?></span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Comments</span>
                            <span class="font-bold"><?php echo count($activityData['comments']); ?></span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Likes Given</span>
                            <span class="font-bold"><?php echo count($activityData['likes']); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="lg:col-span-3 col gap-6">
                <div class="card bg-surface-light dark:bg-surface-dark border border-white/5 shadow-xl overflow-hidden">
                    <div class="row overflow-x-auto border-b border-white/5 bg-background-dark/20 sticky top-0 z-10">
                        <button onclick="switchTab('tab-posts')" class="profile-tab active px-6 py-4 txt-sm font-bold row gap-2 border-b-2 border-primary" data-tab="tab-posts">
                            <i class="fa-solid fa-newspaper text-xs"></i> My Posts
                        </button>
                        <button onclick="switchTab('tab-comments')" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 border-b-2 border-transparent text-white/50" data-tab="tab-comments">
                            <i class="fa-solid fa-comment text-xs"></i> Comments
                        </button>
                        <button onclick="switchTab('tab-likes')" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 border-b-2 border-transparent text-white/50" data-tab="tab-likes">
                            <i class="fa-solid fa-heart text-xs"></i> Likes
                        </button>
                        <button onclick="switchTab('tab-notif')" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 border-b-2 border-transparent text-white/50" data-tab="tab-notif">
                            <i class="fa-solid fa-bell text-xs"></i> Notifications
                        </button>
                        <button onclick="switchTab('tab-sessions')" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 border-b-2 border-transparent text-white/50" data-tab="tab-sessions">
                            <i class="fa-solid fa-calendar-check text-xs"></i> Sessions
                        </button>
                    </div>

                    <div class="p-6">
                        <div id="tab-posts" class="tab-pane">
                            <div class="col gap-4">
                                <?php if (empty($activityData['posts'])): ?>
                                    <p class="text-center py-10 txt-2 italic">No stories shared yet.</p>
                                <?php else: foreach($activityData['posts'] as $p): ?>
                                    <div class="p-4 border border-white/5 rounded-xl bg-white/5">
                                        <h4 class="font-bold mb-1"><?php echo htmlspecialchars($p['title']); ?></h4>
                                        <p class="txt-sm txt-2 line-clamp-2"><?php echo htmlspecialchars($p['description']); ?></p>
                                    </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>

                        <div id="tab-comments" class="tab-pane hidden">
                             <div class="col gap-4">
                                <?php if (empty($activityData['comments'])): ?>
                                    <p class="text-center py-10 txt-2 italic">No comments yet.</p>
                                <?php else: foreach($activityData['comments'] as $c): ?>
                                    <div class="p-4 border border-white/5 rounded-xl bg-white/5">
                                        <p class="txt-sm mb-2">"<?php echo htmlspecialchars($c['comment']); ?>"</p>
                                        <p class="text-[10px] text-primary uppercase font-bold">On: <?php echo htmlspecialchars($c['post_title']); ?></p>
                                    </div>
                                <?php endforeach; endif; ?>
                             </div>
                        </div>

                        <div id="tab-likes" class="tab-pane hidden">
                            <div class="col gap-4">
                                <?php if (empty($activityData['likes'])): ?>
                                    <p class="text-center py-10 txt-2 italic">No likes yet.</p>
                                <?php else: foreach($activityData['likes'] as $l): ?>
                                    <div class="row gap-3 items-center p-3 border-b border-white/5 last:border-0">
                                        <i class="fa-solid fa-heart text-red-500 text-xs"></i>
                                        <span class="txt-sm">Liked "<?php echo htmlspecialchars($l['post_title']); ?>"</span>
                                    </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>

                        <div id="tab-notif" class="tab-pane hidden">
                            <div class="col gap-2">
                                <?php if (empty($activityData['notifications'])): ?>
                                    <p class="text-center py-10 txt-2 italic">No notifications.</p>
                                <?php else: foreach($activityData['notifications'] as $n): ?>
                                    <div class="p-4 border-l-4 <?php echo $n['is_read'] ? 'border-white/10' : 'border-primary bg-primary/5'; ?> rounded-r-xl">
                                        <p class="txt-sm"><?php echo htmlspecialchars($n['message']); ?></p>
                                        <span class="text-[10px] text-white/30"><?php echo date('M d, Y', strtotime($n['created_at'])); ?></span>
                                    </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>

                        <div id="tab-sessions" class="tab-pane hidden">
                            <div class="col gap-4">
                                <?php 
                                $sessions = get_my_therapy_sessions($user['id'])['data'] ?? [];
                                if (empty($sessions)): ?>
                                    <p class="text-center py-10 txt-2 italic">You haven't booked any therapy sessions.</p>
                                    <div class="center">
                                        <a href="<?php echo url('therapy/'); ?>" class="btn-primary px-6 h-10 rounded-xl center text-xs">Book a Session</a>
                                    </div>
                                <?php else: foreach($sessions as $s): ?>
                                    <div class="p-6 rounded-2xl bg-white/5 border border-white/5 between items-center">
                                        <div class="col gap-1">
                                            <p class="font-bold">With <?php echo htmlspecialchars($s['expert_name']); ?></p>
                                            <p class="text-[10px] text-white/40 uppercase font-black tracking-widest"><?php echo $s['desired_date']; ?> @ <?php echo $s['desired_time']; ?></p>
                                        </div>
                                        <div class="row gap-4 items-center">
                                            <?php if ($s['status'] === 'approved'): ?>
                                                <span class="px-3 py-1 bg-green-500/20 text-green-500 text-[10px] font-black rounded-lg uppercase">Confirmed</span>
                                                <?php if ($s['meeting_link']): ?>
                                                    <a href="<?php echo $s['meeting_link']; ?>" target="_blank" class="size-10 rounded-xl bg-primary center text-background-dark shadow-lg shadow-primary/20 hover:scale-105 transition-transform"><i class="fa-solid fa-video"></i></a>
                                                <?php endif; ?>
                                            <?php elseif ($s['status'] === 'rejected'): ?>
                                                <span class="px-3 py-1 bg-red-500/20 text-red-500 text-[10px] font-black rounded-lg uppercase">Rejected</span>
                                            <?php else: ?>
                                                <span class="px-3 py-1 bg-amber-500/20 text-amber-500 text-[10px] font-black rounded-lg uppercase">Pending</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modals -->
<div id="edit-profile-modal" class="modal fixed inset-0 z-[1000] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="card bg-surface-dark border border-white/10 w-full max-w-md p-8 shadow-2xl scale-95 transition-all duration-300">
        <div class="between mb-6">
            <h2 class="txt-xl font-bold">Edit Profile</h2>
            <button onclick="closeModal('edit-profile-modal')" class="text-white/50 hover:text-white"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form action="" method="POST" class="col gap-4">
            <input type="hidden" name="action" value="update_profile">
            <div class="grid grid-cols-2 gap-4">
                <label class="col gap-1">
                    <span class="txt-xs txt-2 font-bold uppercase pl-1">Name</span>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="input h-11" required>
                </label>
                <label class="col gap-1">
                    <span class="txt-xs txt-2 font-bold uppercase pl-1">Last Name</span>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname'] ?? ''); ?>" class="input h-11">
                </label>
            </div>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase pl-1">Age</span>
                <input type="number" name="age" value="<?php echo htmlspecialchars($user['age'] ?? ''); ?>" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase pl-1">Phone</span>
                <input type="text" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number'] ?? ''); ?>" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase pl-1">Address</span>
                <textarea name="address" class="input p-3" rows="2"><?php echo htmlspecialchars($user['address'] ?? ''); ?></textarea>
            </label>
            <button type="submit" class="btn-primary w-full h-12 mt-4 font-bold">Save Changes</button>
        </form>
    </div>
</div>

<script>
function switchTab(tabId) {
    $('.tab-pane').addClass('hidden');
    $('#' + tabId).removeClass('hidden');
    $('.profile-tab').removeClass('active border-primary text-white').addClass('border-transparent text-white/50');
    $(`[onclick="switchTab('${tabId}')"]`).addClass('active border-primary text-white').removeClass('border-transparent text-white/50');
}

function openModal(id) {
    $('#' + id).removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}

function closeModal(id) {
    $('#' + id).addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}
</script>

<?php put_footer(); ?>