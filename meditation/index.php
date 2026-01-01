<?php
// meditation/index.php
$title = "Meditation Programs - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- HeroSection -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                data-alt="A tranquil, misty forest with tall green trees and soft light filtering through the canopy."
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAd2KkCvBLG_jMvl3m5NMAuls_e-ZEbtIOHc-57dQJuMQd1qmAvfJzz_0n7kK5FleViOyegVb0dhc5qBGBi8-fWTGF0OszYNUpWx8iYAfnQ5UZRtw0uQ3LMIVQExycyaJel8Nx9oUzofN7eRNIwN5XnGNxDcTvdaO8d_wIoOvPzbRO-eOaQL7xtJNUTWSkk6fHwuRiqPsPAXy6XyjLG-1EY3CCthN0U_HM6E9M10tYM2wIevJY3DpbgmU2aKmPTzcYqLKVbfTSmPso");'>
                <div class="col gap-sm max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Find Your Inner Calm</h1>
                    <p class="hero-text @[480px]:text-base">Explore our collection of programs designed to reduce stress, improve focus, and connect you with the present moment.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('programs')">
                    <span class="truncate">Explore Programs</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Filters & Search -->
    <section class="section px-4" id="programs">
        <div class="flex flex-col md:row between gap-md">
            <div class="row gap-2 overflow-x-auto pb-2 [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <button class="chip bg-primary text-background-dark">All</button>
                <button class="chip">Stress Relief</button>
                <button class="chip">Sleep</button>
                <button class="chip">Focus</button>
                <button class="chip">&lt;10 min</button>
                <button class="chip">10-20 min</button>
            </div>
            <div class="relative w-full md:w-72">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 txt-2 text-sm">search</span>
                <input class="input pl-10 h-10" placeholder="Search programs..." type="text" />
            </div>
        </div>
    </section>

    <!-- Programs Grid -->
    <section class="section px-4">
        <div class="grid-3">
            <!-- Program 1 -->
            <a href="<?php echo url('meditation/7_day_morning.php'); ?>" class="card-feature group">
                <div class="img-portrait mb-2 overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Mindful Mornings">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">7 Days of Mindful Mornings</h3>
                    <p class="subtitle">Start your day with clarity and intention.</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span>10 MIN</span>
                        <span>•</span>
                        <span>Beginner</span>
                    </div>
                </div>
            </a>

            <!-- Program 2 -->
            <a href="<?php echo url('meditation/deep_sleep.php'); ?>" class="card-feature group">
                <div class="img-portrait mb-2 overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHfAKLcAccI5mrKbrDgmLbS0q9UueLv4lHiNTKAqJthcDsGUEfqIXnH5zJfzkjpfMd-eCVepEVBqd8fx0jRZ1fPAjqXX22atS7FMpR5IeOHbq2RdY6PcM4Jpcs_4nAKJDeR0vJ8KL3YZjrhQuzsWtwFu-xN_ctKdmO-VEeFMOMfOOhyX_qjCNT794-VSppqr3te-Vso_gI90zQZ8GxwAPe037LEz84x21WPHzEkDObA4-psFdFl_zGIwwUcxo-Jy4IZ_xabXadyyc" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Deep Sleep">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Deep Sleep Journey</h3>
                    <p class="subtitle">Drift into restful slumber with nature sounds.</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span>20 MIN</span>
                        <span>•</span>
                        <span>All Levels</span>
                    </div>
                </div>
            </a>

            <!-- Program 3 -->
            <a href="<?php echo url('meditation/overcoming_anxiety.php'); ?>" class="card-feature group">
                <div class="img-portrait mb-2 overflow-hidden">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoMzn3JLhccyzoR65tH14xS1GoxJodxT_o7-lgo5hqeTjQkBHFXty6cLKFSC9ZVcc7OddxtflZj4wq6EnE2dlU3GlGAHJLu-chq0jeXwd7rhSHFPX5M1V1VTtex-if4mduOy-tKDdYldXJ9gzU8EdeQfmbp3fchZf5mK_Qhh9g7w0xR7ugIj5X1mSWm1kOXGMn0bFeT1bqmLhr0qaN5m4rE7fi5i2iQuLxjjJeBhcOkAC-5XJ2QTsuawtBiYCWS1GwmJq_ZGNVEfg" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Overcoming Anxiety">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Overcoming Anxiety</h3>
                    <p class="subtitle">Cultivate resilience and peace in difficult times.</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span>15 MIN</span>
                        <span>•</span>
                        <span>Intermediate</span>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Subscription CTA -->
    <section class="section p-4">
        <div class="cta rounded-3xl">
            <h2 class="cta-title">Unlock Your Full Potential</h2>
            <p class="cta-text">Subscribe to ForestSoul for full access to all our meditation and yoga programs, and exclusive nature-based content.</p>
            <button class="btn-primary btn-lg px-8">
                <span class="truncate">Subscribe Now - $9.99/mo</span>
            </button>
        </div>
    </section>
</main>

<?php put_footer(); ?>