<?php
// therapy/index.php
$title = "Therapy Services - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB_s5tMi90t9HCzU2nEN68VWxOL7zEklusUKtwdqFCuhgUgyt-yOBIyaRid6-fFMOBOqzQZrOQWleF6UfrgSBEI8lgBUhUo7lOmttnOU2-z2HScr4mTHL2UKfuho7sGG7O4NHUsLanLOJAAmm_kzLpBYuqqDos05YHLi7APMe7C7xiRx0_P51NTWGot0KuPNqPnIyCUWgKL-E-VzHxcrsQaTCItVfni4mXlvheoGYEN5asY7PdsF-rzCUipzqR4_xiw1wpbDhL8XfA");'>
                <div class="col gap-md text-center max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Personalized Therapy for Your Journey</h1>
                    <p class="hero-text @[480px]:text-lg">Find peace and clarity with compassionate, professional support tailored to your unique needs.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="requireAuth(() => gotoPage('<?php echo url('booking session/'); ?>'))">
                    <span class="truncate">Book a Free Consultation</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section">
        <div class="text-center mb-12 px-4">
            <h2 class="txt-3xl txt">Our Therapy Services</h2>
            <p class="txt-2 mt-3 max-w-2xl mx-auto">Choose the therapy type that best fits your needs and journey.</p>
        </div>
        
        <div class="grid-3 p-4">
            <div class="card-feature text-center group">
                <div class="icon-circle mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">person</span>
                </div>
                <h3 class="title">Individual Counseling</h3>
                <p class="subtitle">One-on-one sessions tailored to your personal goals and mental healing.</p>
            </div>
            
            <div class="card-feature text-center group">
                <div class="icon-circle mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">favorite</span>
                </div>
                <h3 class="title">Couple Therapy</h3>
                <p class="subtitle">Strengthen your relationship and improve communication together in a safe space.</p>
            </div>
            
            <div class="card-feature text-center group">
                <div class="icon-circle mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined text-3xl">groups</span>
                </div>
                <h3 class="title">Group Therapy</h3>
                <p class="subtitle">Find strength and understanding in a supportive community with shared experiences.</p>
            </div>
        </div>
    </section>

    <!-- Therapists -->
    <section class="section py-16 surface">
        <div class="text-center mb-12">
            <h2 class="txt-3xl txt">Meet Our Experts</h2>
            <p class="txt-2 mt-3">Dedicated professionals helping you reconnect with your inner self.</p>
        </div>
        <div class="grid-3 p-4">
            <div class="card bg-surface-dark border-white/5 text-center">
                <div class="w-20 h-20 rounded-full bg-primary/20 mx-auto mb-4 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=anya2" alt="Anya" class="w-full h-full object-cover">
                </div>
                <h3 class="txt-lg font-bold">Dr. Anya Sharma</h3>
                <p class="text-primary text-xs font-bold uppercase tracking-wider mb-2">PhD, LPC</p>
                <p class="txt-2 txt-sm italic">Specializes in mindfulness-based stress reduction and CBT.</p>
            </div>
            
            <div class="card bg-surface-dark border-white/5 text-center">
                <div class="w-20 h-20 rounded-full bg-primary/20 mx-auto mb-4 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=david" alt="David" class="w-full h-full object-cover">
                </div>
                <h3 class="txt-lg font-bold">David Chen</h3>
                <p class="text-primary text-xs font-bold uppercase tracking-wider mb-2">LCSW</p>
                <p class="txt-2 txt-sm italic">Focuses on trauma-informed care and relational therapy.</p>
            </div>
            
            <div class="card bg-surface-dark border-white/5 text-center">
                <div class="w-20 h-20 rounded-full bg-primary/20 mx-auto mb-4 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=maria" alt="Maria" class="w-full h-full object-cover">
                </div>
                <h3 class="txt-lg font-bold">Maria Garcia</h3>
                <p class="text-primary text-xs font-bold uppercase tracking-wider mb-2">LMFT</p>
                <p class="txt-2 txt-sm italic">Expert in family systems and anxiety support.</p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="section py-16 px-4 max-w-4xl mx-auto">
        <h2 class="section-title mb-10">Common Questions</h2>
        <div class="col gap-4">
            <details class="card bg-surface-dark/30 border-white/5 group">
                <summary class="between cursor-pointer font-bold">
                    <span>What can I expect in my first session?</span>
                    <span class="material-symbols-outlined transition group-open:rotate-180">expand_more</span>
                </summary>
                <div class="mt-4 txt-2 txt-sm leading-relaxed">
                    Your first session is a collaborative process to get to know each other and discuss your goals in a safe, judgment-free environment.
                </div>
            </details>
            
            <details class="card bg-surface-dark/30 border-white/5 group">
                <summary class="between cursor-pointer font-bold">
                    <span>Is what I share confidential?</span>
                    <span class="material-symbols-outlined transition group-open:rotate-180">expand_more</span>
                </summary>
                <div class="mt-4 txt-2 txt-sm leading-relaxed">
                    Yes, confidentiality is a legal and ethical cornerstone of therapy. Your privacy is our utmost priority.
                </div>
            </details>
        </div>
    </section>

    <section class="section p-4 pb-20">
        <div class="cta rounded-3xl">
            <h2 class="cta-title">Begin Your Healing Journey</h2>
            <p class="cta-text max-w-lg mx-auto">Our initial consultation is free and confidential. See if we're the right fit for you today.</p>
            <button class="btn-primary btn-lg px-10 mt-4" onclick="requireAuth(() => gotoPage('<?php echo url('booking session/'); ?>'))">Schedule Your Consultation</button>
        </div>
    </section>
</main>

<?php put_footer(); ?>