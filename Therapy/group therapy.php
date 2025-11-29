<?php
$title = 'Group Therapy - ForestSoul';
require_once __DIR__ . '/../head.php';
?>

<body class="body">
<div class="page">
<div class="layout">

<?php include __DIR__ . '/../navbar/index.php'; ?>

<main class="container-main">
<div class="content">

<!-- Breadcrumb -->
<nav class="row gap-sm txt-sm px-4 mb-6">
    <a href="<?php echo url('home'); ?>" class="txt-2 hover:text-primary">Home</a>
    <span class="txt-2">/</span>
    <a href="<?php echo url('therapy'); ?>" class="txt-2 hover:text-primary">Therapy</a>
    <span class="txt-2">/</span>
    <span class="txt">Group Therapy</span>
</nav>

<div class="row flex-col lg:flex-row gap-xl px-4">
    <!-- Main Content -->
    <div class="w-full lg:w-2/3 col gap-xl">
        <!-- Header Image -->
        <div class="img-cover min-h-80 col justify-end p-6" style='background-image: linear-gradient(0deg, rgba(16, 34, 28, 0.6) 0%, rgba(16, 34, 28, 0) 40%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTEhXjnI8d8AMf072qc5J5bkKXJW_Hi3P_aQ__OQ6sohK5tlA91FUvVVHyD5dCcVP3PTegt3T2L4sLWf3y_BlsIMZMeQfML7lqnK_nUVl_csBc-6Gvrv5ZdqyygsS0XvnwMhDUewh51w4G9EKKCxF8wjP1a6SUdnpE7isElKh4yozcIpMrT5THMFWplL2uYIZdSU7fi6UktjS1amcyH_ANRJdoeh9z-E0UhgVz1UUMO8hkh3tStGfl0jQXrvt6NS90tMc-wHEFZug");'>
            <h1 class="text-white txt-3xl">Coping with Stress Group</h1>
        </div>
        
        <!-- Headline -->
        <h2 class="txt txt-2xl text-center">Find strength and understanding in a shared space.</h2>
        
        <!-- Feature Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-md">
            <div class="card center-flex flex-col text-center">
                <span class="material-symbols-outlined text-primary text-3xl">group</span>
                <div class="col gap-sm mt-2">
                    <h3 class="title">Peer Support</h3>
                    <p class="subtitle">Connect with others who understand.</p>
                </div>
            </div>
            
            <div class="card center-flex flex-col text-center">
                <span class="material-symbols-outlined text-primary text-3xl">shield_person</span>
                <div class="col gap-sm mt-2">
                    <h3 class="title">Guided by Experts</h3>
                    <p class="subtitle">Led by licensed therapists.</p>
                </div>
            </div>
            
            <div class="card center-flex flex-col text-center">
                <span class="material-symbols-outlined text-primary text-3xl">lock</span>
                <div class="col gap-sm mt-2">
                    <h3 class="title">Confidential Space</h3>
                    <p class="subtitle">A safe and private environment.</p>
                </div>
            </div>
        </div>
        
        <!-- About Section -->
        <div class="col gap-md">
            <h2 class="heading">About the Session</h2>
            <p class="txt-2 txt-md leading-relaxed">
                This group provides a supportive and collaborative environment for individuals to explore and develop effective strategies for managing stress. Through shared experiences and professional guidance, you will learn practical skills to reduce anxiety, improve resilience, and enhance your overall well-being. We focus on cognitive-behavioral techniques, mindfulness practices, and open discussion to foster personal growth.
            </p>
        </div>
        
        <!-- Session Focus -->
        <div class="col gap-md">
            <h3 class="heading">Session Focus</h3>
            <ul class="col gap-sm txt-2 list-disc list-inside">
                <li>Understanding the root causes of stress and anxiety.</li>
                <li>Developing healthy coping mechanisms and relaxation techniques.</li>
                <li>Improving communication and interpersonal skills in stressful situations.</li>
                <li>Building a personalized stress management plan.</li>
                <li>Mindfulness and grounding exercises for immediate relief.</li>
            </ul>
        </div>
        
        <!-- Schedule Section -->
        <div class="col gap-md">
            <h2 class="heading">Schedule</h2>
            
            <div class="col gap-md">
                <div class="card row gap-md items-start">
                    <div class="col items-center">
                        <span class="title">OCT</span>
                        <span class="txt-2xl text-primary">15</span>
                    </div>
                    <div class="flex-grow">
                        <h3 class="title">Week 1: Introduction & Identifying Stressors</h3>
                        <p class="subtitle">Tuesdays, 6:00 PM - 7:30 PM (Online)</p>
                    </div>
                </div>
                
                <div class="card row gap-md items-start">
                    <div class="col items-center">
                        <span class="title">OCT</span>
                        <span class="txt-2xl text-primary">22</span>
                    </div>
                    <div class="flex-grow">
                        <h3 class="title">Week 2: Mindfulness & Relaxation Techniques</h3>
                        <p class="subtitle">Tuesdays, 6:00 PM - 7:30 PM (Online)</p>
                    </div>
                </div>
                
                <div class="card row gap-md items-start">
                    <div class="col items-center">
                        <span class="title">OCT</span>
                        <span class="txt-2xl text-primary">29</span>
                    </div>
                    <div class="flex-grow">
                        <h3 class="title">Week 3: Cognitive Restructuring</h3>
                        <p class="subtitle">Tuesdays, 6:00 PM - 7:30 PM (Online)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sticky Action Panel -->
    <div class="w-full lg:w-1/3">
        <div class="sticky top-24 card">
            <h3 class="txt-xl txt">Session Details</h3>
            
            <div class="col gap-md txt">
                <div class="between">
                    <span class="row gap-sm txt-2">
                        <span class="material-symbols-outlined text-lg">calendar_month</span>
                        Date
                    </span>
                    <span>Tuesdays, Oct 15 - Dec 3</span>
                </div>
                
                <div class="between">
                    <span class="row gap-sm txt-2">
                        <span class="material-symbols-outlined text-lg">schedule</span>
                        Time
                    </span>
                    <span>6:00 PM - 7:30 PM</span>
                </div>
                
                <div class="between">
                    <span class="row gap-sm txt-2">
                        <span class="material-symbols-outlined text-lg">payments</span>
                        Price
                    </span>
                    <span class="font-bold">$40 / session</span>
                </div>
                
                <div class="between">
                    <span class="row gap-sm txt-2">
                        <span class="material-symbols-outlined text-lg">videocam</span>
                        Format
                    </span>
                    <span>Online via Zoom</span>
                </div>
            </div>
            
            <a href="<?php echo url('login'); ?>" class="btn-primary btn-lg w-full mt-4">
                <span class="truncate-text">Join This Group</span>
            </a>
            
            <p class="txt-2 txt-sm text-center mt-3">Limited spots available. Register now to secure your place.</p>
        </div>
    </div>
</div>

<!-- Other Groups Section -->
<div class="section px-4">
    <h2 class="section-title">Explore Other Therapy Options</h2>
    
    <div class="grid-2 max-w-3xl mx-auto">
        <a href="<?php echo url('therapy_individual'); ?>" class="card-hover group">
            <div class="icon-circle">
                <span class="material-symbols-outlined text-2xl">person</span>
            </div>
            <h3 class="title">Individual Counseling</h3>
            <p class="subtitle">One-on-one sessions tailored to your personal needs.</p>
            <span class="link group-hover:underline">Learn More →</span>
        </a>
        
        <a href="<?php echo url('therapy_couple'); ?>" class="card-hover group">
            <div class="icon-circle">
                <span class="material-symbols-outlined text-2xl">favorite</span>
            </div>
            <h3 class="title">Couples Therapy</h3>
            <p class="subtitle">Strengthen your relationship together.</p>
            <span class="link group-hover:underline">Learn More →</span>
        </a>
    </div>
</div>

</div>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>

</div>
</div>
</body>
</html>
