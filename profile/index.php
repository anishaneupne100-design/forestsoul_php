<?php
// profile/index.php
include_once '../head.php';

// Protect this route
if (!Auth::check()) {
    header('Location: ' . url('login/'));
    exit;
}

$title = "My Dashboard - ForestSoul";
$user = Auth::user();
$memberSince = date('M Y', strtotime($user['created_at'] ?? 'now'));

include_once '../components/navbar.php';

// Fetch expert status
$expertStatus = get_user_expert_status($user['id']);
$isExpert = $expertStatus['is_expert'];
$expertData = $isExpert ? $expertStatus['data'] : null;
$hasPendingApp = $expertStatus['has_pending_app'] ?? false;
?>

<main class="flex-grow bg-background-light dark:bg-background-dark min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar: Profile Basics & Actions -->
            <div class="lg:col-span-1 space-y-6">
                <div class="card bg-surface-light dark:bg-surface-dark p-6 text-center border border-white/5 shadow-xl">
                    <div class="relative mx-auto size-24 mb-4">
                        <div class="size-24 rounded-full bg-primary/20 center overflow-hidden border-2 border-primary">
                            <?php if ($isExpert && !empty($expertData['profile_picture'])): ?>
                                <img src="<?php echo url($expertData['profile_picture']); ?>" class="size-full object-cover">
                            <?php else: ?>
                                <span class="material-symbols-outlined text-4xl text-primary font-bold">person</span>
                            <?php endif; ?>
                        </div>
                        <?php if ($isExpert): ?>
                            <div class="absolute -bottom-1 -right-1 bg-primary text-background-dark rounded-full p-1 border-2 border-surface-dark" title="Verified Expert">
                                <span class="material-symbols-outlined text-xs font-bold">verified</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h2 class="txt-xl font-bold"><?php echo htmlspecialchars($user['name'] . ' ' . ($user['lastname'] ?? '')); ?></h2>
                    <p class="txt-sm txt-2 mb-4"><?php echo htmlspecialchars($user['email']); ?></p>
                    <div class="flex flex-wrap justify-center gap-2 mb-6">
                        <span class="chip bg-primary/10 text-primary text-[10px] uppercase font-bold tracking-widest">Member since <?php echo $memberSince; ?></span>
                        <?php if ($isExpert): ?>
                            <span class="chip bg-secondary/10 text-secondary text-[10px] uppercase font-bold tracking-widest">Therapy Expert</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col gap-2">
                        <button onclick="openModal('edit-profile-modal')" class="btn-ghost w-full justify-start gap-3 h-11 px-4">
                            <span class="material-symbols-outlined text-sm">edit</span>
                            <span class="txt-sm">Edit Profile</span>
                        </button>
                        
                        <?php if ($isExpert): ?>
                            <button onclick="toggleExpertPause(<?php echo $expertData['is_active'] ? 'true' : 'false'; ?>)" 
                                    class="btn-ghost w-full justify-start gap-3 h-11 px-4 <?php echo $expertData['is_active'] ? 'text-orange-400' : 'text-green-400'; ?>">
                                <span class="material-symbols-outlined text-sm"><?php echo $expertData['is_active'] ? 'pause_circle' : 'play_circle'; ?></span>
                                <span class="txt-sm"><?php echo $expertData['is_active'] ? 'Pause Expert Profile' : 'Resume Expert Profile'; ?></span>
                            </button>
                        <?php elseif ($hasPendingApp): ?>
                            <div class="card bg-orange-500/10 border border-orange-500/20 p-3 text-left">
                                <p class="text-orange-400 text-xs font-bold mb-1">Expert Application Pending</p>
                                <p class="txt-xs txt-2">We are currently reviewing your qualifications.</p>
                            </div>
                        <?php else: ?>
                            <button onclick="openModal('expert-apply-modal')" class="btn-primary w-full justify-start gap-3 h-11 px-4">
                                <span class="material-symbols-outlined text-sm">workspace_premium</span>
                                <span class="txt-sm">Apply as Therapy Expert</span>
                            </button>
                        <?php endif; ?>

                        <button onclick="confirmDeleteAccount()" class="btn-ghost w-full justify-start gap-3 h-11 px-4 text-red-400 hover:bg-red-400/10">
                            <span class="material-symbols-outlined text-sm">delete_forever</span>
                            <span class="txt-sm">Delete Account</span>
                        </button>
                    </div>
                </div>

                <!-- Basic Stats -->
                <div class="card bg-surface-light dark:bg-surface-dark p-6 border border-white/5 shadow-xl">
                    <h3 class="txt-sm font-bold uppercase tracking-widest text-primary mb-4">Quick Stats</h3>
                    <div class="col gap-4">
                        <div class="between">
                            <span class="txt-sm txt-2">Posts Made</span>
                            <span class="font-bold" id="stat-posts">0</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Comments</span>
                            <span class="font-bold" id="stat-comments">0</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Likes Given</span>
                            <span class="font-bold" id="stat-likes">0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Area: Tabs -->
            <div class="lg:col-span-3 col gap-6">
                <div class="card bg-surface-light dark:bg-surface-dark border border-white/5 shadow-xl overflow-hidden">
                    <!-- Tab Headers -->
                    <div class="row overflow-x-auto border-b border-white/5 bg-background-dark/20 [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                        <button onclick="switchTab('tab-posts')" data-tab="tab-posts" class="profile-tab active px-6 py-4 txt-sm font-bold row gap-2 items-center border-b-2 border-primary">
                            <span class="material-symbols-outlined text-sm">article</span>
                            My Posts
                        </button>
                        <button onclick="switchTab('tab-comments')" data-tab="tab-comments" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 items-center border-b-2 border-transparent text-white/50 hover:text-white">
                            <span class="material-symbols-outlined text-sm">comment</span>
                            Comments
                        </button>
                        <button onclick="switchTab('tab-likes')" data-tab="tab-likes" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 items-center border-b-2 border-transparent text-white/50 hover:text-white">
                            <span class="material-symbols-outlined text-sm">favorite</span>
                            Likes
                        </button>
                        <button onclick="switchTab('tab-notifications')" data-tab="tab-notifications" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 items-center border-b-2 border-transparent text-white/50 hover:text-white relative">
                            <span class="material-symbols-outlined text-sm">notifications</span>
                            Notifications
                        </button>
                        <button onclick="switchTab('tab-activity')" data-tab="tab-activity" class="profile-tab px-6 py-4 txt-sm font-bold row gap-2 items-center border-b-2 border-transparent text-white/50 hover:text-white">
                            <span class="material-symbols-outlined text-sm">history</span>
                            Activity Log
                        </button>
                    </div>

                    <!-- Tab Contents -->
                    <div class="p-6">
                        <!-- My Posts -->
                        <div id="tab-posts" class="tab-pane">
                            <div class="col gap-4" id="list-posts">
                                <p class="text-center py-10 txt-2 italic">Loading your stories...</p>
                            </div>
                        </div>

                        <!-- Comments -->
                        <div id="tab-comments" class="tab-pane hidden">
                            <div class="col gap-4" id="list-comments">
                                <p class="text-center py-10 txt-2 italic">Loading comments...</p>
                            </div>
                        </div>

                        <!-- Likes -->
                        <div id="tab-likes" class="tab-pane hidden">
                            <div class="col gap-4" id="list-likes">
                                <p class="text-center py-10 txt-2 italic">Loading likes...</p>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div id="tab-notifications" class="tab-pane hidden">
                            <div class="col gap-2" id="list-notifications">
                                <p class="text-center py-10 txt-2 italic">Loading notifications...</p>
                            </div>
                        </div>

                        <!-- User Activity Log -->
                        <div id="tab-activity" class="tab-pane hidden">
                            <div class="col gap-4" id="list-logs">
                                <p class="text-center py-10 txt-2 italic">Loading logs...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Modals -->

<!-- Edit Profile Modal -->
<div id="edit-profile-modal" class="modal fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="card bg-surface-dark border border-white/10 w-full max-w-md p-8 shadow-2xl scale-95 transition-all duration-300">
        <div class="between mb-6">
            <h2 class="txt-xl font-bold">Edit Profile</h2>
            <button onclick="closeModal('edit-profile-modal')" class="text-white/50 hover:text-white">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="edit-profile-form" class="col gap-4">
            <div class="row gap-4">
                <label class="flex-1 col gap-1">
                    <span class="txt-xs txt-2 font-bold uppercase">First Name</span>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="input h-11" required>
                </label>
                <label class="flex-1 col gap-1">
                    <span class="txt-xs txt-2 font-bold uppercase">Last Name</span>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname'] ?? ''); ?>" class="input h-11">
                </label>
            </div>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase">Age</span>
                <input type="number" name="age" value="<?php echo htmlspecialchars($user['age'] ?? ''); ?>" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase">Phone Number</span>
                <input type="text" name="phone_number" value="<?php echo htmlspecialchars($user['phone_number'] ?? ''); ?>" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold uppercase">Address</span>
                <textarea name="address" class="input p-3" rows="3"><?php echo htmlspecialchars($user['address'] ?? ''); ?></textarea>
            </label>
            <button type="submit" class="btn-primary w-full h-12 mt-4">Save Changes</button>
        </form>
    </div>
</div>

<!-- Expert Apply Modal -->
<div id="expert-apply-modal" class="modal fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/60 backdrop-blur-sm overflow-y-auto">
    <div class="card bg-surface-dark border border-white/10 w-full max-w-2xl p-8 shadow-2xl my-10 animate-fade-in">
        <div class="between mb-6">
            <div class="col gap-1">
                <h2 class="txt-xl font-bold">Apply as Expert</h2>
                <p class="txt-xs txt-2">Share your qualifications to join our therapy network.</p>
            </div>
            <button onclick="closeModal('expert-apply-modal')" class="text-white/50 hover:text-white">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="expert-apply-form" class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
            <!-- Basic Info Section -->
            <div class="md:col-span-2 border-b border-white/5 pb-2 mb-2">
                <h3 class="txt-sm font-bold text-primary">1. Basic Information</h3>
            </div>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">First Name *</span>
                <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" class="input h-11" required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Last Name</span>
                <input type="text" name="lastname" value="<?php echo htmlspecialchars($user['lastname'] ?? ''); ?>" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Email *</span>
                <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="input h-11" required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Mandatory Phone *</span>
                <input type="text" name="phone_1" class="input h-11" placeholder="+977-..." required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Alternative Phone</span>
                <input type="text" name="phone_2" class="input h-11">
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Clinic/Office Address</span>
                <input type="text" name="address" class="input h-11">
            </label>

            <!-- Qualifications Section -->
            <div class="md:col-span-2 border-b border-white/5 pb-2 mt-4 mb-2">
                <h3 class="txt-sm font-bold text-primary">2. Professional Background</h3>
            </div>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Highest Degree *</span>
                <input type="text" name="degree" placeholder="PhD, MD, MSc Psychology" class="input h-11" required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Specialization *</span>
                <input type="text" name="specialization" placeholder="Anxiety, Couples, Trauma" class="input h-11" required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Years of Experience *</span>
                <input type="number" name="experience_years" class="input h-11" required>
            </label>
            <label class="col gap-1">
                <span class="txt-xs txt-2 font-bold">Profile Picture *</span>
                <input type="file" name="profile_picture" accept="image/*" class="text-xs file:btn-ghost file:h-full file:mr-4" required>
            </label>
            <label class="col gap-1 md:col-span-2">
                <span class="txt-xs txt-2 font-bold">Professional Bio *</span>
                <textarea name="bio" class="input p-3" rows="4" placeholder="Tell us about your therapeutic approach..." required></textarea>
            </label>
            <label class="col gap-1 md:col-span-2">
                <span class="txt-xs txt-2 font-bold">Proof of Qualification (PDF or JPG) *</span>
                <input type="file" name="proof" class="text-xs file:btn-ghost file:h-full file:mr-4" required>
            </label>
            <label class="col gap-1 md:col-span-2">
                <span class="txt-xs txt-2 font-bold">Additional Remarks</span>
                <textarea name="remarks" class="input p-3" rows="2"></textarea>
            </label>

            <div class="md:col-span-2 mt-4">
                <button type="submit" class="btn-primary w-full h-12">Submit Application</button>
            </div>
        </form>
    </div>
</div>

<script>
    // Tab Switching Logic
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(el => el.classList.add('hidden'));
        document.getElementById(tabId).classList.remove('hidden');
        
        document.querySelectorAll('.profile-tab').forEach(el => {
            el.classList.remove('active', 'border-primary', 'text-white');
            el.classList.add('border-transparent', 'text-white/50');
            if (el.dataset.tab === tabId) {
                el.classList.add('active', 'border-primary', 'text-white');
                el.classList.remove('border-transparent', 'text-white/50');
            }
        });
    }

    // Modal Control
    function openModal(id) {
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
    }

    // Account Actions
    async function toggleExpertPause(currentActive) {
        const confirmed = confirm(currentActive ? 
            "Are you sure you want to pause your expert profile? You will be hidden from therapist lists." : 
            "Ready to resume your expert profile? You will be visible to users again.");
        
        if (!confirmed) return;

        try {
            const res = await api('toggle_expert_pause', { is_paused: currentActive });
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(() => window.location.reload(), 1500);
            }
        } catch (e) {
            showToast('Failed to update status', 'error');
        }
    }

    async function confirmDeleteAccount() {
        const password = prompt("DANGER: This action is permanent. All your posts, comments, and records will be deleted. Please type your password to confirm:");
        if (!password) return;

        try {
            const res = await api('delete_account', { password });
            if (res.success) {
                showToast("Your account has been deleted. We're sorry to see you go.", 'info');
                setTimeout(() => window.location.href = ROUTES.home, 2000);
            }
        } catch (e) {
            showToast('Failed to delete account', 'error');
        }
    }

    // Form Submissions
    document.getElementById('edit-profile-form').onsubmit = async function(e) {
        e.preventDefault();
        const data = Object.fromEntries(new FormData(this));
        try {
            const res = await api('update_profile', data);
            if (res.success) {
                showToast(res.message, 'success');
                setTimeout(() => window.location.reload(), 1000);
            }
        } catch (err) {
            showToast('Update failed', 'error');
        }
    }

    document.getElementById('expert-apply-form').onsubmit = async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        showToast('Processing your application...', 'info');
        
        try {
            // Use native fetch for multipart data if your helper doesn't support it
            const response = await fetch('<?php echo url("backend/api.php?action=apply_expert"); ?>', {
                method: 'POST',
                body: formData
            });
            const res = await response.json();
            
            if (res.success) {
                showToast(res.message, 'success');
                closeModal('expert-apply-modal');
                setTimeout(() => window.location.reload(), 2000);
            } else {
                showToast(res.message || 'Application failed', 'error');
            }
        } catch (err) {
            showToast('Network error', 'error');
        }
    }

    // Load Activity Data
    async function loadActivity() {
        try {
            const res = await api('get_user_activity');
            if (res.success) {
                renderActivity(res.data);
                updateStats(res.data);
            }
        } catch (e) {
            console.error('Failed to load activity', e);
        }
    }

    function updateStats(data) {
        document.getElementById('stat-posts').textContent = data.posts.length;
        document.getElementById('stat-comments').textContent = data.comments.length;
        document.getElementById('stat-likes').textContent = data.likes.length;
    }

    function renderActivity(data) {
        // Render Posts
        const postList = document.getElementById('list-posts');
        if (data.posts.length === 0) {
            postList.innerHTML = `<div class="p-10 text-center txt-2">You haven't shared any stories yet.</div>`;
        } else {
            postList.innerHTML = data.posts.map(p => `
                <div class="p-4 border border-white/5 rounded-xl bg-white/5 hover:bg-white/10 transition-colors cursor-pointer group">
                    <div class="between mb-1">
                        <h4 class="font-bold group-hover:text-primary transition-colors">${escapeHtml(p.title)}</h4>
                        <span class="txt-xs txt-2">${formatDate(p.created_at)}</span>
                    </div>
                    <p class="txt-sm txt-2 line-clamp-2">${escapeHtml(p.description)}</p>
                </div>
            `).join('');
        }

        // Render Comments
        const commentList = document.getElementById('list-comments');
        if (data.comments.length === 0) {
            commentList.innerHTML = `<div class="p-10 text-center txt-2">You haven't commented on any posts yet.</div>`;
        } else {
            commentList.innerHTML = data.comments.map(c => `
                <div class="p-4 border border-white/5 rounded-xl bg-white/5">
                    <p class="txt-sm mb-2">"${escapeHtml(c.comment)}"</p>
                    <p class="txt-xs txt-2">On: <span class="text-primary">${escapeHtml(c.post_title)}</span> • ${formatDate(c.created_at)}</p>
                </div>
            `).join('');
        }

        // Render Likes
        const likeList = document.getElementById('list-likes');
        if (data.likes.length === 0) {
            likeList.innerHTML = `<div class="p-10 text-center txt-2">No likes yet. Explore the community!</div>`;
        } else {
            likeList.innerHTML = data.likes.map(l => `
                <div class="p-4 border border-white/5 rounded-xl bg-white/5 row gap-3 items-center">
                    <span class="material-symbols-outlined text-primary text-sm">favorite</span>
                    <div class="col">
                        <p class="txt-sm">Liked "<span class="font-bold">${escapeHtml(l.post_title)}</span>"</p>
                        <span class="txt-xs txt-2">${formatDate(l.created_at)}</span>
                    </div>
                </div>
            `).join('');
        }

        // Render Notifications
        const notifList = document.getElementById('list-notifications');
        if (data.notifications.length === 0) {
            notifList.innerHTML = `<div class="p-10 text-center txt-2">No notifications.</div>`;
        } else {
            notifList.innerHTML = data.notifications.map(n => `
                <div class="p-4 border-l-4 ${n.is_read ? 'border-white/10 bg-white/2' : 'border-primary bg-primary/5'} rounded-r-xl row gap-4 items-center">
                    <span class="material-symbols-outlined txt-2 text-sm">notifications</span>
                    <div class="flex-1 col">
                        <p class="txt-sm ${n.is_read ? 'txt-2' : ''}">${escapeHtml(n.message)}</p>
                        <span class="txt-xs txt-2 mt-1">${formatDate(n.created_at)}</span>
                    </div>
                </div>
            `).join('');
        }

        // Render Activity Logs
        const logList = document.getElementById('list-logs');
        if (data.logs.length === 0) {
            logList.innerHTML = `<div class="p-10 text-center txt-2">No activity recorded.</div>`;
        } else {
            logList.innerHTML = data.logs.map(l => `
                <div class="row gap-4 items-start py-3 border-b border-white/5 last:border-0">
                    <div class="size-2 rounded-full bg-primary mt-2"></div>
                    <div class="col">
                        <p class="txt-sm font-bold uppercase tracking-tight">${l.action.replace(/_/g, ' ')}</p>
                        <p class="txt-xs txt-2">${l.details ? escapeHtml(l.details) : ''}</p>
                        <span class="txt-xs text-white/30 font-mono mt-1">${formatDate(l.created_at)}</span>
                    </div>
                </div>
            `).join('');
        }
    }

    function formatDate(dateStr) {
        const d = new Date(dateStr);
        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Init
    loadActivity();
</script>

<?php put_footer(); ?>