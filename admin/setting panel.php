<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin Notification System - ForestSoul</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#13ec5b",
              "background-light": "#f6f8f6",
              "background-dark": "#102216",
            },
            fontFamily: {
              "display": ["Manrope", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
      .material-symbols-outlined {
        font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
      }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col">
<div class="flex h-full flex-1">
<!-- SideNavBar -->
<aside class="flex w-64 flex-col bg-[#112217] p-4">
<div class="flex h-full min-h-[700px] flex-col justify-between">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3 p-2">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Admin profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD3Kx8sWQjys7E2Tc_8aqJ62W310qJjeLqWgGvErv9Utj7Id6NqZxJcTj-WK0xy_COlV7v1Tw_OG5DlkrsMv-jZiyu6zDs67GP5MX8oLsf9YRxFB2J-uUuX5yqxPdRIk5QQERMdQw18QKy73Mt2hSDTKjuQGwTHrcv2NTavdMwJBt88_bCHMDaaTzWfxlEBrj8wq3yv2QsnHhgSOnwJ5v5cMpDqSAhGVmVp2HEfy_gNhAojHQjHswtACrmeBaomxPOKZ09S886H84w");'></div>
<div class="flex flex-col">
<h1 class="text-white text-base font-medium leading-normal">Admin Name</h1>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">ForestSoul Admin</p>
</div>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Users</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">favorite</span>
<p class="text-sm font-medium leading-normal">Donations</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">book</span>
<p class="text-sm font-medium leading-normal">Programs</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl bg-[#23482f]" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1">notifications</span>
<p class="text-white text-sm font-medium leading-normal">Notifications</p>
</a>
</nav>
</div>
<div class="flex flex-col gap-4">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary text-[#112217] text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Logout</span>
</button>
<div class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="text-sm font-medium leading-normal">Settings</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-xl text-white hover:bg-[#23482f]/50 transition-colors" href="#">
<span class="material-symbols-outlined">help</span>
<p class="text-sm font-medium leading-normal">Support</p>
</a>
</div>
</div>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 p-8">
<div class="mx-auto max-w-7xl">
<!-- PageHeading -->
<div class="flex flex-wrap justify-between gap-4 items-center mb-8">
<p class="text-white text-4xl font-black leading-tight tracking-[-0.033em]">Notifications</p>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#23482f] text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#326744] transition-colors">
<span class="truncate">Mark All as Read</span>
</button>
</div>
<div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
<!-- Left Filter Panel -->
<div class="lg:col-span-1 flex flex-col gap-8">
<div>
<!-- SectionHeader: Filter by Type -->
<h3 class="text-white text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Filter by Type</h3>
<!-- Checklists -->
<div class="px-4">
<label class="flex gap-x-3 py-3 flex-row cursor-pointer">
<input checked="" class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none" type="checkbox"/>
<p class="text-white text-base font-normal leading-normal">All</p>
</label>
<label class="flex gap-x-3 py-3 flex-row cursor-pointer">
<input class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none" type="checkbox"/>
<p class="text-white text-base font-normal leading-normal">Donations</p>
</label>
<label class="flex gap-x-3 py-3 flex-row cursor-pointer">
<input class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none" type="checkbox"/>
<p class="text-white text-base font-normal leading-normal">User Feedback</p>
</label>
<label class="flex gap-x-3 py-3 flex-row cursor-pointer">
<input class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none" type="checkbox"/>
<p class="text-white text-base font-normal leading-normal">Registrations</p>
</label>
<label class="flex gap-x-3 py-3 flex-row cursor-pointer">
<input class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none" type="checkbox"/>
<p class="text-white text-base font-normal leading-normal">System Alerts</p>
</label>
</div>
</div>
<div>
<!-- SectionHeader: Filter by Status -->
<h3 class="text-white text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Filter by Status</h3>
<div class="flex flex-col gap-2 px-4 py-3">
<label class="flex items-center gap-3 cursor-pointer">
<input checked="" class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent" name="status" type="radio"/>
<span class="text-white text-base">All</span>
</label>
<label class="flex items-center gap-3 cursor-pointer">
<input class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent" name="status" type="radio"/>
<span class="text-white text-base">Unread</span>
</label>
<label class="flex items-center gap-3 cursor-pointer">
<input class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent" name="status" type="radio"/>
<span class="text-white text-base">Read</span>
</label>
</div>
</div>
</div>
<!-- Right Notification List -->
<div class="lg:col-span-3 flex flex-col gap-4">
<!-- Notification Card - Unread -->
<div class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
<div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
<div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">favorite</span></div>
<div class="flex-1">
<p class="font-bold text-white">New Donation Received</p>
<p class="text-gray-300">Jane Doe has donated $50 to the 'Reforestation Project'.</p>
<p class="text-xs text-gray-400 mt-1">5 minutes ago</p>
</div>
<div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">done</span></button>
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">delete</span></button>
</div>
</div>
<!-- Notification Card - Read -->
<div class="relative flex items-start gap-4 p-4 bg-[#112217]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
<div class="flex-shrink-0 text-gray-400 pt-1"><span class="material-symbols-outlined">chat</span></div>
<div class="flex-1 opacity-70">
<p class="font-bold text-white">New User Feedback</p>
<p class="text-gray-300">Feedback submitted on the 'Guided Meditation' page.</p>
<p class="text-xs text-gray-400 mt-1">2 hours ago</p>
</div>
<div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">undo</span></button>
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">delete</span></button>
</div>
</div>
<!-- Notification Card - Unread -->
<div class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
<div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
<div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">person_add</span></div>
<div class="flex-1">
<p class="font-bold text-white">New Program Registration</p>
<p class="text-gray-300">John Smith has registered for the 'Mindfulness 101' course.</p>
<p class="text-xs text-gray-400 mt-1">1 day ago</p>
</div>
<div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">done</span></button>
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">delete</span></button>
</div>
</div>
<!-- Notification Card - Read -->
<div class="relative flex items-start gap-4 p-4 bg-[#112217]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
<div class="flex-shrink-0 text-gray-400 pt-1"><span class="material-symbols-outlined">clinical_notes</span></div>
<div class="flex-1 opacity-70">
<p class="font-bold text-white">New Therapy Session Request</p>
<p class="text-gray-300">Emily Carter has requested a new therapy session.</p>
<p class="text-xs text-gray-400 mt-1">2 days ago</p>
</div>
<div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">undo</span></button>
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">delete</span></button>
</div>
</div>
<!-- Notification Card - System Alert (Unread) -->
<div class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
<div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
<div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">warning</span></div>
<div class="flex-1">
<p class="font-bold text-white">System Alert: Payment Gateway API Unresponsive</p>
<p class="text-gray-300">The system detected an error with the payment gateway. Donations may be affected.</p>
<p class="text-xs text-gray-400 mt-1">3 days ago</p>
</div>
<div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">done</span></button>
<button class="text-gray-400 hover:text-white"><span class="material-symbols-outlined text-xl">delete</span></button>
</div>
</div>
<!-- Empty State Example -->
<div class="flex flex-col items-center justify-center text-center p-12 bg-[#112217]/50 rounded-xl mt-8">
<span class="material-symbols-outlined text-6xl text-primary mb-4">task_alt</span>
<h4 class="text-xl font-bold text-white">All Caught Up!</h4>
<p class="text-gray-400 mt-2">There are no new notifications to show.</p>
</div>
</div>
</div>
</div>
</main>
</div>
</div>
<style>
  :root {
    --checkbox-tick-svg: url('data:image/svg+xml,%3csvg viewBox=%270 0 16 16%27 fill=%27rgb(17,34,23)%27 xmlns=%27http://www.w3.org/2000/svg%27%3e%3cpath d=%27M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z%27/%3e%3c/svg%3e');
  }
</style>
</body></html>