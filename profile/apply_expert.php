<?php
// profile/apply_expert.php
require_once '../backend/init.php';

// HANDLE REQUEST AT TOP
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'apply_expert') {
    if (!Auth::check()) {
        header('Location: ' . url('login/'));
        exit;
    }

    $res = apply_to_be_expert($_SESSION['user_id'], $_POST, $_FILES);
    if (isset($res['success']) && $res['success']) {
        header('Location: ' . url('profile/?success=applied'));
        exit;
    }
    $error_msg = $res['error'] ?? ($res['message'] ?? 'Failed to submit application');
}

// UI PARTS
$title = "Expert Application - ForestSoul";
include_once '../head.php';

if (!Auth::check()) {
    header('Location: ' . url('login/'));
    exit;
}

$user = Auth::user();

// Check if already an expert
$expertStatus = get_user_expert_status($user['id']);
if ($expertStatus['is_expert']) {
    header('Location: ' . url('profile/'));
    exit;
}

include_once '../components/navbar.php';
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <div class="mb-8 row gap-2 items-center txt-sm txt-2">
            <a href="<?php echo url('profile/'); ?>" class="hover:text-primary transition-colors">Profile</a>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-white">Expert Application</span>
        </div>

        <?php if (isset($error_msg)): ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl text-center font-bold">
                <?php echo htmlspecialchars($error_msg); ?>
            </div>
        <?php endif; ?>

        <div class="card bg-surface-dark border border-white/5 shadow-2xl overflow-hidden animate-fade-in">
            <div class="bg-primary/10 p-8 border-b border-white/5">
                <div class="row gap-6 items-center">
                    <div class="size-16 rounded-2xl bg-primary/20 center text-primary shrink-0">
                        <i class="fa-solid fa-graduation-cap text-3xl"></i>
                    </div>
                    <div class="col gap-1">
                        <h1 class="txt-2xl font-bold">Expert Verification</h1>
                        <p class="txt-sm txt-2">Join our network of professional therapists and wellness experts.</p>
                    </div>
                </div>
            </div>

            <form action="" method="POST" class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8" enctype="multipart/form-data">
                <input type="hidden" name="action" value="apply_expert">
                
                <!-- Section 1 -->
                <div class="md:col-span-2 col gap-2">
                    <h3 class="txt-sm font-bold uppercase tracking-widest text-primary flex items-center gap-3">
                        <i class="fa-solid fa-user-doctor"></i>
                        Personal Information
                    </h3>
                    <div class="h-1 w-20 bg-primary/20 rounded-full"></div>
                </div>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">First Name *</span>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name'] ?? $user['name']); ?>" class="input h-12" required>
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Last Name</span>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($_POST['lastname'] ?? $user['lastname'] ?? ''); ?>" class="input h-12">
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Professional Email *</span>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? $user['email']); ?>" class="input h-12" required>
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Primary Phone *</span>
                    <input type="text" name="phone_1" placeholder="+977-..." value="<?php echo htmlspecialchars($_POST['phone_1'] ?? ''); ?>" class="input h-12" required>
                </label>

                <!-- Section 2 -->
                <div class="md:col-span-2 col gap-2 mt-4">
                    <h3 class="txt-sm font-bold uppercase tracking-widest text-primary flex items-center gap-3">
                        <i class="fa-solid fa-award"></i>
                        Professional Qualifications
                    </h3>
                    <div class="h-1 w-20 bg-primary/20 rounded-full"></div>
                </div>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Highest Degree *</span>
                    <input type="text" name="degree" value="<?php echo htmlspecialchars($_POST['degree'] ?? ''); ?>" placeholder="e.g. PhD, MSc" class="input h-12" required>
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Specialization *</span>
                    <input type="text" name="specialization" value="<?php echo htmlspecialchars($_POST['specialization'] ?? ''); ?>" placeholder="e.g. CBT, Anxiety" class="input h-12" required>
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Years of Experience *</span>
                    <input type="number" name="experience_years" value="<?php echo htmlspecialchars($_POST['experience_years'] ?? ''); ?>" class="input h-12" required>
                </label>

                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold">Profile Picture *</span>
                    <input type="file" name="profile_picture" accept="image/*" class="input py-2 text-xs" required>
                </label>

                <label class="col gap-2 md:col-span-2">
                    <span class="txt-xs txt-2 font-bold">Professional Bio *</span>
                    <textarea name="bio" class="input p-4 min-h-[120px]" required><?php echo htmlspecialchars($_POST['bio'] ?? ''); ?></textarea>
                </label>

                <label class="col gap-2 md:col-span-2">
                    <span class="txt-xs txt-2 font-bold">Verification Proof (License) *</span>
                    <input type="file" name="proof" class="input py-2 text-xs" required>
                </label>

                <div class="md:col-span-2 flex justify-end gap-4 mt-4">
                    <a href="<?php echo url('profile/'); ?>" class="btn-ghost h-12 px-8">Cancel</a>
                    <button type="submit" class="btn-primary h-12 px-12">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php put_footer(); ?>
