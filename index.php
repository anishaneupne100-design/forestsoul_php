<?php
$title = "ForestSoul - Find Your Inner Peace, Naturally";
include_once 'head.php';

$isLoggedIn = Auth::check();
$user = Auth::user();
?>


<body class="body">
<div class="page">
<div class="layout">
<div class="container-main">
<div class="content">

<?php include_once './navbar/index.php'; ?>

<main class="flex-grow">
<section class="section @container">
<div class="@[480px]:p-4">
<div class="hero @[480px]:rounded-xl" data-alt="A tranquil forest scene with sunbeams filtering through the trees." style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBXgjMUD2yXjytH2F1BCnM4F0za-WFf-ft7l-xCusCyq37Q8D4ZHINop1lWRsIzPOS1rhUZrbofVVJqxhvu6UmrPzHtU1QVyjKmFVHMd76R1E8GLbI7VdDHcLpeQ_5RQ2Jo5T7DnxmV0JGwsNW_FB2h9TdttHWCWNH90grVhoG3NvGHvORTMnAv0MCqQbKjgXtX1F-RqVcKH-5eKlRsFpbqnvBtMs_gZrNawEuaNj1lY4b7-KlJQ8b_LuTfvwFIpXHRDAxeBauTkhM");'>
<div class="col gap-sm text-center max-w-2xl">
<h1 class="hero-title @[480px]:text-5xl">Find Your Inner Peace, Naturally</h1>
<p class="hero-text @[480px]:text-base">Connecting mental wellness with the healing power of nature.</p>
</div>
<div class="col sm:flex-row gap-md">
<?php if ($isLoggedIn): ?>
<button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.QUESTIONNAIRE)">
<span class="truncate">Take Assessment</span>
</button>
<button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.PROFILE)">
<span class="truncate">My Profile</span>
</button>
<?php else: ?>
<button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.SIGNUP)">
<span class="truncate">Get Started</span>
</button>
<button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.LOGIN)">
<span class="truncate">Log In</span>
</button>
<?php endif; ?>
</div>
</div>
</div>
</section>
<section class="section">
<div class="text-center px-4">
<h2 class="txt txt-3xl">Your Path to Wellness</h2>
<p class="txt-2 mt-2 max-w-2xl mx-auto">Explore our comprehensive suite of tools designed to nurture your mind, body, and connection to nature.</p>
</div>
<div class="grid-3 p-4 mt-8">
<a class="card-feature" href="<?php echo url('meditation'); ?>">
<span class="material-symbols-outlined icon-lg">self_improvement</span>
<div class="col gap-1">
<h3 class="title">Meditation</h3>
<p class="subtitle">Guided sessions to calm your mind and find focus.</p>
</div>
</a>
<a class="card-feature" href="<?php echo url('yoga'); ?>">
<span class="material-symbols-outlined icon-lg">fitbit_yoga</span>
<div class="col gap-1">
<h3 class="title">Yoga</h3>
<p class="subtitle">Flows for every level to connect body and soul.</p>
</div>
</a>
<a class="card-feature" href="<?php echo url('community'); ?>">
<span class="material-symbols-outlined icon-lg">groups</span>
<div class="col gap-1">
<h3 class="title">Community</h3>
<p class="subtitle">Connect with others on the same journey.</p>
</div>
</a>
<a class="card-feature" href="<?php echo url('games'); ?>">
<span class="material-symbols-outlined icon-lg">psychology</span>
<div class="col gap-1">
<h3 class="title">Mind Games</h3>
<p class="subtitle">Engaging puzzles to sharpen your cognitive skills.</p>
</div>
</a>
<a class="card-feature" href="<?php echo url('questionnaire'); ?>">
<span class="material-symbols-outlined icon-lg">quiz</span>
<div class="col gap-1">
<h3 class="title">Questionnaires</h3>
<p class="subtitle">Gain insights into your mental well-being.</p>
</div>
</a>
<a class="card-feature" href="<?php echo url('donation'); ?>">
<span class="material-symbols-outlined icon-lg">forest</span>
<div class="col gap-1">
<h3 class="title">Donate to Nature</h3>
<p class="subtitle">Support reforestation and heal the planet.</p>
</div>
</a>
</div>
</section>
<section class="section">
<h2 class="section-title">How It Works</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-xl p-4 text-center">
<div class="col items-center gap-md">
<div class="icon-circle">
<span class="material-symbols-outlined text-4xl">explore</span>
</div>
<h3 class="txt-lg txt">1. Explore</h3>
<p class="txt-2">Browse our diverse range of meditation, yoga, and therapy sessions.</p>
</div>
<div class="col items-center gap-md">
<div class="icon-circle">
<span class="material-symbols-outlined text-4xl">connect_without_contact</span>
</div>
<h3 class="txt-lg txt">2. Connect</h3>
<p class="txt-2">Find the right guide or therapist for your journey and book a session.</p>
</div>
<div class="col items-center gap-md">
<div class="icon-circle">
<span class="material-symbols-outlined text-4xl">psychology</span>
</div>
<h3 class="txt-lg txt">3. Grow</h3>
<p class="txt-2">Engage in practices that nurture your mind, body, and soul.</p>
</div>
</div>
</section>
<section class="section">
<h2 class="section-title pb-5">Voices of Our Community</h2>
<div class="grid-2 p-4">
<div class="card">
<p class="txt-2 italic">"ForestSoul has been a sanctuary for me. The guided meditations helped me find calm during a stressful time. I'm so grateful for this platform."</p>
<p class="font-bold txt">- Sarah J.</p>
</div>
<div class="card">
<p class="txt-2 italic">"Connecting with a therapist through this site was seamless and comfortable. The focus on nature-based wellness really resonates with me."</p>
<p class="font-bold txt">- Michael B.</p>
</div>
</div>
<div class="text-center mt-4">
<a href="<?php echo url('community'); ?>" class="btn-secondary mx-auto gap-sm inline-flex">
<span class="truncate">Share Your Story</span>
<span class="material-symbols-outlined">add_comment</span>
</a>
</div>
</section>
<section class="section p-4">
<div class="col center gap-lg rounded-xl surface p-10 text-center">
<h2 class="txt-3xl txt">Begin Your Journey to a Calmer You</h2>
<p class="max-w-md txt-2">Join the ForestSoul community today and take the first step towards a more peaceful and balanced life.</p>
<?php if ($isLoggedIn): ?>
<button class="btn-primary btn-lg" onclick="gotoPage(ROUTES.MEDITATION)">
<span class="truncate">Start Meditation</span>
</button>
<?php else: ?>
<button class="btn-primary btn-lg" onclick="gotoPage(ROUTES.SIGNUP)">
<span class="truncate">Join for Free</span>
</button>
<?php endif; ?>
</div>
</section>
</main>

<?php include_once './components/footer.php'; ?>


</div>
</div>
</div>
</div>

</body></html>