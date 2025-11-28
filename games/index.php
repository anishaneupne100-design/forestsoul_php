<?php
$title = "Games - ForestSoul";
include 'head.php';
?>


<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 dark:border-b-[#23482f] px-4 sm:px-10 py-3">
<div class="flex items-center gap-4 text-black dark:text-white">
<div class="size-6 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_6_319)">
<path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path>
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
<div class="hidden md:flex flex-1 justify-end items-center gap-8">
<div class="flex items-center gap-9">
<a class="text-gray-600 dark:text-white text-sm font-medium leading-normal" href="#">Home</a>
<a class="text-gray-600 dark:text-white text-sm font-medium leading-normal" href="#">Meditation</a>
<a class="text-gray-600 dark:text-white text-sm font-medium leading-normal" href="#">Yoga</a>
<a class="text-gray-600 dark:text-white text-sm font-medium leading-normal" href="#">Therapy</a>
<a class="text-primary text-sm font-bold leading-normal" href="#">Mind Games</a>
</div>
<button class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 bg-black/5 dark:bg-[#23482f] text-black dark:text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<span class="material-symbols-outlined text-black dark:text-white" data-icon="MagnifyingGlass" data-size="20px" data-weight="regular">search</span>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User profile avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCD4edzstEeOn_f8EsOOooadtt9A__9EViuWVORW2_c5BXi3bkV2tDKXC8K1qaFBFztLPhTgohPKY0EsODKul3unyzG3A6ll0XFo4umpuVaUQwF9XEv0H9qASSUxC5DEwyOFYLnst4kynBrOHZkYkliJlgYpfZPjXF1o_M9s9kU_I-3sUpAz_0eWAFwKoV7OpjhXsKftju_e4mGTgEWfxjdAguyrW5sy88ekYFPpMJ8QJ07tjJluakoteoNLN-XSV3DhQQvLf8Fe_Q");'></div>
</div>
<button class="md:hidden flex items-center justify-center rounded-lg h-10 w-10 bg-black/5 dark:bg-[#23482f]">
<span class="material-symbols-outlined text-black dark:text-white">menu</span>
</button>
</header>
<main class="flex flex-col gap-6 pt-6">
<!-- HeroSection -->
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 text-center" data-alt="A tranquil, misty forest at sunrise, conveying a sense of peace and calm." style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(16, 34, 22, 0.6) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBeXS-ZriRzDmieQFVWyhMMXh0v1E1sHg_OKU-iUBA8bcIjRkb63v501im8O17ornr1-uJsoeAS-veOOHESFmuosOQUChEkxMJ5V6tZgrB8Ajf_x7UyG2GN_-OnoGyd7iDyBzs0ECIpqWvWt8tWpB_dxGuef6_b3i-Lovp6FEZ5zR4VudcDJKxfjegg0U2GiQJqKG_bjJeX8nYA-lOzt7XwoB93P1PudrSWkp6Odlp8XjljjLszbS5V3iSA7Yz9PWcOjuMOm0Nqe18");'>
<div class="flex flex-col gap-2">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">A Quiet Space for Your Thoughts</h1>
<h2 class="text-white/80 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal max-w-xl mx-auto">Engage in calming mind games and thoughtful self-assessments to nourish your mental well-being.</h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] transition-transform hover:scale-105">
<span class="truncate">Explore Activities</span>
</button>
</div>
</div>
</div>
<!-- Tabs -->
<div class="pb-3 px-4">
<div class="flex border-b border-black/10 dark:border-[#326744] gap-8">
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-primary pb-[13px] pt-4" href="#">
<p class="text-black dark:text-white text-sm font-bold leading-normal tracking-[0.015em]">Mind Games</p>
</a>
<a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-gray-500 dark:text-[#92c9a4] pb-[13px] pt-4" href="#">
<p class="text-inherit text-sm font-bold leading-normal tracking-[0.015em]">Self-Assessments</p>
</a>
</div>
</div>
<!-- ImageGrid -->
<div class="grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-4 p-4">
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl relative overflow-hidden transition-transform group-hover:scale-105" data-alt="Abstract geometric patterns in soothing green and beige tones." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAPIOuPwc5cgwo2kUppwBCwtJZtZnGqfzXVLi9RlGbEGonN4Su3WcxwnVtZRMbqUlmXSg5FIa8EhgqRLmIKptXu_lM2LtWEbBA76qppNTN-jf6YBZmoi_WpY3EvWGTT36c1agkVryvusauwCbeQcXT1JwLz6fl7VrXdo-vB_MWqEZwkWUlebxubTSPtFLBx2crWKkAVGFesjA_saYxjYvtq1IvK-bsyuy1OCNgzIeMNNshqScJwG9Ueh9GTQigGQk-wfmBprkxRTDY");'>
<div class="absolute inset-0 bg-black/20"></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-medium leading-normal">Pattern Recognition</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">Boost your focus and attention.</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">5 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl relative overflow-hidden transition-transform group-hover:scale-105" data-alt="Close-up of headphones with nature sounds visualization." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB8oGa_vIX0SnEQwHJya30qJnafVvhm0lYSPmVOrc5zXBbA6JNvnvy6eTb0Z_Z8mxETeXWbvXeECqjAP_sQwls152633ho8ijC7sTe113ulbpEL7zg6N7m7cZB2RY_Z4YFybHabzxYnL_yybe2eS6TKgtNTRFiHCb_K6EBSWaEWm36liTGXZG14-I-chH8sJnX1OOQ1W4mmw_9rFdCVWSA37NcwnHl6EDZFB2Y6vqUtE4sDzP_v6EZffNm-FyItWeaWt4tk64hdhNo");'>
<div class="absolute inset-0 bg-black/20"></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-medium leading-normal">Sound Scape Identifier</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">Listen and identify calming nature sounds.</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">3 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl relative overflow-hidden transition-transform group-hover:scale-105" data-alt="Colorful abstract memory cards arranged in a grid." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD9VhT9o3boofu_zHlMLWvKiYDlNu23TS9ekiB1PfKiilh1uhqWDwinyyGrmkOaPUK9xRxP_huGYJpQXQdV8PclStowt4Uwqz7WzBN5b4BrPmjCwNXDCWqbfokrFA1HdV3uoXLEUH3iS-Pyid12SD3mK_S5TqtnVD1kf57b86k4V1yBEVnlC3J010Fdw_7JLSK8a5k0vMICdAmMtfzGoGgysHESqHi3f4rY643k4EJqo45p5Z2nFz_mVRdLdLC6Enk2i9PJlxVkkhE");'>
<div class="absolute inset-0 bg-black/20"></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-medium leading-normal">Visual Memory Challenge</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">Test and improve your short-term memory.</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">5 min</p>
</div>
</div>
<div class="flex flex-col gap-3 pb-3 group">
<div class="w-full bg-center bg-no-repeat aspect-video bg-cover rounded-xl relative overflow-hidden transition-transform group-hover:scale-105" data-alt="A serene animation of lungs expanding and contracting." style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDU85gSrGnhf1h47S1TzEHtq6bs77t4LZOsNp5KV3VXy0JgyiWm6enrc72EOHPGRpLCmVt8FJYwLC6esjrePw2SUy5VFwZVXVBiiijFJXY4GgBg9RSHOVpkQepPy_T_8NrLL8jfYxfXJOtaA5hYXQhIlih9KhYFLJ-4HJLFGJWiwhnDXJ85VV_on11soYJnzzOm7t5gsHLQdfruduJ2S0bdn9YwQAE38nqRNkLA85kyamCDkdosV8wzKAZV8-a1Q3noercQsag5oqw");'>
<div class="absolute inset-0 bg-black/20"></div>
</div>
<div>
<p class="text-black dark:text-white text-base font-medium leading-normal">Mindful Breathing Game</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">A guided exercise to calm your mind.</p>
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal">2 min</p>
</div>
</div>
</div>
<!-- MetaText -->
<p class="text-gray-500 dark:text-[#92c9a4] text-sm font-normal leading-normal pb-3 pt-1 px-4">
                           Disclaimer: These self-assessments are for self-exploration and are not a substitute for professional diagnosis. Your results are private.
                        </p>
</main>

<!-- Footer -->
<?php include_once './components/footer.php';  ?>

</div>
</div>
</div>
</div>
</body></html>