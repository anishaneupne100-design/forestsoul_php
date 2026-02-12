<?php
// therapy/individual counseling.php
$title = "Individual Counseling - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDx9Mb_XBk7_PBt3Jc2pXxpkgkcs-pqwqcNbP_uPVsvBHg0XerPvy7F-K49Nof3Z1aB8aHRLfYxBU_uLtESMDViRsl98qOjTb8SHxfB2sPTRh8RGZM-PEhBCP3OVbgUFip9BbDcEQnSXckY5WtzXf8XO6WzaZuIFR4dO3fUL-1egyh31Bu0IYnb_e1qjmhtAsYimelJw2WlpzaXHY7xnw3bzWz-4xqJH2qGN4snqHghMoaaz87mDPimJbfTXJ8IPs4aFpNoozntnF4");'>
                <div class="col gap-md max-w-3xl px-4">
                    <h1 class="hero-title @[480px]:text-5xl">Personalized Support for Your Journey</h1>
                    <p class="hero-text @[480px]:text-lg">Discover the benefits of one-on-one therapy in a safe, confidential, and supportive environment. We're here to help you navigate life's challenges at your own pace.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="requireAuth(() => gotoPage(ROUTES.therapy))">
                    <span class="truncate">Book a Free Consultation</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="section px-4 max-w-6xl mx-auto py-12">
        <h2 class="text-center txt-3xl font-bold mb-12">Why Choose Individual Counseling?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card bg-surface-dark border-white/5 p-8 col gap-4">
                <span class="material-symbols-outlined text-primary text-4xl">lock</span>
                <h3 class="txt-xl font-bold">Confidential Space</h3>
                <p class="txt-2 txt-sm">A secure and private setting where you can openly share your thoughts and feelings without judgment.</p>
            </div>
            <div class="card bg-surface-dark border-white/5 p-8 col gap-4">
                <span class="material-symbols-outlined text-primary text-4xl">psychology</span>
                <h3 class="txt-xl font-bold">Personal Strategies</h3>
                <p class="txt-2 txt-sm">Receive tailored guidance and coping mechanisms designed specifically for your unique situation and goals.</p>
            </div>
            <div class="card bg-surface-dark border-white/5 p-8 col gap-4">
                <span class="material-symbols-outlined text-primary text-4xl">hub</span>
                <h3 class="txt-xl font-bold">Self-Understanding</h3>
                <p class="txt-2 txt-sm">Gain valuable insights into your own patterns of thought, emotion, and behavior to foster long-term growth.</p>
            </div>
        </div>
    </section>

    <!-- Methods -->
    <section class="section px-4 py-20 bg-background-dark/50">
        <div class="max-w-5xl mx-auto">
            <h2 class="txt-3xl font-bold mb-10 text-center">Therapeutic Methods</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                <div class="col gap-2">
                    <h4 class="text-primary font-bold">Cognitive Behavioral Therapy (CBT)</h4>
                    <p class="txt-2 txt-sm">Helps you identify and change destructive thinking patterns. Practical and goal-oriented.</p>
                </div>
                <div class="col gap-2">
                    <h4 class="text-primary font-bold">Dialectical Behavior Therapy (DBT)</h4>
                    <p class="txt-2 txt-sm">Focuses on mindfulness, distress tolerance, and emotional regulation in relationships.</p>
                </div>
                <div class="col gap-2">
                    <h4 class="text-primary font-bold">Mindfulness-Based Therapy</h4>
                    <p class="txt-2 txt-sm">Integrates mindfulness with psychotherapy to reduce stress and improve self-awareness.</p>
                </div>
                <div class="col gap-2">
                    <h4 class="text-primary font-bold">Person-Centered Therapy</h4>
                    <p class="txt-2 txt-sm">A supportive environment where you explore your own feelings to find your own solutions.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>