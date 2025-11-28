<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login - ForestSoul</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
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
              "primary": "#2C5F2D",
              "primary-hover": "#3a7a3b",
              "background-light": "#F5F5DC",
              "background-dark": "#102217",
              "card-light": "#FFFFFF",
              "card-dark": "#1E2D23",
              "text-light": "#102217",
              "text-dark": "#F5F5DC",
              "text-muted-light": "#6b7280",
              "text-muted-dark": "#97A97C",
              "input-bg-light": "#F5F5DC",
              "input-bg-dark": "#102217",
              "input-border-light": "#d1d5db",
              "input-border-dark": "#326747",
              "input-focus-light": "#2C5F2D",
              "input-focus-dark": "#97A97C",
              "placeholder-light": "#9ca3af",
              "placeholder-dark": "#97A97C",
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
<div class="relative flex min-h-screen w-full flex-col items-center justify-center bg-background-light dark:bg-background-dark group/design-root overflow-hidden">
<div class="absolute inset-0 z-0 h-full w-full bg-cover bg-center" data-alt="A sunlit path through a lush, green forest, creating a serene and tranquil atmosphere." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDkgZBRdUGgAQ4BTnzI3nIeUi6MMjYfMs0lxhacEjx2sJXsPEnJwYyGrZpx1kFPek1jDeflmMi_olDWhfL1EHRjBbtXR1xPKf8F9mJEJ37oqt4Ipma2Ke6SWuHv7hu4VhPBGOJdM1huYJ_8VwHUnKsOTXyfk016OpVq2QKEdQ8VDWXysyVenrS9SPL-m38TgHQEzR1kvVQBdYmAFrLYnQOQ9XvtZhBO08ZXOf1fEILdT_YvCruObUDUOVVPAYkkFNihgyLTYQmn3q8');">
<div class="absolute inset-0 bg-black/30 dark:bg-black/50"></div>
</div>
<div class="relative z-10 flex w-full max-w-md flex-col items-center p-4 sm:p-6">
<div class="w-full rounded-xl bg-card-light/80 p-6 shadow-2xl backdrop-blur-lg dark:bg-card-dark/80 sm:p-8">
<div class="flex flex-col items-center gap-2 pb-6">
<svg class="h-10 w-10 text-primary" fill="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-12h2v4h-2zm0 6h2v2h-2z"></path>
<path d="M12.75 12.34l3.91-3.91c.39-.39.39-1.02 0-1.41a.996.996 0 00-1.41 0L11.34 11.25a3.987 3.987 0 000 5.5l3.91 3.91c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41L12.75 13.75c-.97-.97-.97-2.55 0-3.53zM8.25 10.93L4.34 7.02c-.39-.39-1.02-.39-1.41 0a.996.996 0 000 1.41l3.91 3.91c.98.98.98 2.56 0 3.54l-3.91 3.91c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0l3.91-3.91c1.95-1.95 1.95-5.12 0-7.07z" opacity=".3"></path>
</svg>
<h1 class="font-display text-3xl font-bold text-text-light dark:text-text-dark">ForestSoul</h1>
</div>
<h2 class="text-center font-display text-2xl font-bold tracking-tight text-text-light dark:text-text-dark">Log In to Your Sanctuary</h2>
<p class="mt-2 text-center text-sm text-text-muted-light dark:text-text-muted-dark">Welcome back! Please enter your details.</p>
<div class="mt-8 flex flex-col gap-y-4">
<label class="flex flex-col gap-2">
<p class="font-display text-sm font-medium text-text-light dark:text-text-dark">Email Address</p>
<input class="form-input h-12 w-full rounded-lg border border-input-border-light bg-input-bg-light/80 p-3 text-base text-text-light placeholder:text-placeholder-light focus:border-input-focus-light focus:ring-2 focus:ring-input-focus-light/30 dark:border-input-border-dark dark:bg-input-bg-dark/80 dark:text-text-dark dark:placeholder:text-placeholder-dark dark:focus:border-input-focus-dark dark:focus:ring-input-focus-dark/30" placeholder="you@example.com" type="email"/>
</label>
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<p class="font-display text-sm font-medium text-text-light dark:text-text-dark">Password</p>
<a class="text-sm font-medium text-primary hover:underline focus:outline-none focus:ring-2 focus:ring-primary/50 rounded" href="#">Forgot Password?</a>
</div>
<div class="relative flex w-full items-stretch">
<input class="form-input h-12 w-full rounded-lg border border-input-border-light bg-input-bg-light/80 p-3 pr-10 text-base text-text-light placeholder:text-placeholder-light focus:border-input-focus-light focus:ring-2 focus:ring-input-focus-light/30 dark:border-input-border-dark dark:bg-input-bg-dark/80 dark:text-text-dark dark:placeholder:text-placeholder-dark dark:focus:border-input-focus-dark dark:focus:ring-input-focus-dark/30" placeholder="Enter your password" type="password"/>
<div class="absolute inset-y-0 right-0 flex items-center pr-3 text-text-muted-light dark:text-text-muted-dark">
<span class="material-symbols-outlined cursor-pointer" style="font-size: 20px;">visibility_off</span>
</div>
</div>
</div>
<button class="flex h-12 w-full items-center justify-center rounded-lg bg-primary px-4 py-2 text-base font-bold text-white transition-colors hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary/50 focus:ring-offset-2 focus:ring-offset-card-light dark:focus:ring-offset-card-dark">Log In</button>
</div>
<div class="relative my-6">
<div class="absolute inset-0 flex items-center">
<span class="w-full border-t border-input-border-light dark:border-input-border-dark"></span>
</div>
<div class="relative flex justify-center text-xs uppercase">
<span class="bg-card-light px-2 text-text-muted-light dark:bg-card-dark dark:text-text-muted-dark">Or continue with</span>
</div>
</div>
<div class="grid grid-cols-2 gap-3">
<button class="flex h-11 items-center justify-center gap-2 rounded-lg border border-input-border-light bg-transparent px-4 py-2 text-sm font-semibold text-text-light transition-colors hover:bg-gray-100 dark:border-input-border-dark dark:text-text-dark dark:hover:bg-white/5">
<svg class="h-5 w-5" data-alt="Google logo icon." viewbox="0 0 48 48"><path d="M43.611 20.083H42V20H24v8h11.303c-1.649 4.657-6.08 8-11.303 8c-6.627 0-12-5.373-12-12s5.373-12 12-12c3.059 0 5.842 1.154 7.961 3.039L38.802 6.57C34.54 2.943 29.602 1 24 1C11.318 1 1 11.318 1 24s10.318 23 23 23s23-10.318 23-23c0-1.654-.249-3.236-.699-4.757z" fill="#FFC107"></path><path d="M6.306 14.691L14.691 6.306C12.054 3.936 8.796 2.396 5.376 1.706L1.51 5.565C3.078 9.746 4.316 12.338 6.306 14.691z" fill="#FF3D00"></path><path d="M24 48c5.166 0 9.86-1.977 13.409-5.192l-8.199-8.199c-2.203 1.516-4.906 2.4-7.7 2.4c-4.585 0-8.546-2.618-10.426-6.306L2.348 37.386C6.58 43.821 14.665 48 24 48z" fill="#4CAF50"></path><path d="M43.611 20.083H42V20H24v8h11.303c-.792 2.237-2.231 4.166-4.087 5.571l8.199 8.199c4.717-4.22 7.585-10.638 7.585-17.764c0-1.654-.249-3.236-.699-4.757z" fill="#1976D2"></path></svg>
<span>Google</span>
</button>
<button class="flex h-11 items-center justify-center gap-2 rounded-lg border border-input-border-light bg-transparent px-4 py-2 text-sm font-semibold text-text-light transition-colors hover:bg-gray-100 dark:border-input-border-dark dark:text-text-dark dark:hover:bg-white/5">
<svg class="h-5 w-5" data-alt="Facebook logo icon." viewbox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5c0-2.07 1.22-3.2 3.16-3.2c.88 0 1.64.07 1.87.1v2.65h-1.58c-1 0-1.19.48-1.19 1.18V12h2.82l-.37 3h-2.45v6.8c4.56-.93 8-4.96 8-9.8Z" fill="currentColor"></path></svg>
<span>Facebook</span>
</button>
</div>
<p class="mt-8 text-center text-sm text-text-muted-light dark:text-text-muted-dark">
                    Don't have an account? <a class="font-semibold text-primary hover:underline focus:outline-none focus:ring-2 focus:ring-primary/50 rounded" href="#">Sign Up</a>
</p>
</div>
</div>
</div>
</body></html>