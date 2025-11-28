<?php
// Redirect if already logged in
require_once __DIR__ . '/../backend/middleware/guest.php';

$title = "Sign Up - ForestSoul";
include '../head.php';
?>

<body class="body">
<div class="page center p-4 sm:p-6 group/design-root" style='background-image: linear-gradient(rgba(16, 34, 23, 0.8) 0%, rgba(16, 34, 23, 0.95) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXMRl2bEH4h338h-NBZtIroCiJoNMa7eY0alhIlvmjPpALxjaZrubeYrnLFqePqDTVwyn2LzciHoPqN1nF-PyphfAjHG_RPpkUeWBuBejTASM6JMfg2GFDAcbDTG-VQ9BDEoqBYRRwe3d4PYaQRgQ9GV3T7jgtKPjXjembLG-VqrI3pt7GOZUHBVmtqXdCV5_pNJb34Vba1kPbGDENAdRJwMQp2j6pCnUu6v3XvmPxogU-pmjFiMo-ZvclfhBKcVAs9PAjO-FbZBI"); background-size: cover; background-position: center;'>
<div class="layout-container layout justify-center w-full max-w-md">
<div class="content center">
<div class="col center gap-sm pb-6 pt-1 text-center">
<a href="<?php echo url('home'); ?>">
<svg class="text-primary" fill="none" height="48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 12c-3 0-5 2.5-5 5"></path><path d="M12 8c1.657 0 3 1.343 3 3"></path></svg>
</a>
<h1 class="txt-hero text-white sm:text-4xl">Join ForestSoul</h1>
<p class="txt-md text-white/80">Find your inner peace and connect with nature.</p>
</div>

<!-- Error Message -->
<div id="error-message" class="hidden w-full mb-4 p-3 rounded-lg bg-red-500/10 border border-red-500/30 text-red-400 text-sm text-center"></div>

<!-- Success Message -->
<div id="success-message" class="hidden w-full mb-4 p-3 rounded-lg bg-green-500/10 border border-green-500/30 text-green-400 text-sm text-center"></div>

<form id="signup-form" class="w-full space-y-4">
<label class="col">
<p class="txt-md text-white pb-2">Full Name</p>
<input name="name" class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50" placeholder="Enter your full name" required/>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Email</p>
<input name="email" class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50" placeholder="Enter your email address" type="email" required/>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Password</p>
<div class="relative row flex-1 items-stretch">
<input name="password" id="password" class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50 pr-10" placeholder="Enter your password" type="password" required minlength="8"/>
<div class="absolute inset-y-0 right-0 center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer toggle-password" data-target="password">visibility_off</span>
</div>
</div>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Confirm Password</p>
<div class="relative row flex-1 items-stretch">
<input name="password_confirmation" id="password_confirmation" class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50 pr-10" placeholder="Confirm your password" type="password" required minlength="8"/>
<div class="absolute inset-y-0 right-0 center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer toggle-password" data-target="password_confirmation">visibility_off</span>
</div>
</div>
</label>
<div class="pt-4">
<button type="submit" id="submit-btn" class="btn-primary btn-lg w-full tracking-wide hover:bg-primary/90">
<span id="btn-text" class="truncate">Create Account</span>
<span id="btn-loading" class="hidden">Creating account...</span>
</button>
</div>
<p class="text-center txt-sm text-white/60 pt-2">
By creating an account, you agree to our <a class="link font-medium text-primary/80 hover:text-primary" href="#">Terms of Service</a> and <a class="link font-medium text-primary/80 hover:text-primary" href="#">Privacy Policy</a>.
</p>
<p class="text-center txt-sm text-white/80 pt-4">
Already have an account? <a class="link font-bold text-primary" href="<?php echo url('login'); ?>">Log In</a>
</p>
</form>
</div>
</div>
</div>

<script>
// Toggle password visibility
document.querySelectorAll('.toggle-password').forEach(btn => {
    btn.addEventListener('click', function() {
        const targetId = this.getAttribute('data-target');
        const input = document.getElementById(targetId);
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        this.textContent = isPassword ? 'visibility' : 'visibility_off';
    });
});

// Handle form submission
document.getElementById('signup-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const errorDiv = document.getElementById('error-message');
    const successDiv = document.getElementById('success-message');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = document.getElementById('btn-text');
    const btnLoading = document.getElementById('btn-loading');
    
    // Hide messages
    errorDiv.classList.add('hidden');
    successDiv.classList.add('hidden');
    
    // Validate passwords match
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;
    
    if (password !== confirmPassword) {
        errorDiv.textContent = 'Passwords do not match.';
        errorDiv.classList.remove('hidden');
        return;
    }
    
    if (password.length < 8) {
        errorDiv.textContent = 'Password must be at least 8 characters.';
        errorDiv.classList.remove('hidden');
        return;
    }
    
    // Show loading state
    submitBtn.disabled = true;
    btnText.classList.add('hidden');
    btnLoading.classList.remove('hidden');
    
    try {
        const response = await submitForm(this, 'signup.php');
        
        if (response.success) {
            successDiv.textContent = response.message || 'Account created! Redirecting...';
            successDiv.classList.remove('hidden');
            
            // Redirect after success
            setTimeout(() => {
                window.location.href = response.redirect || ROUTES.HOME;
            }, 1500);
        } else {
            errorDiv.textContent = response.message || 'Registration failed. Please try again.';
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
