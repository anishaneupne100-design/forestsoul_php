<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Therapy Services - ForestSoul</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24
        }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#13ec5b",
              "background-light": "#f6f8f6",
              "background-dark": "#102216",
              "surface": "#23482f",
              "text-primary": "#ffffff",
              "text-secondary": "#92c9a4",
              "brand": "#112217"
            },
            fontFamily: {
              "display": ["Manrope", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.75rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark text-text-primary">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<!-- TopNavBar -->
<header class="sticky top-0 z-50 w-full bg-background-dark/80 backdrop-blur-md">
<div class="flex items-center justify-between whitespace-nowrap border-b border-solid border-surface px-4 sm:px-8 lg:px-10 py-3 max-w-7xl mx-auto">
<div class="flex items-center gap-4 text-white">
<div class="size-6 text-primary">
<svg fill="none" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_319)">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z" fill="currentColor"></path>
</g>
<defs>
<clippath id="clip0_6_319">
<rect fill="white" height="48" width="48"></rect>
</clippath>
</defs>
</svg>
</div>
<h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden lg:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Home</a>
<a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Meditation</a>
<a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Yoga</a>
<a class="text-primary text-sm font-bold leading-normal" href="#">Therapy</a>
<a class="text-white text-sm font-medium leading-normal hover:text-primary transition-colors" href="#">Donate</a>
</div>
<div class="flex items-center gap-2">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-brand text-sm font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
<span class="truncate">Book a Session</span>
</button>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-surface text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-surface/80 transition-colors">
<span class="truncate">Log In</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDG1Cx7mcII_nMpCWeOmGfxLQ70koEPJ_jM4wq1vIyF8yVKCZLMB3SVNLLPLk-nGbibIxe0cqFWOSoaTWLU1U1XWgN1kqpN3X-_1W7hZji0rSY0Gm45x1f_5De4x0WyIwzWsb_ei9K5tkP59c7SrDIKt8rS3ELVaTMKma8tFkLyldJa77HB0IMb-Vzj1zhAbIZQcL_3hqn6Sqql7E3ILaxsFvL5sTeOzdNVrTdbYiD0R3k0f9pJrTwvykBIXXh-gL0sJy4KhuEL1SU");'></div>
</div>
</div>
<button class="lg:hidden flex items-center justify-center rounded-lg h-10 w-10 bg-surface text-white">
<span class="material-symbols-outlined">menu</span>
</button>
</div>
</header>
<main class="flex flex-1 justify-center py-5 sm:py-10">
<div class="layout-content-container flex flex-col max-w-5xl flex-1 px-4 sm:px-6 lg:px-8">
<!-- HeroSection -->
<div class="@container mb-12">
<div class="@[480px]:p-0">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4" data-alt="A serene, sunlit path through a lush green forest, conveying tranquility and hope." style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB_s5tMi90t9HCzU2nEN68VWxOL7zEklusUKtwdqFCuhgUgyt-yOBIyaRid6-fFMOBOqzQZrOQWleF6UfrgSBEI8lgBUhUo7lOmttnOU2-z2HScr4mTHL2UKfuho7sGG7O4NHUsLanLOJAAmm_kzLpBYuqqDos05YHLi7APMe7C7xiRx0_P51NTWGot0KuPNqPnIyCUWgKL-E-VzHxcrsQaTCItVfni4mXlvheoGYEN5asY7PdsF-rzCUipzqR4_xiw1wpbDhL8XfA");'>
<div class="flex flex-col gap-4 text-center max-w-2xl">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                        Personalized Therapy for Your Journey to Wellness
                                    </h1>
<h2 class="text-text-secondary text-base font-normal leading-normal @[480px]:text-lg @[480px]:font-normal @[480px]:leading-normal">
                                        Find peace and clarity with compassionate, professional support tailored to your unique needs. Start your path to healing with us today.
                                    </h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-brand text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors">
<span class="truncate">Book a Free Consultation</span>
</button>
</div>
</div>
</div>
<!-- BodyText -->
<p class="text-text-secondary text-base font-normal leading-relaxed pb-8 pt-1 px-4 text-center max-w-3xl mx-auto">
                        At ForestSoul, we believe in a holistic approach to mental well-being, integrating evidence-based therapeutic practices with the grounding presence of nature. Our goal is to provide a safe, supportive space where you can explore, heal, and grow.
                    </p>
<!-- SegmentedButtons -->
<div class="flex px-4 py-3 justify-center mb-10">
<div class="flex h-12 w-full max-w-md items-center justify-center rounded-lg bg-surface p-1.5">
<label class="flex cursor-pointer h-full grow items-center justify-center overflow-hidden rounded-md px-2 has-[:checked]:bg-background-dark has-[:checked]:shadow-[0_0_4px_rgba(0,0,0,0.1)] has-[:checked]:text-white text-text-secondary text-sm font-medium leading-normal transition-colors">
<span class="truncate">Individual Therapy</span>
<input checked="" class="invisible w-0" name="therapy_type" type="radio" value="Individual Therapy"/>
</label>
<label class="flex cursor-pointer h-full grow items-center justify-center overflow-hidden rounded-md px-2 has-[:checked]:bg-background-dark has-[:checked]:shadow-[0_0_4px_rgba(0,0,0,0.1)] has-[:checked]:text-white text-text-secondary text-sm font-medium leading-normal transition-colors">
<span class="truncate">Group Therapy</span>
<input class="invisible w-0" name="therapy_type" type="radio" value="Group Therapy"/>
</label>
</div>
</div>
<!-- SectionHeader -->
<h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5 text-center">Meet Our Therapists</h2>
<p class="text-text-secondary text-center px-4 pb-10">Our team of licensed professionals is dedicated to your mental health and well-being.</p>
<!-- Therapist Profile Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
<!-- Card 1 -->
<div class="flex flex-col items-center text-center bg-surface/50 rounded-lg p-6 border border-surface">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-32 mb-4 border-2 border-primary" data-alt="Headshot of Dr. Anya Sharma" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBshvFr3L-lfWwn-cboyd5Hoaze2PFsEoFIH0GXfDrkACvhKacqacixWvbB3hhnZJnjWqI9kkjgxXxbRN5cemo9N4AVEbUeN2VwdlRC51DCclQMNzu8UpdoRyxidjwtnAmSg24S2tO6FhjG9NQ5Y6CtSnW-HVe7sDu-whKYpWHAzcfxKRhA8LNZ1EzPqtsfDRn5DjeCILv_kOCkNvhImsprXvZQ8C-RDQ37GPOYPaTfKFx-gFrU5VGwXIjKoR0TDL9gH_yJkUcNZP8");'></div>
<h3 class="text-lg font-bold text-white">Dr. Anya Sharma</h3>
<p class="text-sm text-primary font-medium mb-2">PhD, LPC</p>
<p class="text-sm text-text-secondary leading-relaxed">Specializes in mindfulness-based stress reduction and cognitive behavioral therapy (CBT).</p>
</div>
<!-- Card 2 -->
<div class="flex flex-col items-center text-center bg-surface/50 rounded-lg p-6 border border-surface">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-32 mb-4 border-2 border-primary" data-alt="Headshot of David Chen" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAnapUb-kdsEgevQ6IiRN-AWd6xbBfZDaqsy9u4yVYVHmyDnKDZjxifD28-Avgt63VdFQw2nPEoehzdhQ8BxHiNaJW8bji1hmyHBAcdpMetUOnQ8tsf-hmHvm1dazQxTs-Q25mn6SMitJkroZluZrlTGkH8GKsPbbE3jyiXzguRS5vWa6JdTDb9P55D9zg3mP0xAODBE-mpOQn7tNcR7tbT4aWjL_mV9VKKxmgk3MiNoL8PLohEPDhDnCS8u2K8qj9rFo93a4-G8Kw");'></div>
<h3 class="text-lg font-bold text-white">David Chen</h3>
<p class="text-sm text-primary font-medium mb-2">LCSW</p>
<p class="text-sm text-text-secondary leading-relaxed">Focuses on trauma-informed care and relational therapy for individuals and couples.</p>
</div>
<!-- Card 3 -->
<div class="flex flex-col items-center text-center bg-surface/50 rounded-lg p-6 border border-surface">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-32 mb-4 border-2 border-primary" data-alt="Headshot of Maria Garcia" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCvfutLSzUWILzTGYZaHiAk2QA0MYqtJO3e0IFb2GMFZIzg-jXfLzp-B1s9mXT46vyRjBp2tVZ7XGrTA09XmaxMUtiMBrMym26YUAWS1gEojQwaVBC0liEBF69z-OcrAKsmaSkcTm4Q4bl5xbe3ePDcO7eNzVqeGdytWDgT4K3l4sDn35GWqI6sDD9T8DIUtTqCCaixGXq7qxpOnI_qcLvRLhgQyA2nC69R6lNoKt-aNDSLCrPWo74TvkHTZy6qfd-4H3YmrTvyFmA");'></div>
<h3 class="text-lg font-bold text-white">Maria Garcia</h3>
<p class="text-sm text-primary font-medium mb-2">LMFT</p>
<p class="text-sm text-text-secondary leading-relaxed">Expert in family systems and provides support for anxiety and life transitions.</p>
</div>
</div>
<!-- Our Approach Section -->
<div class="py-16 mt-16 px-4">
<h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] pb-3 text-center">Our Therapeutic Approaches</h2>
<p class="text-text-secondary text-center max-w-2xl mx-auto pb-10">We utilize a range of evidence-based methods to create a personalized treatment plan that best suits your needs.</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
<div class="p-6 bg-surface/50 rounded-lg border border-surface">
<h3 class="text-lg font-bold text-white mb-2">Cognitive Behavioral Therapy (CBT)</h3>
<p class="text-text-secondary text-sm">A practical, hands-on approach to problem-solving. Its goal is to change patterns of thinking or behavior that are behind people’s difficulties.</p>
</div>
<div class="p-6 bg-surface/50 rounded-lg border border-surface">
<h3 class="text-lg font-bold text-white mb-2">Mindfulness-Based Therapy</h3>
<p class="text-text-secondary text-sm">Integrates mindfulness practices like meditation and breathing exercises to help you better manage your thoughts and emotions.</p>
</div>
<div class="p-6 bg-surface/50 rounded-lg border border-surface">
<h3 class="text-lg font-bold text-white mb-2">Humanistic Therapy</h3>
<p class="text-text-secondary text-sm">Focuses on your unique potential and stresses the importance of growth and self-actualization, helping you recognize your strengths.</p>
</div>
<div class="p-6 bg-surface/50 rounded-lg border border-surface">
<h3 class="text-lg font-bold text-white mb-2">Psychodynamic Therapy</h3>
<p class="text-text-secondary text-sm">Explores how your unconscious mind and past experiences shape your current behaviors and feelings.</p>
</div>
</div>
</div>
<!-- FAQ Section -->
<div class="py-16 px-4">
<h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] pb-10 text-center">Frequently Asked Questions</h2>
<div class="max-w-3xl mx-auto space-y-4">
<details class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
<summary class="flex cursor-pointer items-center justify-between gap-1.5">
<h3 class="text-white font-semibold">What can I expect in my first session?</h3>
<span class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-4 leading-relaxed text-text-secondary">Your first session is an opportunity for you and your therapist to get to know each other. You'll discuss what brought you to therapy, your goals, and any concerns you have. It's a collaborative process to ensure you feel comfortable and understood.</p>
</details>
<details class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
<summary class="flex cursor-pointer items-center justify-between gap-1.5">
<h3 class="text-white font-semibold">How long does each therapy session last?</h3>
<span class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-4 leading-relaxed text-text-secondary">Individual therapy sessions typically last for 50 minutes. Group therapy sessions may range from 60 to 90 minutes, depending on the specific group's format and goals.</p>
</details>
<details class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
<summary class="flex cursor-pointer items-center justify-between gap-1.5">
<h3 class="text-white font-semibold">Is what I share in therapy confidential?</h3>
<span class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-4 leading-relaxed text-text-secondary">Yes, confidentiality is a cornerstone of therapy. Everything you discuss with your therapist is private, with a few legal and ethical exceptions designed to protect your safety and the safety of others, which will be explained in your first session.</p>
</details>
</div>
</div>
</div>
</main>
</div>
</div>
</body></html>
