<?php
$title = 'Individual Counseling - ForestSoul';
require_once __DIR__ . '/../head.php';
?>

<body class="body">
<div class="page">
<div class="layout">

<?php include __DIR__ . '/../navbar/index.php'; ?>

<main class="container-main">
<div class="content gap-lg">

<!-- Breadcrumb -->
<nav class="row gap-sm txt-sm px-4">
    <a href="<?php echo url('home'); ?>" class="txt-2 hover:text-primary">Home</a>
    <span class="txt-2">/</span>
    <a href="<?php echo url('therapy'); ?>" class="txt-2 hover:text-primary">Therapy</a>
    <span class="txt-2">/</span>
    <span class="txt">Individual Counseling</span>
</nav>

<!-- Hero Section -->
<div class="@container">
    <div class="hero rounded-box items-start justify-end text-left px-6 pb-10 md:px-10" style='background-image: linear-gradient(rgba(0, 0, 0, 0.0) 0%, rgba(16, 34, 22, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDx9Mb_XBk7_PBt3Jc2pXxpkgkcs-pqwqcNbP_uPVsvBHg0XerPvy7F-K49Nof3Z1aB8aHRLfYxBU_uLtESMDViRsl98qOjTb8SHxfB2sPTRh8RGZM-PEhBCP3OVbgUFip9BbDcEQnSXckY5WtzXf8XO6WzaZuIFR4dO3fUL-1egyh31Bu0IYnb_e1qjmhtAsYimelJw2WlpzaXHY7xnw3bzWz-4xqJH2qGN4snqHghMoaaz87mDPimJbfTXJ8IPs4aFpNoozntnF4");'>
        <div class="col gap-md">
            <h1 class="hero-title md:text-5xl">Personalized Support for Your Journey</h1>
            <p class="hero-text md:text-base max-w-2xl">Discover the benefits of one-on-one therapy in a safe, confidential, and supportive environment. We're here to help you navigate life's challenges.</p>
        </div>
        <a href="<?php echo url('login'); ?>" class="btn-primary btn-lg">
            <span class="truncate-text">Book a Free Consultation</span>
        </a>
    </div>
</div>

<!-- Why Choose Section -->
<section class="section px-4">
    <h2 class="heading mb-6">Why Choose Individual Counseling?</h2>
    
    <div class="grid-auto">
        <div class="card-feature">
            <span class="material-symbols-outlined text-primary text-3xl">lock</span>
            <div class="col gap-sm">
                <h3 class="title">Confidential Space</h3>
                <p class="subtitle">A secure and private setting where you can openly share your thoughts and feelings without judgment.</p>
            </div>
        </div>
        
        <div class="card-feature">
            <span class="material-symbols-outlined text-primary text-3xl">psychology</span>
            <div class="col gap-sm">
                <h3 class="title">Personalized Strategies</h3>
                <p class="subtitle">Receive tailored guidance and coping mechanisms designed specifically for your unique situation and goals.</p>
            </div>
        </div>
        
        <div class="card-feature">
            <span class="material-symbols-outlined text-primary text-3xl">hub</span>
            <div class="col gap-sm">
                <h3 class="title">Deeper Self-Understanding</h3>
                <p class="subtitle">Gain valuable insights into your own patterns of thought, emotion, and behavior to foster growth.</p>
            </div>
        </div>
    </div>
</section>

<!-- Therapeutic Methods Section -->
<section class="section px-4">
    <h2 class="heading mb-6">Therapeutic Methods We Use</h2>
    
    <div class="grid-2">
        <div class="col gap-sm">
            <h3 class="text-primary font-bold txt-lg">Cognitive Behavioral Therapy (CBT)</h3>
            <p class="subtitle">CBT helps you identify and change destructive thinking patterns and behaviors. It's a practical, goal-oriented approach effective for anxiety, depression, and more.</p>
        </div>
        
        <div class="col gap-sm">
            <h3 class="text-primary font-bold txt-lg">Dialectical Behavior Therapy (DBT)</h3>
            <p class="subtitle">DBT is designed to help you manage painful emotions and decrease conflict in relationships. It focuses on mindfulness, distress tolerance, and emotional regulation.</p>
        </div>
        
        <div class="col gap-sm">
            <h3 class="text-primary font-bold txt-lg">Mindfulness-Based Therapy</h3>
            <p class="subtitle">This approach integrates mindfulness practices with psychotherapy to help you develop a new relationship with your thoughts and feelings, reducing stress and improving well-being.</p>
        </div>
        
        <div class="col gap-sm">
            <h3 class="text-primary font-bold txt-lg">Person-Centered Therapy</h3>
            <p class="subtitle">Here, the focus is on you. Our therapists provide a supportive environment in which you can explore your own feelings, beliefs, and behaviors to find your own solutions.</p>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="section px-4">
    <div class="card bg-primary/10 dark:bg-primary/5 border-primary/20 center-flex flex-col text-center py-8 max-w-3xl mx-auto">
        <p class="txt italic text-lg">"Working with my therapist at ForestSoul gave me the clarity I was missing. It's a truly safe space to grow and heal."</p>
        <span class="txt-2 mt-4 font-semibold">— A.T.</span>
    </div>
</section>

<!-- CTA Section -->
<section class="section px-4">
    <div class="row flex-col md:flex-row gap-lg items-center">
        <div class="flex-1 col gap-md text-center md:text-left">
            <h2 class="heading">Ready to Begin?</h2>
            <p class="txt-2">Taking the first step is often the hardest. We've made our process simple and transparent to help you get started on your path to wellness.</p>
        </div>
        <div class="flex-shrink-0">
            <a href="<?php echo url('therapy'); ?>" class="btn-primary btn-lg">
                <span class="truncate-text">Browse Our Therapists</span>
            </a>
        </div>
    </div>
</section>

</div>
</main>

<?php include __DIR__ . '/../components/footer.php'; ?>

</div>
</div>
</body>
</html>
