<?php
$title = "Meditation - ForestSoul";
include '../head.php';
?>


<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/20 px-4 sm:px-10 py-3">
<div class="flex items-center gap-4 text-black dark:text-white">
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
<h2 class="text-black dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden md:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Home</a>
<a class="text-primary dark:text-primary text-sm font-bold leading-normal" href="#">Meditation</a>
<a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Yoga</a>
<a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Therapy</a>
<a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal" href="#">Donate</a>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em]">
<span class="truncate">Login</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User profile picture placeholder" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBa3EIZGx1EkD1y0N8gRy30bRJxB1YyLRdIsRyuBPEVpPXxXsLQY7l3aGVFuAT2griAocs5sGEdad-uyTG9ZS5R38_Tw0kyJBCLQLMGuk9GaP-XYD3u45TVge29KTQP_PlQtBveS6roovBYmCFMAWda9LXFUJFeN3ZOiYt4NJy1pGI2bLfb835dt2ibUXVn2CybP8qxVpBkFn-H-weXGadDBIEUXqWktjhxs8Ivi4wHF94eSET_ZlvQR-Qa1otc8xCwTT3NPhbo4b8");'></div>
</div>
<button class="md:hidden text-black dark:text-white">
<span class="material-symbols-outlined">menu</span>
</button>
</header>
<!-- HeroSection -->
<div class="@container mt-5">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 text-center" data-alt="A tranquil, misty forest with tall green trees and soft light filtering through the canopy." style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAd2KkCvBLG_jMvl3m5NMAuls_e-ZEbtIOHc-57dQJuMQd1qmAvfJzz_0n7kK5FleViOyegVb0dhc5qBGBi8-fWTGF0OszYNUpWx8iYAfnQ5UZRtw0uQ3LMIVQExycyaJel8Nx9oUzofN7eRNIwN5XnGNxDcTvdaO8d_wIoOvPzbRO-eOaQL7xtJNUTWSkk6fHwuRiqPsPAXy6XyjLG-1EY3CCthN0U_HM6E9M10tYM2wIevJY3DpbgmU2aKmPTzcYqLKVbfTSmPso");'>
<div class="flex flex-col gap-2 max-w-2xl">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">Find Your Inner Calm: Guided Meditations for a Balanced Mind.</h1>
<h2 class="text-gray-200 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">Explore our collection of programs designed to reduce stress, improve focus, and connect you with the present moment.</h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Explore Programs</span>
</button>
</div>
</div>
</div>
<!-- Chips/Filters -->
<div class="flex flex-col sm:flex-row gap-4 p-4 items-start sm:items-center">
<div class="flex gap-3 flex-wrap">
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-primary/20 text-primary px-3">
<p class="text-sm font-medium leading-normal">All</p>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
<p class="text-sm font-medium leading-normal">Stress Relief</p>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
<p class="text-sm font-medium leading-normal">Sleep</p>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
<p class="text-sm font-medium leading-normal">Focus</p>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
<p class="text-sm font-medium leading-normal">&lt;10 min</p>
</button>
<button class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
<p class="text-sm font-medium leading-normal">10-20 min</p>
</button>
</div>
<div class="relative w-full sm:w-auto sm:ml-auto">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
<input class="w-full sm:w-64 h-10 pl-10 pr-4 rounded-xl border-gray-300 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-primary focus:border-primary" placeholder="Search programs..." type="text"/>
</div>
</div>
<!-- ImageGrid -->
<div class="grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] gap-6 p-4">
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105" data-alt="A serene sunrise over a calm lake, with mist rising from the water." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI");'></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">7 Days of Mindful Mornings</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Start your day with clarity</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">10 min • Beginner</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105" data-alt="A peaceful night sky full of stars above a silhouette of a forest." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHfAKLcAccI5mrKbrDgmLbS0q9UueLv4lHiNTKAqJthcDsGUEfqIXnH5zJfzkjpfMd-eCVepEVBqd8fx0jRZ1fPAjqXX22atS7FMpR5IeOHbq2RdY6PcM4Jpcs_4nAKJDeR0vJ8KL3YZjrhQuzsWtwFu-xN_ctKdmO-VEeFMOMfOOhyX_qjCNT794-VSppqr3te-Vso_gI90zQZ8GxwAPe037LEz84x21WPHzEkDObA4-psFdFl_zGIwwUcxo-Jy4IZ_xabXadyyc");'></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">Deep Sleep Journey</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Drift into restful slumber</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">20 min • All Levels</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105" data-alt="Lush green ferns covering a forest floor, with sunlight filtering through the trees." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBoMzn3JLhccyzoR65tH14xS1GoxJodxT_o7-lgo5hqeTjQkBHFXty6cLKFSC9ZVcc7OddxtflZj4wq6EnE2dlU3GlGAHJLu-chq0jeXwd7rhSHFPX5M1V1VTtex-if4mduOy-tKDdYldXJ9gzU8EdeQfmbp3fchZf5mK_Qhh9g7w0xR7ugIj5X1mSWm1kOXGMn0bFeT1bqmLhr0qaN5m4rE7fi5i2iQuLxjjJeBhcOkAC-5XJ2QTsuawtBiYCWS1GwmJq_ZGNVEfg");'></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">Overcoming Anxiety</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Cultivate resilience and peace</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">15 min • Intermediate</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105" data-alt="A clear, calm river flowing through a dense, green forest." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC5RJOQqsLu5F7kGBxwQNtHfyTkPkLDIv4kaua3kNFnCPfF45WQmD4UskTMeuGXQfoKo1LI9CzwX9qLDVu2mBwglW9JsEJRmpQDcjXNk5tAiQtkYq5eJAZkpMkR1pvJEA51b9E4m8y3P75gFM90aDnT84vXPHh9ebo0UVqYyKJXQmqOtAkNciiZgEA26Pdd27Md899nQX04OCdbu012YyRJo_Tpj7XsRfs-ht8ZOBOhHLpLkfqlHueWQKKW4ie4lVMvuJgsJaviBus");'></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-bold leading-normal">Focus &amp; Productivity Boost</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">Sharpen your mental edge</p>
<p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">15 min • All Levels</p>
</div>
</div>
</div>
<!-- CTASection -->
<div class="@container my-10">
<div class="bg-gray-100 dark:bg-white/5 rounded-xl">
<div class="flex flex-col justify-center items-center gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20 text-center">
<div class="flex flex-col gap-2">
<h1 class="text-black dark:text-white tracking-tight text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-2xl">Unlock Your Full Potential</h1>
<p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal max-w-2xl">Subscribe to ForestSoul for full access to all our meditation and yoga programs.</p>
</div>
<div class="flex justify-center">
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Subscribe Now</span>
</button>
</div>
</div>
</div>
</div>
<!-- Footer -->
<?php include_once '.././components/footer.php';  ?>

</div>
</div>
</div>
</div>
</body>
</html>
