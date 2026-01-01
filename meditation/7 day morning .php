<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/navbar.php';
?>

< class="font-display">
    <
        class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-x-hidden">
        < class="layout-container flex h-full grow flex-col">
            <div class="px-4 sm:px-8 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    <header
                        class="flex items-center justify-between whitespace-nowrap border-b border-solid border-primary/20 px-4 sm:px-10 py-3">
                        <div class="flex items-center gap-4 text-black dark:text-white">
                            <div class="size-6 text-primary">
                                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_6_319)">
                                        <path
                                            d="M8.57829 8.57829C5.52816 11.6284 3.451 15.5145 2.60947 19.7452C1.76794 23.9758 2.19984 28.361 3.85056 32.3462C5.50128 36.3314 8.29667 39.7376 11.8832 42.134C15.4698 44.5305 19.6865 45.8096 24 45.8096C28.3135 45.8096 32.5302 44.5305 36.1168 42.134C39.7033 39.7375 42.4987 36.3314 44.1494 32.3462C45.8002 28.361 46.2321 23.9758 45.3905 19.7452C44.549 15.5145 42.4718 11.6284 39.4217 8.57829L24 24L8.57829 8.57829Z"
                                            fill="currentColor"></path>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_6_319">
                                            <rect fill="white" height="48" width="48"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <h2 class="text-black dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">
                                ForestSoul</h2>
                        </div>
                        <div class="hidden md:flex flex-1 justify-end gap-8">
                            <div class="flex items-center gap-9">
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal"
                                    href="#">Home</a>
                                <a class="text-primary dark:text-primary text-sm font-bold leading-normal"
                                    href="#">Meditation</a>
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal"
                                    href="#">Yoga</a>
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal"
                                    href="#">Therapy</a>
                                <a class="text-gray-600 dark:text-gray-300 hover:text-primary dark:hover:text-primary text-sm font-medium leading-normal"
                                    href="#">Donate</a>
                            </div>
                            <button
                                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em]">
                                <span class="truncate">Login</span>
                            </button>
                            <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                                data-alt="User profile picture placeholder"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBa3EIZGx1EkD1y0N8gRy30bRJxB1YyLRdIsRyuBPEVpPXxXsLQY7l3aGVFuAT2griAocs5sGEdad-uyTG9ZS5R38_Tw0kyJBCLQLMGuk9GaP-XYD3u45TVge29KTQP_PlQtBveS6roovBYmCFMAWda9LXFUJFeN3ZOiYt4NJy1pGI2bLfb835dt2ibUXVn2CybP8qxVpBkFn-H-weXGadDBIEUXqWktjhxs8Ivi4wHF94eSET_ZlvQR-Qa1otc8xCwTT3NPhbo4b8");'>
                            </div>
                        </div>
                        <button class="md:hidden text-black dark:text-white">
                            <span class="material-symbols-outlined">menu</span>
                        </button>
                    </header>
                    <div class="flex flex-col lg:flex-row gap-12 mt-10">
                        <div class="flex-1">
                            <div class="flex flex-col gap-2 mb-6">
                                <p class="text-primary text-sm font-bold">7-Day Program</p>
                                <h1 class="text-black dark:text-white text-4xl md:text-5xl font-black tracking-tighter">
                                    7 Days of Mindful Mornings</h1>
                                <p class="text-gray-500 dark:text-gray-400 text-lg">Start your day with clarity, focus,
                                    and a sense of calm. This program is designed to help you build a consistent morning
                                    meditation practice.</p>
                            </div>
                            <div class="flex gap-6 mb-8 text-black dark:text-white">
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">schedule</span>
                                    <span>10 min / day</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="material-symbols-outlined text-primary">signal_cellular_alt</span>
                                    <span>Beginner</span>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold text-black dark:text-white mb-4">What You'll Learn</h2>
                            <ul class="space-y-3 mb-8">
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                                    <p class="text-gray-600 dark:text-gray-300">Techniques to establish a consistent and
                                        joyful morning meditation routine.</p>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                                    <p class="text-gray-600 dark:text-gray-300">How to use breathwork to calm the
                                        nervous system and increase focus.</p>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                                    <p class="text-gray-600 dark:text-gray-300">Mindful awareness practices to carry
                                        with you throughout your day.</p>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                                    <p class="text-gray-600 dark:text-gray-300">Methods for setting a positive intention
                                        to guide your day.</p>
                                </li>
                            </ul>
                            <h2 class="text-2xl font-bold text-black dark:text-white mb-4">Daily Program</h2>
                            <div class="space-y-4">
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        1</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 1: The Power of Breath</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Learn to anchor your attention on
                                            the breath, a fundamental skill for mindfulness.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        2</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 2: Body Scan Awareness</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Gently guide your attention through
                                            your body to notice physical sensations.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        3</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 3: Mindful Listening</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Expand your awareness to the sounds
                                            around you without judgment.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        4</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 4: Setting Intentions</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Start your day with a clear,
                                            positive intention to guide your actions.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        5</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 5: Cultivating Gratitude
                                        </h3>
                                        <p class="text-gray-500 dark:text-gray-400">Focus on appreciation to shift your
                                            perspective and boost your mood.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        6</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 6: Observing Thoughts</h3>
                                        <p class="text-gray-500 dark:text-gray-400">Practice watching your thoughts come
                                            and go like clouds in the sky.</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-100 dark:bg-white/5">
                                    <div
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary font-bold">
                                        7</div>
                                    <div>
                                        <h3 class="font-bold text-black dark:text-white">Day 7: Integrating Mindfulness
                                        </h3>
                                        <p class="text-gray-500 dark:text-gray-400">Bring all the elements together and
                                            plan how to continue your practice.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-80 lg:sticky top-10 h-min">
                            <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl mb-6"
                                data-alt="A serene sunrise over a calm lake, with mist rising from the water."
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI");'>
                            </div>
                            <div class="flex flex-col gap-3 p-6 rounded-xl border border-primary/20 dark:bg-white/5">
                                <h3 class="text-xl font-bold text-black dark:text-white">Ready to Begin?</h3>
                                <p class="text-gray-500 dark:text-gray-400">Join the program and transform your
                                    mornings.</p>
                                <button
                                    class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em] mt-2">
                                    <span class="truncate">Start Program</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <footer
                        class="mt-10 border-t border-primary/20 pt-8 pb-4 text-center text-gray-500 dark:text-gray-400">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-left mb-8">
                            <div>
                                <h3 class="font-bold text-black dark:text-white mb-2">Company</h3>
                                <ul class="space-y-2">
                                    <li><a class="hover:text-primary" href="#">About Us</a></li>
                                    <li><a class="hover:text-primary" href="#">Careers</a></li>
                                    <li><a class="hover:text-primary" href="#">Press</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-black dark:text-white mb-2">Resources</h3>
                                <ul class="space-y-2">
                                    <li><a class="hover:text-primary" href="#">Blog</a></li>
                                    <li><a class="hover:text-primary" href="#">FAQ</a></li>
                                    <li><a class="hover:text-primary" href="#">Contact Us</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-black dark:text-white mb-2">Legal</h3>
                                <ul class="space-y-2">
                                    <li><a class="hover:text-primary" href="#">Terms of Service</a></li>
                                    <li><a class="hover:text-primary" href="#">Privacy Policy</a></li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="font-bold text-black dark:text-white mb-2">Follow Us</h3>
                                <div class="flex space-x-4">
                                    <a class="hover:text-primary" href="#">
                                        <svg aria-hidden="true" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path clip-rule="evenodd"
                                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-primary" href="#">
                                        <svg aria-hidden="true" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.71v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="hover:text-primary" href="#">
                                        <svg aria-hidden="true" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path clip-rule="evenodd"
                                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.024.06 1.378.06 3.808s-.012 2.784-.06 3.808c-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.024.048-1.378.06-3.808.06s-2.784-.012-3.808-.06c-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.048-1.024-.06-1.378-.06-3.808s.012-2.784.06-3.808c.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 016.345 2.525c.636-.247 1.363-.416 2.427-.465C9.793 2.013 10.147 2 12.315 2zm-1.161 1.043c-2.43.001-2.748.01-3.71.058a3.84 3.84 0 00-1.72 1.018 3.84 3.84 0 00-1.018 1.72c-.048.962-.057 1.28-.058 3.71s.01 2.748.058 3.71a3.84 3.84 0 001.018 1.72 3.84 3.84 0 001.72 1.018c.962.048 1.28.057 3.71.058s2.748-.01 3.71-.058a3.84 3.84 0 001.72-1.018 3.84 3.84 0 001.018-1.72c.048-.962.057-1.28.058-3.71s-.01-2.748-.058-3.71a3.84 3.84 0 00-1.018-1.72 3.84 3.84 0 00-1.72-1.018c-.962-.048-1.28-.057-3.71-.058h-.001zm-4.498 10.518a5.21 5.21 0 1110.42 0 5.21 5.21 0 01-10.42 0zm5.21-3.693a3.693 3.693 0 100 7.386 3.693 3.693 0 000-7.386zm6.305-6.305a1.232 1.232 0 11-2.464 0 1.232 1.232 0 012.464 0z"
                                                fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-8 text-sm">© 2024 ForestSoul. All rights reserved.</p>
                    </footer>
                </div>
            </div>
        <?php
        put_footer();
        ?>
        </div>