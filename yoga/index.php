<?php
$title = "Yoga Classes - ForestSoul";
include '../head.php';
?>



<body class="body">
<div class="page">
<div class="layout">
<div class="container-main">
<div class="content">

<?php include '../navbar/index.php'; ?>

<!-- HeroSection -->
<main class="col gap-xl mt-5">
<div class="@container">
<div class="@[480px]:p-4">
<div class="hero @[480px]:rounded-xl" data-alt="A serene landscape with a person practicing yoga at sunrise, with misty mountains in the background." style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDN5oQVvWqDqcBJcaCYOpVwoIBAUu-1ZqBhb_xKu3X76vFbBGtI6fyMK2yhczp_nHdYcxZSsyZBnBh85xYFUCgo9dQFrXPcEm0O_nSD86l5OHOu-Kde4tShHE_rF8m7Wj4bhAGtqkX3NdSZ5zWweoB1d7MO2uroh2cwpcgQ8AiIvB5PO3j-59XJW-rXJGc5OGlm730E-6e8MPfrPGxQTeQ_0vCMcBlCvMegvwJ7ZFHRJv3-8Wxjl31k6Vlvbu0OL6RT9-mDe54-qn0");'>
<div class="col gap-sm text-center">
<h1 class="hero-title @[480px]:text-5xl">Find Your Inner Flow</h1>
<h2 class="hero-text @[480px]:text-base">Discover peace and balance through our diverse range of yoga sessions, designed for every body and every soul.</h2>
</div>
<button class="btn-primary @[480px]:btn-lg">
<span class="truncate">Explore Classes</span>
</button>
</div>
</div>
</div>
<!-- Chips -->
<div class="row gap-3 p-3 overflow-x-auto">
<button class="chip">
<p>Yoga Style</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="chip">
<p>Difficulty</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="chip">
<p>Instructor</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="chip">
<p>Duration</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="chip">
<p>Live/On-Demand</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
</div>
<!-- ImageGrid -->
<div class="grid-auto p-4">
<a href="<?php echo url('yoga_gentle_hatha'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Sunrise Vinyasa Flow</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Anya Sharma</p>
<p class="text-[#92c9a4] txt-sm">Beginner | 60 min</p>
</div>
</a>
<a href="<?php echo url('yoga_gentle_hatha'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Gentle Hatha &amp; Meditation</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Leo Chen</p>
<p class="text-[#92c9a4] txt-sm">Beginner | 45 min</p>
</div>
</a>
<a href="<?php echo url('yoga_restorative'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Restorative Yin Yoga</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Sofia Rossi</p>
<p class="text-[#92c9a4] txt-sm">All Levels | 75 min</p>
</div>
</a>
<a href="<?php echo url('yoga_power_vinyasa'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Power Yoga Burn</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Marcus Cole</p>
<p class="text-[#92c9a4] txt-sm">Advanced | 60 min</p>
</div>
</a>
<a href="<?php echo url('yoga_gentle_hatha'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Mindful Afternoon Stretch</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Anya Sharma</p>
<p class="text-[#92c9a4] txt-sm">All Levels | 30 min</p>
</div>
</a>
<a href="<?php echo url('yoga_power_vinyasa'); ?>" class="col gap-3 pb-3 hover:opacity-80 transition-opacity">
<div>
<p class="text-white txt-md">Core Strength Fusion</p>
<p class="text-[#92c9a4] txt-sm">Instructor: Leo Chen</p>
<p class="text-[#92c9a4] txt-sm">Intermediate | 45 min</p>
</div>
</div>
</div>
<!-- SectionHeader -->
<h2 class="text-white heading px-4 pb-3 pt-5">Meet Our Instructors</h2>
<!-- Instructor Spotlight Section -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-lg p-4">
<div class="col items-center text-center gap-3">
<div>
<p class="text-white txt-md">Anya Sharma</p>
<p class="text-[#92c9a4] txt-sm">Vinyasa &amp; Flow</p>
</div>
</div>
<div class="col items-center text-center gap-3">
<div>
<p class="text-white txt-md">Leo Chen</p>
<p class="text-[#92c9a4] txt-sm">Hatha &amp; Meditation</p>
</div>
</div>
<div class="col items-center text-center gap-3">
<div>
<p class="text-white txt-md">Sofia Rossi</p>
<p class="text-[#92c9a4] txt-sm">Yin &amp; Restorative</p>
</div>
</div>
<div class="col items-center text-center gap-3">
<div>
<p class="text-white txt-md">Marcus Cole</p>
<p class="text-[#92c9a4] txt-sm">Power &amp; Strength</p>
</div>
</div>
</div>
</main>
</div>
</div>
</div>
</div>
</body>
</html>
