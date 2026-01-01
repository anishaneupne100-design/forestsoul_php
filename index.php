<?php
// index.php
$title = "ForestSoul - Find Your Inner Peace, Naturally";
include_once 'head.php';
include_once 'components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl" data-alt="A tranquil forest scene with sunbeams filtering through the trees." 
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBXgjMUD2yXjytH2F1BCnM4F0za-WFf-ft7l-xCusCyq37Q8D4ZHINop1lWRsIzPOS1rhUZrbofVVJqxhvu6UmrPzHtU1QVyjKmFVHMd76R1E8GLbI7VdDHcLpeQ_5RQ2Jo5T7DnxmV0JGwsNW_FB2h9TdttHWCWNH90grVhoG3NvGHvORTMnAv0MCqQbKjgXtX1F-RqVcKH-5eKlRsFpbqnvBtMs_gZrNawEuaNj1lY4b7-KlJQ8b_LuTfvwFIpXHRDAxeBauTkhM");'>
                <div class="col gap-sm text-center max-w-2xl">
                    <h1 class="hero-title @[480px]:text-6xl">Find Your Inner Peace, Naturally</h1>
                    <p class="hero-text @[480px]:text-lg">Connecting mental wellness with the healing power of nature.</p>
                </div>
                <div class="row sm:flex-row gap-md mt-8">
                    <?php if (Auth::check()): ?>
                        <button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.questionnaire)">
                            <span class="truncate">Take Assessment</span>
                        </button>
                        <button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.profile)">
                            <span class="truncate">My Profile</span>
                        </button>
                    <?php else: ?>
                        <button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.signup)">
                            <span class="truncate">Get Started</span>
                        </button>
                        <button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.login)">
                            <span class="truncate">Log In</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section">
        <div class="text-center px-4 mb-12">
            <h2 class="txt-3xl txt">Your Path to Wellness</h2>
            <p class="txt-2 mt-3 max-w-2xl mx-auto">Explore our comprehensive suite of tools designed to nurture your mind, body, and connection to nature.</p>
        </div>
        <div class="grid-3 p-4">
            <a class="card-feature group" href="<?php echo url('meditation/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">self_improvement</span>
                <div class="col gap-1">
                    <h3 class="title">Meditation</h3>
                    <p class="subtitle">Guided sessions to calm your mind and find focus in the present moment.</p>
                </div>
            </a>
            <a class="card-feature group" href="<?php echo url('yoga/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">fitbit_yoga</span>
                <div class="col gap-1">
                    <h3 class="title">Yoga</h3>
                    <p class="subtitle">Flows for every level to connect body and soul with mindful movement.</p>
                </div>
            </a>
            <a class="card-feature group" href="<?php echo url('therapy/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">spa</span>
                <div class="col gap-1">
                    <h3 class="title">Therapy</h3>
                    <p class="subtitle">Professional support tailored to your journey of mental healing.</p>
                </div>
            </a>
            <a class="card-feature group" href="<?php echo url('community/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">groups</span>
                <div class="col gap-1">
                    <h3 class="title">Community</h3>
                    <p class="subtitle">Join a safe space of like-minded individuals sharing their growth.</p>
                </div>
            </a>
            <a class="card-feature group" href="<?php echo url('games/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">psychology</span>
                <div class="col gap-1">
                    <h3 class="title">Mind Games</h3>
                    <p class="subtitle">Engaging puzzles to sharpen your cognitive skills and focus.</p>
                </div>
            </a>
            <a class="card-feature group" href="<?php echo url('donation/'); ?>">
                <span class="material-symbols-outlined icon-lg group-hover:scale-110 transition-transform">forest</span>
                <div class="col gap-1">
                    <h3 class="title">Donate to Nature</h3>
                    <p class="subtitle">Support reforestation efforts and heal the planet as you heal yourself.</p>
                </div>
            </a>
        </div>
    </section>

    <!-- How It Works -->
    <section class="section py-16 surface">
        <h2 class="section-title mb-10">How It Works</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-xl p-4 text-center max-w-6xl mx-auto">
            <div class="col items-center gap-md">
                <div class="icon-circle">
                    <span class="material-symbols-outlined text-4xl">explore</span>
                </div>
                <h3 class="txt-lg txt">1. Explore</h3>
                <p class="txt-2">Browse our diverse range of meditation, yoga, and therapy sessions tailored to your needs.</p>
            </div>
            <div class="col items-center gap-md">
                <div class="icon-circle">
                    <span class="material-symbols-outlined text-4xl">connect_without_contact</span>
                </div>
                <h3 class="txt-lg txt">2. Connect</h3>
                <p class="txt-2">Find the right guide or therapist for your journey and join our supportive community.</p>
            </div>
            <div class="col items-center gap-md">
                <div class="icon-circle">
                    <span class="material-symbols-outlined text-4xl">psychology</span>
                </div>
                <h3 class="txt-lg txt">3. Grow</h3>
                <p class="txt-2">Engage in practices that nurture your mind, body, and soul for lasting peace.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section">
        <h2 class="section-title pb-10">Voices of Our Community</h2>
        <div class="grid-2 p-4 max-w-5xl mx-auto">
            <div class="card bg-primary/5 border-primary/10">
                <p class="txt-2 italic text-lg pb-4">"ForestSoul has been a sanctuary for me. The guided meditations helped me find calm during a stressful time. I'm so grateful for this platform."</p>
                <div class="row items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-primary/20 center">S</div>
                    <p class="font-bold txt">Sarah J.</p>
                </div>
            </div>
            <div class="card bg-primary/5 border-primary/10">
                <p class="txt-2 italic text-lg pb-4">"Connecting with a therapist through this site was seamless and comfortable. The focus on nature-based wellness really resonates with me."</p>
                <div class="row items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-primary/20 center">M</div>
                    <p class="font-bold txt">Michael B.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section p-4">
        <div class="col center gap-lg rounded-3xl bg-primary/20 border border-primary/30 p-12 text-center max-w-4xl mx-auto">
            <h2 class="txt-4xl txt font-black">Begin Your Journey to a Calmer You</h2>
            <p class="max-w-lg txt-2 text-lg">Join the ForestSoul community today and take the first step towards a more peaceful and balanced life.</p>
            <div class="flex gap-4 mt-4">
                <?php if (Auth::check()): ?>
                    <button class="btn-primary btn-lg px-10" onclick="gotoPage(ROUTES.meditation)">
                        <span class="truncate">Start Meditation</span>
                    </button>
                <?php else: ?>
                    <button class="btn-primary btn-lg px-10" onclick="gotoPage(ROUTES.signup)">
                        <span class="truncate">Join for Free</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>