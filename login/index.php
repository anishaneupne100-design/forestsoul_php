<?php
// Redirect if already logged in
require_once __DIR__ . '/../backend/middleware/guest.php';

$title = "Login - ForestSoul";
include '../head.php';
?>
<body class="body">
<div class="relative center min-h-screen w-full overflow-hidden">
<div class="absolute inset-0 z-0 h-full w-full bg-cover bg-center" data-alt="A sunlit path through a lush, green forest, creating a serene and tranquil atmosphere." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDkgZBRdUGgAQ4BTnzI3nIeUi6MMjYfMs0lxhacEjx2sJXsPEnJwYyGrZpx1kFPek1jDeflmMi_olDWhfL1EHRjBbtXR1xPKf8F9mJEJ37oqt4Ipma2Ke6SWuHv7hu4VhPBGOJdM1huYJ_8VwHUnKsOTXyfk016OpVq2QKEdQ8VDWXysyVenrS9SPL-m38TgHQEzR1kvVQBdYmAFrLYnQOQ9XvtZhBO08ZXOf1fEILdT_YvCruObUDUOVVPAYkkFNihgyLTYQmn3q8');">
<div class="absolute inset-0 bg-black/30 dark:bg-black/50"></div>
</div>
<div class="relative z-10 col center w-full max-w-md p-4 sm:p-6">
<div class="w-full rounded-xl bg-card-light/80 p-6 shadow-2xl backdrop-blur-lg dark:bg-card-dark/80 sm:p-8">
<div class="col center gap-2 pb-6">
<a href="<?php echo url('home'); ?>" class="col center gap-2">
<svg class="h-10 w-10 text-primary" fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-12h2v4h-2zm0 6h2v2h-2z"></path>
<path d="M12.75 12.34l3.91-3.91c.39-.39.39-1.02 0-1.41a.996.996 0 00-1.41 0L11.34 11.25a3.987 3.987 0 000 5.5l3.91 3.91c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L12.75 13.75c-.97-.97-.97-2.55 0-3.53zM8.25 10.93L4.34 7.02c-.39-.39-1.02-.39-1.41 0a.996.996 0 000 1.41l3.91 3.91c.98.98.98 2.56 0 3.54l-3.91 3.91c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l3.91-3.91c1.95-1.95 1.95-5.12 0-7.07z" opacity=".3"></path>
</svg>
<h1 class="txt txt-hero">ForestSoul</h1>
</a>
</div>
<h2 class="text-center heading">Log In to Your Sanctuary</h2>
<p class="mt-2 text-center txt-sm txt-2">Welcome back! Please enter your details.</p>

<!-- Error Message -->
<div id="error-message" class="hidden mt-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-500 text-sm text-center"></div>

<!-- Success Message -->
<div id="success-message" class="hidden mt-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30 text-green-500 text-sm text-center"></div>

<form id="login-form" class="mt-8 col gap-md">
<label class="col gap-2">
<p class="txt txt-sm font-medium">Email Address</p>
<input class="input" name="email" placeholder="you@example.com" type="email" required/>
</label>
<div class="col gap-2">
<div class="between">
<p class="txt txt-sm font-medium">Password</p>
<a class="txt-sm font-medium text-primary hover:underline" href="#">Forgot Password?</a>
</div>
<div class="relative row items-stretch w-full">
<input class="input pr-10" name="password" placeholder="Enter your password" type="password" id="password-input" required/>
<div class="absolute inset-y-0 right-0 center pr-3 txt-2">
<span class="material-symbols-outlined cursor-pointer" id="toggle-password" style="font-size: 20px;">visibility_off</span>
</div>
</div>
</div>
<button type="submit" class="btn-primary btn-lg w-full" id="submit-btn">
<span id="btn-text">Log In</span>
<span id="btn-loading" class="hidden">Logging in...</span>
</button>
</form>
<div class="relative my-6">
<div class="absolute inset-0 center">
<span class="w-full border-t border-border-light dark:border-border-dark"></span>
</div>
<div class="relative flex justify-center text-xs uppercase">
<span class="surface px-2 txt-2">Or continue with</span>
</div>
</div>
<div class="grid grid-cols-2 gap-sm">
<button class="btn-ghost h-11 gap-2">
<svg class="h-5 w-5" data-alt="Google logo icon." viewbox="0 0 48 48"><path d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039L38.802 6.57C34.54 2.943 29.602 1 24 1C11.318 1 1 11.318 1 24s10.318 23 23 23s23-10.318 23-23c0-1.654-.249-3.236-.699-4.757z" fill="#FFC107"></path><path d="M6.306 14.691L14.691 6.306C12.054 3.936 8.796 2.396 5.376 1.706L1.51 5.565C3.078 9.746 4.316 12.338 6.306 14.691z" fill="#FF3D00"></path><path d="M24 48c5.166 0 9.86-1.977 13.409-5.192l-8.199-8.199c-2.203 1.516-4.906 2.4-7.7 2.4c-4.585 0-8.546-2.618-10.426-6.306L2.348 37.386C6.58 43.821 14.665 48 24 48z" fill="#4CAF50"></path><path d="M43.611 20.083H42V20H24v8h11.303c-.792 2.237-2.231 4.166-4.087 5.571l8.199 8.199c4.717-4.22 7.585-10.638 7.585-17.764c0-1.654-.249-3.236-.699-4.757z" fill="#1976D2"></path></svg>
<span>Google</span>
</button>
<button class="btn-ghost h-11 gap-2">
<svg class="h-5 w-5" data-alt="Facebook logo icon." viewbox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5c0-2.07 1.22-3.2 3.16-3.2c.88 0 1.64.07 1.87.1v2.65h-1.58c-1 0-1.19.48-1.19 1.18V12h2.82l-.37 3h-2.45v6.8c4.56-.93 8-4.96 8-9.8Z" fill="currentColor"></path></svg>
<span>Facebook</span>
</button>
</div>
<p class="mt-8 text-center txt-sm txt-2">
Don't have an account? <a class="font-semibold text-primary hover:underline" href="<?php echo url('signup'); ?>">Sign Up</a>
</p>
</div>
</div>
</div>

<script>
// Toggle password visibility
document.getElementById('toggle-password').addEventListener('click', function() {
    const passwordInput = document.getElementById('password-input');
    const isPassword = passwordInput.type === 'password';
    passwordInput.type = isPassword ? 'text' : 'password';
    this.textContent = isPassword ? 'visibility' : 'visibility_off';
});

// Handle form submission
document.getElementById('login-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const errorDiv = document.getElementById('error-message');
    const successDiv = document.getElementById('success-message');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnLoading = document.getElementById('btn-loading');
    
    // Hide messages
    errorDiv.classList.add('hidden');
    successDiv.classList.add('hidden');
    
    // Show loading state
    submitBtn.disabled = true;
    btnText.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    
    try {
        const response = await submitForm(this, 'login.php');
        
        if (response.success) {
            successDiv.textContent = response.message || 'Login successful! Redirecting...';
            successDiv.classList.remove('hidden');
            
            // Redirect after success
            setTimeout(() => {
                const intended = sessionStorage.getItem('intended_url');
                if (intended) {
                    sessionStorage.removeItem('intended_url');
                    window.location.href = intended;
                } else {
                    window.location.href = response.redirect || ROUTES.HOME;
                }
            }, 1000);
        } else {
            errorDiv.textContent = response.message || 'Login failed. Please try again.';
            errorDiv.classList.remove('hidden');
            
            // Reset button
            submitBtn.disabled = false;
            btnText.classList.remove('hidden');
            btnLoading.classList.add('hidden');
        }
    } catch (error) {
        errorDiv.textContent = 'Network error. Please try again.';
        errorDiv.classList.remove('hidden');
        
        // Reset button
        submitBtn.disabled = false;
        btnText.classList.remove('hidden');
        btnLoading.classList.add('hidden');
    }
});
</script>
</body></html>