<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admin Features Master Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#13ec5b",
              "background-light": "#f6f8f6",
              "background-dark": "#102216",
              // Custom colors from user prompt
              "deep-forest-green": "#2d5a4c",
              "soft-sage": "#a3b8a1",
              "off-white": "#f9f7f3",
              "warm-gray": "#5a5a5a",
              "terracotta": "#e08a6d",
            },
            fontFamily: {
              "display": ["Manrope", "sans-serif"]
            },
            borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
          },
        },
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="font-display bg-background-light dark:bg-background-dark">
<div class="relative flex h-auto min-h-screen w-full flex-col">
<div class="flex h-full min-h-screen">
<aside class="flex h-full min-h-screen flex-col justify-between bg-[#112217] p-4 w-64">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 text-white px-3">
<div class="size-6 text-primary">
<svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M42.4379 44C42.4379 44 36.0744 33.9038 41.1692 24C46.8624 12.9336 42.2078 4 42.2078 4L7.01134 4C7.01134 4 11.6577 12.932 5.96912 23.9969C0.876273 33.9029 7.27094 44 7.27094 44L42.4379 44Z" fill="currentColor"></path>
</svg>
</div>
<h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/20 text-primary" href="#">
<span class="material-symbols-outlined">home</span>
<p class="text-sm font-medium leading-normal">Dashboard</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-white/80 hover:bg-primary/10 hover:text-white transition-colors duration-200" href="#">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Users</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-white/80 hover:bg-primary/10 hover:text-white transition-colors duration-200" href="#">
<span class="material-symbols-outlined">article</span>
<p class="text-sm font-medium leading-normal">Content</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-white/80 hover:bg-primary/10 hover:text-white transition-colors duration-200" href="#">
<span class="material-symbols-outlined">analytics</span>
<p class="text-sm font-medium leading-normal">Analytics</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-white/80 hover:bg-primary/10 hover:text-white transition-colors duration-200" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="text-sm font-medium leading-normal">Settings</p>
</a>
</div>
</div>
<div class="flex flex-col gap-4">
<div class="flex gap-3 items-center">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of a female administrator" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDah7HJzytGbVpH_0dQAButUakj_OhKVsHWiUNJ0rgmWgGbfAQMA0WZm5Z0co-gVHmVQ72fU79vv3Bc-4Aw056JEVHQl8f9H_AjotetIk6_WQFkXReJLU9rae7IC1AvogIIDuCs8VgUApDi2WUpjmvseQBSfre58uB_QJAsgHUCoYvZHxDccQkSxSlna06r0544h274gDxp6X-Mrk0fgzGrpz2YNiPdbIwQaaU864VO3ejLIOGp9gzn61n2d8ltNHrWpDOlmi2MhA4");'></div>
<div class="flex flex-col">
<h1 class="text-white text-base font-medium leading-normal">Anisha Neupane</h1>
<p class="text-primary/70 text-sm font-normal leading-normal">Administrator</p>
</div>
</div>
<div class="flex flex-col gap-1 border-t border-white/10 pt-4">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg text-white/80 hover:bg-primary/10 hover:text-white transition-colors duration-200" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Log Out</p>
</a>
</div>
</div>
</aside>
<main class="flex-1 flex flex-col">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 dark:border-white/10 px-10 py-4 bg-[#112217] sticky top-0 z-10">
<h1 class="text-white text-xl font-bold">Admin Dashboard</h1>
<div class="flex items-center gap-4">
<label class="flex flex-col min-w-40 !h-10 w-80">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-primary flex border-none bg-primary/20 items-center justify-center pl-4 rounded-l-lg border-r-0">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-white focus:outline-0 focus:ring-0 border-none bg-primary/20 focus:border-none h-full placeholder:text-primary/70 px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal" placeholder="Search features, users, content..." value=""/>
</div>
</label>
<button class="relative flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-primary/20 text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<span class="material-symbols-outlined">notifications</span>
<div class="absolute top-1.5 right-1.5 size-2.5 rounded-full bg-terracotta border-2 border-[#112217]"></div>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="Profile picture of a female administrator" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuByAya3itokduXIsotvPhB5nXJi8Z-tTvn5onD2NJwHRe1k5JUpb6XEH5WS0rSc-vKJdVLC-CWnng581wq-iXIu1qkMl7vJhR1WDRS7NDWttY1H9NUR_hkP2G6iaDisB90oH6v03m-DHHF3Bnl8hix8TH80Y97rXa_xwrsIgoMnhmzGHIHHd9im5IOFKIlEWnIH5dZ7ZTTGCT1kWZgld8mo7_Qfj6wMMowgnjg58zfTj5Fep3r_w3DUw39Pde0LBn15jUu7JEtjphY");'></div>
</div>
</header>
<div class="flex-1 p-10 bg-background-light dark:bg-background-dark">
<div class="flex flex-wrap justify-between gap-4 pb-8">
<div class="flex min-w-72 flex-col gap-2">
<p class="text-gray-800 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Good Morning, Anisha</p>
<p class="text-warm-gray dark:text-soft-sage text-base font-normal leading-normal">You have <span class="font-bold text-terracotta">3 new user feedback submissions</span> today.</p>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Serene forest path with sunlight filtering through trees" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBIAknC_p64oG5Odo2rWYRLjIrv1XEj7BF3V4x7nSgcLitvcNP5OYzStnbtnre_-GMAWL_JAxrzBHkCNgCa3QcIGMsm9vRLpqN51K5z0lx0SV16TfzlkHk9mZgySo6dkwxfTr8nwYl9Q7vzacPiv3YAJY-P_k5d54XjuWWbgKahHEFj0CUrfHIJKEqUpJPr2VGZOwTtANju5K6JArRWRIJm8D6qcidkWlC4055kGku9LGVzs90FxOz1QoeJ9zZRtl46tpiSu3Im3YU");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Meditation Programs</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">15 Active Programs</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Person in a yoga pose on a mat in a bright room" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDn0PfnPcEKYLS33q971vE1JlizsniuP5Xx9Biw-eUNUJ3BJ11AG1U2_KgapqyLIiW9HIGiMS78XmETQMtf8kA5sAIekoeWha42CsmouWIT-c2yPEvf_bXOAh_sbpoC8-tIy1Rb765GEe-M8b-ExxEyRiP1a5xSFg67w1i9xmM78qXREB1Q37AEpLLoztPhRVOdIoiSRZKZJASCnSQtqft0xq-FoF4GlY2S-_fn4m3lS22WKd4mR4rGrOmj4sw7r4EDyQJuNf-TgGo");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Yoga Sessions</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">120 Upcoming Bookings</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Comfortable and modern therapy room with two armchairs" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBlaXMPyc-fYVsn-Vq5iuQ4ZByzPCviE4crMPkFyMGh6ceouUkOnmCRPhMGTFJCuDypa26_9A7lxST4gRQF3gk__49hqeYb-I9klSgZ24VdbjSgivgcWbrXitqqq9SjaeMp2wBQiFaqjh_SMC-yT64ffPwp9Sklvl8xf-Ng_rpSlY9DMcBIGlQesVVJXYlPV1nfuEZXKvajslHmba2UG3l9YonhQI8wrwLLjTk3vjG-6Me5OYRWQHhVXCvUSEOH3CDQ00F9-Eymkz8");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Therapy Services</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">Manage therapists &amp; bookings</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Abstract representation of brain activity or a puzzle" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDiGSJZUrXlu5Bgt83RVrQuD_qAoDoWoi4ouzUpLPW3ym_ijReloBqCycvIvmE-oSY6avXdVkIf4KzvfJyOGPpRJmLDf9psyfRq3RQgKdYx805xnQE6Fm5ySbB3viTMH_gWz-pJNRtu1FgmfsGr840BAMffvOzj5DzNw9wZ6sN03S-sQxIfSldIJowzuYAqkwy4yF9-Brf961LVwe2AM_8jidDWLpGYdgitCc3jbGkcYPm-66pAA_BO3wwSoeXNl3rK0akf62uPRFw");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Mind Games</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">Review user engagement</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Diverse group of people collaborating around a table" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDVZ_HELSlLLbJk0noGaxSGAheX3fL76Zo3ww2_y39fbvDlX6XupJzd_5iUCTEh17ThTh7t_FZVi9NL_jFrICkWhbYq9H1eiuUjjXv-CQWCyt-fXegetBPA1lbCm-nvepHfZIE9kg4VddcD-HBZHFYAsvPClUtVNZ9NEa7SKT3gnG4bnfYW6MrXLvP_Z1Wr2IGJlnDIYX6KPH7F7HolPQqtZRQknL9UTtfRV5a3Ptx7PIipeEiZQPzMtUEjGnqq55zRUt6da5k_tSw");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Community Discussions</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">3 items in moderation queue</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg ring-2 ring-terracotta">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Person writing feedback on a clipboard" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDDHiPdUrclID0fu_DFXNj06ggAiK9slhBuiZzATlyKT7xM3IsFx1W5EGtjSJJ5r_jYicSh0qiC8FsqYc4OEpZ_bH9clfarUalx_RITEgq7UztwGOw3aLaH-XuzB9Q2dbdmEjmvtpuDyh3ldRUgEPAiZAX4NSxFrNj9iGYYRJTOwo3x4wiQ-BkEoWGxiLE32GUjsyUREOsB2CrxdxYtcVta0HGHnkc52APhDuc5MjdsDqXgsauSwbAaBnif4Ix0FzNm9QoyMcKj_HA");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">User Feedback</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal"><span class="font-bold text-terracotta">3 new submissions</span></p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-terracotta rounded-lg hover:opacity-90 transition-opacity">Review</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Close up of a donation box with currency" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBN2DaBqeOrLG65WKEJJPX7D2hHS6YBRmsaDDTZ3FtPT6YM2IjvLpJDImWK2a18iO1jBJKVaoGxuOCoK-mm-0SyJlmB5Ui6QKbCwrZwuzeiLkOFVn0GZjGKq8thEBeSCOjpTHu27duDbu6GCMf8dhKyNXhQBUAvV4DiMtYt-DTBVtlPAv4GP9trHFVBiLF9p3wxKNWG0ruJXag3X2uIIvTX9QRmJNfq5PCPmW4X5188iYXzNSno4_EPa5W-M6xwO5DxAf32ygskh5M");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">Donations</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">View financial reports</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
<div class="flex flex-col gap-3 p-5 rounded-xl bg-white dark:bg-[#112217] border border-gray-200 dark:border-white/10 transition-shadow hover:shadow-lg">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-lg" data-alt="Grid of diverse user profile pictures" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDIEy1onZ4qoKDOF63lqc9zKvKDdDgHjFDRmCyMFFuW-oZSPF7GFTPdWxFdlgfws_8QhLx0ymvzP6bjlv7Pz5TYweuPS22uQuIjqj05M6cj7hvNtndo82CIjL4B8ngP7167vJSsyYpyZjCVACT-99ThyTq4RmsZuVcGULW2cVtRnhjtOPZyiU-v7U9JgHUZif-KcRK3-FKVBCxc7btkmDVuXoAwuP17if_CLmn-f4c6y_C0FQ6WTjj3xlnIYJOKOJ20nYGMmXywiXQ");'></div>
<div>
<p class="text-gray-800 dark:text-white text-base font-bold leading-normal">User Management</p>
<p class="text-warm-gray dark:text-soft-sage text-sm font-normal leading-normal">12 new sign-ups this week</p>
</div>
<button class="w-full text-center mt-2 px-4 py-2 text-sm font-bold text-white bg-deep-forest-green rounded-lg hover:opacity-90 transition-opacity">Manage</button>
</div>
</div>
</div>
</main>
</div>
</div>
</body></html>