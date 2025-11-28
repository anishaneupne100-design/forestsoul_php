<?php
$title = "ForestSoul - Staff & Expert Management";
include '../head.php';
?>
<body class="body">
<div class="relative flex min-h-screen w-full">
<aside class="col w-64 p-4 bg-white/50 dark:bg-background-dark/50 border-r border-border-light dark:border-border-dark">
<div class="row gap-sm p-2 mb-6">
<div class="avatar" data-alt="Admin profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCvCZPMRcbgCwcttLfQcQLsXj81BDit_FT8-_rVCbwKzaSXWjhKoIUBO91NE1ouej7q44_NCTHbtuX1s2l_XyzIH-IwKqJiFmuXFRcR4BXaGjorAZBJwZ_JpRTNxkBsnOyQ5TQ6s3G84m0tdxg9kam4TeSg1ipMQCKlkEzjqz0JhO5aPFIcLJbIWfUjuSRhYkUiIlrlTdEA16_ybgo60HRtPf0cCWAZwjrn85obYdqRsD8Y8Gj0ocIk6nIO1MfY9k1NEl0YDx46uEw");'></div>
<div class="col">
<h1 class="txt font-bold">Priya Sharma</h1>
<p class="txt-sm text-gray-500 dark:text-primary/70">priya.sharma@forestsoul.com</p>
</div>
</div>
<nav class="col gap-2 flex-1">
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">dashboard</span>
<p class="txt-sm font-medium">Dashboard</p>
</a>
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">group</span>
<p class="txt-sm font-medium">Users</p>
</a>
<a class="sidebar-link-active" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">badge</span>
<p class="txt-sm font-bold">Staff Management</p>
</a>
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">favorite</span>
<p class="txt-sm font-medium">Donations</p>
</a>
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">folder</span>
<p class="txt-sm font-medium">Content</p>
</a>
</nav>
<div class="col gap-1 mt-auto">
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="txt-sm font-medium">Settings</p>
</a>
<a class="sidebar-link" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="txt-sm font-medium">Log Out</p>
</a>
</div>
</aside>
<main class="flex-1 p-8">
<div class="max-w-7xl mx-auto">
<div class="between flex-wrap gap-md mb-8">
<div class="col gap-1">
<p class="txt txt-hero">Staff &amp; Expert Management</p>
<p class="txt-2">Manage staff profiles, roles, and credentials.</p>
</div>
<button class="btn-primary btn-lg gap-2">
<span class="material-symbols-outlined">add_circle</span>
<span class="truncate">Add New Staff/Expert</span>
</button>
</div>
<div class="mb-6">
<label class="col h-12 w-full">
<div class="row flex-1 rounded-xl h-full border border-border-light dark:border-border-dark bg-white dark:bg-white/5">
<div class="center pl-4 txt-2">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl txt focus:outline-0 focus:ring-0 border-none bg-transparent h-full placeholder:text-gray-400 dark:placeholder:text-gray-500 px-4 pl-2 text-base font-normal leading-normal" placeholder="Search by name, email, or role..." value=""/>
</div>
</label>
</div>
<div class="w-full @container">
<div class="overflow-hidden rounded-xl border border-border-light dark:border-border-dark bg-white dark:bg-background-dark/50">
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead class="bg-gray-50 dark:bg-white/5">
<tr>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider txt-2">Full Name</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider txt-2">Email</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider txt-2">Role</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider txt-2">Status</th>
<th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider txt-2">Date Added</th>
<th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wider txt-2">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-border-light dark:divide-border-dark">
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="row gap-md">
<div class="avatar" data-alt="Profile picture of Dr. Sita Gurung" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDzITj0MwSw5_TxRiB6kTGfMgwjiL6Z4KHJ2IqDhgkxBWT9NjOFiyPbCTEAN1BmyLgPbAw4IRDxZpNyXt4I9QfLnjHZk-vmGO78GYTlnQNrLzQoPNdBIzyGMu-bMle-4TuQ7afOWLvj5aiAW7vrzrDk9HN2asIj543b9xfT7G11E3E0o99lWmNh1-NKPD0HryFjHWG1kSAa6FNHA7JRp8BWFJhBK-sJTqS6coZ8tiCM2SsfSdjk0l5R5MgtZdyCF5gBnjwGxA7WrAU");'></div>
<p class="txt-sm font-medium txt">Dr. Sita Gurung</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">sita.g@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Therapist</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-primary/20 text-green-800 dark:text-primary">Active</span>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">2023-10-26</td>
<td class="px-6 py-4 whitespace-nowrap text-right txt-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 txt-2 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 txt-2 hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_off</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="row gap-md">
<div class="avatar" data-alt="Profile picture of Ramesh Thapa" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBFc3vcYMgD2hJgpHkvxFQU0kR0cESMQxpqZGrTdA8duFg85wQcDMrTa_tim6vZApEZ51PiVTvZ2FPLw7Yaam07oLB3HpRUC82_sCgt7evAOXWInjP0kgkDGJqmU6Zk2k-NiH1pCQBZQaSdrW6v9YL54x7b9NaMYMivn8lHe2LFIi03afHyAjlCdHTByj_Rp-HFVvKgpzGGPo90YizE7Xf3r-jrvF-IsjN19tw9DLw5a_Waa-jK7zJ6P-wUf-8DgbGPGRckI2rXCVM");'></div>
<p class="txt-sm font-medium txt">Ramesh Thapa</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">ramesh.t@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">Yoga Instructor</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">Inactive</span>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">2023-09-15</td>
<td class="px-6 py-4 whitespace-nowrap text-right txt-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 txt-2 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 txt-2 hover:text-green-500 rounded-lg hover:bg-green-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_on</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="row gap-md">
<div class="avatar" data-alt="Profile picture of Anjali Devi" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCXwWPufpfXDneoldiKYk4BhPdb4izNCUZ7RrxCJqBKDK_oa4HyMmkvqQteuHsWi8nY2B7aCQyUgeLjLlrklvv1C7-w5M_VdsIJTfFWiHl8M3WNx_iDQOOAPPSZp8OImWS51G1q50vWMaGqq1Rc6k995uvisFCxN__GUr-5BP1DEfdRiA_1ThP_-33RS4DxOoSK85sstUL7yQNlp1GUZe67mrBmIWcaoULPUmG1ANx4HSuLPXrfx53mMTyQmZwLAIL-Abn98bSt14Q");'></div>
<p class="txt-sm font-medium txt">Anjali Devi</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">anjali.d@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-indigo-100 text-indigo-800 dark:bg-indigo-900/50 dark:text-indigo-300">Admin</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-primary/20 text-green-800 dark:text-primary">Active</span>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">2023-08-01</td>
<td class="px-6 py-4 whitespace-nowrap text-right txt-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 txt-2 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 txt-2 hover:text-red-500 rounded-lg hover:bg-red-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_off</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-gray-50 dark:hover:bg-white/5 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="row gap-md">
<div class="avatar" data-alt="Profile picture of Hari Bahadur" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB5P5Yt8ZZ3-sRdTa6x7or3_7qZ_H6MrKyqFt9pF3Trwc_RNxyU1EVkN-IO3t_UevMISZUptrPBki1_MZOn-DEqo8nzyJwk6QZZYhKAjXFc5NftAjKONe3d9ozbsfVnhFKO62zeC3OerURjHGlCGUD54LglfaOy_jAi66rOqZoiFxSjI7BKxTDkzimlCdjtjwRyPPDQq7Ze7rLGs_K0id2tPMHmQyDUrUhfgqmK9GqpIr31W527sAK-l_ZhEnRF_0PZr5qlE74Zezg");'></div>
<p class="txt-sm font-medium txt">Hari Bahadur</p>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">hari.b@forestsoul.com</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-green-100 text-green-800 dark:bg-green-900/50 dark:text-green-300">Therapist</span>
</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="chip bg-yellow-100 text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Pending</span>
</td>
<td class="px-6 py-4 whitespace-nowrap txt-sm txt-2">2023-11-02</td>
<td class="px-6 py-4 whitespace-nowrap text-right txt-sm font-medium">
<div class="flex justify-end gap-2">
<button class="p-2 txt-2 hover:text-primary rounded-lg hover:bg-primary/10 transition-colors"><span class="material-symbols-outlined text-base">edit</span></button>
<button class="p-2 txt-2 hover:text-green-500 rounded-lg hover:bg-green-500/10 transition-colors"><span class="material-symbols-outlined text-base">toggle_on</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<div class="center pt-6">
<nav aria-label="Pagination" class="row gap-2">
<a class="center size-10 txt-2 hover:bg-primary/10 rounded-full transition-colors" href="#">
<span class="material-symbols-outlined">chevron_left</span>
</a>
<a class="txt-sm font-bold center size-10 text-background-dark bg-primary rounded-full" href="#">1</a>
<a class="txt-sm font-medium center size-10 txt rounded-full hover:bg-primary/10 transition-colors" href="#">2</a>
<a class="txt-sm font-medium center size-10 txt rounded-full hover:bg-primary/10 transition-colors" href="#">3</a>
<span class="txt-sm font-medium center size-10 txt-2">...</span>
<a class="txt-sm font-medium center size-10 txt rounded-full hover:bg-primary/10 transition-colors" href="#">10</a>
<a class="center size-10 txt-2 hover:bg-primary/10 rounded-full transition-colors" href="#">
<span class="material-symbols-outlined">chevron_right</span>
</a>
</nav>
</div>
</div>
</main>
</div>
</body></html>