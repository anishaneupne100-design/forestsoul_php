<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ForestSoul - Staff &amp; Expert Management</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
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
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-200">
<div class="relative flex min-h-screen w-full">
<aside class="flex flex-col w-64 p-4 bg-white/50 dark:bg-background-dark/50 border-r border-gray-200 dark:border-white/10">
<div class="flex items-center gap-3 p-2 mb-6">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Admin profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCvCZPMRcbgCwcttLfQcQLsXj81BDit_FT8-_rVCbwKzaSXWjhKoIUBO91NE1ouej7q44_NCTHbtuX1s2l_XyzIH-IwKqJiFmuXFRcR4BXaGjorAZBJwZ_JpRTNxkBsnOyQ5TQ6s3G84m0tdxg9kam4TeSg1ipMQCKlkEzjqz0JhO5aPFIcLJbIWfUjuSRhYkUiIlrlTdEA16_ybgo60HRtPf0cCWAZwjrn85obYdqRsD8Y8Gj0ocIk6nIO1MfY9k1NEl0YDx46uEw");'></div>
<div class="flex flex-col">
<h1 class="text-gray-900 dark:text-white text-base font-bold leading-normal">Priya Sharma</h1>
<p class="text-gray-500 dark:text-primary/70 text-sm font-normal leading-normal">priya.sharma@forestsoul.com</p>
</div>
</div>
<nav class="flex flex-col gap-2 flex-1">
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Users</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-gray-900 dark:text-white" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">badge</span>
<p class="text-sm font-bold leading-normal">Staff Management</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">favorite</span>
<p class="text-sm font-medium leading-normal">Donations</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">folder</span>
<p class="text-sm font-medium leading-normal">Content</p>
</a>
</nav>
<div class="flex flex-col gap-1 mt-auto">
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="text-sm font-medium leading-normal">Settings</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-gray-500 dark:text-gray-400 hover:bg-primary/10 hover:text-gray-900 dark:hover:text-white rounded-lg transition-colors" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Log Out</p>
</a>
</div>
</aside>
<main class="flex-1 p-8">
<div class="max-w-7xl mx-auto">
<div class="flex flex-wrap items-center justify-between gap-4 mb-8">
<div class="flex flex-col gap-1">
<p class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Staff &amp; Expert Management</p>
<p class="text-gray-500 dark:text-primary/70 text-base font-normal leading-normal">Manage staff profiles, roles, and credentials.</p>
</div>
<button class="flex items-center justify-center gap-2 min-w-[84px] cursor-pointer overflow-hidden rounded-xl h-12 px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined">add_circle</span>
<span class="truncate">Add New Staff/Expert</span>
</button>
</div>
<div class="mb-6">
<label class="flex flex-col h-12 w-full">
<div class="flex w-full flex-1 items-stretch rounded-xl h-full border border-gray-200 dark:border-white/10 bg-white dark:bg-white/5">
<div class="text-gray-400 dark:text-primary/70 flex items-center justify-center pl-4">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-gray-900 dark:text-white focus:outline-0 focus:ring-0 border-none bg-transparent h-full placeholder:text-gray-400 dark:placeholder:text-gray-500 px-4 pl-2 text-base font-normal leading-normal" placeholder="Search by name, email, or role..." value=""/>
</div>
</label>
</div>
<div class="w-full @container">
<div class="overflow-hidden rounded-xl border border-gray-200 dark:border-white/10 bg-white dark:bg-background-dark/50">
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-gray-50 dark:bg-white/5">
<tr>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Full Name</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Email</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Role</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Status</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Date Added</th>
<th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-gray-200 dark:divide-white/10">
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-4">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of Dr. Sita Gurung" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDzITj0MwSw5_TxRiB6kTGfMgwjiL6Z4KHJ2IqDhgkxBWT9NjOFiyPbCTEAN1BmyLgPbAw4IRDxZpNyXt4I9QfLnjHZk-vmGO78GYTlnQNrLzQoPNdBIzyGMu-bMle-4TuQ7afOWLvj5aiAW7vrzrDk9HN2asIj543b9xfT7G11E3E0o99lWmNh1-NKPD0HryFjHWG1kSAa6FNHA7JRp8BWFJhBK-sJTqS6coZ8tiCM2SsfSdjk0l5R5MgtZdyCF5gBnjwGxA7WrAU");'></div>
<p class="text-sm font-medium text-gray-900 dark:text-white">Dr. Sita Gurung</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">sita.g@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Therapist</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-green-800 dark:text-primary">Active</span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-10-26</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_off</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-4">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of Ramesh Thapa" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBFc3vcYMgD2hJgpHkvxFQU0kR0cESMQxpqZGrTdA8duFg85wQcDMrTa_tim6vZApEZ51PiVTvZ2FPLw7Yaam07oLB3HpRUC82_sCgt7evAOXWInjP0kgkDGJqmU6Zk2k-NiH1pCQBZQaSdrW6v9YL54x7b9NaMYMivn8lHe2LFIi03afHyAjlCdHTByj_Rp-HFVvKgpzGGPo90YizE7Xf3r-jrvF-IsjN19tw9DLw5a_Waa-jK7zJ6P-wUf-8DgbGPGRckI2rXCVM");'></div>
<p class="text-sm font-medium text-gray-900 dark:text-white">Ramesh Thapa</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">ramesh.t@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">Yoga Instructor</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Inactive</span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-09-15</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-green-500 rounded-lg hover:bg-green-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_on</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-4">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of Anjali Devi" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCXwWPufpfXDneoldiKYk4BhPdb4izNCUZ7RrxCJqBKDK_oa4HyMmkvqQteuHsWi8nY2B7aCQyUgeLjLlrklvv1C7-w5M_VdsIJTfFWiHl8M3WNx_iDQOOAPPSZp8OImWS51G1q50vWMaGqq1Rc6k995uvisFCxN__GUr-5BP1DEfdRiA_1ThP_-33RS4DxOoSK85sstUL7yQNlp1GUZe67mrBmIWcaoULPUmG1ANx4HSuLPXrfx53mMTyQmZwLAIL-Abn98bSt14Q");'></div>
<p class="text-sm font-medium text-gray-900 dark:text-white">Anjali Devi</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">anjali.d@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300">Admin</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/20 text-green-800 dark:text-primary">Active</span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-08-01</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_off</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-4">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of Hari Bahadur" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB5P5Yt8ZZ3-sRdTa6x7or3_7qZ_H6MrKyqFt9pF3Trwc_RNxyU1EVkN-IO3t_UevMISZUptrPBki1_MZOn-DEqo8nzyJwk6QZZYhKAjXFc5NftAjKONe3d9ozbsfVnhFKO62zeC3OerURjHGlCGUD54LglfaOy_jAi66rOqZoiFxSjI7BKxTDkzimlCdjtjwRyPPDQq7Ze7rLGs_K0id2tPMHmQyDUrUhfgqmK9GqpIr31W527sAK-l_ZhEnRF_0PZr5qlE74Zezg");'></div>
<p class="text-sm font-medium text-gray-900 dark:text-white">Hari Bahadur</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">hari.b@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Therapist</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Pending</span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">2023-11-02</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 text-gray-500 dark:text-gray-400 hover:text-green-500 rounded-lg hover:bg-green-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_on</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="flex items-center justify-center pt-6">
<nav aria-label="Pagination" class="flex items-center gap-2">
<a class="flex size-10 items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-primary/10 rounded-full transition-colors" href="#">
<span class="material-symbols-outlined">chevron_left</span>
</a>
<a class="text-sm font-bold flex size-10 items-center justify-center text-background-dark bg-primary rounded-full" href="#">1</a>
<a class="text-sm font-medium flex size-10 items-center justify-center text-gray-700 dark:text-white rounded-full hover:bg-primary/10 transition-colors" href="#">2</a>
<a class="text-sm font-medium flex size-10 items-center justify-center text-gray-700 dark:text-white rounded-full hover:bg-primary/10 transition-colors" href="#">3</a>
<span class="text-sm font-medium flex size-10 items-center justify-center text-gray-500 dark:text-gray-400">...</span>
<a class="text-sm font-medium flex size-10 items-center justify-center text-gray-700 dark:text-white rounded-full hover:bg-primary/10 transition-colors" href="#">10</a>
<a class="flex size-10 items-center justify-center text-gray-500 dark:text-gray-400 hover:bg-primary/10 rounded-full transition-colors" href="#">
<span class="material-symbols-outlined">chevron_right</span>
</a>
</nav>
</div>
</div>
</main>
</div>

</body></html>