<?php
// admin/login.php
require_once '../backend/init.php';

// If already admin, go to dashboard
if (Auth::adminCheck() && Auth::isAdmin()) {
    header('Location: ' . url('admin/'));
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $res = login_user($email, $password);
    if (isset($res['success']) && $res['success']) {
        // Check if user is actually an admin
        if ($res['user']['is_admin'] == 1) {
            $_SESSION['admin_id'] = $res['user']['id'];
            $_SESSION['admin_user'] = $res['user'];
            $_SESSION['admin_lazy_verified'] = true;
            header('Location: ' . url('admin/'));
            exit;
        } else {
            // Not an admin
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_user']);
            $error = 'Access Denied: You do not have administrative privileges.';
        }
    } else {
        $error = $res['error'] ?? 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - ForestSoul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        admin: {
                            bg: '#0a0c10',
                            surface: '#12151c',
                            primary: '#6366f1',
                            border: 'rgba(255,255,255,0.08)'
                        }
                    },
                    fontFamily: { sans: ['Outfit', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { background: #0a0c10; color: #fff; font-family: 'Outfit', sans-serif; }
        .input-admin { background: #12151c; border: 1px solid rgba(255,255,255,0.08); border-radius: 1rem; padding: 1rem; width: 100%; outline: none; transition: all 0.3s; }
        .input-admin:focus { border-color: #6366f1; box-shadow: 0 0 20px rgba(99, 102, 241, 0.1); }
        .center { display: flex; align-items: center; justify-content: center; }
        .col { display: flex; flex-direction: column; }
        .gap-1 { gap: 0.25rem; }
        .gap-2 { gap: 0.5rem; }
        .gap-4 { gap: 1rem; }
        .gap-6 { gap: 1.5rem; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md animate-fade-in">
        <div class="text-center mb-10 col gap-4">
            <div class="size-20 rounded-3xl bg-admin-primary center mx-auto shadow-2xl shadow-admin-primary/20 rotate-3">
                <i class="fa-solid fa-shield-halved text-white text-3xl"></i>
            </div>
            <div class="col gap-1">
                <h1 class="text-3xl font-black tracking-tight">System Access</h1>
                <p class="text-white/40 font-medium">ForestSoul Administrative Terminal</p>
            </div>
        </div>

        <?php if ($error): ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-2xl text-center text-sm font-bold animate-shake">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <div class="bg-admin-surface border border-white/5 rounded-[2.5rem] p-10 shadow-2xl">
            <form action="" method="POST" class="col gap-6">
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/30 ml-1">Secure Email</span>
                    <input type="email" name="email" class="input-admin" placeholder="admin@forestsoul.com" required>
                </label>
                
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/30 ml-1">Key Phrase</span>
                    <input type="password" name="password" class="input-admin" placeholder="••••••••" required>
                </label>

                <button type="submit" class="h-14 bg-admin-primary hover:bg-admin-primary/90 text-white font-black rounded-2xl shadow-xl shadow-admin-primary/20 transition-all active:scale-[0.98] mt-4 uppercase tracking-widest text-sm">
                    Initialize Session
                </button>
            </form>
        </div>

        <p class="text-center mt-10 text-white/20 text-[10px] font-black uppercase tracking-[0.2em]">
            &copy; 2026 ForestSoul Ecosystem
        </p>
    </div>
</body>
</html>
