<?php
// login/index.php
require_once '../backend/init.php';

// Redirect if already logged in
if (Auth::check()) {
    header('Location: ' . url('profile/'));
    exit;
}

$error_msg = '';

// HANDLE LOGIN AT TOP
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $res = login_user($email, $password);
    if ($res['success']) {
        $_SESSION['user_id'] = $res['user']['id'];
        $_SESSION['user'] = $res['user'];
        header('Location: ' . url('profile/'));
        exit;
    } else {
        $error_msg = $res['error'] ?? 'Invalid email or password.';
    }
}

$title = "Log In - ForestSoul Sanctuary";
include_once '../head.php';
?>

<body class="body">
<div class="relative center min-h-screen w-full overflow-hidden">
<div class="absolute inset-0 z-0 h-full w-full bg-cover bg-center" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDkgZBRdUGgAQ4BTnzI3nIeUi6MMjYfMs0lxhacEjx2sJXsPEnJwYyGrZpx1kFPek1jDeflmMi_olDWhfL1EHRjBbtXR1xPKf8F9mJEJ37oqt4Ipma2Ke6SWuHv7hu4VhPBGOJdM1huYJ_8VwHUnKsOTXyfk016OpVq2QKEdQ8VDWXysyVenrS9SPL-m38TgHQEzR1kvVQBdYmAFrLYnQOQ9XvtZhBO08ZXOf1fEILdT_YvCruObUDUOVVPAYkkFNihgyLTYQmn3q8');">
<div class="absolute inset-0 bg-black/40"></div>
</div>

<div class="relative z-10 w-full max-w-md p-6">
    <div class="card bg-surface-dark border-white/5 p-10 rounded-[3rem] shadow-2xl backdrop-blur-xl group/card">
        <div class="center col gap-4 mb-10 text-center">
            <a href="<?php echo url(''); ?>" class="group/logo">
                <div class="size-16 rounded-3xl bg-primary center shadow-xl shadow-primary/20 group-hover/logo:scale-110 transition-transform">
                    <i class="fa-solid fa-feather-pointed text-background-dark text-3xl"></i>
                </div>
            </a>
            <div class="col gap-1">
                <h1 class="txt-3xl font-black text-white italic">ForestSoul</h1>
                <p class="text-[10px] font-black uppercase tracking-[0.3em] text-primary">Return to Sanctuary</p>
            </div>
        </div>

        <?php if ($error_msg): ?>
            <div class="mb-8 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl text-center text-xs font-bold animate-shake">
                <i class="fa-solid fa-triangle-exclamation mr-2"></i><?php echo htmlspecialchars($error_msg); ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST" class="col gap-6">
            <input type="hidden" name="action" value="login">
            
            <label class="col gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Vessel Identifier</span>
                <input name="email" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-6 rounded-2xl" placeholder="email@example.com" type="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required/>
            </label>

            <label class="col gap-2">
                <div class="between px-1">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Secure Key</span>
                    <a href="#" class="text-[10px] font-black text-primary uppercase tracking-widest hover:underline">Lost?</a>
                </div>
                <input name="password" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-6 rounded-2xl" placeholder="••••••••" type="password" required/>
            </label>

            <button type="submit" class="btn-primary h-14 w-full rounded-2xl font-black uppercase tracking-widest text-sm shadow-xl shadow-primary/20 mt-4 group">
                <span>Enter Sanctuary</span>
                <i class="fa-solid fa-door-open ml-2 text-xs group-hover:translate-x-1 transition-transform"></i>
            </button>

            <div class="pt-8 border-t border-white/5 text-center col gap-3">
                <p class="txt-xs text-white/40">New to the forest?</p>
                <a class="txt-sm font-black text-primary uppercase tracking-[0.2em] hover:underline" href="<?php echo url('signup/'); ?>">Create Account</a>
            </div>
        </form>
    </div>
</div>
</div>
</body></html>