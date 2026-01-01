<?php
// therapy/couple therapy.php
$title = "Couples Therapy - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 28, 0.4) 0%, rgba(16, 34, 28, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB6EoRs_8V7ap4V0W6i_dqMNibyYjDkpgBd41ZkIBZFZ3HlYzjchQwO1nhviSKa_osOeY5Zcbao1HE7M_Li-kKQ68JrdwizlXfAJqmd4g7RJDGYJ2LUV7ilpuD5OU2ifFBC4Cr-iqnpwbf81FHiGBat2-cMHEuhwCenHUUq3Vu7Qgp-YAWONnS08C06A_CZTOYY6euwGPB-bmzTWRzV-0Tygej5iRCvGUSFllvDfvfiTnfL7M1u8TdEVNDTLExyGIiZerijqE7YD0k");'>
                <div class="col gap-md max-w-2xl px-4">
                    <h1 class="hero-title @[480px]:text-5xl">Reconnect & Grow Together</h1>
                    <p class="hero-text @[480px]:text-lg">Couples therapy provides a supportive environment to navigate challenges, improve communication, and deepen your emotional bond.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="requireAuth(() => gotoPage(ROUTES.therapy))">
                    <span class="truncate">Book a Session</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="section px-4 max-w-5xl mx-auto py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="col gap-6">
                <h2 class="txt-3xl font-bold">Our Objectives</h2>
                <div class="col gap-4">
                    <div class="row gap-4 items-start">
                        <div class="size-8 rounded-full bg-primary/20 center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-sm">forum</span>
                        </div>
                        <div class="col">
                            <h3 class="font-bold">Improve Communication</h3>
                            <p class="txt-2 txt-sm">Learn to express yourselves openly and listen with empathy.</p>
                        </div>
                    </div>
                    <div class="row gap-4 items-start">
                        <div class="size-8 rounded-full bg-primary/20 center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-sm">favorite</span>
                        </div>
                        <div class="col">
                            <h3 class="font-bold">Rebuild Trust</h3>
                            <p class="txt-2 txt-sm">Work through past hurts and create a foundation of security.</p>
                        </div>
                    </div>
                    <div class="row gap-4 items-start">
                        <div class="size-8 rounded-full bg-primary/20 center flex-shrink-0">
                            <span class="material-symbols-outlined text-primary text-sm">sync_alt</span>
                        </div>
                        <div class="col">
                            <h3 class="font-bold">Navigate Conflict</h3>
                            <p class="txt-2 txt-sm">Develop constructive strategies for resolving disagreements.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img-portrait rounded-2xl overflow-hidden shadow-2xl">
                <img src="https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?auto=format&fit=crop&w=800&q=80" alt="Therapy Session" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="section px-4 py-20 bg-primary/5">
        <div class="max-w-3xl mx-auto text-center col gap-6">
            <span class="material-symbols-outlined text-primary text-5xl">format_quote</span>
            <p class="txt-xl italic">"Therapy helped us find our way back to each other. We learned to listen and communicate in ways we never had before. It truly saved our relationship."</p>
            <p class="font-bold txt-primary">— J & M, partners for 8 years</p>
        </div>
    </section>
</main>

<?php put_footer(); ?>