<!DOCTYPE html>

<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ForestSoul Community</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700;800&amp;display=swap" rel="stylesheet"/>
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
<div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="flex flex-1 justify-center py-5 sm:px-4 md:px-10 lg:px-20 xl:px-40">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 dark:border-b-[#23482f] px-4 sm:px-6 lg:px-10 py-3">
<div class="flex items-center gap-4 text-black dark:text-white">
<div class="size-6 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_319)">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path>
</g>
<defs><clippath id="clip0_6_319"><rect fill="white" height="48" width="48"></rect></clippath></defs>
</svg>
</div>
<h2 class="text-black dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden md:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white text-sm font-medium leading-normal" href="#">Meditation</a>
<a class="text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white text-sm font-medium leading-normal" href="#">Yoga</a>
<a class="text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white text-sm font-medium leading-normal" href="#">Therapy</a>
<a class="text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white text-sm font-medium leading-normal" href="#">Donate</a>
<a class="text-black dark:text-white text-sm font-bold leading-normal" href="#">Community</a>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Sign In</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User's profile picture" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBYYb4CGFnekS0VnTJ865DGStVjt6mwGdiQPfdRFS9jWqpu3phRxoralmE-HS2dAP0_BujA-Px5x_i6SxpQsN0dwdVAaHLRYcgUxjQmZSTfZxLyay8Pwl9kRdT_ThnFgBa2EaLr7kpNn0QX-f0m7CnKk9wcmf0JVwAX4ptsXHNKoCINB8FjYOiWX74OQ9Mc1gm-svp5PII70_rviaFJWowDQcU5FMlmUie3RUIO9TSbOEqz7FDrYz2VBtM36ry1FCXcgVbjT5Toi5o");'></div>
</div>
<button class="md:hidden text-black dark:text-white">
<span class="material-symbols-outlined">menu</span>
</button>
</header>
<!-- HeroSection -->
<main class="flex-1 mt-5">
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 text-center" data-alt="A serene, soft-focus image of a sunlit forest path" style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(16, 34, 22, 0.6) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuARkyWJWRxbGWSw9_bYsonTf40fjXNXBoN8MFW9gQG9_Zi6FRp1D1VC1-eDWFRp3x9RHOTH3S4MJzaLuR6UYRH2uM5nb92eKObyDLkSBLznmGcAcRxY6oH9qG20A_ihmB6ZgVbLbvLl_HO4x7QnQ6RTZ1aPLCkzOne-FY4vBrR8m901pbbGT-Yj8xCOdqNaue3lgJbJkpOVl6sVScsD14Wv1nshF0IK1nQ53EhIC3qbU6FY04LSGvhmsAqZdV530bOGaImGo-0LCQI");'>
<div class="flex flex-col gap-2">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">Connect, Share, and Grow Together</h1>
<h2 class="text-white/90 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal max-w-lg mx-auto">Share your experiences and support one another in our community grove. This is a safe space to find connection and healing.</h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Share Your Story</span>
</button>
</div>
</div>
</div>
<!-- SectionHeader for Stories -->
<h2 class="text-black dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-10">Stories from the Forest</h2>
<!-- Carousel for Stories -->
<div class="flex overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
<div class="flex items-stretch p-4 gap-4">
<div class="flex h-full w-72 flex-shrink-0 flex-col gap-4 rounded-xl bg-white dark:bg-[#193322] shadow-sm">
<div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-t-xl" data-alt="Portrait of a smiling person named Alex" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDbqmj1YHO9gPz7TfiaAdHJbwK2qMbbJrufrco7I6R8VwdcuKo0mKNrX4sNoCKEx1sbV9T1zsSmcAnX74VNorK9j-Ikk-P-JJbXP_hKH6c_45X96vKjXt_pA-c2FnpkeI1LFd5FdDQf0Aplfkq3gvzz81idtzToyLsRLZS_sN0wRoRffTAABHoJ4laNUNzIXPgX1uJIs1LcWiw-nHlC4SjIUqfTMwJmCht4bRT1HBcFAcAG73dzcuYH6QwqW9flrj9EMjkdq1R1JwE");'></div>
<div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">My Journey with Meditation</p>
<p class="text-black/70 dark:text-[#92c9a4] text-sm font-normal leading-normal mt-1">"ForestSoul helped me find a moment of calm in my chaotic life. The guided meditations are a true gift." - Alex P.</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-black/5 dark:bg-[#23482f] text-black dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
<div class="flex h-full w-72 flex-shrink-0 flex-col gap-4 rounded-xl bg-white dark:bg-[#193322] shadow-sm">
<div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-t-xl" data-alt="Portrait of a person named Sarah outdoors" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBeUSm5zpiYZJvh6Aqu2fbWVp4Fa4HEDbFujIAfpLfVrcAIXjo92VHLex3-q6aSXG_3NXwFw-w3EXYxSeez1SfwvwiJtljlC8uwam4YWmPukS8pCI_ucGbSGXGY67ZMQvVofWMiifHzcC09x7x4nnNW75m_fOm-v6VkIk6462dQPxSnCxCIn1aHBBpyFSY-9GV-z3rKtxOudmxNmElBJEM9QTs1Y-iNA0X3JPmVrprUFrH6Y2rGeX5sJ-ZuMDAY952lJ3vd1oFQMv8");'></div>
<div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">Finding Peace in Nature</p>
<p class="text-black/70 dark:text-[#92c9a4] text-sm font-normal leading-normal mt-1">"Connecting with nature has been so healing. I'm grateful for this community that understands." - Sarah K.</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-black/5 dark:bg-[#23482f] text-black dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
<div class="flex h-full w-72 flex-shrink-0 flex-col gap-4 rounded-xl bg-white dark:bg-[#193322] shadow-sm">
<div class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-t-xl" data-alt="Portrait of a person named David in a yoga pose" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCSispp90Gwuv6liggsovf8d8T2u45MmGXLl84OM9bTVhn_lJGfHaUyCI_5YRZMHnPKTzBd5-O0HnxSHmLf1aLs5zJzJ1WSRSHz01SXNT6iQ5dTkXanmE25PJ24RO_f_GZrTMNniAGFG41aJC6yjpXnIaoJFBycAxGb_tUu70980YPlyzPGhL9h8DR2ReT_OLKUXti7cJ0RnDa5vwHayKUU-sXPpUyEYXxw4iFGRF-YcW8LAxZPZZbnrudPDEYwOLnwTTgSycKcS_c");'></div>
<div class="flex flex-col flex-1 justify-between p-4 pt-0 gap-4">
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">How Yoga Changed My Life</p>
<p class="text-black/70 dark:text-[#92c9a4] text-sm font-normal leading-normal mt-1">"I never thought I could do yoga, but the beginner sessions here made it so accessible and welcoming." - David L.</p>
</div>
<button class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-black/5 dark:bg-[#23482f] text-black dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
</div>
</div>
<!-- SectionHeader for Discussions -->
<h2 class="text-black dark:text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-10">Community Discussions</h2>
<!-- Community Forum Section -->
<div class="p-4">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-4">
<div class="flex items-center gap-2 overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
<button class="flex-shrink-0 px-4 py-2 text-sm font-bold rounded-lg bg-primary text-background-dark">Recent</button>
<button class="flex-shrink-0 px-4 py-2 text-sm font-medium rounded-lg text-black/70 dark:text-white/70 hover:bg-black/5 dark:hover:bg-white/5">Popular</button>
<button class="flex-shrink-0 px-4 py-2 text-sm font-medium rounded-lg text-black/70 dark:text-white/70 hover:bg-black/5 dark:hover:bg-white/5">Meditation</button>
<button class="flex-shrink-0 px-4 py-2 text-sm font-medium rounded-lg text-black/70 dark:text-white/70 hover:bg-black/5 dark:hover:bg-white/5">Yoga</button>
</div>
<button class="flex items-center justify-center gap-2 min-w-[84px] cursor-pointer overflow-hidden rounded-lg h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em]">
<span class="material-symbols-outlined text-base">add</span>
<span class="truncate">Create Post</span>
</button>
</div>
<div class="flex flex-col gap-4">
<!-- Post Summary Card 1 -->
<div class="flex flex-col sm:flex-row items-start gap-4 p-4 rounded-xl bg-white dark:bg-[#193322] shadow-sm w-full">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex-shrink-0" data-alt="Profile picture for Jamie_L" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyGkw62MX8Qm0PQwNVPb5jnbq9Zy20MC3GOgy4cmMtWvXQwLb6uJaqWNYS0rI_K3Z0tvXWI6nInMYwc4-ueawZgpPIhRA6Wv5h1jwIPu--2DPby4FSyh3GJfRi7S_u2j3G2p40Jq4zjRli3yFrTg1KFqzO2D9n-cev8NshxT4mzUsAS94Xd8faSnAnwaak39DwAU3QI9yCqvQu_myuUxLi8EUDNrIEfCjcLFssYt1cL6lW-8Vi8nbfgTkz9yknJIYQPAzSlhH2cxY");'></div>
<div class="flex-1">
<p class="text-black dark:text-white font-bold">Struggling with consistency in my meditation practice. Any tips?</p>
<p class="text-sm text-black/60 dark:text-white/60 mt-1">by Jamie_L</p>
<p class="text-sm text-black/80 dark:text-white/80 mt-2 line-clamp-2">Hey everyone, I've been trying to build a consistent meditation habit for a few months now, but I keep falling off the wagon. Some weeks I'm great and do it daily, but then something throws me off and I miss a week. It's frustrating! Does anyone have any advice on how to stay motivated and consistent?</p>
</div>
<div class="flex flex-row sm:flex-col items-center justify-start sm:justify-center gap-4 sm:gap-2 mt-2 sm:mt-0 ml-14 sm:ml-0">
<div class="flex items-center gap-1 text-black/60 dark:text-white/60">
<span class="material-symbols-outlined text-lg">thumb_up</span>
<span class="text-sm font-medium">12</span>
</div>
<div class="flex items-center gap-1 text-black/60 dark:text-white/60">
<span class="material-symbols-outlined text-lg">chat_bubble</span>
<span class="text-sm font-medium">5</span>
</div>
</div>
</div>
<!-- Post Summary Card 2 -->
<div class="flex flex-col sm:flex-row items-start gap-4 p-4 rounded-xl bg-white dark:bg-[#193322] shadow-sm w-full">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10 flex-shrink-0" data-alt="Anonymous user icon" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtiwlZ0Wg56CCUukE8EKqtoG6gSEY9-DSgO8xp0YZlLRmiaGR96AI99wAO9akR7AIgY-o7OMA2LRf6wS73IT7swKBxBgB2j7IrlPqlYIN6YRcLYgiXXGGmhNi0GzyIAiTnw2B8ghoX7oopbhPcf1s6ShJiY-A0EzdLMlgqo5akuKzEhc4IKvCnfAWcjQS_dx-SKT-XLhgGiSEcf9FPAd-3F-4joDG3WOMYmVRAQDIVv4Qd4pCsHVXtzJrYfTQtrOVHoqkAekEIXZM");'></div>
<div class="flex-1">
<p class="text-black dark:text-white font-bold">A small win I wanted to share</p>
<p class="text-sm text-black/60 dark:text-white/60 mt-1">by Anonymous</p>
<p class="text-sm text-black/80 dark:text-white/80 mt-2 line-clamp-2">Today, for the first time in months, I felt a genuine sense of peace while walking through a local park. I just wanted to share this little victory with a community that would understand. It's the small steps that count.</p>
</div>
<div class="flex flex-row sm:flex-col items-center justify-start sm:justify-center gap-4 sm:gap-2 mt-2 sm:mt-0 ml-14 sm:ml-0">
<div class="flex items-center gap-1 text-black/60 dark:text-white/60">
<span class="material-symbols-outlined text-lg">thumb_up</span>
<span class="text-sm font-medium">38</span>
</div>
<div class="flex items-center gap-1 text-black/60 dark:text-white/60">
<span class="material-symbols-outlined text-lg">chat_bubble</span>
<span class="text-sm font-medium">15</span>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="mt-20 border-t border-solid border-black/10 dark:border-white/10 px-10 py-8">
<div class="flex flex-col md:flex-row justify-between items-center gap-6">
<div class="flex items-center gap-4 text-black dark:text-white">
<div class="size-5 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path>
</svg>
</div>
<h2 class="text-black dark:text-white text-base font-bold leading-tight">ForestSoul</h2>
</div>
<div class="text-center md:text-right">
<p class="text-sm text-black/60 dark:text-white/60">© 2024 ForestSoul. All rights reserved.</p>
<div class="flex items-center justify-center md:justify-end gap-4 mt-2">
<a class="text-sm text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white" href="#">Privacy Policy</a>
<a class="text-sm text-black/80 dark:text-white/80 hover:text-black dark:hover:text-white" href="#">Terms of Service</a>
</div>
</div>
</div>
</footer>
</div>
</div>
</div>
</div>
</body></html>