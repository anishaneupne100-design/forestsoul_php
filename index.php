<?php
// index.php
$title = "ForestSoul - Find Your Inner Peace, Naturally";
include_once 'head.php';
include_once 'components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero Section -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl" data-alt="A tranquil forest scene with sunbeams filtering through the trees." 
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBXgjMUD2yXjytH2F1BCnM4F0za-WFf-ft7l-xCusCyq37Q8D4ZHINop1lWRsIzPOS1rhUZrbofVVJqxhvu6UmrPzHtU1QVyjKmFVHMd76R1E8GLbI7VdDHcLpeQ_5RQ2Jo5T7DnxmV0JGwsNW_FB2h9TdttHWCWNH90grVhoG3NvGHvORTMnAv0MCqQbKjgXtX1F-RqVcKH-5eKlRsFpbqnvBtMs_gZrNawEuaNj1lY4b7-KlJQ8b_LuTfvwFIpXHRDAxeBauTkhM");'>
                <div class="col gap-sm text-center max-w-2xl">
                    <h1 class="hero-title @[480px]:text-6xl">Find Your Inner Peace, Naturally</h1>
                    <p class="hero-text @[480px]:text-lg">Connecting mental wellness with the healing power of nature.</p>
                </div>
                <div class="row sm:flex-row gap-md mt-8">
                    <?php if (Auth::check()): ?>
                        <button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.questionnaire)">
                            <span class="truncate">Take Assessment</span>
                        </button>
                        <button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.profile)">
                            <span class="truncate">My Profile</span>
                        </button>
                    <?php else: ?>
                        <button class="btn-primary @[480px]:btn-lg" onclick="gotoPage(ROUTES.signup)">
                            <span class="truncate">Get Started</span>
                        </button>
                        <button class="btn-ghost @[480px]:btn-lg" onclick="gotoPage(ROUTES.login)">
                            <span class="truncate">Log In</span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Experts (Dynamic Sync) -->
    <section class="section py-20 bg-surface-dark/20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="between items-end mb-16">
                <div class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-[0.3em] text-primary">Healing Guides</span>
                    <h2 class="txt-3xl font-black text-white italic">Meet Our Specialists</h2>
                </div>
                <a href="<?php echo url('therapy/'); ?>" class="text-xs font-bold uppercase tracking-widest text-primary hover:opacity-80 transition-opacity row gap-2 items-center">
                    See All Experts <i class="fa-solid fa-arrow-right-long"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php 
                $expertsRes = get_active_experts();
                $hpExperts = array_slice($expertsRes['data'] ?? [], 0, 4);
                if (empty($hpExperts)):
                ?>
                    <div class="col-span-full admin-card p-12 center border-dashed">
                        <p class="txt-2 italic opacity-40">Our guardians are currently preparing their spaces. Check back soon.</p>
                    </div>
                <?php else: foreach($hpExperts as $ex): ?>
                    <a href="<?php echo url('Therapy/expert_details.php?id=' . $ex['id']); ?>" class="card bg-surface-dark border-white/5 p-8 rounded-[2.5rem] group hover:border-primary/30 transition-all duration-500 hover:-translate-y-2">
                        <div class="size-20 rounded-2xl overflow-hidden mb-6 mx-auto border-2 border-white/5 group-hover:border-primary transition-colors shadow-2xl">
                            <?php if ($ex['profile_picture']): ?>
                                <img src="<?php echo url($ex['profile_picture']); ?>" class="size-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <?php else: ?>
                                <div class="size-full center bg-white/5 text-primary"><i class="fa-solid fa-user-doctor text-2xl"></i></div>
                            <?php endif; ?>
                        </div>
                        <div class="text-center col gap-1">
                            <h3 class="font-bold text-white group-hover:text-primary transition-colors"><?php echo htmlspecialchars($ex['name'] . ' ' . $ex['lastname']); ?></h3>
                            <p class="text-[9px] font-black uppercase tracking-widest text-primary opacity-60"><?php echo htmlspecialchars($ex['specialization']); ?></p>
                            <div class="row gap-1 text-[8px] text-amber-500 center mt-2">
                                <?php 
                                $exAnalytics = get_expert_analytics($ex['id']);
                                for($i=1; $i<=5; $i++): 
                                ?>
                                    <i class="fa-<?php echo $i <= $exAnalytics['avg_rating'] ? 'solid' : 'regular'; ?> fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section">
        <div class="text-center px-4 mb-16 col gap-4">
            <span class="chip bg-primary/10 text-primary w-fit mx-auto uppercase font-black tracking-[0.2em] text-[10px]">What we offer</span>
            <h2 class="txt-4xl font-black text-white">Your Path to Wellness</h2>
            <p class="txt-lg txt-2 max-w-2xl mx-auto">Explore our comprehensive suite of tools designed to nurture your mind, body, and connection to nature.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 p-4 max-w-7xl mx-auto">
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('meditation/'); ?>">
                <div class="size-14 rounded-2xl bg-primary/10 center text-primary group-hover:bg-primary group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-person-praying text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-primary transition-colors">Meditation</h3>
                    <p class="subtitle text-sm leading-relaxed">Guided sessions to calm your mind and find focus in the present moment.</p>
                </div>
            </a>
            
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('yoga/'); ?>">
                <div class="size-14 rounded-2xl bg-secondary/10 center text-secondary group-hover:bg-secondary group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-child-reaching text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-secondary transition-colors">Yoga</h3>
                    <p class="subtitle text-sm leading-relaxed">Flows for every level to connect body and soul with mindful movement.</p>
                </div>
            </a>
            
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('therapy/'); ?>">
                <div class="size-14 rounded-2xl bg-accent-blue/10 center text-accent-blue group-hover:bg-accent-blue group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-user-doctor text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-accent-blue transition-colors">Therapy</h3>
                    <p class="subtitle text-sm leading-relaxed">Professional support tailored to your journey of mental healing.</p>
                </div>
            </a>
            
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('community/'); ?>">
                <div class="size-14 rounded-2xl bg-primary/10 center text-primary group-hover:bg-primary group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-people-group text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-primary transition-colors">Community</h3>
                    <p class="subtitle text-sm leading-relaxed">Join a safe space of like-minded individuals sharing their growth.</p>
                </div>
            </a>
            
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('games/'); ?>">
                <div class="size-14 rounded-2xl bg-secondary/10 center text-secondary group-hover:bg-secondary group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-brain text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-secondary transition-colors">Mind Games</h3>
                    <p class="subtitle text-sm leading-relaxed">Engaging puzzles to sharpen your cognitive skills and focus.</p>
                </div>
            </a>
            
            <a class="card-feature group hover:border-primary/50 hover:shadow-2xl hover:shadow-primary/5 transition-all duration-500" href="<?php echo url('events/'); ?>">
                <div class="size-14 rounded-2xl bg-accent-green/10 center text-accent-green group-hover:bg-accent-green group-hover:text-background-dark transition-all duration-500 shadow-lg">
                    <i class="fa-solid fa-calendar-star text-2xl group-hover:scale-110 transition-transform"></i>
                </div>
                <div class="col gap-2">
                    <h3 class="txt-xl font-bold group-hover:text-accent-green transition-colors">Events</h3>
                    <p class="subtitle text-sm leading-relaxed">Join live workshops, nature walks, and community healing circles near you.</p>
                </div>
            </a>
        </div>
    </section>

    <!-- How It Works -->
    <section class="section py-20 bg-surface-dark/40 relative overflow-hidden">
        <div class="absolute inset-0 bg-primary/5 [mask-image:radial-gradient(ellipse_at_center,transparent_0%,black_100%)]"></div>
        <div class="max-w-7xl mx-auto px-4 relative">
            <h2 class="txt-3xl font-black text-center mb-16 tracking-tight">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <div class="col items-center gap-6 group">
                    <div class="size-20 rounded-[2.5rem] bg-surface-dark border border-white/10 center shadow-xl rotate-6 group-hover:rotate-0 group-hover:scale-110 transition-all duration-500">
                        <i class="fa-solid fa-compass text-3xl text-primary"></i>
                    </div>
                    <h3 class="txt-xl font-bold">1. Explore</h3>
                    <p class="txt-base txt-2 leading-relaxed">Browse our diverse range of meditation, yoga, and therapy sessions tailored to your needs.</p>
                </div>
                <div class="col items-center gap-6 group">
                    <div class="size-20 rounded-[2.5rem] bg-surface-dark border border-white/10 center shadow-xl -rotate-6 group-hover:rotate-0 group-hover:scale-110 transition-all duration-500">
                        <i class="fa-solid fa-link text-3xl text-secondary"></i>
                    </div>
                    <h3 class="txt-xl font-bold">2. Connect</h3>
                    <p class="txt-base txt-2 leading-relaxed">Find the right guide or therapist for your journey and join our supportive community.</p>
                </div>
                <div class="col items-center gap-6 group">
                    <div class="size-20 rounded-[2.5rem] bg-surface-dark border border-white/10 center shadow-xl rotate-12 group-hover:rotate-0 group-hover:scale-110 transition-all duration-500">
                        <i class="fa-solid fa-seedling text-3xl text-accent-green"></i>
                    </div>
                    <h3 class="txt-xl font-bold">3. Grow</h3>
                    <p class="txt-base txt-2 leading-relaxed">Engage in practices that nurture your mind, body, and soul for lasting peace and balance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="section py-20">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="txt-3xl font-black text-center mb-16 tracking-tight">Voices of Our Community</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="card bg-surface-dark/50 border-white/5 p-10 rounded-[2rem] relative overflow-hidden group">
                    <i class="fa-solid fa-quote-left absolute -left-4 -top-4 text-8xl text-primary/5 group-hover:text-primary/10 transition-colors"></i>
                    <p class="txt-lg txt-2 italic leading-relaxed mb-6 font-medium relative z-10">"ForestSoul has been a sanctuary for me. The guided meditations helped me find calm during a stressful time. I'm so grateful for this platform."</p>
                    <div class="row items-center gap-4 relative z-10">
                        <div class="size-12 rounded-2xl bg-primary/20 center font-black text-primary">S</div>
                        <div class="col">
                            <p class="font-bold text-white">Sarah J.</p>
                            <span class="text-[10px] uppercase tracking-widest text-primary font-black">Member since 2023</span>
                        </div>
                    </div>
                </div>
                
                <div class="card bg-surface-dark/50 border-white/5 p-10 rounded-[2rem] relative overflow-hidden group">
                    <i class="fa-solid fa-quote-left absolute -left-4 -top-4 text-8xl text-secondary/5 group-hover:text-secondary/10 transition-colors"></i>
                    <p class="txt-lg txt-2 italic leading-relaxed mb-6 font-medium relative z-10">"Connecting with a therapist through this site was seamless and comfortable. The focus on nature-based wellness really resonates with me."</p>
                    <div class="row items-center gap-4 relative z-10">
                        <div class="size-12 rounded-2xl bg-secondary/20 center font-black text-secondary">M</div>
                        <div class="col">
                            <p class="font-bold text-white">Michael B.</p>
                            <span class="text-[10px] uppercase tracking-widest text-secondary font-black">Certified Member</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section p-4 pb-20">
        <div class="col center gap-10 rounded-[3rem] bg-gradient-to-br from-primary/20 to-primary/5 border border-primary/20 p-16 text-center max-w-5xl mx-auto shadow-3xl shadow-primary/5 relative overflow-hidden group">
            <div class="absolute -right-20 -bottom-20 size-80 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-all duration-700"></div>
            
            <div class="col gap-4 relative z-10">
                <h2 class="txt-5xl font-black text-white leading-tight">Begin Your Journey to <br><span class="text-primary italic">a Calmer You</span></h2>
                <p class="max-w-xl mx-auto txt-lg txt-2">Join the ForestSoul community today and take the first step towards a more peaceful and balanced life.</p>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-6 relative z-10 w-full max-w-md mx-auto">
                <?php if (Auth::check()): ?>
                    <button class="btn-primary h-14 flex-1 rounded-2xl row gap-3 items-center justify-center shadow-xl shadow-primary/20" onclick="gotoPage(ROUTES.meditation)">
                        <i class="fa-solid fa-play text-xs text-background-dark"></i>
                        <span class="font-bold">Start Meditation</span>
                    </button>
                <?php else: ?>
                    <button class="btn-primary h-14 flex-1 rounded-2xl shadow-xl shadow-primary/20 font-bold" onclick="gotoPage(ROUTES.signup)">
                        Join for Free
                    </button>
                    <button class="btn-ghost h-14 flex-1 rounded-2xl border border-white/10 hover:bg-white/5 font-bold" onclick="gotoPage(ROUTES.login)">
                        Log In
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>