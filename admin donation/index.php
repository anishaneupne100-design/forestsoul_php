<?php
// Protect this route - require admin role
require_once __DIR__ . '/../backend/middleware/admin.php';

$title = "ForestSoul - Admin Donations Dashboard";
include '../head.php';

$user = Auth::user();
?>
<body class="body">
<div class="relative flex min-h-screen w-full">
<aside class="sticky top-0 h-screen w-64 flex-shrink-0 surface border-r border-border-light dark:border-border-dark flex flex-col">
<div class="flex h-full flex-col justify-between p-4">
<div class="flex flex-col gap-4">
<a href="<?php echo url('home'); ?>" class="flex items-center gap-3 px-3 py-2">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 bg-primary/20 center">
<span class="material-symbols-outlined text-primary">eco</span>
</div>
<div class="flex flex-col">
<h1 class="txt text-base font-medium leading-normal">ForestSoul</h1>
<p class="txt-2 text-sm font-normal leading-normal">Admin Panel</p>
</div>
</a>
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 txt-2 hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="<?php echo url('staff'); ?>">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium leading-normal">Staff Panel</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="<?php echo url('admin_donation'); ?>">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">volunteer_activism</span>
<p class="text-sm font-medium leading-normal">Donations</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 txt-2 hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="<?php echo url('community'); ?>">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Community</p>
</a>
</nav>
</div>
<div class="flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 txt-2 hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="<?php echo url('profile'); ?>">
<span class="material-symbols-outlined">person</span>
<p class="text-sm font-medium leading-normal"><?php echo htmlspecialchars($user['name']); ?></p>
</a>
<a class="flex items-center gap-3 px-3 py-2 txt-2 hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="<?php echo url('home'); ?>">
<span class="material-symbols-outlined">home</span>
<p class="text-sm font-medium leading-normal">Back to Site</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-red-500 hover:bg-red-500/10 rounded-lg" href="<?php echo url('logout'); ?>">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Logout</p>
</a>
</div>
</div>
</aside>
<main class="flex-1 p-6 lg:p-8 overflow-y-auto">
<div class="mx-auto max-w-7xl">
<header class="flex flex-wrap items-center justify-between gap-4 mb-8">
<h1 class="text-gray-900 dark:text-white text-3xl font-bold tracking-tight">Donations Management</h1>
<div class="flex items-center gap-4">
<div class="relative">
<select class="w-full h-10 pl-3 pr-8 bg-white dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-primary focus:border-primary text-sm font-medium text-gray-900 dark:text-gray-200">
<option>Currency: NPR</option>
<option>Currency: USD</option>
</select>
</div>
<button class="flex items-center justify-center gap-2 rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined text-base">download</span>
<span class="truncate">Export Report</span>
</button>
</div>
</header>
<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Total Donations (This Month)</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">रु 1,652,325</p>
<p class="text-success text-sm font-medium leading-normal flex items-center gap-1">
<span class="material-symbols-outlined text-base">trending_up</span>
<span>+5.2%</span>
</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Total Donors</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">312</p>
<p class="text-success text-sm font-medium leading-normal flex items-center gap-1">
<span class="material-symbols-outlined text-base">trending_up</span>
<span>+1.8%</span>
</p>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
<p class="text-gray-600 dark:text-gray-400 text-sm font-medium leading-normal">Average Donation</p>
<p class="text-gray-900 dark:text-white tracking-tight text-3xl font-bold leading-tight">रु 5,295</p>
<p class="text-error text-sm font-medium leading-normal flex items-center gap-1">
<span class="material-symbols-outlined text-base">trending_down</span>
<span>-0.5%</span>
</p>
</div>
</section>
<section class="mb-6">
<div class="p-4 bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="relative lg:col-span-2">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
<input class="w-full h-10 pl-10 pr-4 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-lg focus:ring-primary focus:border-primary text-sm text-gray-900 dark:text-gray-200" placeholder="Search by name, email, or ID..." type="text"/>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">calendar_month</span>
<input class="w-full h-10 pl-10 pr-4 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-lg focus:ring-primary focus:border-primary text-sm text-gray-900 dark:text-gray-200" placeholder="Date Range" type="text"/>
</div>
<div class="relative">
<select class="w-full h-10 pl-3 pr-8 bg-gray-100 dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-lg focus:ring-primary focus:border-primary text-sm text-gray-900 dark:text-gray-200">
<option>All Statuses</option>
<option>Completed</option>
<option>Pending</option>
<option>Failed</option>
</select>
</div>
</div>
</div>
</section>
<section class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
<tr>
<th class="px-6 py-3" scope="col">Donation ID</th>
<th class="px-6 py-3" scope="col">Date</th>
<th class="px-6 py-3" scope="col">Donor Name</th>
<th class="px-6 py-3" scope="col">Amount (NPR)</th>
<th class="px-6 py-3" scope="col">Status</th>
<th class="px-6 py-3 text-right" scope="col">Actions</th>
</tr>
</thead>
<tbody>
<tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
<td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">#FSD-84623</td>
<td class="px-6 py-4">Oct 26, 2023</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Liam Johnson</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">रु 6,650</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/20 text-success">Completed</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"><span class="material-symbols-outlined">more_horiz</span></button>
</td>
</tr>
<tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
<td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">#FSD-84622</td>
<td class="px-6 py-4">Oct 25, 2023</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Olivia Smith</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">रु 3,325</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-warning/20 text-warning">Pending</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"><span class="material-symbols-outlined">more_horiz</span></button>
</td>
</tr>
<tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
<td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">#FSD-84621</td>
<td class="px-6 py-4">Oct 25, 2023</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Noah Brown</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">रु 13,300</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/20 text-success">Completed</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"><span class="material-symbols-outlined">more_horiz</span></button>
</td>
</tr>
<tr class="bg-white dark:bg-gray-900 border-b dark:border-gray-800 hover:bg-gray-50 dark:hover:bg-gray-800/50">
<td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">#FSD-84620</td>
<td class="px-6 py-4">Oct 24, 2023</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Emma Davis</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">रु 9,975</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-error/20 text-error">Failed</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"><span class="material-symbols-outlined">more_horiz</span></button>
</td>
</tr>
<tr class="bg-white dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800/50">
<td class="px-6 py-4 font-mono text-gray-700 dark:text-gray-300">#FSD-84619</td>
<td class="px-6 py-4">Oct 23, 2023</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">Ava Wilson</td>
<td class="px-6 py-4 font-medium text-gray-900 dark:text-white">रु 1,995</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-success/20 text-success">Completed</span>
</td>
<td class="px-6 py-4 text-right">
<button class="text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200"><span class="material-symbols-outlined">more_horiz</span></button>
</td>
</tr>
</tbody>
</table>
</div>
<nav aria-label="Table navigation" class="flex items-center justify-between p-4">
<span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white">1-5</span> of <span class="font-semibold text-gray-900 dark:text-white">100</span></span>
<ul class="inline-flex items-center -space-x-px">
<li>
<a class="px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white flex items-center" href="#">Previous</a>
</li>
<li>
<a class="px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white flex items-center" href="#">Next</a>
</li>
</ul>
</nav>
</section>
</div>
</main>
</div>

</body>
</html>