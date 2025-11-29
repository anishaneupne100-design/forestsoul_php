<?php
$title = "Gentle Hatha Flow - ForestSoul";
include '../head.php';
?>

<body class="body">
<div class="page">
<div class="layout">
<div class="container-main">
<div class="content">

<?php include '../navbar/index.php'; ?>

<main class="col gap-xl mt-5">
<!-- Breadcrumbs -->
<div class="row gap-2 px-4">
<a class="txt-sm txt-2 hover:text-primary" href="<?php echo url('home'); ?>">Home</a>
<span class="txt-sm txt-2">/</span>
<a class="txt-sm txt-2 hover:text-primary" href="<?php echo url('yoga'); ?>">Yoga</a>
<span class="txt-sm txt-2">/</span>
<span class="txt-sm txt">Gentle Hatha Flow</span>
</div>

<!-- HeroSection Component -->
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4" data-alt="A person in a calm yoga pose in a serene, natural forest setting." style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDSXGi3RspWEC-WEfd0aGCPyl-B3vBNk20XOts1JXP3Ax0t0TVWbPMDtmSBB6p1soGR7X-ZK4xgvPKFAduZOMc_uP5paGgmttG5xsWzjHfwRgmjr9T7RMfAnsLh3b7py_ctE23K7fdEjHFbaEVfsZu2c5v6iwGz5hnaRMUM1-p7Sdh3pDa-TcUzhOsqg2eZazoyWHYmMMN7yhQKGO75J3Gtg3HOXJhB9jhuVzMbLiCsRopzn3VweyMXLeNzu7mbdWh0AgLLcjKYjsI");'>
<div class="flex flex-col gap-4 text-center">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">Gentle Hatha Flow</h1>
<h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal max-w-lg mx-auto">Find balance and peace through gentle, mindful movement. Reconnect with your body and calm your mind in this soothing session.</h2>
</div>
<div class="flex flex-col sm:flex-row items-center gap-4">
<button class="flex w-full sm:w-auto min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-[#11221c] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Join Session</span>
</button>
<a class="flex items-center gap-2 text-white text-sm font-medium hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-base">favorite_border</span>
                                            Add to Favorites
                                        </a>
</div>
</div>
</div>
</div>
<!-- Stats Component -->
<div class="flex flex-col sm:flex-row flex-wrap gap-4 p-4">
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#326755]">
<p class="text-white text-base font-medium leading-normal">Duration</p>
<p class="text-white tracking-light text-2xl font-bold leading-tight">45 min</p>
</div>
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#326755]">
<p class="text-white text-base font-medium leading-normal">Level</p>
<p class="text-white tracking-light text-2xl font-bold leading-tight">Beginner</p>
</div>
<div class="flex min-w-[158px] flex-1 flex-col gap-2 rounded-xl p-6 border border-[#326755]">
<p class="text-white text-base font-medium leading-normal">Focus</p>
<p class="text-white tracking-light text-2xl font-bold leading-tight">Flexibility</p>
</div>
</div>
<!-- Tabs Component -->
<div class="pb-3">
<div class="flex border-b border-[#326755] px-4 gap-8">
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-primary text-white pb-[13px] pt-4" href="#">
<p class="text-white text-sm font-bold leading-normal tracking-[0.015em]">Session Overview</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#92c9b7] pb-[13px] pt-4" href="#">
<p class="text-[#92c9b7] text-sm font-bold leading-normal tracking-[0.015em]">Pose Guide</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-[#92c9b7] pb-[13px] pt-4" href="#">
<p class="text-[#92c9b7] text-sm font-bold leading-normal tracking-[0.015em]">Benefits</p>
</a>
</div>
</div>
<!-- Tab Content Section -->
<div class="p-4 flex flex-col gap-8">
<!-- Session Overview Content -->
<div class="flex flex-col gap-6">
<div class="flex flex-col gap-2">
<h3 class="text-2xl font-bold text-white">About this Session</h3>
<p class="text-[#92c9b7] leading-relaxed">This Gentle Hatha Flow is designed to create a peaceful and nurturing space for you to connect with your body and breath. We'll move through a series of foundational yoga poses at a slow, deliberate pace, focusing on proper alignment and mindful transitions. This session is perfect for beginners or anyone looking to unwind, release tension, and cultivate a sense of inner calm. Expect to leave feeling refreshed, centered, and more flexible.</p>
</div>
<div class="flex flex-col gap-2">
<h3 class="text-xl font-bold text-white">What You'll Need</h3>
<ul class="list-disc list-inside text-[#92c9b7] space-y-1">
<li>A comfortable yoga mat</li>
<li>Wear clothing that allows for easy movement</li>
<li>Optional: A yoga block or cushion for support</li>
<li>An open mind and a willingness to relax</li>
</ul>
</div>
<div class="flex flex-wrap gap-2">
<span class="inline-block bg-[#23483c] text-primary rounded-full px-3 py-1 text-sm font-semibold">#Relaxation</span>
<span class="inline-block bg-[#23483c] text-primary rounded-full px-3 py-1 text-sm font-semibold">#Mindfulness</span>
<span class="inline-block bg-[#23483c] text-primary rounded-full px-3 py-1 text-sm font-semibold">#Flexibility</span>
</div>
</div>
</div>
<!-- Accordion for Pose Guide (Generated Component) -->
<div class="px-4 flex flex-col gap-4">
<h3 class="text-2xl font-bold text-white mb-2">Pose Guide</h3>
<details class="group bg-[#1a352a] rounded-lg p-4 cursor-pointer">
<summary class="flex items-center justify-between font-medium text-white">
<span>Mountain Pose (Tadasana)</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-4 text-[#92c9b7] leading-relaxed">
<p>Stand tall with feet together, grounding through all four corners of your feet. Engage your leg muscles, lengthen your spine, and relax your shoulders down and back. This pose improves posture and creates a sense of stability.</p>
</div>
</details>
<details class="group bg-[#1a352a] rounded-lg p-4 cursor-pointer">
<summary class="flex items-center justify-between font-medium text-white">
<span>Cat-Cow Stretch (Marjaryasana-Bitilasana)</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-4 text-[#92c9b7] leading-relaxed">
<p>Start on your hands and knees. Inhale as you drop your belly and look up (Cow), and exhale as you round your spine and tuck your chin (Cat). This gentle flow warms up the spine and relieves back tension.</p>
</div>
</details>
<details class="group bg-[#1a352a] rounded-lg p-4 cursor-pointer">
<summary class="flex items-center justify-between font-medium text-white">
<span>Child's Pose (Balasana)</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="mt-4 text-[#92c9b7] leading-relaxed">
<p>From hands and knees, sit back on your heels and fold forward, resting your forehead on the mat. This is a restorative pose that gently stretches the hips and back while calming the mind.</p>
</div>
</details>
</div>
<!-- Testimonials Section (Generated Component) -->
<div class="p-4 flex flex-col gap-6">
<h3 class="text-2xl font-bold text-white">What Others Are Saying</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="bg-[#1a352a] p-6 rounded-lg border border-[#326755]">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
</div>
<p class="text-[#92c9b7] italic mb-4">"Exactly what I needed after a stressful week. The pacing was perfect for a beginner, and I felt so calm and centered afterwards."</p>
<p class="text-white font-bold">- Sarah J.</p>
</div>
<div class="bg-[#1a352a] p-6 rounded-lg border border-[#326755]">
<div class="flex items-center gap-2 mb-2">
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star</span>
<span class="material-symbols-outlined text-primary">star_half</span>
</div>
<p class="text-[#92c9b7] italic mb-4">"A wonderfully gentle session that still provides a great stretch. The instructor's voice is incredibly soothing. Highly recommend!"</p>
<p class="text-white font-bold">- Mark T.</p>
</div>
</div>
</div>
</main>
</div>
</div>
</div>
</div>

<?php include '../components/footer.php'; ?>

</body>
</html>