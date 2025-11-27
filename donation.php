<?php
$title = "Donate - ForestSoul";
include 'head.php';
?>



<body class="bg-background-light dark:bg-background-dark font-display">
<div class="relative flex min-h-screen w-full flex-col group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
<div class="layout-content-container flex flex-col max-w-[960px] flex-1 gap-8 md:gap-12">
<!-- TopNavBar -->
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 px-4 sm:px-10 py-3">
<div class="flex items-center gap-4 text-white">
<div class="size-6 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_6_319)"><path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path></g><defs><clippath id="clip0_6_319"><rect fill="white" height="48" width="48"></rect></clippath></defs></svg>
</div>
<h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden md:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="text-white/80 hover:text-white text-sm font-medium leading-normal" href="#">Home</a>
<a class="text-white/80 hover:text-white text-sm font-medium leading-normal" href="#">Meditation</a>
<a class="text-white/80 hover:text-white text-sm font-medium leading-normal" href="#">Yoga</a>
<a class="text-white text-sm font-bold leading-normal" href="#">Donate</a>
</div>
<div class="flex gap-2">
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] transition-transform hover:scale-105"><span class="truncate">Login</span></button>
<button class="flex min-w-[84px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-white/10 text-white text-sm font-bold leading-normal tracking-[0.015em] transition-colors hover:bg-white/20"><span class="truncate">Sign Up</span></button>
</div>
</div>
<button class="md:hidden text-white"><span class="material-symbols-outlined">menu</span></button>
</header>
<!-- HeroSection -->
<main>
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 text-center" data-alt="A lush, green forest with sunlight filtering through the canopy of tall trees." style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBrsuDo5q1UFFZUIV_kaaP1cbmXWuP3gMo7w96XM8DWioyxDo6FgkAS67ys521cGe_EZnM0mG8FeynSTYmZbnlMKDcx7A4LTvJl7j0zqZB2I-fHCGEsse3QXzBTRk5K_rFBdot3H7OMzrg3oZl4yMi4IyLnrm6T2eZcgOEiL0s_gcf0xOC5s8wyioybSj1sYKRu05EqyKJoIKDnUoxG4NkQJATGYIBlcDo6iLyjkH4lGPLNcXxaJQNe5lx54dT_CKOguCKY-K2TR40");'>
<div class="flex flex-col gap-4 max-w-2xl">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">Heal Yourself, Heal the Planet. One Tree at a Time.</h1>
<h2 class="text-white/90 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">Join the ForestSoul initiative to restore nature's balance. Your contribution helps plant trees, protect wildlife, and support vital conservation efforts, fostering a healthier world for all.</h2>
</div>
<button class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] transition-transform hover:scale-105"><span class="truncate">Donate Now</span></button>
</div>
</div>
</div>
<!-- FeatureSection -->
<div class="flex flex-col gap-10 px-4 py-16 @container">
<div class="flex flex-col gap-4 items-center text-center">
<h2 class="text-white tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]">Your Impact in Action</h2>
<p class="text-white/80 text-base font-normal leading-normal max-w-[720px]">Every donation, no matter the size, contributes directly to tangible, positive change for our planet and its inhabitants.</p>
</div>
<div class="grid grid-cols-[repeat(auto-fit,minmax(240px,1fr))] gap-4">
<div class="flex flex-1 gap-4 rounded-xl border border-white/10 bg-[#193322]/50 p-6 flex-col items-center text-center">
<div class="text-primary text-4xl"><span class="material-symbols-outlined" style="font-size: 40px;">forest</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-white text-lg font-bold leading-tight">Plant a Tree</h3>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Your $10 plants a sapling in a protected forest, helping to reforest areas and combat climate change.</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-white/10 bg-[#193322]/50 p-6 flex-col items-center text-center">
<div class="text-primary text-4xl"><span class="material-symbols-outlined" style="font-size: 40px;">pets</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-white text-lg font-bold leading-tight">Protect Wildlife</h3>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Contributions help fund sanctuaries and anti-poaching initiatives to protect endangered species.</p>
</div>
</div>
<div class="flex flex-1 gap-4 rounded-xl border border-white/10 bg-[#193322]/50 p-6 flex-col items-center text-center">
<div class="text-primary text-4xl"><span class="material-symbols-outlined" style="font-size: 40px;">public</span></div>
<div class="flex flex-col gap-1">
<h3 class="text-white text-lg font-bold leading-tight">Support Conservation</h3>
<p class="text-[#92c9a4] text-sm font-normal leading-normal">Support our global partners in their mission to preserve natural habitats and biodiversity.</p>
</div>
</div>
</div>
</div>
<!-- How it works section -->
<div class="px-4 py-16">
<div class="flex flex-col gap-4 items-center text-center mb-10">
<h2 class="text-white tracking-light text-[32px] font-bold leading-tight md:text-4xl md:font-black md:leading-tight md:tracking-[-0.033em] max-w-[720px]">How Your Donation Helps</h2>
<p class="text-white/80 text-base font-normal leading-normal max-w-[720px]">We believe in complete transparency. Our simple process ensures your contribution makes the maximum impact where it's needed most.</p>
</div>
<div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-4">
<div class="flex flex-col items-center text-center gap-3 max-w-xs">
<div class="flex items-center justify-center size-16 rounded-full bg-primary/20 text-primary border-2 border-primary"><span class="material-symbols-outlined text-3xl">favorite</span></div>
<h3 class="text-white text-lg font-bold">You Donate</h3>
<p class="text-white/70 text-sm">Choose an amount and make a secure contribution to our cause.</p>
</div>
<div class="h-8 w-px md:h-px md:w-16 bg-white/10"></div>
<div class="flex flex-col items-center text-center gap-3 max-w-xs">
<div class="flex items-center justify-center size-16 rounded-full bg-primary/20 text-primary border-2 border-primary"><span class="material-symbols-outlined text-3xl">pie_chart</span></div>
<h3 class="text-white text-lg font-bold">We Allocate Funds</h3>
<p class="text-white/70 text-sm">80% to Reforestation, 15% to Wildlife, 5% to Operations.</p>
</div>
<div class="h-8 w-px md:h-px md:w-16 bg-white/10"></div>
<div class="flex flex-col items-center text-center gap-3 max-w-xs">
<div class="flex items-center justify-center size-16 rounded-full bg-primary/20 text-primary border-2 border-primary"><span class="material-symbols-outlined text-3xl">verified</span></div>
<h3 class="text-white text-lg font-bold">Impact is Made</h3>
<p class="text-white/70 text-sm">We partner with global experts to plant trees and protect habitats.</p>
</div>
</div>
</div>
<!-- Donation Form -->
<div class="px-4 py-16" id="donate-form">
<div class="bg-[#193322]/50 border border-white/10 rounded-xl p-6 md:p-10 flex flex-col gap-8">
<div class="flex flex-col gap-2 text-center">
<h2 class="text-white text-3xl font-bold">Make a Difference Today</h2>
<p class="text-white/80">Your generosity fuels our mission. Choose an amount or enter a custom one.</p>
</div>
<div class="flex flex-col gap-6">
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-4 bg-white/5 text-white text-lg font-bold leading-normal tracking-[0.015em] border-2 border-transparent hover:border-primary focus:border-primary focus:bg-primary/20 focus:outline-none"><span class="truncate">$10</span></button>
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-4 bg-white/5 text-white text-lg font-bold leading-normal tracking-[0.015em] border-2 border-transparent hover:border-primary focus:border-primary focus:bg-primary/20 focus:outline-none"><span class="truncate">$25</span></button>
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-4 bg-primary text-background-dark text-lg font-bold leading-normal tracking-[0.015em] border-2 border-primary"><span class="truncate">$50</span></button>
<button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-4 bg-white/5 text-white text-lg font-bold leading-normal tracking-[0.015em] border-2 border-transparent hover:border-primary focus:border-primary focus:bg-primary/20 focus:outline-none"><span class="truncate">$100</span></button>
</div>
<div class="relative">
<span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-white/50 text-lg font-bold">$</span>
<input class="w-full h-14 rounded-lg bg-white/5 pl-8 pr-4 text-white text-lg placeholder:text-white/50 border-2 border-white/10 focus:border-primary focus:ring-primary/50" placeholder="Custom Amount" type="number"/>
</div>
<div class="flex flex-col sm:flex-row gap-4">
<button class="flex flex-1 cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-12 px-5 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] transition-transform hover:scale-105"><span class="truncate">Donate Now</span><span class="material-symbols-outlined">arrow_forward</span></button>
<button class="flex flex-1 cursor-pointer items-center justify-center gap-2 overflow-hidden rounded-lg h-12 px-5 bg-white/10 text-white text-base font-bold leading-normal tracking-[0.015em] transition-colors hover:bg-white/20"><span class="material-symbols-outlined">sync</span><span class="truncate">Become a Monthly Supporter</span></button>
</div>
<div class="flex items-center justify-center gap-4 pt-2">
<span class="text-white/60 text-sm">Secure payments</span>
<span class="material-symbols-outlined text-white/60">lock</span>
</div>
</div>
</div>
</div>
</main>
</div>
</div>
<!-- Footer -->
<footer class="w-full bg-background-dark border-t border-white/10 mt-12">
<div class="max-w-[960px] mx-auto px-4 sm:px-10 py-8">
<div class="flex flex-col md:flex-row justify-between items-center gap-6">
<div class="flex items-center gap-3">
<div class="size-5 text-primary">
<svg fill="currentColor" viewbox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip1_6_319)"><path d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"></path></g><defs><clippath id="clip1_6_319"><rect fill="white" height="48" width="48"></rect></clippath></defs></svg>
</div>
<span class="text-white/80 text-sm">© 2024 ForestSoul. All rights reserved.</span>
</div>
<div class="flex items-center gap-6 text-white/80">
<a class="hover:text-white text-sm" href="#">Privacy Policy</a>
<a class="hover:text-white text-sm" href="#">Contact Us</a>
</div>
</div>
</div>
</footer>
</div>
</div>
</body></html>