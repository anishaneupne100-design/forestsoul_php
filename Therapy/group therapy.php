<?php
// therapy/group therapy.php
$title = "Group Therapy - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 28, 0.4) 0%, rgba(16, 34, 28, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTEhXjnI8d8AMf072qc5J5bkKXJW_Hi3P_aQ__OQ6sohK5tlA91FUvVVHyD5dCcVP3PTegt3T2L4sLWf3y_BlsIMZMeQfML7lqnK_nUVl_csBc-6Gvrv5ZdqyygsS0XvnwMhDUewh51w4G9EKKCxF8wjP1a6SUdnpE7isElKh4yozcIpMrT5THMFWplL2uYIZdSU7fi6UktjS1amcyH_ANRJdoeh9z-E0UhgVz1UUMO8hkh3tStGfl0jQXrvt6NS90tMc-wHEFZug");'>
                <div class="col gap-md max-w-2xl px-4">
                    <h1 class="hero-title @[480px]:text-5xl">Coping with Stress Group</h1>
                    <p class="hero-text @[480px]:text-lg">Find strength and understanding in a shared space. Our therapist-led groups offer a safe environment to explore challenges and build resilience together.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="requireAuth(() => gotoPage(ROUTES.therapy))">
                    <span class="truncate">Join this Group</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Details -->
    <section class="section px-4 max-w-6xl mx-auto py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left Info -->
            <div class="lg:col-span-2 col gap-10">
                <div class="col gap-6">
                    <h2 class="txt-2xl font-bold">About the Session</h2>
                    <p class="txt-2 leading-relaxed">This group provides a collaborative environment to explore effective strategies for managing stress. Through shared experiences and professional guidance, you will learn practical skills to reduce anxiety and enhance your overall well-being.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="card bg-surface-dark border-white/5 p-6 text-center col gap-3">
                        <span class="material-symbols-outlined text-primary text-3xl">group</span>
                        <h3 class="font-bold">Peer Support</h3>
                        <p class="txt-xs txt-2">Connect with others who truly understand.</p>
                    </div>
                    <div class="card bg-surface-dark border-white/5 p-6 text-center col gap-3">
                        <span class="material-symbols-outlined text-primary text-3xl">shield_person</span>
                        <h3 class="font-bold">Expert Led</h3>
                        <p class="txt-xs txt-2">Guided by licensed clinical therapists.</p>
                    </div>
                    <div class="card bg-surface-dark border-white/5 p-6 text-center col gap-3">
                        <span class="material-symbols-outlined text-primary text-3xl">lock</span>
                        <h3 class="font-bold">Confidential</h3>
                        <p class="txt-xs txt-2">A safe and secure private environment.</p>
                    </div>
                </div>

                <div class="col gap-6">
                    <h3 class="txt-xl font-bold">Weekly Schedule</h3>
                    <div class="col gap-4">
                        <?php 
                        $sessions = [
                            ['week' => '1', 'title' => 'Identifying Stressors', 'date' => 'Oct 15'],
                            ['week' => '2', 'title' => 'Mindfulness Techniques', 'date' => 'Oct 22'],
                            ['week' => '3', 'title' => 'Cognitive Restructuring', 'date' => 'Oct 29'],
                        ];
                        foreach($sessions as $s): 
                        ?>
                            <div class="card bg-surface-dark border-white/5 p-4 row gap-6 items-center">
                                <div class="col items-center min-w-[60px] border-r border-white/5">
                                    <span class="txt-xs txt-2">WEEK</span>
                                    <span class="txt-xl font-bold text-primary"><?php echo $s['week']; ?></span>
                                </div>
                                <div class="col">
                                    <h4 class="font-bold"><?php echo $s['title']; ?></h4>
                                    <p class="txt-sm txt-2"><?php echo $s['date']; ?> • 6:00 PM - 7:30 PM (Online)</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col gap-6">
                <div class="card bg-primary/5 border border-primary/20 p-8 sticky top-24">
                    <h3 class="txt-xl font-bold mb-6">Group Info</h3>
                    <div class="col gap-4 mb-8">
                        <div class="between">
                            <span class="txt-sm txt-2">Duration</span>
                            <span class="font-medium">8 Weeks</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Frequency</span>
                            <span class="font-medium">Every Tuesday</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Format</span>
                            <span class="font-medium">Online (Zoom)</span>
                        </div>
                        <div class="between">
                            <span class="txt-sm txt-2">Price</span>
                            <span class="font-bold text-primary">$40 / session</span>
                        </div>
                    </div>
                    <button class="btn-primary w-full h-12" onclick="requireAuth(() => gotoPage(ROUTES.therapy))">
                        Join this Group
                    </button>
                    <p class="txt-xs txt-2 text-center mt-4 italic">Limited spots remaining (3 left)</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>