<?php
// signup/index.php
require_once '../backend/init.php';

// Redirect if already logged in
if (Auth::check()) {
    header('Location: ' . url('profile/'));
    exit;
}

$error_msg = '';
$success_msg = '';

// HANDLE SIGNUP AT TOP
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'signup') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['password_confirmation'] ?? '';

    if ($password !== $confirm_password) {
        $error_msg = 'Passwords do not match.';
    } elseif (strlen($password) < 8) {
        $error_msg = 'Password must be at least 8 characters.';
    } else {
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];
        
        $res = register_user($data);
        if ($res['success']) {
            // Auto login after signup
            $login_res = login_user($email, $password);
            if ($login_res['success']) {
                $_SESSION['user_id'] = $login_res['user']['id'];
                $_SESSION['user'] = $login_res['user'];
                header('Location: ' . url('profile/'));
                exit;
            } else {
                $success_msg = 'Account created! Please log in.';
            }
        } else {
            $error_msg = $res['error'] ?? 'Registration failed.';
        }
    }
}

$title = "Join ForestSoul - Find Your Path";
include_once '../head.php';
?>

<body class="body">
<div class="page center p-4 sm:p-6 group/design-root" style='background-image: linear-gradient(rgba(16, 34, 23, 0.8) 0%, rgba(16, 34, 23, 0.95) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXMRl2bEH4h338h-NBZtIroCiJoNMa7eY0alhIlvmjPpALxjaZrubeYrnLFqePqDTVwyn2LzciHoPqN1nF-PyphfAjHG_RPpkUeWBuBejTASM6JMfg2GFDAcbDTG-VQ9BDEoqBYRRwe3d4PYaQRgQ9GV3T7jgtKPjXjembLG-VqrI3pt7GOZUHBVmtqXdCV5_pNJb34Vba1kPbGDENAdRJwMQp2j6pCnUu6v3XvmPxogU-pmjFiMo-ZvclfhBKcVAs9PAjO-FbZBI"); background-size: cover; background-position: center;'>
<div class="layout-container layout justify-center w-full max-w-md">
<div class="content center">
<div class="col center gap-sm pb-6 pt-1 text-center">
    <a href="<?php echo url(''); ?>" class="mb-4">
        <svg class="text-primary" fill="none" height="48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 12c-3 0-5 2.5-5 5"></path><path d="M12 8c1.657 0 3 1.343 3 3"></path></svg>
    </a>
    <h1 class="txt-hero text-white sm:text-4xl">Join ForestSoul</h1>
    <p class="txt-md text-white/80">Find your inner peace and connect with nature.</p>
</div>

<!-- Feedback Messages -->
<?php if ($error_msg): ?>
    <div class="w-full mb-4 p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500 text-sm font-bold text-center animate-shake">
        <i class="fa-solid fa-circle-exclamation mr-2"></i><?php echo htmlspecialchars($error_msg); ?>
    </div>
<?php endif; ?>

<?php if ($success_msg): ?>
    <div class="w-full mb-4 p-4 rounded-xl bg-green-500/10 border border-green-500/20 text-green-500 text-sm font-bold text-center animate-fade-in">
        <i class="fa-solid fa-circle-check mr-2"></i><?php echo htmlspecialchars($success_msg); ?>
    </div>
<?php endif; ?>

<form action="" method="POST" class="w-full col gap-5">
    <input type="hidden" name="action" value="signup">
    
    <label class="col gap-2">
        <span class="txt-xs font-black uppercase tracking-widest text-white/40 ml-1">Full Name</span>
        <input name="name" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-5 rounded-2xl" placeholder="John Doe" value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required/>
    </label>

    <label class="col gap-2">
        <span class="txt-xs font-black uppercase tracking-widest text-white/40 ml-1">Email Address</span>
        <input name="email" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-5 rounded-2xl" placeholder="john@example.com" type="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required/>
    </label>

    <label class="col gap-2">
        <span class="txt-xs font-black uppercase tracking-widest text-white/40 ml-1">Secret Key</span>
        <input name="password" id="password" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-5 rounded-2xl" placeholder="At least 8 characters" type="password" required minlength="8"/>
    </label>

    <label class="col gap-2">
        <span class="txt-xs font-black uppercase tracking-widest text-white/40 ml-1">Verify Key</span>
        <input name="password_confirmation" id="password_confirmation" class="input h-14 bg-white/5 border-white/10 text-white placeholder:text-white/20 focus:border-primary px-5 rounded-2xl" placeholder="Repeat your secret key" type="password" required minlength="8"/>
    </label>

    <button type="submit" class="btn-primary h-14 w-full rounded-2xl font-black uppercase tracking-widest text-sm shadow-xl shadow-primary/20 mt-4 group">
        <span>Initialize Account</span>
        <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
    </button>

    <p class="text-center txt-sm text-white/40 pt-6">
        By continuing, you agree to our <a class="font-bold text-primary hover:underline" href="<?php echo url('terms'); ?>">Terms</a> and <a class="font-bold text-primary hover:underline" href="<?php echo url('privacy'); ?>">Privacy</a>.
    </p>
    
    <div class="pt-6 border-t border-white/5 text-center col gap-2">
        <p class="txt-sm text-white/60">Already embarked on this journey?</p>
        <a class="txt-sm font-black text-primary uppercase tracking-widest hover:underline" href="<?php echo url('login/'); ?>">Access Account</a>
    </div>
</form>
</div>
</div>
</div>
</body></html>
