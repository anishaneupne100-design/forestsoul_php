<?php
$title = 'Therapy Services - ForestSoul';
require_once __DIR__ . '/../head.php';
?>

<body class="body">
<div class="page">
<div class="layout">

<?php include __DIR__ . '/../navbar/index.php'; ?>

<main class="container-main">
<div class="content gap-lg">

<!-- Hero Section -->
<div class="@container mb-12">
    <div class="hero rounded-box" style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB_s5tMi90t9HCzU2nEN68VWxOL7zEklusUKtwdqFCuhgUgyt-yOBIyaRid6-fFMOBOqzQZrOQWleF6UfrgSBEI8lgBUhUo7lOmttnOU2-z2HScr4mTHL2UKfuho7sGG7O4NHUsLanLOJAAmm_kzLpBYuqqDos05YHLi7APMe7C7xiRx0_P51NTWGot0KuPNqPnIyCUWgKL-E-VzHxcrsQaTCItVfni4mXlvheoGYEN5asY7PdsF-rzCUipzqR4_xiw1wpbDhL8XfA");'>
        <div class="col gap-md text-center max-w-2xl">
            <h1 class="hero-title md:text-5xl">Personalized Therapy for Your Journey to Wellness</h1>
            <p class="hero-text md:text-lg">Find peace and clarity with compassionate, professional support tailored to your unique needs. Start your path to healing with us today.</p>
        </div>
        <a href="<?php echo url('login'); ?>" class="btn-primary btn-lg">
            <span class="truncate-text">Book a Free Consultation</span>
        </a>
    </div>
</div>

<!-- Intro Text -->
<p class="txt-2 txt-md text-center max-w-3xl mx-auto px-4 pb-8">
    At ForestSoul, we believe in a holistic approach to mental well-being, integrating evidence-based therapeutic practices with the grounding presence of nature. Our goal is to provide a safe, supportive space where you can explore, heal, and grow.
</p>

<!-- Therapy Type Cards -->
<div class="section">
    <h2 class="section-title">Our Therapy Services</h2>
    <p class="txt-2 text-center px-4 pb-10">Choose the therapy type that best fits your needs</p>
    
    <div class="grid-3 px-4">
        <!-- Individual Counseling Card -->
        <a href="<?php echo url('therapy_individual'); ?>" class="card-hover group">
            <div class="icon-circle mx-auto">
                <span class="material-symbols-outlined text-2xl">person</span>
            </div>
            <h3 class="title text-center">Individual Counseling</h3>
            <p class="subtitle text-center">One-on-one sessions tailored to your personal journey and goals.</p>
            <span class="link text-center group-hover:underline">Learn More →</span>
        </a>
        
        <!-- Couple Therapy Card -->
        <a href="<?php echo url('therapy_couple'); ?>" class="card-hover group">
            <div class="icon-circle mx-auto">
                <span class="material-symbols-outlined text-2xl">favorite</span>
            </div>
            <h3 class="title text-center">Couple Therapy</h3>
            <p class="subtitle text-center">Strengthen your relationship and improve communication together.</p>
            <span class="link text-center group-hover:underline">Learn More →</span>
        </a>
        
        <!-- Group Therapy Card -->
        <a href="<?php echo url('therapy_group'); ?>" class="card-hover group">
            <div class="icon-circle mx-auto">
                <span class="material-symbols-outlined text-2xl">groups</span>
            </div>
            <h3 class="title text-center">Group Therapy</h3>
            <p class="subtitle text-center">Find strength and understanding in a supportive community setting.</p>
            <span class="link text-center group-hover:underline">Learn More →</span>
        </a>
    </div>
</div>

<!-- Meet Our Therapists Section -->
<div class="section">
    <h2 class="section-title">Meet Our Therapists</h2>
    <p class="txt-2 text-center px-4 pb-10">Our team of licensed professionals is dedicated to your mental health and well-being.</p>
    
    <div class="grid-3 px-4">
        <!-- Therapist Card 1 -->
        <div class="card center-flex flex-col">
            <div class="w-32 h-32 rounded-full bg-cover bg-center border-2 border-primary" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBshvFr3L-lfWwn-cboyd5Hoaze2PFsEoFIH0GXfDrkACvhKacqacixWvbB3hhnZJnjWqI9kkjgxXxbRN5cemo9N4AVEbUeN2VwdlRC51DCclQMNzu8UpdoRyxidjwtnAmSg24S2tO6FhjG9NQ5Y6CtSnW-HVe7sDu-whKYpWHAzcfxKRhA8LNZ1EzPqtsfDRn5DjeCILv_kOCkNvhImsprXvZQ8C-RDQ37GPOYPaTfKFx-gFrU5VGwXIjKoR0TDL9gH_yJkUcNZP8");'></div>
            <h3 class="title mt-4">Dr. Anya Sharma</h3>
            <p class="text-primary text-sm font-medium">PhD, LPC</p>
            <p class="subtitle text-center mt-2">Specializes in mindfulness-based stress reduction and cognitive behavioral therapy (CBT).</p>
        </div>
        
        <!-- Therapist Card 2 -->
        <div class="card center-flex flex-col">
            <div class="w-32 h-32 rounded-full bg-cover bg-center border-2 border-primary" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAnapUb-kdsEgevQ6IiRN-AWd6xbBfZDaqsy9u4yVYVHmyDnKDZjxifD28-Avgt63VdFQw2nPEoehzdhQ8BxHiNaJW8bji1hmyHBAcdpMetUOnQ8tsf-hmHvm1dazQxTs-Q25mn6SMitJkroZluZrlTGkH8GKsPbbE3jyiXzguRS5vWa6JdTDb9P55D9zg3mP0xAODBE-mpOQn7tNcR7tbT4aWjL_mV9VKKxmgk3MiNoL8PLohEPDhDnCS8u2K8qj9rFo93a4-G8Kw");'></div>
            <h3 class="title mt-4">David Chen</h3>
            <p class="text-primary text-sm font-medium">LCSW</p>
            <p class="subtitle text-center mt-2">Focuses on trauma-informed care and relational therapy for individuals and couples.</p>
        </div>
        
        <!-- Therapist Card 3 -->
        <div class="card center-flex flex-col">
            <div class="w-32 h-32 rounded-full bg-cover bg-center border-2 border-primary" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCvfutLSzUWILzTGYZaHiAk2QA0MYqtJO3e0IFb2GMFZIzg-jXfLzp-B1s9mXT46vyRjBp2tVZ7XGrTA09XmaxMUtiMBrMym26YUAWS1gEojQwaVBC0liEBF69z-OcrAKsmaSkcTm4Q4bl5xbe3ePDcO7eNzVqeGdytWDgT4K3l4sDn35GWqI6sDD9T8DIUtTqCCaixGXq7qxpOnI_qcLvRLhgQyA2nC69R6lNoKt-aNDSLCrPWo74TvkHTZy6qfd-4H3YmrTvyFmA");'></div>
            <h3 class="title mt-4">Maria Garcia</h3>
            <p class="text-primary text-sm font-medium">LMFT</p>
            <p class="subtitle text-center mt-2">Expert in family systems and provides support for anxiety and life transitions.</p>
        </div>
    </div>
</div>

<!-- Our Therapeutic Approaches Section -->
<div class="section px-4">
    <h2 class="section-title">Our Therapeutic Approaches</h2>
    <p class="txt-2 text-center max-w-2xl mx-auto pb-10">We utilize a range of evidence-based methods to create a personalized treatment plan that best suits your needs.</p>
    
    <div class="grid-2 max-w-4xl mx-auto">
        <div class="card">
            <h3 class="title">Cognitive Behavioral Therapy (CBT)</h3>
            <p class="subtitle">A practical, hands-on approach to problem-solving. Its goal is to change patterns of thinking or behavior that are behind people's difficulties.</p>
        </div>
        <div class="card">
            <h3 class="title">Mindfulness-Based Therapy</h3>
            <p class="subtitle">Integrates mindfulness practices like meditation and breathing exercises to help you better manage your thoughts and emotions.</p>
        </div>
        <div class="card">
            <h3 class="title">Humanistic Therapy</h3>
            <p class="subtitle">Focuses on your unique potential and stresses the importance of growth and self-actualization, helping you recognize your strengths.</p>
        </div>
        <div class="card">
            <h3 class="title">Psychodynamic Therapy</h3>
            <p class="subtitle">Explores how your unconscious mind and past experiences shape your current behaviors and feelings.</p>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="section px-4">
    <h2 class="section-title">Frequently Asked Questions</h2>
    
    <div class="max-w-3xl mx-auto col gap-md">
        <details class="card group [&_summary::-webkit-details-marker]:hidden">
            <summary class="between cursor-pointer">
                <h3 class="title">What can I expect in my first session?</h3>
                <span class="material-symbols-outlined txt-2 transition group-open:rotate-180">expand_more</span>
            </summary>
            <p class="subtitle mt-4">Your first session is an opportunity for you and your therapist to get to know each other. You'll discuss what brought you to therapy, your goals, and any concerns you have. It's a collaborative process to ensure you feel comfortable and understood.</p>
        </details>
        
        <details class="card group [&_summary::-webkit-details-marker]:hidden">
            <summary class="between cursor-pointer">
                <h3 class="title">How long does each therapy session last?</h3>
                <span class="material-symbols-outlined txt-2 transition group-open:rotate-180">expand_more</span>
            </summary>
            <p class="subtitle mt-4">Individual therapy sessions typically last for 50 minutes. Group therapy sessions may range from 60 to 90 minutes, depending on the specific group's format and goals.</p>
        </details>
        
        <details class="card group [&_summary::-webkit-details-marker]:hidden">
            <summary class="between cursor-pointer">
                <h3 class="title">Is what I share in therapy confidential?</h3>
                <span class="material-symbols-outlined txt-2 transition group-open:rotate-180">expand_more</span>
            </summary>
            <p class="subtitle mt-4">Yes, confidentiality is a cornerstone of therapy. Everything you discuss with your therapist is private, with a few legal and ethical exceptions designed to protect your safety and the safety of others, which will be explained in your first session.</p>
        </details>
    </div>
</div>

<!-- CTA Section -->
<div class="section px-4">
    <div class="card bg-primary/20 dark:bg-primary/10 border-primary/30 center-flex flex-col text-center py-12">
        <h2 class="txt-2xl txt mb-4">Ready to Begin Your Journey?</h2>
        <p class="txt-2 max-w-xl mb-6">Take the first step towards a healthier mind. Our initial consultation is free, confidential, and a great way to see if we're the right fit for you.</p>
        <a href="<?php echo url('login'); ?>" class="btn-primary btn-lg">
            <span class="truncate-text">Schedule Your Free Consultation</span>
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
