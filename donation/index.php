<?php
// donation/index.php
$title = "Donate - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- HeroSection -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                data-alt="A lush, green forest with sunlight filtering through the canopy of tall trees."
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBrsuDo5q1UFFZUIV_kaaP1cbmXWuP3gMo7w96XM8DWioyxDo6FgkAS67ys521cGe_EZnM0mG8FeynSTYmZbnlMKDcx7A4LTvJl7j0zqZB2I-fHCGEsse3QXzBTRk5K_rFBdot3H7OMzrg3oZl4yMi4IyLnrm6T2eZcgOEiL0s_gcf0xOC5s8wyioybSj1sYKRu05EqyKJoIKDnUoxG4NkQJATGYIBlcDo6iLyjkH4lGPLNcXxaJQNe5lx54dT_CKOguCKY-K2TR40");'>
                <div class="col gap-md max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Heal Yourself, Heal the Planet</h1>
                    <p class="hero-text @[480px]:text-base">Join the ForestSoul initiative to restore nature's balance. Your contribution helps plant trees and protect wildlife.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('donate-form')">
                    <span class="truncate">Donate Now</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="section py-16 px-4">
        <div class="text-center mb-12">
            <h2 class="txt-3xl txt">Your Impact in Action</h2>
            <p class="txt-2 mt-3 max-w-2xl mx-auto">Every donation contributes directly to tangible change for our planet.</p>
        </div>
        <div class="grid-3">
            <div class="card bg-surface-dark/50 border-white/5 text-center">
                <span class="material-symbols-outlined text-4xl text-primary mb-4">forest</span>
                <h3 class="txt-lg font-bold mb-2">Plant a Tree</h3>
                <p class="txt-2 txt-sm">Your $10 plants a sapling in a protected forest, helping to combat climate change.</p>
            </div>
            <div class="card bg-surface-dark/50 border-white/5 text-center">
                <span class="material-symbols-outlined text-4xl text-primary mb-4">pets</span>
                <h3 class="txt-lg font-bold mb-2">Protect Wildlife</h3>
                <p class="txt-2 txt-sm">Contributions help fund sanctuaries and initiatives to protect endangered species.</p>
            </div>
            <div class="card bg-surface-dark/50 border-white/5 text-center">
                <span class="material-symbols-outlined text-4xl text-primary mb-4">public</span>
                <h3 class="txt-lg font-bold mb-2">Conservation</h3>
                <p class="txt-2 txt-sm">Support our global partners in their mission to preserve natural habitats.</p>
            </div>
        </div>
    </section>

    <!-- Donation Form -->
    <section class="section px-4 pb-20" id="donate-form">
        <div class="card bg-surface-dark/30 border-white/5 max-w-3xl mx-auto p-8 md:p-12">
            <div class="text-center mb-10">
                <h2 class="txt-3xl txt">Make a Difference Today</h2>
                <p class="txt-2">Choose an amount or enter a custom one.</p>
            </div>
            
            <div class="col gap-lg">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <button class="btn-ghost border-2 border-border-light/10 h-14 txt-lg focus:border-primary focus:bg-primary/10 transition-all">$10</button>
                    <button class="btn-ghost border-2 border-border-light/10 h-14 txt-lg focus:border-primary focus:bg-primary/10 transition-all">$25</button>
                    <button class="btn-primary h-14 txt-lg">$50</button>
                    <button class="btn-ghost border-2 border-border-light/10 h-14 txt-lg focus:border-primary focus:bg-primary/10 transition-all">$100</button>
                </div>

                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 txt-2 font-bold">$</span>
                    <input class="input h-14 pl-10 border-2 border-border-light/10" placeholder="Custom Amount" type="number" />
                </div>

                <div class="col md:row gap-4">
                    <button class="btn-primary btn-lg flex-1 gap-2" onclick="showToast('Thank you for your generosity! Payment system coming soon.', 'success')">
                        <span>Donate Now</span>
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                    <button class="btn-ghost btn-lg flex-1 gap-2 border border-white/10" onclick="showToast('Thank you! Monthly support options coming soon.', 'info')">
                        <span class="material-symbols-outlined text-sm">sync</span>
                        <span>Monthly Support</span>
                    </button>
                </div>
                
                <div class="row center gap-2 txt-2 txt-xs mt-4">
                    <span class="material-symbols-outlined text-xs">lock</span>
                    <span>Secure payments handled by Stripe</span>
                </div>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>