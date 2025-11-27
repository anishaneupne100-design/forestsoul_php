<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ForestSoul - Sign Up</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#13ec6a",
              "background-light": "#f6f8f7",
              "background-dark": "#102217",
            },
            fontFamily: {
              "display": ["Manrope", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
</head>
<body class="font-display">
<div class="relative flex min-h-screen w-full flex-col items-center justify-center bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden p-4 sm:p-6" style='background-image: linear-gradient(rgba(16, 34, 23, 0.8) 0%, rgba(16, 34, 23, 0.95) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDXMRl2bEH4h338h-NBZtIroCiJoNMa7eY0alhIlvmjPpALxjaZrubeYrnLFqePqDTVwyn2LzciHoPqN1nF-PyphfAjHG_RPpkUeWBuBejTASM6JMfg2GFDAcbDTG-VQ9BDEoqBYRRwe3d4PYaQRgQ9GV3T7jgtKPjXjembLG-VqrI3pt7GOZUHBVmtqXdCV5_pNJb34Vba1kPbGDENAdRJwMQp2j6pCnUu6v3XvmPxogU-pmjFiMo-ZvclfhBKcVAs9PAjO-FbZBI"); background-size: cover; background-position: center;'>
<div class="layout-container flex h-full grow flex-col justify-center w-full max-w-md">
<div class="layout-content-container flex flex-col items-center">
<div class="flex flex-col items-center gap-2 pb-6 pt-1 text-center">
<svg class="text-primary" fill="none" height="48" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="48" xmlns="http://www.w3.org/2000/svg"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="M12 12c-3 0-5 2.5-5 5"></path><path d="M12 8c1.657 0 3 1.343 3 3"></path></svg>
<h1 class="text-white tracking-light text-3xl sm:text-4xl font-bold leading-tight">Join ForestSoul</h1>
<p class="text-white/80 text-base font-normal leading-normal">Find your inner peace and connect with nature.</p>
</div>
<div class="w-full space-y-4">
<label class="flex flex-col">
<p class="text-white text-base font-medium leading-normal pb-2">Username</p>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white/90 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#326747] bg-[#193324] focus:border-primary h-12 placeholder:text-[#92c9a8]/60 px-4 text-base font-normal leading-normal" placeholder="Enter your username" value=""/>
</label>
<label class="flex flex-col">
<p class="text-white text-base font-medium leading-normal pb-2">Email</p>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white/90 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#326747] bg-[#193324] focus:border-primary h-12 placeholder:text-[#92c9a8]/60 px-4 text-base font-normal leading-normal" placeholder="Enter your email address" type="email" value=""/>
</label>
<label class="flex flex-col">
<p class="text-white text-base font-medium leading-normal pb-2">Password</p>
<div class="relative flex w-full flex-1 items-stretch">
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white/90 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#326747] bg-[#193324] focus:border-primary h-12 placeholder:text-[#92c9a8]/60 px-4 pr-10 text-base font-normal leading-normal" placeholder="Enter your password" type="password" value=""/>
<div class="absolute inset-y-0 right-0 flex items-center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer">visibility_off</span>
</div>
</div>
</label>
<label class="flex flex-col">
<p class="text-white text-base font-medium leading-normal pb-2">Confirm Password</p>
<div class="relative flex w-full flex-1 items-stretch">
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white/90 focus:outline-0 focus:ring-2 focus:ring-primary/50 border border-[#326747] bg-[#193324] focus:border-primary h-12 placeholder:text-[#92c9a8]/60 px-4 pr-10 text-base font-normal leading-normal" placeholder="Confirm your password" type="password" value=""/>
<div class="absolute inset-y-0 right-0 flex items-center pr-3">
<span class="material-symbols-outlined text-[#92c9a8]/60 cursor-pointer">visibility_off</span>
</div>
</div>
</label>
<div class="pt-4">
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-background-dark text-base font-bold leading-normal tracking-wide transition-colors hover:bg-primary/90">
<span class="truncate">Create Account</span>
</button>
</div>
<p class="text-center text-sm text-white/60 pt-2">
                        By creating an account, you agree to our <a class="font-medium text-primary/80 hover:text-primary" href="#">Terms of Service</a> and <a class="font-medium text-primary/80 hover:text-primary" href="#">Privacy Policy</a>.
                    </p>
<p class="text-center text-sm text-white/80 pt-4">
                        Already have an account? <a class="font-bold text-primary hover:underline" href="#">Log In</a>
</p>
</div>
</div>
</div>
</div>
</body></html>