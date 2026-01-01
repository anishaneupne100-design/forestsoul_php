<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/navbar.php';
?>


<!-- HeroSection -->
<div class="@container mt-5">
  <div class="@[480px]:p-4">
    <div
      class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4 text-center"
      data-alt="A tranquil, misty forest with tall green trees and soft light filtering through the canopy."
      style='background-image: linear-gradient(rgba(16, 34, 22, 0.4) 0%, rgba(16, 34, 22, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAd2KkCvBLG_jMvl3m5NMAuls_e-ZEbtIOHc-57dQJuMQd1qmAvfJzz_0n7kK5FleViOyegVb0dhc5qBGBi8-fWTGF0OszYNUpWx8iYAfnQ5UZRtw0uQ3LMIVQExycyaJel8Nx9oUzofN7eRNIwN5XnGNxDcTvdaO8d_wIoOvPzbRO-eOaQL7xtJNUTWSkk6fHwuRiqPsPAXy6XyjLG-1EY3CCthN0U_HM6E9M10tYM2wIevJY3DpbgmU2aKmPTzcYqLKVbfTSmPso");'>
      <div class="flex flex-col gap-2 max-w-2xl">
        <h1
          class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
          Find Your Inner Calm: Guided Meditations for a Balanced Mind.</h1>
        <h2
          class="text-gray-200 text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
          Explore our collection of programs designed to reduce stress, improve focus, and connect
          you with the present moment.</h2>
      </div>
      <button
        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
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
    <button
      class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
      <p class="text-sm font-medium leading-normal">Stress Relief</p>
    </button>
    <button
      class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
      <p class="text-sm font-medium leading-normal">Sleep</p>
    </button>
    <button
      class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
      <p class="text-sm font-medium leading-normal">Focus</p>
    </button>
    <button
      class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
      <p class="text-sm font-medium leading-normal">&lt;10 min</p>
    </button>
    <button
      class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl bg-gray-200 dark:bg-gray-800 px-3 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary">
      <p class="text-sm font-medium leading-normal">10-20 min</p>
    </button>
  </div>
  <div class="relative w-full sm:w-auto sm:ml-auto">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">search</span>
    <input
      class="w-full sm:w-64 h-10 pl-10 pr-4 rounded-xl border-gray-300 dark:border-gray-700 bg-background-light dark:bg-background-dark text-gray-900 dark:text-gray-100 focus:ring-primary focus:border-primary"
      placeholder="Search programs..." type="text" />
  </div>
</div>
<!-- ImageGrid -->
<div class="grid grid-cols-[repeat(auto-fill,minmax(200px,1fr))] gap-6 p-4">
  <div class="flex flex-col gap-3 pb-3 group">
    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
      <div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105"
        data-alt="A serene sunrise over a calm lake, with mist rising from the water."
        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI");'>
      </div>
    </div>
    <div>
      <div class="text-black dark:text-white text-base font-bold leading-normal"><a href="./7_day_morning.php">7 Days of Mindful
        Mornings</a></div>
      <div class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><a href="./7_day_morning.php">Start your day
        with clarity</a></div>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">10 min •
        Beginner</p>
    </div>
  </div>
  <div class="flex flex-col gap-3 pb-3 group">
    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
      <div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105"
        data-alt="A peaceful night sky full of stars above a silhouette of a forest."
        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHfAKLcAccI5mrKbrDgmLbS0q9UueLv4lHiNTKAqJthcDsGUEfqIXnH5zJfzkjpfMd-eCVepEVBqd8fx0jRZ1fPAjqXX22atS7FMpR5IeOHbq2RdY6PcM4Jpcs_4nAKJDeR0vJ8KL3YZjrhQuzsWtwFu-xN_ctKdmO-VEeFMOMfOOhyX_qjCNT794-VSppqr3te-Vso_gI90zQZ8GxwAPe037LEz84x21WPHzEkDObA4-psFdFl_zGIwwUcxo-Jy4IZ_xabXadyyc");'>
      </div>
    </div>

    <div>
      <p class="text-black dark:text-white text-base font-bold leading-normal"><a href="./deep_sleep.php"> Deep
          Sleep Journey</a>
      </p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><a href="./deep_sleep.php"> Drift
          into
          restful slumber </a></p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">20 min • All
        Levels</p>
    </div>
  </div>
  <div class="flex flex-col gap-3 pb-3 group">
    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
      <div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105"
        data-alt="Lush green ferns covering a forest floor, with sunlight filtering through the trees."
        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBoMzn3JLhccyzoR65tH14xS1GoxJodxT_o7-lgo5hqeTjQkBHFXty6cLKFSC9ZVcc7OddxtflZj4wq6EnE2dlU3GlGAHJLu-chq0jeXwd7rhSHFPX5M1V1VTtex-if4mduOy-tKDdYldXJ9gzU8EdeQfmbp3fchZf5mK_Qhh9g7w0xR7ugIj5X1mSWm1kOXGMn0bFeT1bqmLhr0qaN5m4rE7fi5i2iQuLxjjJeBhcOkAC-5XJ2QTsuawtBiYCWS1GwmJq_ZGNVEfg");'>
      </div>
    </div>
    <div>
      <p class="text-black dark:text-white text-base font-bold leading-normal"><a
          href="./overcoming _anxiety.php">Overcoming Anxiety
        </a>
      </p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><a
          href="./overcoming_anxiety.php">Cultivate
          resilience and peace</a></p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">15 min •
        Intermediate</p>
    </div>
  </div>
  <div class="flex flex-col gap-3 pb-3 group">
    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
      <div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105"
        data-alt="A clear, calm river flowing through a dense, green forest."
        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC5RJOQqsLu5F7kGBxwQNtHfyTkPkLDIv4kaua3kNFnCPfF45WQmD4UskTMeuGXQfoKo1LI9CzwX9qLDVu2mBwglW9JsEJRmpQDcjXNk5tAiQtkYq5eJAZkpMkR1pvJEA51b9E4m8y3P75gFM90aDnT84vXPHh9ebo0UVqYyKJXQmqOtAkNciiZgEA26Pdd27Md899nQX04OCdbu012YyRJo_Tpj7XsRfs-ht8ZOBOhHLpLkfqlHueWQKKW4ie4lVMvuJgsJaviBus");'>
      </div>
    </div>
    <div>
      <p class="text-black dark:text-white text-base font-bold leading-normal"><a href="./focus_productivity.php">Focus
          &amp;

          Productivity Boost </a> </p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><a
          href="./focus_productivity.php">Sharpen your
          mental edge</a></p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal">15 min • All
        Levels</p>
    </div>
  </div>
</div>
<!-- CTASection -->
<div class="@container my-10">
  <div class="bg-gray-100 dark:bg-white/5 rounded-xl">
    <div
      class="flex flex-col justify-center items-center gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20 text-center">
      <div class="flex flex-col gap-2">
        <h1
          class="text-black dark:text-white tracking-tight text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-2xl">
          Unlock Your Full Potential</h1>
        <p class="text-gray-600 dark:text-gray-300 text-base font-normal leading-normal max-w-2xl">
          Subscribe to ForestSoul for full access to all our meditation and yoga programs.</p>
      </div>
      <div class="flex justify-center">
        <button
          class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
          <span class="truncate">Subscribe Now</span>
        </button>
      </div>
    </div>
  </div>
</div>

<?php
put_footer();
?>