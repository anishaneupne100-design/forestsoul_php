<?php
$title = "Focus & Productivity - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>




<main class="flex-grow">
    <!-- HeroSection -->
    <div class="@container py-8">
        <div class="@[480px]:p-4">
            <div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
                data-alt="A person meditating in a calm, sunlit room with green plants."
                style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(16, 34, 28, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuA8nZDu8_SE4toceIXZcbjAV2X1sBb04_O2mvAu_-m89wrs2rifxxZpoIum7Zp05xNc6pwtbiLD3fHu_-rljCp-Wtg3pbPqOP6dli4i4I6-xGi8Q1utiUKdyX9kZWkt4mZwJvTWM6IN7Zlx31Bv1SsSTB8AXSbPRVVBHuajPyyiwE2hRRpWRg4EjZd-wrx85MAs6gBOQK8WZxf-mYlLRmyIAwAE_C9S_pK6FCD7eZBcTh4kpGX80Z3DlN7xQ2lgGB40gSZVDt3a6M4");'>
                <div class="flex flex-col gap-4 text-center max-w-2xl">
                    <h1
                        class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                        Unlock Peak Focus: The Productivity Boost Program</h1>
                    <h2
                        class="text-white/90 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                        A guided meditation program to enhance concentration, improve mental clarity, and boost your
                        productivity.</h2>
                </div>
                <button
                    class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-[#11221c] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] hover:bg-opacity-80 transition-colors">
                    <span class="truncate">Start Program</span>
                </button>
            </div>
        </div>
    </div>
    <!-- Program Details & Benefits Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 pb-8">
        <!-- Left Column: DescriptionList -->
        <div class="lg:col-span-1">
            <div class="border border-white/10 dark:border-[#326755] rounded-xl p-4 bg-white/5 dark:bg-[#19332b]">
                <div class="flex justify-between gap-x-6 py-2 border-b border-white/10 dark:border-b-[#326755]">
                    <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Program Type</p>
                    <p class="text-white text-sm font-medium leading-normal text-right">Meditation</p>
                </div>
                <div class="flex justify-between gap-x-6 py-2 border-b border-white/10 dark:border-b-[#326755]">
                    <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Duration</p>
                    <p class="text-white text-sm font-medium leading-normal text-right">21 Days</p>
                </div>
                <div class="flex justify-between gap-x-6 py-2 border-b border-white/10 dark:border-b-[#326755]">
                    <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Session Length</p>
                    <p class="text-white text-sm font-medium leading-normal text-right">15-20 mins</p>
                </div>
                <div class="flex justify-between gap-x-6 py-2">
                    <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Difficulty</p>
                    <p class="text-white text-sm font-medium leading-normal text-right">All Levels</p>
                </div>
            </div>
        </div>
        <!-- Right Column: Core Benefits -->
        <div class="lg:col-span-2">
            <h2 class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-2">Core Benefits
            </h2>
            <div
                class="grid grid-cols-[repeat(auto-fit,minmax(180px,1fr))] gap-4 p-4 border border-white/10 dark:border-[#326755] rounded-xl bg-white/5 dark:bg-[#19332b]">
                <div class="flex flex-1 gap-3 p-4 flex-col">
                    <div class="text-primary"><span class="material-symbols-outlined text-3xl">target</span></div>
                    <div class="flex flex-col gap-1">
                        <h3 class="text-white text-base font-bold leading-tight">Sharpen Concentration</h3>
                        <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Improve your
                            ability to focus on tasks for longer periods.</p>
                    </div>
                </div>
                <div class="flex flex-1 gap-3 p-4 flex-col">
                    <div class="text-primary"><span class="material-symbols-outlined text-3xl">spark</span></div>
                    <div class="flex flex-col gap-1">
                        <h3 class="text-white text-base font-bold leading-tight">Achieve Mental Clarity</h3>
                        <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Clear mental
                            clutter and approach your day with a calm mind.</p>
                    </div>
                </div>
                <div class="flex flex-1 gap-3 p-4 flex-col">
                    <div class="text-primary"><span class="material-symbols-outlined text-3xl">trending_up</span></div>
                    <div class="flex flex-col gap-1">
                        <h3 class="text-white text-base font-bold leading-tight">Enhance Productivity</h3>
                        <p class="text-white/60 dark:text-[#92c9b7] text-sm font-normal leading-normal">Learn techniques
                            to work more efficiently and effectively.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- What You'll Learn Section -->
    <div class="px-4 py-8">
        <h2 class="text-white text-center text-3xl font-bold leading-tight tracking-[-0.015em] pb-6">What You'll Learn
        </h2>
        <div class="space-y-4 max-w-3xl mx-auto">
            <details
                class="group rounded-xl p-6 bg-white/5 dark:bg-[#19332b] border border-white/10 dark:border-[#326755]">
                <summary
                    class="flex cursor-pointer list-none items-center justify-between text-lg font-semibold text-white">
                    Mindful Breathing Techniques
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="mt-4 text-white/60 dark:text-[#92c9b7]">Master foundational breathing exercises designed to
                    calm the nervous system, reduce stress in the moment, and anchor your attention to the present.
                    These techniques are your first step toward building a stable and focused mind.</p>
            </details>
            <details
                class="group rounded-xl p-6 bg-white/5 dark:bg-[#19332b] border border-white/10 dark:border-[#326755]">
                <summary
                    class="flex cursor-pointer list-none items-center justify-between text-lg font-semibold text-white">
                    Visualization for Goals
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="mt-4 text-white/60 dark:text-[#92c9b7]">Learn how to use guided visualization to mentally
                    rehearse success, clarify your professional and personal goals, and build the intrinsic motivation
                    needed to achieve them. This powerful tool helps bridge the gap between intention and action.</p>
            </details>
            <details
                class="group rounded-xl p-6 bg-white/5 dark:bg-[#19332b] border border-white/10 dark:border-[#326755]">
                <summary
                    class="flex cursor-pointer list-none items-center justify-between text-lg font-semibold text-white">
                    Digital Detox Guidance
                    <span class="transition-transform duration-300 group-open:rotate-180">
                        <span class="material-symbols-outlined">expand_more</span>
                    </span>
                </summary>
                <p class="mt-4 text-white/60 dark:text-[#92c9b7]">Discover practical strategies for managing digital
                    distractions and cultivating a healthier relationship with technology. Our guided meditations will
                    help you create mental space and reclaim your time and attention from the digital world.</p>
            </details>
        </div>
    </div>
    <!-- Testimonials Section -->
    <div class="py-12">
        <h2 class="text-white text-center text-3xl font-bold leading-tight tracking-[-0.015em] pb-8">From Our Community
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
            <div
                class="flex flex-col gap-4 rounded-xl p-6 bg-white/5 dark:bg-[#19332b] border border-white/10 dark:border-[#326755]">
                <div class="flex items-center gap-4">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-12"
                        data-alt="Profile picture of Sarah L."
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtfJHAi3ZMPyOqeJcFawpycIZ0OhCXSEbDcB1-dwjJRPrFko5WILutNsBEqB7WagyiVNExzBdn3hl_xdF0R8hXtGdtOXLSW5-ruED05-W54SpKHWtTfwwkTX4LxqsMKXrPVN7QwgN_DV4-pVdWUwfl0ffmQZkHhYI2hFemHGQ7D8jdquymLIuef3k2kh81hoMvy__BAif7e1ptm6Ns9OitbFmzVTrQekfZLHQPF5sfXUMuRlhHx67gpz-X1CmU6bcS8BFKZi_gTZI");'>
                    </div>
                    <div>
                        <p class="text-white font-bold">Sarah L.</p>
                        <p class="text-white/60 dark:text-[#92c9b7] text-sm">Marketing Manager</p>
                    </div>
                </div>
                <p class="text-white/80 italic">"This program was a game-changer. I was constantly distracted and
                    overwhelmed at work. After 21 days, my ability to focus has improved dramatically, and I feel so
                    much more in control of my day."</p>
            </div>
            <div
                class="flex flex-col gap-4 rounded-xl p-6 bg-white/5 dark:bg-[#19332b] border border-white/10 dark:border-[#326755]">
                <div class="flex items-center gap-4">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-12"
                        data-alt="Profile picture of Mark T."
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAbaWd2L3Dl2YbzgOtiIN1bIUfaBX4e3pYb__ZXWE2wD_YApIrNX__WiUf0IQL9QHQltCKW3Z3UAju7wQ-KZZ9CJtHbFUp1uBwBLpjITAznXsS03Y24I_IYqglOdRhxGgjBGqhvA2YxG7vNDXSKI70xkVJydOt4KOneJ868YmZeEmuBSe6_cNZf12opnb5qsoM6fUt3SRTUBw8scxHXUd0xCAE8A-c4Ud76jfwLID6uiFahDUqJMezAePap-IAkErJKc3fQIIDsgs8");'>
                    </div>
                    <div>
                        <p class="text-white font-bold">Mark T.</p>
                        <p class="text-white/60 dark:text-[#92c9b7] text-sm">Software Developer</p>
                    </div>
                </div>
                <p class="text-white/80 italic">"I was skeptical at first, but the techniques are practical and easy to
                    integrate. The mental clarity I've gained has not only boosted my productivity but also reduced my
                    overall stress levels. Highly recommend."</p>
            </div>
        </div>
    </div>
    <!-- CTA Block -->
    <div class="px-4 py-16">
        <div
            class="bg-primary/20 dark:bg-[#19332b] border border-primary/30 dark:border-[#326755] rounded-xl flex flex-col items-center text-center p-8 md:p-12">
            <h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em]">Ready to Transform Your Focus?
            </h2>
            <p class="text-white/80 dark:text-[#92c9b7] mt-2 max-w-xl">Join the Productivity Boost Program today and
                start your journey towards a clearer, more focused, and more effective you.</p>
            <button
                class="flex mt-8 min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-6 bg-primary text-[#11221c] text-base font-bold leading-normal tracking-[0.015em] hover:bg-opacity-80 transition-colors">
                <span class="truncate">Join the Program Now</span>
            </button>
        </div>
    </div>
</main>

<?php
put_footer();
?>