<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>ForestSoul User Profile</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings:
            'FILL' 0,
            'wght' 400,
            'GRAD' 0,
            'opsz' 24;
        }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#3A5A40",
              "background-light": "#F4F6F3",
              "background-dark": "#101a14",
              "card-light": "#FFFFFF",
              "card-dark": "#192d1f",
              "secondary-light": "#A3B18A",
              "secondary-dark": "#60744d",
              "accent-light": "#D4A373",
              "accent-dark": "#b5875a",
              "text-primary-light": "#3A5A40",
              "text-primary-dark": "#F4F6F3",
              "text-secondary-light": "#5a785e",
              "text-secondary-dark": "#A3B18A",
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
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex min-h-screen w-full flex-col">
<div class="flex h-full w-full flex-1">
<!-- Side Navigation Bar -->
<aside class="flex w-64 flex-col bg-card-light dark:bg-card-dark p-4 border-r border-gray-200 dark:border-gray-800">
<div class="flex flex-col gap-4">
<div class="flex items-center gap-3 p-2">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar of Amelia" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCprAjm-9yXEW23a48kw53CUYIXWDLOOaMT70TpJJ96zDgQOflc838-kUwnmd-xbQCJPvz9ryvH4rnQ1i6iScStc7uhEzLuJ6lnYN3MuI82IZcXsD_R-PzU_hBZsNp4zT2k4TeHzfDQNRzAq_7la4Rgm46HzxIoaPUDf6l8J291bSZiIvbyOD-zN41lAHv5jv2g6y_8JYawFvhhGyUSJ53Cga8QHJ0e9_1CZ57ceioABoyo0U6fakH7a4woFrrtVO7HIDBY5CQ4oLg");'></div>
<div class="flex flex-col">
<h1 class="text-text-primary-light dark:text-text-primary-dark text-base font-bold leading-normal">Amelia</h1>
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Member since Jan 2023</p>
</div>
</div>
<nav class="flex flex-col gap-2 mt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary dark:text-primary-dark dark:bg-primary/20" href="#">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">trending_up</span>
<p class="text-sm font-medium leading-normal">My Progress</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">calendar_month</span>
<p class="text-sm font-medium leading-normal">Therapy Sessions</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">book_2</span>
<p class="text-sm font-medium leading-normal">My Journal</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">groups</span>
<p class="text-sm font-medium leading-normal">Community Stories</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="text-sm font-medium leading-normal">Settings</p>
</a>
</nav>
</div>
<div class="mt-auto flex flex-col gap-1">
<a class="flex items-center gap-3 px-3 py-2 text-text-secondary-light dark:text-text-secondary-dark hover:bg-gray-100 dark:hover:bg-white/5 rounded-lg" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Logout</p>
</a>
</div>
</aside>
<!-- Main Content -->
<main class="flex-1 overflow-y-auto p-8">
<div class="max-w-4xl mx-auto">
<!-- Page Heading -->
<div class="flex flex-wrap justify-between items-center gap-4 mb-8">
<div class="flex flex-col gap-2">
<p class="text-text-primary-light dark:text-text-primary-dark text-4xl font-black leading-tight tracking-[-0.033em]">Welcome back, Amelia</p>
<p class="text-text-secondary-light dark:text-text-secondary-dark text-base font-normal leading-normal">You're doing great, keep up the practice.</p>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-6 bg-accent-light dark:bg-accent-dark text-white text-sm font-bold leading-normal tracking-[0.015em] shadow-sm hover:opacity-90">
<span class="truncate">Start Today's Meditation</span>
</button>
</div>
<!-- My Progress Section -->
<section class="mb-12">
<h2 class="text-text-primary-light dark:text-text-primary-dark text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">My Progress</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 @container">
<!-- Card 1: Meditation -->
<div class="bg-card-light dark:bg-card-dark rounded-xl p-4 flex flex-col items-stretch justify-start @xl:flex-row @xl:items-start shadow-sm border border-gray-200 dark:border-gray-800">
<div class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-square @xl:aspect-auto @xl:h-full bg-cover rounded-lg" data-alt="Abstract green and gold flowing lines" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBY7Q1WXwXAXaH2wWBnqmlSc8P_Nr8JBCjoOqxd5LS3SkvBzqLAfST32_yyEwikOWp4p5137168hRZaRjI1CmzH2Kfv84bJG_OH_0JwUuiBYlQy7e2v1xe9jmuM40TSavEvTYrXYInEEk2Pw5nnFeHtYO_D5fsMTPWNK4ovKPFUg2eLHUHYCF8LJgZ4yMzg4myxqtxDWis4f2A8vz9JPm6ZhyExRCyzMTzJLWtJ4WZY3hA0tVXXZHWlqZwVHTtfxQErgQDek6kYLUc");'></div>
<div class="flex w-full min-w-0 grow flex-col items-stretch justify-center gap-2 py-4 @xl:px-4 @xl:py-1">
<p class="text-text-primary-light dark:text-text-primary-dark text-lg font-bold leading-tight tracking-[-0.015em]">Meditation</p>
<div class="flex flex-col gap-1">
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Total Hours Meditated: 42</p>
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Current Streak: 12 days</p>
</div>
<div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mt-2">
<div class="bg-secondary-light dark:bg-secondary-dark h-2.5 rounded-full" style="width: 75%"></div>
</div>
</div>
</div>
<!-- Card 2: Yoga -->
<div class="bg-card-light dark:bg-card-dark rounded-xl p-4 flex flex-col items-stretch justify-start @xl:flex-row @xl:items-start shadow-sm border border-gray-200 dark:border-gray-800">
<div class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-square @xl:aspect-auto @xl:h-full bg-cover rounded-lg" data-alt="Abstract image of a calming blue wave pattern" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtntkrabQlawmQVultjO1GwhqdvVZSdRJZcYInAsRnxi1ahiTrC9vJF8PNKpud8dXMSKZSC5RGmdQg2L7iqOl6pvtze6WmWk0nc-DEytUHNjtdRTlqMLFMJ1JSH5BrbZGbleQu8j4O8BLhU2qSrd4wUEGgb-vPDoAfC0D5iema7TvTdE1XrMRq2eibk8rkeAxe6BSrjs6cZ7lh5F55OsjfViEv2Tou1MMoaCYTv6GA1IsJ5Bci2bxQRz0fYSmdjVstaG16aQVYwnE");'></div>
<div class="flex w-full min-w-0 grow flex-col items-stretch justify-center gap-2 py-4 @xl:px-4 @xl:py-1">
<p class="text-text-primary-light dark:text-text-primary-dark text-lg font-bold leading-tight tracking-[-0.015em]">Yoga</p>
<div class="flex flex-col gap-1">
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Sessions Completed: 25</p>
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm font-normal leading-normal">Last session: Yesterday</p>
</div>
<div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mt-2">
<div class="bg-secondary-light dark:bg-secondary-dark h-2.5 rounded-full" style="width: 50%"></div>
</div>
</div>
</div>
</div>
</section>
<!-- Therapy Sessions Section -->
<section class="mb-12">
<div class="flex justify-between items-center mb-4">
<h2 class="text-text-primary-light dark:text-text-primary-dark text-[22px] font-bold leading-tight tracking-[-0.015em]">Therapy Sessions</h2>
<button class="flex items-center justify-center gap-2 rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal hover:opacity-90">
<span class="material-symbols-outlined text-base">add</span>
<span class="truncate">Book a New Session</span>
</button>
</div>
<div class="bg-card-light dark:bg-card-dark rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-800">
<div class="border-b border-gray-200 dark:border-gray-700">
<nav aria-label="Tabs" class="-mb-px flex space-x-6">
<a class="whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm text-primary dark:text-primary-dark border-primary dark:border-primary-dark" href="#">Upcoming</a>
<a class="whitespace-nowrap py-3 px-1 border-b-2 font-medium text-sm text-text-secondary-light dark:text-text-secondary-dark border-transparent hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600" href="#">Past</a>
</nav>
</div>
<ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-4">
<li class="py-4 flex flex-wrap items-center justify-between gap-4">
<div class="flex items-center gap-4">
<img alt="Dr. Evelyn Reed avatar" class="h-10 w-10 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAd867PGhaYKNBYzEDODuF8UMeFQ2fLzjMBUYNEznYUWXSsE-OjrEHjy_7TbTVyqiN_z25XTMoMqo9IWit0GzNR_4NPIo5MvLxPGxXwGSt_w7AQuxEmWlfRbwpIvnZnyRylFU9k6mhalAbrU7IhLexQpsdCzCMk8MdyYjWSCT6qmAKJyIXtof03w4fFZ3OK8jFI9DHZ19-ZMaZHbiN3XE240wLrwXzutDletl7qnSkU6s0yw2-jHdQoljyF-JI8MqpFMpSRM9jshuk"/>
<div>
<p class="text-sm font-medium text-text-primary-light dark:text-text-primary-dark">Dr. Evelyn Reed</p>
<p class="text-sm text-text-secondary-light dark:text-text-secondary-dark">June 28, 2024 at 2:00 PM</p>
</div>
</div>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-9 px-4 bg-secondary-light dark:bg-secondary-dark text-white text-sm font-bold leading-normal hover:opacity-90">
                                        Join Session
                                    </button>
</li>
<li class="py-4 flex flex-wrap items-center justify-between gap-4">
<div class="flex items-center gap-4">
<img alt="Dr. Marcus Thorne avatar" class="h-10 w-10 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdEr_nuFrPaj5SXTPU4DM61T84j5wTE2CRWtXwl0bg_JvbYrbKwc4Sm3G0zGhLWVmIfvfZSNkvUKF7hxa0F3klACtuNzeTashHVTM98znR_51UX_1nwCntTuvbaTgYSlHT8SpDOvM5xgRGdqN6qiC7wNuL_HEdjxF79WInHOIF9jsEiA0wBjwUz_ImpIk0Vafp8-fJFNa7Y6P1NVLSfIxf35hrcluuRlisG90Bpa9ZZN6gzNfhVb2_pv1VQY78c4widYM96IuED-E"/>
<div>
<p class="text-sm font-medium text-text-primary-light dark:text-text-primary-dark">Dr. Marcus Thorne</p>
<p class="text-sm text-text-secondary-light dark:text-text-secondary-dark">July 5, 2024 at 11:00 AM</p>
</div>
</div>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-9 px-4 bg-secondary-light dark:bg-secondary-dark text-white text-sm font-bold leading-normal hover:opacity-90">
                                        Join Session
                                    </button>
</li>
</ul>
</div>
</section>
<!-- Community Stories Section -->
<section>
<h2 class="text-text-primary-light dark:text-text-primary-dark text-[22px] font-bold leading-tight tracking-[-0.015em] mb-4">Share Your Story</h2>
<div class="bg-card-light dark:bg-card-dark rounded-xl p-6 shadow-sm border border-gray-200 dark:border-gray-800">
<p class="text-text-secondary-light dark:text-text-secondary-dark text-sm mb-4">Share your experiences and insights with the community. Your story will be posted anonymously to protect your privacy.</p>
<textarea class="block w-full rounded-lg border border-gray-300 dark:border-gray-700 bg-background-light dark:bg-background-dark p-3 text-sm text-text-primary-light dark:text-text-primary-dark placeholder:text-gray-400 dark:placeholder:text-gray-500 focus:ring-2 focus:ring-inset focus:ring-primary" id="story" name="story" placeholder="Write your story here..." rows="5"></textarea>
<div class="mt-4 flex justify-end">
<button class="flex min-w-[84px] cursor-pointer items-center justify-center rounded-lg h-10 px-5 bg-primary text-white text-sm font-bold leading-normal hover:opacity-90">
                                    Share Anonymously
                                </button>
</div>
</div>
</section>
</div>
</main>
</div>
</div>
</body>
</html>