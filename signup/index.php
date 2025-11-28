<?php
$title = "Sign Up - ForestSoul";
include '../head.php';
?>

<body class="body">
<div class="page center p-4 sm:p-6 group/design-root" style='background-image: linear-gradient(rgba(16, 34, 23, 0.8) 0%, rgba(16, 34, 23, 0.95) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXMRl2bEH4h338h-NBZtIroCiJoNMa7eY0alhIlvmjPpALxjaZrubeYrnLFqePqDTVwyn2LzciHoPqN1nF-PyphfAjHG_RPpkUeWBuBejTASM6JMfg2GFDAcbDTG-VQ9BDEoqBYRRwe3d4PYaQRgQ9GV3T7jgtKPjXjembLG-VqrI3pt7GOZUHBVmtqXdCV5_pNJb34Vba1kPbGDENAdRJwMQp2j6pCnUu6v3XvmPxogU-pmjFiMo-ZvclfhBKcVAs9PAjO-FbZBI"); background-size: cover; background-position: center;'>
<div class="layout-container layout justify-center w-full max-w-md">
<div class="content center">
<div class="col center gap-sm pb-6 pt-1 text-center">
<svg class="text-primary" fill="none" height="48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 12c-3 0-5 2.5-5 5"></path><path d="M12 8c1.657 0 3 1.343 3 3"></path></svg>
<h1 class="txt-hero text-white sm:text-4xl">Join ForestSoul</h1>
<p class="txt-md text-white/80">Find your inner peace and connect with nature.</p>
</div>
<div class="w-full space-y-4">
<label class="col">
<p class="txt-md text-white pb-2">Username</p>
<input class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50" placeholder="Enter your username" value=""/>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Email</p>
<input class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50" placeholder="Enter your email address" type="email" value=""/>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Password</p>
<div class="relative row flex-1 items-stretch">
<input class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50 pr-10" placeholder="Enter your password" type="password" value=""/>
<div class="absolute inset-y-0 right-0 center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer">visibility_off</span>
</div>
</div>
</label>
<label class="col">
<p class="txt-md text-white pb-2">Confirm Password</p>
<div class="relative row flex-1 items-stretch">
<input class="input h-12 bg-[#193324] border-[#326747] text-white/90 placeholder:text-[#92c9a8]/60 focus:border-primary focus:ring-primary/50 pr-10" placeholder="Confirm your password" type="password" value=""/>
<div class="absolute inset-y-0 right-0 center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer">visibility_off</span>
</div>
</div>
</label>
<div class="pt-4">
<button class="btn-primary btn-lg w-full tracking-wide hover:bg-primary/90">
<span class="truncate">Create Account</span>
</button>
</div>
<p class="text-center txt-sm text-white/60 pt-2">
                        By creating an account, you agree to our <a class="link font-medium text-primary/80 hover:text-primary" href="#">Terms of Service</a> and <a class="link font-medium text-primary/80 hover:text-primary" href="#">Privacy Policy</a>.
                    </p>
<p class="text-center txt-sm text-white/80 pt-4">
                        Already have an account? <a class="link font-bold text-primary" href="#">Log In</a>
</p>
</div>
</div>
</div>
</div>
</body></html>
