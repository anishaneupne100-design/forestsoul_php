<?php
// games/index.php
$title = "Mind Games - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- HeroSection -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                data-alt="A tranquil, misty forest at sunrise."
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBeXS-ZriRzDmieQFVWyhMMXh0v1E1sHg_OKU-iUBA8bcIjRkb63v501im8O17ornr1-uJsoeAS-veOOHESFmuosOQUChEkxMJ5V6tZgrB8Ajf_x7UyG2GN_-OnoGyd7iDyBzs0ECIpqWvWt8tWpB_dxGuef6_b3i-Lovp6FEZ5zR4VudcDJKxfjegg0U2GiQJqKG_bjJeX8nYA-lOzt7XwoB93P1PudrSWkp6Odlp8XjljjLszbS5V3iSA7Yz9PWcOjuMOm0Nqe18");'>
                <div class="col gap-sm max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">A Quiet Space for Your Thoughts</h1>
                    <p class="hero-text @[480px]:text-base">Engage in calming mind games and thoughtful self-assessments to nourish your mental well-being.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('activities')">
                    <span class="truncate">Explore Activities</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="section px-4" id="activities">
        <div class="row border-b border-border-light dark:border-border-dark gap-8 mb-8">
            <button class="px-2 py-4 border-b-2 border-primary txt-sm font-bold">Mind Games</button>
            <button class="px-2 py-4 border-b-2 border-transparent txt-2 txt-sm font-bold hover:text-primary transition-colors" onclick="gotoPage(ROUTES.questionnaire)">Self-Assessments</button>
        </div>

        <div class="grid-3">
            <!-- Game 1 -->
            <div class="card-feature group cursor-pointer" onclick="showToast('Game is being loaded...', 'info')">
                <div class="img-landscape mb-4 overflow-hidden rounded-xl">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPIOuPwc5cgwo2kUppwBCwtJZtZnGqfzXVLi9RlGbEGonN4Su3WcxwnVtZRMbqUlmXSg5FIa8EhgqRLmIKptXu_lM2LtWEbBA76qppNTN-jf6YBZmoi_WpY3EvWGTT36c1agkVryvusauwCbeQcXT1JwLz6fl7VrXdo-vB_MWqEZwkWUlebxubTSPtFLBx2crWKkAVGFesjA_saYxjYvtq1IvK-bsyuy1OCNgzIeMNNshqScJwG9Ueh9GTQigGQk-wfmBprkxRTDY" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Pattern Recognition">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Pattern Recognition</h3>
                    <p class="subtitle">Boost your focus and visual attention.</p>
                    <div class="row gap-2 mt-2 txt-2 txt-xs font-bold uppercase tracking-widest">
                        <span class="bg-surface-dark px-2 py-1 rounded">5 MIN</span>
                        <span class="bg-primary/20 text-primary px-2 py-1 rounded">FOCUS</span>
                    </div>
                </div>
            </div>

            <!-- Game 2 -->
            <div class="card-feature group cursor-pointer" onclick="showToast('Game is being loaded...', 'info')">
                <div class="img-landscape mb-4 overflow-hidden rounded-xl">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB8oGa_vIX0SnEQwHJya30qJnafVvhm0lYSPmVOrc5zXBbA6JNvnvy6eTb0Z_Z8mxETeXWbvXeECqjAP_sQwls152633ho8ijC7sTe113ulbpEL7zg6N7m7cZB2RY_Z4YFybHabzxYnL_yybe2eS6TKgtNTRFiHCb_K6EBSWaEWm36liTGXZG14-I-chH8sJnX1OOQ1W4mmw_9rFdCVWSA37NcwnHl6EDZFB2Y6vqUtE4sDzP_v6EZffNm-FyItWeaWt4tk64hdhNo" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Sound Scape">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Sound Scape Identifier</h3>
                    <p class="subtitle">Listen and identify calming nature sounds.</p>
                    <div class="row gap-2 mt-2 txt-2 txt-xs font-bold uppercase tracking-widest">
                        <span class="bg-surface-dark px-2 py-1 rounded">3 MIN</span>
                        <span class="bg-primary/20 text-primary px-2 py-1 rounded">AUDITORY</span>
                    </div>
                </div>
            </div>

            <!-- Game 3 -->
            <div class="card-feature group cursor-pointer" onclick="showToast('Game is being loaded...', 'info')">
                <div class="img-landscape mb-4 overflow-hidden rounded-xl">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9VhT9o3boofu_zHlMLWvKiYDlNu23TS9ekiB1PfKiilh1uhqWDwinyyGrmkOaPUK9xRxP_huGYJpQXQdV8PclStowt4Uwqz7WzBN5b4BrPmjCwNXDCWqbfokrFA1HdV3uoXLEUH3iS-Pyid12SD3mK_S5TqtnVD1kf57b86k4V1yBEVnlC3J010Fdw_7JLSK8a5k0vMICdAmMtfzGoGgysHESqHi3f4rY643k4EJqo45p5Z2nFz_mVRdLdLC6Enk2i9PJlxVkkhE" 
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="Visual Memory">
                </div>
                <div class="col gap-1">
                    <h3 class="title group-hover:text-primary transition-colors">Visual Memory Challenge</h3>
                    <p class="subtitle">Test and improve your short-term memory.</p>
                    <div class="row gap-2 mt-2 txt-2 txt-xs font-bold uppercase tracking-widest">
                        <span class="bg-surface-dark px-2 py-1 rounded">5 MIN</span>
                        <span class="bg-primary/20 text-primary px-2 py-1 rounded">MEMORY</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-3xl mx-auto mt-20 mb-10 p-6 rounded-2xl bg-primary/5 border border-primary/10">
            <div class="row gap-4 items-start">
                <span class="material-symbols-outlined text-primary">info</span>
                <p class="txt-2 txt-sm italic">
                    Disclaimer: These mind games and self-assessments are designed for self-exploration and relaxation. They are not a substitute for professional clinical diagnosis or medical advice.
                </p>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>