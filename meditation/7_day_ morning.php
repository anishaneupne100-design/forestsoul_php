<?php
// meditation/7_day_morning.php
$title = "Mindful Mornings - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI");'>
                <div class="col gap-md max-w-2xl px-4">
                    <p class="txt-sm font-bold uppercase tracking-widest text-primary">7-Day Program</p>
                    <h1 class="hero-title @[480px]:text-5xl">7 Days of Mindful Mornings</h1>
                    <p class="hero-text @[480px]:text-lg">Start your day with clarity, focus, and a sense of calm. This program is designed to help you build a consistent morning meditation practice.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="showToast('Starting Program...', 'success')">
                    <span class="truncate">Start Journey</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Program Content -->
    <section class="section px-4 max-w-6xl mx-auto py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Details -->
            <div class="lg:col-span-2 col gap-10">
                <div class="col gap-6">
                    <h2 class="txt-2xl font-bold">What You'll Learn</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="row gap-3 items-start">
                            <span class="material-symbols-outlined text-primary text-sm mt-1">check_circle</span>
                            <p class="txt-sm txt-2">Techniques to establish a consistent morning routine.</p>
                        </div>
                        <div class="row gap-3 items-start">
                            <span class="material-symbols-outlined text-primary text-sm mt-1">check_circle</span>
                            <p class="txt-sm txt-2">How to use breathwork to calm the nervous system.</p>
                        </div>
                        <div class="row gap-3 items-start">
                            <span class="material-symbols-outlined text-primary text-sm mt-1">check_circle</span>
                            <p class="txt-sm txt-2">Mindful awareness practices for daily life.</p>
                        </div>
                        <div class="row gap-3 items-start">
                            <span class="material-symbols-outlined text-primary text-sm mt-1">check_circle</span>
                            <p class="txt-sm txt-2">Methods for setting positive daily intentions.</p>
                        </div>
                    </div>
                </div>

                <div class="col gap-6">
                    <h2 class="txt-2xl font-bold">Daily Program</h2>
                    <div class="col gap-4">
                        <?php 
                        $days = [
                            ['d' => '1', 't' => 'The Power of Breath', 'desc' => 'Anchor your attention on the breath, a fundamental skill.'],
                            ['d' => '2', 't' => 'Body Scan Awareness', 'desc' => 'Gently guide your attention through your body.'],
                            ['d' => '3', 't' => 'Mindful Listening', 'desc' => 'Expand your awareness to the sounds around you.'],
                            ['d' => '4', 't' => 'Setting Intentions', 'desc' => 'Start your day with a clear, positive goal.'],
                            ['d' => '5', 't' => 'Cultivating Gratitude', 'desc' => 'Focus on appreciation to shift your perspective.'],
                            ['d' => '6', 't' => 'Observing Thoughts', 'desc' => 'Practice watching your thoughts like clouds.'],
                            ['d' => '7', 't' => 'Integrating Mindfulness', 'desc' => 'Bring all elements together for daily life.'],
                        ];
                        foreach($days as $day): 
                        ?>
                            <div class="card bg-surface-dark border-white/5 p-4 row gap-6 items-center">
                                <div class="col items-center min-w-[50px] border-r border-white/5">
                                    <span class="txt-xs txt-2 font-bold">DAY</span>
                                    <span class="txt-xl font-bold text-primary"><?php echo $day['d']; ?></span>
                                </div>
                                <div class="col">
                                    <h4 class="font-bold"><?php echo $day['t']; ?></h4>
                                    <p class="txt-xs txt-2 leading-relaxed"><?php echo $day['desc']; ?></p>
                                </div>
                                <span class="material-symbols-outlined txt-2 ml-auto text-sm">play_circle</span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col gap-6">
                <div class="card bg-surface-dark border-white/5 p-6 sticky top-24">
                    <div class="img-landscape rounded-xl overflow-hidden mb-6">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI" alt="Sunrise" class="w-full h-full object-cover">
                    </div>
                    <div class="col gap-4">
                        <div class="between">
                            <span class="txt-sm txt-2">Duration</span>
                            <span class="font-bold">10 min/day</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Skill Level</span>
                            <span class="font-bold">Beginner</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Category</span>
                            <span class="font-bold">Mindfulness</span>
                        </div>
                    </div>
                    <button class="btn-primary w-full mt-6 h-12" onclick="showToast('Starting Day 1...', 'success')">
                        Start Today's Session
                    </button>
                    <p class="txt-xs txt-2 text-center mt-3">You have completed 0/7 days.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>