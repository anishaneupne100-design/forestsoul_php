<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Yoga Sessions - ForestSoul</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
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
            },
            fontFamily: {
              "display": ["Manrope", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex h-auto min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col w-full max-w-[960px] flex-1">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 dark:border-b-[#23482f] px-4 sm:px-6 lg:px-10 py-3">
<div class="flex items-center gap-4 text-white">
<div class="size-6 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_319)">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path>
</g>
<defs>
<clippath id="clip0_6_319"><rect fill="white" height="48" width="48"></rect></clippath>
</defs>
</svg>
</div>
<h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden md:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-white text-sm font-medium leading-normal" href="#">Yoga</a>
<a class="text-white text-sm font-medium leading-normal" href="#">Meditation</a>
<a class="text-white text-sm font-medium leading-normal" href="#">Therapy</a>
<a class="text-white text-sm font-medium leading-normal" href="#">Donate</a>
</div>
<div class="flex gap-2">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Sign Up</span>
</button>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#23482f] text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Log In</span>
</button>
</div>
</div>
</header>
<!-- HeroSection -->
<main class="flex flex-col gap-8 mt-5">
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4" data-alt="A serene landscape with a person practicing yoga at sunrise, with misty mountains in the background." style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuDN5oQVvWqDqcBJcaCYOpVwoIBAUu-1ZqBhb_xKu3X76vFbBGtI6fyMK2yhczp_nHdYcxZSsyZBnBh85xYFUCgo9dQFrXPcEm0O_nSD86l5OHOu-Kde4tShHE_rF8m7Wj4bhAGtqkX3NdSZ5zWweoB1d7MO2uroh2cwpcgQ8AiIvB5PO3j-59XJW-rXJGc5OGlm730E-6e8MPfrPGxQTeQ_0vCMcBlCvMegvwJ7ZFHRJv3-8Wxjl31k6Vlvbu0OL6RT9-mDe54-qn0");'>
<div class="flex flex-col gap-2 text-center">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">Find Your Inner Flow</h1>
<h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">Discover peace and balance through our diverse range of yoga sessions, designed for every body and every soul.</h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Explore Classes</span>
</button>
</div>
</div>
</div>
<!-- Chips -->
<div class="flex gap-3 p-3 overflow-x-auto">
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#23482f] pl-4 pr-2">
<p class="text-white text-sm font-medium leading-normal">Yoga Style</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#23482f] pl-4 pr-2">
<p class="text-white text-sm font-medium leading-normal">Difficulty</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#23482f] pl-4 pr-2">
<p class="text-white text-sm font-medium leading-normal">Instructor</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#23482f] pl-4 pr-2">
<p class="text-white text-sm font-medium leading-normal">Duration</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-[#23482f] pl-4 pr-2">
<p class="text-white text-sm font-medium leading-normal">Live/On-Demand</p>
<span class="material-symbols-outlined text-white text-lg">expand_more</span>
</button>
</div>
<!-- ImageGrid -->
<div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 p-4">
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="Woman doing yoga in a bright, sunlit room" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBJ2Vj-rx1Z75iH067FWZ6bHKr-nxhjf-k_BpOV-ju-CfHahpr_YDGKosQ3vt4Son_WJ6gan6qNEApWQlxCdDUCHMdQ-Pz2Y_9uLOK2IKL1NsWXQSz6rlx8qoq6Frwv4SK31dsOIm-hthW9hm-2gLOCgv9A_yRQhwmmOwaIA5I0W9liomN_m1XQRrbBEUSMcBXxn_-GkS46wgfzHmiZDApM6YG6DRZw5n5NLBqxtj8EGEi1UDhB00d5x5aacLUWXbf2wef-ieuPxJs");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Sunrise Vinyasa Flow</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Anya Sharma</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Beginner | 60 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="Man meditating on a yoga mat outdoors" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTO08YXlFZOweeyO3VJDp7YeJvxVSnjGQASxsAIsVWHLI60l8JyvSNQjXumdypYHGaOPVFxOP77TsGpBg3-VhSpOVE4DztJgf7CBX52_j6gbzR4mJ3Tn4h2Wh10zTMXYazaoxQJCD3tySqEDhdR2kxgWJDFrhm-15eUDyB8WjPjdJJgQfAwAEp_ZQkfaSZqWjXhthwlWs3uvA3Y1doN66Wylf1lFevOjbOzdxLMVrGx7RBn4BhiGsUQ_lQ_-hmzDMeO94dMliIm0E");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Gentle Hatha &amp; Meditation</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Leo Chen</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Beginner | 45 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="Woman in a relaxed yin yoga pose with props" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuARiL99noz_Y-BQgXHShJLvDxZsLy0O6sKYM24dtC76Wd9Y2T5P8eyaM6sVqlmpxH5WLaLg0LIiaSRSc8u5-MvLKnTLOd1qUzcp0UWgPkhxdzM4axgcjmRjDjOTculw_SFiTRYUP2pGaw-NQOPK5LlPn-Fc4suMfCAav3449IfsLohVKhV3GxGKDi7OxpjFP-1RlzDv7SRQG3igSYH1cyesa1BooKiCvz61QS1SSIzlq0Mgy5DE-EPFJj6i7FTi6buT-NCbNjbvfSU");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Restorative Yin Yoga</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Sofia Rossi</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">All Levels | 75 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="Man in a powerful yoga warrior pose" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBeMZu3LT1P2-VBaV47Gaq_3jhqEJJYMpMFCHIf11VD9jPffSha_9UUlj1vKn705rNDbEgjBoZQhDu4tScV2d2NNWzW6zouvKjGGqOQ_4ARIR-NxFwoiYCRbDlpj8SII6fExWS4Gl4Suo-VDAy62j7mcnG0578AvzvmplucqSsp7pst6YcAPDMoSuarxv6rf_eDg2Bf5XabgFWjBoPV7eX1JIvYJ0TLQkGi4Zoh61M7x6OZMfxZH394IdsngncXzN303R9di5U14F8");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Power Yoga Burn</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Marcus Cole</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Advanced | 60 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="Woman stretching gently by a window" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBMVGjK_edzc8vLKEJ699P6BJGy9Jm_cJrFaytXWuFzZ7A3qVHQHx5LmNPne_YrmEpVep7h8vcfcZuvQn34tFFhYu8AMwUKFLfNokqdmFM-YGbnHjqJLZOa_jNVsCJT9D8oDIx316_brN3vmMb-NXrh73uTjiIB-U9-KSaPF3TpvrOe7H6H_ZKPiKOchc7KBCDSFwa4ddtoVUuekG_WM3rV3tDOp4HbkFZkqVfy4c6ZVgEgC7vB6uON5Ap_Egp-Uf7K_KDegyExqCM");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Mindful Afternoon Stretch</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Anya Sharma</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">All Levels | 30 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl" data-alt="A person demonstrating a core-strengthening yoga pose" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAtM3ZeIerIifKGmC_6rnJ8PoLeGMy239X7TZy6KsnjEq1Ja4BWZtSkyIfdLOB3MwPGt5sQBnOp_C4dtwT2Wqzuo8IonDUnXM-ofomfXkM6zWqfydJUHEtt4oIk2ldhyAxun1w1A5zmdyQGeN1uMybixy45gsXpawhU-r9LwAmSQpk8z1ZPCy7aUE4Y_cx6p6zjqyE4snAKA84vaKwTakTjJgQOYe0lq4LLYjgUiJx-__yhm1mieZ0kDnwalARa00vMJr3sV_zHxog");'></div>
<div>
<p class="text-white text-base font-medium leading-normal">Core Strength Fusion</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Instructor: Leo Chen</p>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Intermediate | 45 min</p>
</div>
</div>
</div>
<!-- SectionHeader -->
<h2 class="text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Meet Our Instructors</h2>
<!-- Instructor Spotlight Section -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 p-4">
<div class="flex flex-col items-center text-center gap-3">
<div class="w-24 h-24 bg-center bg-no-repeat aspect-square bg-cover rounded-full" data-alt="Portrait of Anya Sharma, a yoga instructor" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCcCSX80fJuf2uQzhEPpSVX1C33GdQYVmVUtFLFH7263ezDoYH1eqFmX1F1NP5GCVnM1j4rE1OLokyZZ1LExfK7ILDttJGauEi1qWWAXTAkWAqyBZpj43LDalvId94E9R5MjQKYTab_oYqeWozi-mVwaZLRxQ6jQM_16DluHsRFwZ4dOV-e1VlJN_c1mGZ37hT6KwKdjnCpIS8A6CptuySsGcndtYpj8vuxX-1B-E-IoVcoe8RsYDnzJT76PqFvngI-_VlQP8HuYsc");'></div>
<div>
<p class="text-white text-base font-medium">Anya Sharma</p>
<p class="text-[#92c9a4] text-sm">Vinyasa &amp; Flow</p>
</div>
</div>
<div class="flex flex-col items-center text-center gap-3">
<div class="w-24 h-24 bg-center bg-no-repeat aspect-square bg-cover rounded-full" data-alt="Portrait of Leo Chen, a yoga instructor" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCDgulsbbmw-iaYSnL40xLm31iu_gCAR6v4zXwft2utqzblwRM0bv4LkQmyXwXmFu9TibxMtAebmKAjxOB32-HjnvNLLo6y8XMiPUVBjqRqHYj5qGmTQ12WQkRQQszlzDRE68TWGuzvdTRzSd3mdvzD6K0Kma8BoWSEsmKq_-o9jz2oJKWj0Qskm714KUw0cEgdVoT1bV1rhI3fCpq1pO_GWWZ9CfepFbT6lf8ww-3jG9bpKMXX_6i05xW9Zu2k5jGuYPvLzFQRwQg");'></div>
<div>
<p class="text-white text-base font-medium">Leo Chen</p>
<p class="text-[#92c9a4] text-sm">Hatha &amp; Meditation</p>
</div>
</div>
<div class="flex flex-col items-center text-center gap-3">
<div class="w-24 h-24 bg-center bg-no-repeat aspect-square bg-cover rounded-full" data-alt="Portrait of Sofia Rossi, a yoga instructor" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB0MsBW4636lPqTyE6nd74NU3q_heOv1PshdK8qZXfVzqZldnA3dTRbOsKdB-1ODgT7sSrtR9YgHrrsSRptbmV-zfZfJFYjwSb6lX7vB8tsjWFRoSGxSs5kHDluK6FfloPwnAA4Z7V38dDrWxKdPQ7SujE3rjkklFVrWbzPMWxTWlrkY0wSuzbAPy7ir9gh45An01YycqE3_9G9xHu3XZb2B2-tXjZ9EhhnC5_xfd_GgbxrC-LV5ybSv9IjSvb48CZiNrtSbD5fh0M");'></div>
<div>
<p class="text-white text-base font-medium">Sofia Rossi</p>
<p class="text-[#92c9a4] text-sm">Yin &amp; Restorative</p>
</div>
</div>
<div class="flex flex-col items-center text-center gap-3">
<div class="w-24 h-24 bg-center bg-no-repeat aspect-square bg-cover rounded-full" data-alt="Portrait of Marcus Cole, a yoga instructor" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTMX2TF_9T3o8M0vTWSy4zQlF6eKEq2za4h5pAR7JzMofh3Xg1TZtzabG60UlW93EWb7w2Mcf4rKe_RDQX0ZuTkzVbdqBJWOgfXZdMecYvk-BmxTFexYgyMdn4NCwneMYhd33gbrlYi5KJ8VzNGDzNca8QjZgSkWQGQtnwsYhxVMugdGCmRCV3N11wviff-rLPwXme8fSjQEAhPoqoG3DEFNKaMe4zhz3K7Ep5_e1x0bDpAFKGTFOgJfc9FHLJq0wV81XlW6HI3Bs");'></div>
<div>
<p class="text-white text-base font-medium">Marcus Cole</p>
<p class="text-[#92c9a4] text-sm">Power &amp; Strength</p>
</div>
</div>
</div>
</main>
</div>
</div>
</div>
</div>
</body></html>