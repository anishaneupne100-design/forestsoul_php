<?php
// yoga/index.php
$title = "Yoga Classes - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- HeroSection -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl"
                data-alt="A serene landscape with a person practicing yoga at sunrise, with misty mountains in the background."
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.3) 0%, rgba(16, 34, 22, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDN5oQVvWqDqcBJcaCYOpVwoIBAUu-1ZqBhb_xKu3X76vFbBGtI6fyMK2yhczp_nHdYcxZSsyZBnBh85xYFUCgo9dQFrXPcEm0O_nSD86l5OHOu-Kde4tShHE_rF8m7Wj4bhAGtqkX3NdSZ5zWweoB1d7MO2uroh2cwpcgQ8AiIvB5PO3j-59XJW-rXJGc5OGlm730E-6e8MPfrPGxQTeQ_0vCMcBlCvMegvwJ7ZFHRJv3-8Wxjl31k6Vlvbu0OL6RT9-mDe54-qn0");'>
                <div class="col gap-sm text-center max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Find Your Inner Flow</h1>
                    <p class="hero-text @[480px]:text-base">Discover peace and balance through our diverse range of yoga sessions, designed for every body and every soul.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('classes')">
                    <span class="truncate">Explore Classes</span>
                </button>
             </div>
        </div>
    </section>

    <!-- Filters -->
    <section class="section px-4" id="classes">
        <div class="row gap-3 overflow-x-auto pb-4 [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <button class="chip">Yoga Style <span class="material-symbols-outlined text-xs ml-1">expand_more</span></button>
            <button class="chip">Difficulty <span class="material-symbols-outlined text-xs ml-1">expand_more</span></button>
            <button class="chip">Instructor <span class="material-symbols-outlined text-xs ml-1">expand_more</span></button>
            <button class="chip">Duration <span class="material-symbols-outlined text-xs ml-1">expand_more</span></button>
        </div>

        <!-- Classes Grid -->
        <div class="grid-3 mt-4">
            <a href="<?php echo url('yoga/Gentle hatha flow .php'); ?>" class="card-feature group">
                <div class="img-landscape mb-2 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?auto=format&fit=crop&w=800&q=80" alt="Hatha Yoga" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Sunrise Vinyasa Flow</h3>
                    <p class="subtitle">Instructor: Nischita Sharma</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span class="bg-primary/20 text-primary px-2 py-0.5 rounded">Beginner</span>
                        <span class="bg-surface-dark px-2 py-0.5 rounded">60 MIN</span>
                    </div>
                </div>
            </a>

            <a href="<?php echo url('yoga/Gentle hatha flow .php'); ?>" class="card-feature group">
                <div class="img-landscape mb-2 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&w=800&q=80" alt="Restorative Yoga" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Gentle Hatha & Meditation</h3>
                    <p class="subtitle">Instructor: sagar karki</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span class="bg-primary/20 text-primary px-2 py-0.5 rounded">Beginner</span>
                        <span class="bg-surface-dark px-2 py-0.5 rounded">45 MIN</span>
                    </div>
                </div>
            </a>

            <a href="<?php echo url('yoga/Restorative  yoga .php'); ?>" class="card-feature group">
                <div class="img-landscape mb-2 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1599447421416-3414500d18a5?auto=format&fit=crop&w=800&q=80" alt="Yin Yoga" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Restorative Yin Yoga</h3>
                    <p class="subtitle">Instructor: kashish bagri</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span class="bg-primary/20 text-primary px-2 py-0.5 rounded">All Levels</span>
                        <span class="bg-surface-dark px-2 py-0.5 rounded">75 MIN</span>
                    </div>
                </div>
            </a>

            <a href="<?php echo url('yoga/power vinaysa yoga.php'); ?>" class="card-feature group">
                <div class="img-landscape mb-2 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1575052814086-f385e2e2ad1b?auto=format&fit=crop&w=800&q=80" alt="Power Yoga" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Power Yoga Burn</h3>
                    <p class="subtitle">Instructor: sajina magar</p>
                    <div class="row gap-sm txt-2 txt-xs mt-2 uppercase tracking-wider font-bold">
                        <span class="bg-primary/20 text-primary px-2 py-0.5 rounded">Advanced</span>
                        <span class="bg-surface-dark px-2 py-0.5 rounded">60 MIN</span>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <!-- Instructors -->
    <section class="section">
        <h2 class="section-title">Meet Our Instructors</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-lg p-4">
            <div class="col items-center text-center gap-3">
                <div class="w-24 h-24 rounded-full bg-surface-dark border-2 border-primary/30 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=anya" alt="Anya" class="w-full h-full object-cover">
                </div>
                <div class="col">
                    <p class="txt-md font-bold">Anya Sharma</p>
                    <p class="txt-2 txt-xs uppercase">Vinyasa & Flow</p>
                </div>
            </div>
            <div class="col items-center text-center gap-3">
                <div class="w-24 h-24 rounded-full bg-surface-dark border-2 border-primary/30 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=leo" alt="Leo" class="w-full h-full object-cover">
                </div>
                <div class="col">
                    <p class="txt-md font-bold">Leo Chen</p>
                    <p class="txt-2 txt-xs uppercase">Hatha & Meditation</p>
                </div>
            </div>
            <div class="col items-center text-center gap-3">
                <div class="w-24 h-24 rounded-full bg-surface-dark border-2 border-primary/30 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=sofia" alt="Sofia" class="w-full h-full object-cover">
                </div>
                <div class="col">
                    <p class="txt-md font-bold">Sofia Rossi</p>
                    <p class="txt-2 txt-xs uppercase">Yin & Restorative</p>
                </div>
            </div>
            <div class="col items-center text-center gap-3">
                <div class="w-24 h-24 rounded-full bg-surface-dark border-2 border-primary/30 center overflow-hidden">
                    <img src="https://i.pravatar.cc/150?u=marcus" alt="Marcus" class="w-full h-full object-cover">
                </div>
                <div class="col">
                    <p class="txt-md font-bold">Marcus Cole</p>
                    <p class="txt-2 txt-xs uppercase">Power & Strength</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>