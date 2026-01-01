<?php
// meditation/deep_sleep.php
$title = "Deep Sleep Journey - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(10, 25, 47, 0.4) 0%, rgba(10, 25, 47, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBiK8QhMa82jliQOB1ZxbJ1TTkTjaluyZfW-5FDKQisksSE8D5DvBUlNpSBYAwZSG7TF1XynSoBvrNk9DXPmW8VJSDsm9Ip3N69eRztihlgd_hl-DvNS6CiLDg6eZHVFgk2S4fNpk3muCI4PT2ilEdBZQzrPG-YjUVqeJM0rshFnzm_qmgkCgLW3AMseiHBfWKb9WwOzIxQcq9FwLC1LehcmO-2BcB_tq-45i3-pMTYMcNz1qq1YEwo96lFSV-6QKsO9Z_BsVowQGI");'>
                <div class="col gap-md max-w-2xl px-4">
                    <h1 class="hero-title @[480px]:text-5xl">Embark on a Deep Sleep Journey</h1>
                    <p class="hero-text @[480px]:text-lg">Discover profound rest and wake up rejuvenated with our guided meditation program designed to calm your mind and body.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="showToast('Starting Journey...', 'success')">
                    <span class="truncate">Start Journey</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="section px-4 max-w-6xl mx-auto py-12">
        <h2 class="text-center txt-2xl font-bold mb-10">Unlock the Benefits of Restful Sleep</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card bg-surface-dark border-white/5 p-6 col gap-4">
                <span class="material-symbols-outlined text-primary text-3xl">nights_stay</span>
                <h3 class="font-bold">Fall Asleep Faster</h3>
                <p class="txt-2 txt-sm">Gentle guidance to quiet your mind and ease into slumber effortlessly.</p>
            </div>
            <div class="card bg-surface-dark border-white/5 p-6 col gap-4">
                <span class="material-symbols-outlined text-primary text-3xl">self_improvement</span>
                <h3 class="font-bold">Reduce Anxiety</h3>
                <p class="txt-2 txt-sm">Calming techniques to soothe your nervous system for uninterrupted rest.</p>
            </div>
            <div class="card bg-surface-dark border-white/5 p-6 col gap-4">
                <span class="material-symbols-outlined text-primary text-3xl">spark</span>
                <h3 class="font-bold">Wake Refreshed</h3>
                <p class="txt-2 txt-sm">Improve sleep quality and wake up feeling energized and ready for the day.</p>
            </div>
        </div>
    </section>

    <!-- Timeline -->
    <section class="section px-4 py-12 max-w-4xl mx-auto">
        <h2 class="text-center txt-2xl font-bold mb-10">How Your Journey Unfolds</h2>
        <div class="col gap-8 relative pl-8 border-l-2 border-primary/20">
            <div class="col gap-2 relative">
                <div class="absolute -left-[41px] top-0 size-10 rounded-full bg-background-dark border-2 border-primary center text-primary font-bold">1</div>
                <h3 class="font-bold text-lg">Day 1-3: Calming the Mind</h3>
                <p class="txt-2 txt-sm">Begin with foundational techniques to release daily stress and quiet racing thoughts.</p>
            </div>
            <div class="col gap-2 relative">
                <div class="absolute -left-[41px] top-0 size-10 rounded-full bg-background-dark border-2 border-primary center text-primary font-bold">2</div>
                <h3 class="font-bold text-lg">Day 4-7: Body Scan for Sleep</h3>
                <p class="txt-2 txt-sm">Learn to progressively relax every part of your body, easing deep physical tension.</p>
            </div>
            <div class="col gap-2 relative">
                <div class="absolute -left-[41px] top-0 size-10 rounded-full bg-background-dark border-2 border-primary center text-primary font-bold">3</div>
                <h3 class="font-bold text-lg">Day 8-10: Sustaining Habits</h3>
                <p class="txt-2 txt-sm">Integrate these practices into your nightly routine for long-lasting foundation.</p>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>