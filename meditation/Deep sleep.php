<?php
$title="Deep Sleep Journey Details - ForestSoul";
include '../head.php';  
?>

<!DOCTYPE html>

<html class="dark" lang="en">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Deep Sleep Journey Details</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        /* --- Tailwind Component Aliases --- */
        @layer components {
            /* --- Layout & Structure Modules --- */

            /* Global page padding and max-width container for content */
            .content-container {
                @apply flex flex-col w-full max-w-5xl;
            }

            /* Common vertical padding for main sections */
            .section-v-padding {
                @apply py-10 sm:py-16;
            }

            /* Standard Header for all major sections */
            .section-header {
                @apply text-white text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5 text-center;
            }

            /* Component for dark mode surface elements (cards, containers) */
            .dark-surface-box {
                @apply bg-white/5 rounded-xl border border-white/10 p-5;
            }

            /* --- UI Elements --- */

            /* Base style for all buttons */
            .btn-base {
                @apply flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 text-sm font-bold leading-normal tracking-[0.015em] transition-colors;
            }

            /* Primary CTA button (teal background, dark text) */
            .btn-primary {
                @apply btn-base bg-primary hover:bg-primary/90 text-background-dark;
            }

            /* Secondary button (subtle background, white text) */
            .btn-secondary {
                @apply btn-base bg-white/10 hover:bg-white/20 text-white;
            }

            /* Text link style for navigation */
            .nav-link {
                @apply text-white/80 hover:text-white transition-colors text-sm font-medium leading-normal;
            }

            /* Common Card/Benefit Box layout (used in TextGrid) */
            .benefit-card {
                @apply flex flex-1 gap-4 dark-surface-box flex-col items-start text-left;
            }

            /* Typography for card/benefit titles */
            .card-title-text {
                @apply text-white text-base font-bold leading-tight;
            }

            /* Typography for card/benefit descriptions */
            .card-desc-text {
                @apply text-white/60 text-sm font-normal leading-normal;
            }

            /* --- Timeline Specific --- */

            /* Style for the timeline marker circle */
            .timeline-marker {
                @apply absolute h-10 w-10 bg-background-dark border-2 border-white/20 rounded-full flex items-center justify-center;
            }
        }
    </style>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#4FD1C5",
              "background-light": "#f6f6f8",
              "background-dark": "#0A192F",
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
<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<div class="flex flex-1 justify-center">
<div class="content-container">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-white/10 px-6 md:px-10 py-4">
<div class="flex items-center gap-4 text-white">
<div class="text-primary">
<span class="material-symbols-outlined text-3xl">park</span>
</div>
<h2 class="text-white text-xl font-bold leading-tight tracking-[-0.015em]">ForestSoul</h2>
</div>
<div class="hidden md:flex flex-1 justify-end gap-8">
<div class="flex items-center gap-9">
<a class="nav-link" href="#">Meditation</a>
<a class="nav-link" href="#">Yoga</a>
<a class="nav-link" href="#">Therapy</a>
<a class="nav-link" href="#">Donate</a>
</div>
<div class="flex gap-2">
<button class="btn-secondary">
<span class="truncate">Login</span>
</button>
</div>
</div>
<button class="md:hidden flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-transparent text-white gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
<span class="material-symbols-outlined text-2xl">menu</span>
</button>
</header>
<main class="flex-1 px-4 sm:px-6 lg:px-8 section-v-padding">
<div class="@container">
<div class="@[480px]:p-4">
<div class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4" data-alt="A serene, dark, and abstract representation of a night sky with subtle star-like glimmers." style='background-image: linear-gradient(rgba(10, 25, 47, 0.5) 0%, rgba(10, 25, 47, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBiK8QhMa82jliQOB1ZxbJ1TTkTjaluyZfW-5FDKQisksSE8D5DvBUlNpSBYAwZSG7TF1XynSoBvrNk9DXPmW8VJSDsm9Ip3N69eRztihlgd_hl-DvNS6CiLDg6eZHVFgk2S4fNpk3muCI4PT2ilEdBZQzrPG-YjUVqeJM0rshFnzm_qmgkCgLW3AMseiHBfWKb9WwOzIxQcq9FwLC1LehcmO-2BcB_tq-45i3-pMTYMcNz1qq1YEwo96lFSV-6QKsO9Z_BsVowQGI");'>
<div class="flex flex-col gap-2 text-center max-w-2xl">
<h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                                          Embark on a Deep Sleep Journey
                                        </h1>
<h2 class="text-white/80 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                                          Discover profound rest and wake up rejuvenated with our guided meditation program designed to calm your mind and body.
                                        </h2>
</div>
<button class="btn-primary @[480px]:h-12 @[480px]:px-5 @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
<span class="truncate">Start Journey</span>
</button>
</div>
</div>
</div>
<div class="pt-16 pb-4">
<h2 class="section-header">Unlock the Benefits of Restful Sleep</h2>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
<div class="benefit-card">
<div class="text-primary"><span class="material-symbols-outlined text-3xl">nights_stay</span></div>
<div class="flex flex-col gap-1">
<h2 class="card-title-text">Fall Asleep Faster</h2>
<p class="card-desc-text">Gentle guidance to quiet your mind and ease into slumber effortlessly.</p>
</div>
</div>
<div class="benefit-card">
<div class="text-primary"><span class="material-symbols-outlined text-3xl">self_improvement</span></div>
<div class="flex flex-col gap-1">
<h2 class="card-title-text">Reduce Nighttime Anxiety</h2>
<p class="card-desc-text">Calming techniques to soothe your nervous system for uninterrupted rest.</p>
</div>
</div>
<div class="benefit-card">
<div class="text-primary"><span class="material-symbols-outlined text-3xl">spark</span></div>
<div class="flex flex-col gap-1">
<h2 class="card-title-text">Improve Sleep Quality</h2>
<p class="card-desc-text">Wake up feeling refreshed, energized, and ready for the day ahead.</p>
</div>
</div>
</div>
<div class="pt-16 pb-4">
<h2 class="section-header">How Your Journey Unfolds</h2>
</div>
<div class="p-4">
<div class="relative pl-8 border-l-2 border-dashed border-white/20 space-y-12">
<div class="timeline-marker -left-[1.35rem] top-1">
<span class="material-symbols-outlined text-primary text-2xl">looks_one</span>
</div>
<div>
<h3 class="text-lg font-bold text-white">Day 1-3: Calming the Mind</h3>
<p class="mt-1 text-white/60">Begin with foundational techniques to release daily stress and quiet racing thoughts before bedtime.</p>
</div>
<div class="timeline-marker -left-[1.35rem] top-[10.5rem]">
<span class="material-symbols-outlined text-primary text-2xl">looks_two</span>
</div>
<div>
<h3 class="text-lg font-bold text-white">Day 4-7: Body Scan for Sleep</h3>
<p class="mt-1 text-white/60">Learn to progressively relax every part of your body, easing physical tension and preparing for deep rest.</p>
</div>
<div class="timeline-marker -left-[1.35rem] top-[20.5rem]">
<span class="material-symbols-outlined text-primary text-2xl">looks_3</span>
</div>
<div>
<h3 class="text-lg font-bold text-white">Day 8-10: Sustaining Restful Habits</h3>
<p class="mt-1 text-white/60">Integrate these practices into your nightly routine to build a long-lasting foundation for quality sleep.</p>
</div>
</div>
</div>
<div class="pt-16 pb-4">
<h2 class="section-header">Listen to a Preview</h2>
</div>
<div class="p-4">
<div class="bg-white/5 rounded-xl p-6 flex flex-col sm:flex-row items-center gap-6 border border-white/10">
<div class="flex-shrink-0">
<span class="material-symbols-outlined text-primary text-5xl">headphones</span>
</div>
<div class="flex-1 w-full">
<p class="font-semibold text-white">Intro: Your Path to Restful Sleep</p>
<div class="flex items-center gap-4 mt-2">
<button class="text-white hover:text-primary transition-colors">
<span class="material-symbols-outlined text-4xl">play_circle</span>
</button>
<div class="w-full h-1.5 bg-white/10 rounded-full flex items-center">
<div class="w-[15%] h-full bg-primary rounded-full"></div>
<div class="w-3.5 h-3.5 bg-white rounded-full -ml-1.5 shadow"></div>
</div>
<span class="text-sm text-white/60">0:42 / 3:15</span>
</div>
</div>
</div>
</div>
<div class="pt-16 pb-4">
<h2 class="section-header">What Our Users Say</h2>
</div>
<div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="bg-white/5 rounded-xl p-6 border border-white/10">
<div class="flex items-center gap-4">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Profile picture of Alex Johnson" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCU0uIoWUlu-YyKd607TsVDWhpweIV0KMIiOeCHcDfnuYgy86uH-pCABz_ekanVa64uexQ62QvKBa4smw0wYR2lJYIMEFeXU5usEXSay4dC4Zt06etaiITW3CHfPDYf7BhJa8GbLEae7NAgDtc5tgOqk5My-eLly6ZaNcDBMN3IVvv3lTX7u6yQZmFvK0SaGK1LGvvnqD6HZOOHTqP8R1Rv7oYwdLXmsbmTxybQO6wXZBjlFDvgBLPvDQZGDk4d2npVX3vNzCXnQoU"/>
<div>
<p class="font-bold text-white">Alex Johnson</p>
<p class="text-sm text-white/60">Completed in May</p>
</div>
</div>
<p class="mt-4 text-white/80 italic">"I haven't slept this well in years. The guided sessions are incredibly calming and effective. This program was a game-changer for my sleep anxiety."</p>
</div>
<div class="bg-white/5 rounded-xl p-6 border border-white/10">
<div class="flex items-center gap-4">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Profile picture of Sarah Chen" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBX0k04K9B7UNQZB5HDDLBiA5FzY-vq7oZNxMUfX8a_o7mZIvK11sDp89rARjgwkNDjkcREpGR8KGRKsE81HRzwktA8BJd3n74sPSHEtY-4rq2MzdOUk5VWQqKRd6VLX0-SlnP-TS73W06kQ8ozLHJ2p7OU3vwIc1KQwU7sDwHexkDiGl71qIIezmx4sNoexNx4Cbx9lleiqpuA5qXjmdarmzjqedET67bz9UzGJNaxinkD7T536tHy1VJL-5_ZFvER8TsrZDgqAHk"/>
<div>
<p class="font-bold text-white">Sarah Chen</p>
<p class="text-sm text-white/60">Completed in June</p>
</div>
</div>
<p class="mt-4 text-white/80 italic">"The body scan meditations are my favorite. It's the first thing that's actually helped me turn my brain off at night. Highly recommend!"</p>
</div>
</div>
<div class="pt-16 pb-4">
<h2 class="section-header">Frequently Asked Questions</h2>
</div>
<div class="p-4 space-y-4 max-w-3xl mx-auto">
<details class="group bg-white/5 rounded-xl border border-white/10 p-4 cursor-pointer">
<summary class="flex justify-between items-center font-semibold text-white">
                                    Do I need any prior meditation experience?
                                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-3 text-white/60">
                                    Not at all! This journey is designed for all levels, including complete beginners. We guide you through every step.
                                </p>
</details>
<details class="group bg-white/5 rounded-xl border border-white/10 p-4 cursor-pointer">
<summary class="flex justify-between items-center font-semibold text-white">
                                    How long is each session?
                                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-3 text-white/60">
                                    Each guided meditation session is approximately 10-15 minutes long, perfect for winding down before bed without being too time-consuming.
                                </p>
</details>
<details class="group bg-white/5 rounded-xl border border-white/10 p-4 cursor-pointer">
<summary class="flex justify-between items-center font-semibold text-white">
                                    What if I wake up in the middle of the night?
                                    <span class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
</summary>
<p class="mt-3 text-white/60">
                                    The program includes bonus short meditations specifically designed to help you gently fall back asleep if you wake up during the night.
                                </p>
</details>
</div>
</main>
</div>
</div>
</div>
<div class="sticky bottom-0 w-full bg-background-dark/80 backdrop-blur-sm p-4 border-t border-white/10">
<div class="max-w-5xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4">
<div class="text-center sm:text-left">
<h3 class="font-bold text-white">Ready for a Better Night's Sleep?</h3>
<p class="text-sm text-white/60">Your journey to restful nights starts now.</p>
</div>
<button class="btn-primary w-full sm:w-auto h-12 px-5 text-base">
<span class="truncate">Start Your Journey Today</span>
</button>
</div>
</div>
</div>
</body></html>