<?php
// Protect this route - require authentication
require_once __DIR__ . '/../backend/middleware/auth.php';

$title = "Pre-Therapy Self-Questionnaire";
include '../head.php';

$user = Auth::user();
?>
<body class="body">
<div class="page">
<div class="layout">
<div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
<div class="content">
<header class="header between">
<div class="row gap-md txt">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_319)">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z" fill="currentColor"></path>
</g>
<defs>
<clippath id="clip0_6_319"><rect fill="white" height="48" width="48"></rect></clippath>
</defs>
</svg>
</div>
<h2 class="txt txt-lg">ForestSoul</h2>
</div>
<div class="flex flex-1 justify-end row gap-lg">
<a class="nav-link hidden sm:block" href="#">Dashboard</a>
<button class="btn-ghost rounded-xl h-10 px-2.5">
<span class="material-symbols-outlined text-primary" style="font-size: 20px;">notifications</span>
</button>
<div class="avatar" data-alt="User profile picture with abstract green circular pattern" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBuu0qJ2LS5gR9OGIGylDUmyrGSQh86iLaI_xrXyo6VNBR0xSVDsz_mkMHJlDgyeCqIIN7qIyuDwsnJmgHe-GUrUnkO6d4yun6XaUGZmu3mfvY164-6zCDM06mfjaNne5J7_re9Wo2ROp0HrezyTl5gNyB7F-i-xfHxUneHEcFl8_-gAqOahY6NpeIezMIdHD89iEJTZK9-6xaulmW2GJRgqT1hDaDLkGJcq_xKHf_QFgkGNSi9p3-mkYUPShH5xuMgxNIugF-L39A");'></div>
</div>
</header>
<main class="col gap-xl py-10 px-4 sm:px-0">
<div class="col gap-lg">
<div class="col gap-sm">
<div class="between"><p class="txt txt-md font-medium">Step 1 of 4: Well-being</p></div>
<div class="rounded bg-white/10 dark:bg-[#326744]"><div class="h-2 rounded bg-primary" style="width: 25%;"></div></div>
</div>
<div class="between flex-wrap gap-sm">
<div class="col gap-sm min-w-72">
<p class="txt txt-hero">A Moment for You</p>
<p class="txt-2">This confidential questionnaire is a space for you to reflect. Your responses will help us tailor your therapy experience to your needs. Please answer openly and honestly.</p>
</div>
</div>
</div>
<div class="card col gap-xl p-6 sm:p-8">
<div class="col gap-lg">
<h2 class="heading border-b border-white/10 dark:border-border-dark pb-4">General Well-being</h2>
<div class="@container">
<div class="relative between flex-col @[480px]:flex-row gap-md p-4">
<p class="txt txt-md font-medium w-full @[480px]:w-1/2">On a scale of 1 to 10, how would you rate your overall life satisfaction this past week?</p>
<div class="row gap-md h-4 w-full @[480px]:w-1/2">
<div class="flex h-1 flex-1 rounded-sm bg-white/10 dark:bg-[#326744]">
<div class="h-full rounded-sm bg-primary" style="width: 67%;"></div>
<div class="relative"><div class="absolute -left-2 -top-1.5 size-4 rounded-full bg-primary border-2 border-background-dark"></div></div>
</div>
<p class="txt font-bold">7</p>
</div>
</div>
</div>
<div class="@container">
<div class="relative between flex-col @[480px]:flex-row gap-md p-4">
<p class="txt txt-md font-medium w-full @[480px]:w-1/2">How would you rate your sleep quality over the past week?</p>
<div class="row gap-md h-4 w-full @[480px]:w-1/2">
<div class="flex h-1 flex-1 rounded-sm bg-white/10 dark:bg-[#326744]">
<div class="h-full rounded-sm bg-primary" style="width: 44%;"></div>
<div class="relative"><div class="absolute -left-2 -top-1.5 size-4 rounded-full bg-primary border-2 border-background-dark"></div></div>
</div>
<p class="txt font-bold">5</p>
</div>
</div>
</div>
<div class="@container">
<div class="relative between flex-col @[480px]:flex-row gap-md p-4">
<p class="txt txt-md font-medium w-full @[480px]:w-1/2">How have your energy levels been recently?</p>
<div class="row gap-md h-4 w-full @[480px]:w-1/2">
<div class="flex h-1 flex-1 rounded-sm bg-white/10 dark:bg-[#326744]">
<div class="h-full rounded-sm bg-primary" style="width: 33%;"></div>
<div class="relative"><div class="absolute -left-2 -top-1.5 size-4 rounded-full bg-primary border-2 border-background-dark"></div></div>
</div>
<p class="txt font-bold">4</p>
</div>
</div>
</div>
</div>
<div class="col gap-lg">
<h2 class="heading border-b border-white/10 dark:border-border-dark pb-4">Emotional State</h2>
<div class="p-4 col gap-md">
<p class="txt txt-md font-medium">Which emotions have you felt most strongly this week? (Select all that apply)</p>
<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-sm">
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Anxious</span>
</label>
<label class="checkbox-card">
<input checked="" class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Sad</span>
</label>
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Happy</span>
</label>
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Angry</span>
</label>
<label class="checkbox-card">
<input checked="" class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Overwhelmed</span>
</label>
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Hopeful</span>
</label>
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Numb</span>
</label>
<label class="checkbox-card">
<input class="form-checkbox rounded-md bg-white/10 dark:bg-black/20 border-white/20 dark:border-white/30 text-primary focus:ring-primary/50" type="checkbox"/>
<span class="txt-2 txt-sm">Content</span>
</label>
</div>
</div>
</div>
<div class="col gap-lg">
<h2 class="heading border-b border-white/10 dark:border-border-dark pb-4">Goals &amp; Expectations</h2>
<div class="p-4 col gap-md">
<label class="txt txt-md font-medium" for="therapy-goals">What do you hope to achieve from therapy?</label>
<textarea class="input" id="therapy-goals" name="therapy-goals" placeholder="Feel free to write about your goals, what you'd like to change, or any questions you have..." rows="5"></textarea>
</div>
</div>
</div>
<div class="between mt-6">
<button class="btn-ghost btn-lg">Back</button>
<button class="btn-primary btn-lg gap-2">
<span>Next Step</span>
<span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
<div class="text-center mt-4">
<a class="txt-sm txt-2 hover:text-white underline row center gap-1" href="#">
<span class="material-symbols-outlined" style="font-size: 16px;">lock</span>
<span>Your privacy is important to us. Learn how we protect your data.</span>
</a>
</div>
</main>
</div>
</div>
</div>
</div>
</body></html>