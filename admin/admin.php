<?php
// Protect this route - require admin role
require_once __DIR__ . '/../backend/middleware/admin.php';

$title = "Admin Dashboard - ForestSoul";
include '../head.php';

$user = Auth::user();
?>

<body class="body">
<div class="relative flex h-auto min-h-screen w-full flex-col">
<div class="flex h-full min-h-screen">
<aside class="flex h-full min-h-screen flex-col justify-between surface p-4 w-64 border-r border-border-light dark:border-border-dark">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 px-3">
<a href="<?php echo url('home'); ?>" class="row gap-md txt">
<div class="size-6 text-primary">
<svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M42.4379 44C42.4379 44 36.0744 33.9038 41.1692 24C46.8624 12.9336 42.2078 4 42.2078 4L7.01134 4C7.01134 4 11.6577 12.932 5.96912 23.9969C0.876273 33.9029 7.27094 44 7.27094 44L42.4379 44Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="txt-xl font-bold">ForestSoul</h2>
</a>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="<?php echo url('admin'); ?>">
<span class="material-symbols-outlined">home</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('staff'); ?>">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Users</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('meditation'); ?>">
<span class="material-symbols-outlined">self_improvement</span>
<p class="text-sm font-medium leading-normal">Meditation</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('yoga'); ?>">
<span class="material-symbols-outlined">fitbit_yoga</span>
<p class="text-sm font-medium leading-normal">Yoga</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('therapy'); ?>">
<span class="material-symbols-outlined">psychology</span>
<p class="text-sm font-medium leading-normal">Therapy</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('games'); ?>">
<span class="material-symbols-outlined">videogame_asset</span>
<p class="text-sm font-medium leading-normal">Games</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('admin_donation'); ?>">
<span class="material-symbols-outlined">volunteer_activism</span>
<p class="text-sm font-medium leading-normal">Donations</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('community'); ?>">
<span class="material-symbols-outlined">forum</span>
<p class="text-sm font-medium leading-normal">Community</p>
</a>
</div>
</div>
<div class="flex flex-col gap-4">
<div class="flex gap-3 items-center px-3">
<div class="img-cover aspect-square rounded-full size-10" style='background-image: url("<?php echo htmlspecialchars($user['avatar'] ?? 'https://ui-avatars.com/api/?name=' . urlencode($user['name']) . '&background=0D8045&color=fff'); ?>");'></div>
<div class="flex flex-col">
<h1 class="txt txt-md font-medium"><?php echo htmlspecialchars($user['name']); ?></h1>
<p class="txt-2 txt-sm capitalize"><?php echo htmlspecialchars($user['role']); ?></p>
</div>
</div>
<div class="flex flex-col gap-1 border-t border-border-light dark:border-border-dark pt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg txt-2 hover:bg-primary/10 hover:txt transition-colors" href="<?php echo url('home'); ?>">
<span class="material-symbols-outlined">home</span>
<p class="text-sm font-medium leading-normal">Back to Site</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-red-500 hover:bg-red-500/10 transition-colors" href="<?php echo url('logout'); ?>">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Log Out</p>
</a>
</div>
</div>
</aside>
<main class="flex-1 flex flex-col">
<header class="flex items-center justify-between whitespace-nowrap border-b border-border-light dark:border-border-dark px-10 py-4 surface sticky top-0 z-10">
<h1 class="txt txt-xl font-bold">Admin Dashboard</h1>
<div class="flex items-center gap-4">
<label class="flex flex-col min-w-40 !h-10 w-80">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-primary flex border-none bg-primary/20 items-center justify-center pl-4 rounded-l-lg border-r-0">
<span class="material-symbols-outlined">search</span>
</div>
<input class="input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg focus:outline-0 focus:ring-0 border-none bg-primary/20 focus:border-none h-full placeholder:text-primary/70 px-4 rounded-l-none border-l-0 pl-2" placeholder="Search features, users, content..." value=""/>
</div>
</label>
<button class="relative btn-ghost p-2">
<span class="material-symbols-outlined">notifications</span>
<div class="absolute top-1.5 right-1.5 size-2.5 rounded-full bg-red-500 border-2 border-card-light dark:border-card-dark"></div>
</button>
</div>
</header>
<div class="flex-1 p-10">
<div class="flex flex-wrap justify-between gap-4 pb-8">
<div class="flex min-w-72 flex-col gap-2">
<p class="txt txt-3xl font-bold">Good Morning, <?php echo htmlspecialchars(explode(' ', $user['name'])[0]); ?></p>
<p class="txt-2">You have <span class="font-bold text-red-500">3 new user feedback submissions</span> today.</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<a href="<?php echo url('meditation'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBIAknC_p64oG5Odo2rWYRLjIrv1XEj7BF3V4x7nSgcLitvcNP5OYzStnbtnre_-GMAWL_JAxrzBHkCNgCa3QcIGMsm9vRLpqN51K5z0lx0SV16TfzlkHk9mZgySo6dkwxfTr8nwYl9Q7vzacPiv3YAJY-P_k5d54XjuWWbgKahHEFj0CUrfHIJKEqUpJPr2VGZOwTtANju5K6JArRWRIJm8D6qcidkWlC4055kGku9LGVzs90FxOz1QoeJ9zZRtl46tpiSu3Im3YU");'></div>
<div>
<p class="txt font-bold">Meditation Programs</p>
<p class="txt-2 txt-sm">15 Active Programs</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('yoga'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDn0PfnPcEKYLS33q971vE1JlizsniuP5Xx9Biw-eUNUJ3BJ11AG1U2_KgapqyLIiW9HIGiMS78XmETQMtf8kA5sAIekoeWha42CsmouWIT-c2yPEvf_bXOAh_sbpoC8-tIy1Rb765GEe-M8b-ExxEyRiP1a5xSFg67w1i9xmM78qXREB1Q37AEpLLoztPhRVOdIoiSRZKZJASCnSQtqft0xq-FoF4GlY2S-_fn4m3lS22WKd4mR4rGrOmj4sw7r4EDyQJuNf-TgGo");'></div>
<div>
<p class="txt font-bold">Yoga Sessions</p>
<p class="txt-2 txt-sm">120 Upcoming Bookings</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('therapy'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBlaXMPyc-fYVsn-Vq5iuQ4ZByzPCviE4crMPkFyMGh6ceouUkOnmCRPhMGTFJCuDypa26_9A7lxST4gRQF3gk__49hqeYb-I9klSgZ24VdbjSgivgcWbrXitqqq9SjaeMp2wBQiFaqjh_SMC-yT64ffPwp9Sklvl8xf-Ng_rpSlY9DMcBIGlQesVVJXYlPV1nfuEZXKvajslHmba2UG3l9YonhQI8wrwLLjTk3vjG-6Me5OYRWQHhVXCvUSEOH3CDQ00F9-Eymkz8");'></div>
<div>
<p class="txt font-bold">Therapy Services</p>
<p class="txt-2 txt-sm">Manage therapists & bookings</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('games'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDiGSJZUrXlu5Bgt83RVrQuD_qAoDoWoi4ouzUpLPW3ym_ijReloBqCycvIvmE-oSY6avXdVkIf4KzvfJyOGPpRJmLDf9psyfRq3RQgKdYx805xnQE6Fm5ySbB3viTMH_gWz-pJNRtu1FgmfsGr840BAMffvOzj5DzNw9wZ6sN03S-sQxIfSldIJowzuYAqkwy4yF9-Brf961LVwe2AM_8jidDWLpGYdgitCc3jbGkcYPm-66pAA_BO3wwSoeXNl3rK0akf62uPRFw");'></div>
<div>
<p class="txt font-bold">Mind Games</p>
<p class="txt-2 txt-sm">Review user engagement</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('community'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDVZ_HELSlLLbJk0noGaxSGAheX3fL76Zo3ww2_y39fbvDlX6XupJzd_5iUCTEh17ThTh7t_FZVi9NL_jFrICkWhbYq9H1eiuUjjXv-CQWCyt-fXegetBPA1lbCm-nvepHfZIE9kg4VddcD-HBZHFYAsvPClUtVNZ9NEa7SKT3gnG4bnfYW6MrXLvP_Z1Wr2IGJlnDIYX6KPH7F7HolPQqtZRQknL9UTtfRV5a3Ptx7PIipeEiZQPzMtUEjGnqq55zRUt6da5k_tSw");'></div>
<div>
<p class="txt font-bold">Community Discussions</p>
<p class="txt-2 txt-sm">3 items in moderation queue</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('questionnaire'); ?>" class="card-feature col gap-3 ring-2 ring-red-500">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDDHiPdUrclID0fu_DFXNj06ggAiK9slhBuiZzATlyKT7xM3IsFx1W5EGtjSJJ5r_jYicSh0qiC8FsqYc4OEpZ_bH9clfarUalx_RITEgq7UztwGOw3aLaH-XuzB9Q2dbdmEjmvtpuDyh3ldRUgEPAiZAX4NSxFrNj9iGYYRJTOwo3x4wiQ-BkEoWGxiLE32GUjsyUREOsB2CrxdxYtcVta0HGHnkc52APhDuc5MjdsDqXgsauSwbAaBnif4Ix0FzNm9QoyMcKj_HA");'></div>
<div>
<p class="txt font-bold">User Feedback</p>
<p class="txt-2 txt-sm"><span class="font-bold text-red-500">3 new submissions</span></p>
</div>
<span class="bg-red-500 text-white w-full text-center py-2 rounded-lg font-bold">Review</span>
</a>
<a href="<?php echo url('admin_donation'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBN2DaBqeOrLG65WKEJJPX7D2hHS6YBRmsaDDTZ3FtPT6YM2IjvLpJDImWK2a18iO1jBJKVaoGxuOCoK-mm-0SyJlmB5Ui6QKbCwrZwuzeiLkOFVn0GZjGKq8thEBeSCOjpTHu27duDbu6GCMf8dhKyNXhQBUAvV4DiMtYt-DTBVtlPAv4GP9trHFVBiLF9p3wxKNWG0ruJXag3X2uIIvTX9QRmJNfq5PCPmW4X5188iYXzNSno4_EPa5W-M6xwO5DxAf32ygskh5M");'></div>
<div>
<p class="txt font-bold">Donations</p>
<p class="txt-2 txt-sm">View financial reports</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
<a href="<?php echo url('staff'); ?>" class="card-feature col gap-3">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDIEy1onZ4qoKDOF63lqc9zKvKDdDgHjFDRmCyMFFuW-oZSPF7GFTPdWxFdlgfws_8QhLx0ymvzP6bjlv7Pz5TYweuPS22uQuIjqj05M6cj7hvNtndo82CIjL4B8ngP7167vJSsyYpyZjCVACT-99ThyTq4RmsZuVcGULW2cVtRnhjtOPZyiU-v7U9JgHUZif-KcRK3-FKVBCxc7btkmDVuXoAwuP17if_CLmn-f4c6y_C0FQ6WTjj3xlnIYJOKOJ20nYGMmXywiXQ");'></div>
<div>
<p class="txt font-bold">User Management</p>
<p class="txt-2 txt-sm">12 new sign-ups this week</p>
</div>
<span class="btn-primary w-full text-center">Manage</span>
</a>
</div>
</div>
</main>
</div>
</div>
</body>
</html>