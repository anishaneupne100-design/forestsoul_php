$title = "Overcoming Anxiety - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>
<main class="flex-1 space-y-10 py-10">
  <div class="@container">
    <div class="@[480px]:p-4">
      <div
        class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
        data-alt="A serene, misty forest scene representing peace and calm."
        style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB69d58akw59VQKx5TuOrNYAeBcGYRxYjdu0z5E_zjeie80kL451Nh6M2prjO8eW8DtdJ768xbjaku3cV6GlqTqGDL6Mko8OhJ001b6mbJ5s4LLvVzGiSmU7f703m1aWnVwCUvb-mxuSIF-e_NP-B8U4q-QaP-TziV6ULUdq7q4haTiLqiujUft5NlkMiI_ip8mlxp5tmSFhLjLcAqP140X_dvDplzCIOL9ZhnfehAau-_ROrdZZAfY79VG25gafRRROtRiUSjf0ds");'>
        <div class="flex flex-col gap-2 text-center">
          <h1
            class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
            Overcoming Anxiety
          </h1>
          <h2
            class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
            A 4-Week Guided Journey to Inner Peace and Resilience.
          </h2>
        </div>
        <button
          class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-primary text-background-dark text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]">
          <span class="truncate">Start Your Journey</span>
        </button>
      </div>
    </div>
  </div>
  <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-4 p-4">
    <div
      class="flex flex-1 gap-3 rounded-lg border border-gray-200 dark:border-[#326755] bg-background-light dark:bg-[#19332b] p-4 flex-col">
      <div class="text-primary" data-icon="Calendar" data-size="24px" data-weight="regular">
        <span class="material-symbols-outlined">calendar_today</span>
      </div>
      <div class="flex flex-col gap-1">
        <h2 class="text-black dark:text-white text-base font-bold leading-tight">4 Weeks</h2>
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Program Length</p>
      </div>
    </div>
    <div
      class="flex flex-1 gap-3 rounded-lg border border-gray-200 dark:border-[#326755] bg-background-light dark:bg-[#19332b] p-4 flex-col">
      <div class="text-primary" data-icon="Clock" data-size="24px" data-weight="regular">
        <span class="material-symbols-outlined">schedule</span>
      </div>
      <div class="flex flex-col gap-1">
        <h2 class="text-black dark:text-white text-base font-bold leading-tight">15 min/day</h2>
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Session Duration</p>
      </div>
    </div>
    <div
      class="flex flex-1 gap-3 rounded-lg border border-gray-200 dark:border-[#326755] bg-background-light dark:bg-[#19332b] p-4 flex-col">
      <div class="text-primary" data-icon="Headset" data-size="24px" data-weight="regular">
        <span class="material-symbols-outlined">headset_mic</span>
      </div>
      <div class="flex flex-col gap-1">
        <h2 class="text-black dark:text-white text-base font-bold leading-tight">Guided Meditation</h2>
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Program Type</p>
      </div>
    </div>
  </div>
  <div>
    <div class="pb-3">
      <div class="flex border-b border-gray-200 dark:border-[#326755] px-4 gap-8">
        <a class="flex flex-col items-center justify-center border-b-[3px] border-b-primary text-black dark:text-white pb-[13px] pt-4"
          href="#">
          <p class="text-sm font-bold leading-normal tracking-[0.015em]">Program Details</p>
        </a>
        <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-gray-500 dark:text-[#92c9b7] pb-[13px] pt-4"
          href="#">
          <p class="text-sm font-bold leading-normal tracking-[0.015em]">Structure</p>
        </a>
        <a class="flex flex-col items-center justify-center border-b-[3px] border-b-transparent text-gray-500 dark:text-[#92c9b7] pb-[13px] pt-4"
          href="#">
          <p class="text-sm font-bold leading-normal tracking-[0.015em]">Benefits</p>
        </a>
      </div>
    </div>
    <div class="p-4 grid grid-cols-[25%_1fr] gap-x-6">
      <div class="col-span-2 grid grid-cols-subgrid border-t border-gray-200 dark:border-t-[#326755] py-5">
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Mindful Breathing</p>
        <p class="text-black dark:text-white text-sm font-normal leading-normal">Learn to anchor yourself in the present
          moment and calm your nervous system through conscious, controlled breathing techniques.</p>
      </div>
      <div class="col-span-2 grid grid-cols-subgrid border-t border-gray-200 dark:border-t-[#326755] py-5">
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Body Scan Meditation</p>
        <p class="text-black dark:text-white text-sm font-normal leading-normal">Develop a deeper connection with your
          body, identify areas of tension, and learn to release physical stress associated with anxiety.</p>
      </div>
      <div class="col-span-2 grid grid-cols-subgrid border-t border-gray-200 dark:border-t-[#326755] py-5">
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Cognitive Reframing</p>
        <p class="text-black dark:text-white text-sm font-normal leading-normal">Understand and reshape anxious thought
          patterns, challenge negative self-talk, and cultivate a more balanced perspective for greater mental clarity.
        </p>
      </div>
      <div class="col-span-2 grid grid-cols-subgrid border-t border-gray-200 dark:border-t-[#326755] py-5">
        <p class="text-gray-500 dark:text-[#92c9b7] text-sm font-normal leading-normal">Visualization</p>
        <p class="text-black dark:text-white text-sm font-normal leading-normal">Practice guided imagery to create a
          mental sanctuary, reduce feelings of overwhelm, and foster a state of deep relaxation.</p>
      </div>
    </div>
  </div>
  <div class="space-y-6 p-4">
    <h3 class="text-2xl font-bold text-black dark:text-white text-center">What Our Community Says</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div
        class="flex flex-col gap-4 rounded-lg border border-gray-200 dark:border-[#326755] bg-background-light dark:bg-[#19332b] p-6">
        <div class="flex items-center gap-4">
          <img class="h-12 w-12 rounded-full object-cover" data-alt="A portrait of a smiling woman."
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA7Shv3egvONFBKUwqfM5KdGSnxXV1hr_oD8Hmc0wn0xAJAIQJE2xpVRwkwiCaqk1EGrDILk2MiowFdu5hl0Gu25guwBv7ET4OCTuC_grsv_b15Ifg-AiCCRTjFup6l3ex8v-pQ6gAI5d96IjTI0oiee1YEIwej28lK_afW8zRq1IILs9tcL1Ffcmkpo-SeUGOVMaBohAV3zh5LGksdylFv9_qYAWxWBpKEDrjdlhUhjJ-GdQiKRKAzd2Wzy1R_IC51_sq_yCSJnkw" />
          <div>
            <p class="font-bold text-black dark:text-white">Sarah J.</p>
            <p class="text-sm text-gray-500 dark:text-[#92c9b7]">Program Participant</p>
          </div>
        </div>
        <blockquote class="text-black dark:text-white/90 italic">"This program was a game-changer. The daily practices
          were short but incredibly effective. I feel more in control of my thoughts and much calmer throughout the
          day."</blockquote>
      </div>
      <div
        class="flex flex-col gap-4 rounded-lg border border-gray-200 dark:border-[#326755] bg-background-light dark:bg-[#19332b] p-6">
        <div class="flex items-center gap-4">
          <img class="h-12 w-12 rounded-full object-cover"
            data-alt="A portrait of a man with a beard, looking thoughtfully at the camera."
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAeKxF9by1cfHs0at98Db1a0zhHFSvF-Eskzis9IVEiTcXfnkYuOnxsVylTS8BOQ1Ob8e83uNa4RCFEqPxFX0YKQ6Sul5mzfwAtpMSpFgUYvtgLjRs84DM8S0rhKVL_hGQzuO9TxHRn3k0xD_mRcQzlUtKkU7o-r1vXh39rQl_K1vs4IbKD_SuFKDjR-OQA7-96hq3NhMAGEauEj73K0BZYJA6YDtkCTzDxm3EXKXQ23M15sOkHcRnVEuqSMZmu_enzYvpq-USYV5w" />
          <div>
            <p class="font-bold text-black dark:text-white">Michael R.</p>
            <p class="text-sm text-gray-500 dark:text-[#92c9b7]">Program Participant</p>
          </div>
        </div>
        <blockquote class="text-black dark:text-white/90 italic">"I was skeptical at first, but the week-by-week
          structure made it so easy to follow. The body scan meditations helped me release so much tension I didn't even
          know I was holding."</blockquote>
      </div>
    </div>
  </div>
  <div class="space-y-6 p-4">
    <h3 class="text-2xl font-bold text-black dark:text-white text-center">Frequently Asked Questions</h3>
    <div class="space-y-4">
      <details class="group rounded-lg bg-gray-100 dark:bg-[#19332b] p-4">
        <summary class="flex cursor-pointer items-center justify-between text-black dark:text-white font-medium">
          Do I need any prior meditation experience?
          <span
            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
        </summary>
        <p class="mt-4 text-gray-600 dark:text-[#92c9b7]">Not at all! This program is designed for all levels, from
          complete beginners to those looking to deepen their existing practice. We guide you every step of the way.</p>
      </details>
      <details class="group rounded-lg bg-gray-100 dark:bg-[#19332b] p-4">
        <summary class="flex cursor-pointer items-center justify-between text-black dark:text-white font-medium">
          What if I miss a day?
          <span
            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
        </summary>
        <p class="mt-4 text-gray-600 dark:text-[#92c9b7]">Life happens! You can always go back to a previous day's
          session. The program is flexible to fit your schedule, though consistency is encouraged for the best results.
        </p>
      </details>
      <details class="group rounded-lg bg-gray-100 dark:bg-[#19332b] p-4">
        <summary class="flex cursor-pointer items-center justify-between text-black dark:text-white font-medium">
          What equipment do I need?
          <span
            class="material-symbols-outlined transition-transform duration-300 group-open:rotate-180">expand_more</span>
        </summary>
        <p class="mt-4 text-gray-600 dark:text-[#92c9b7]">All you need is a quiet space where you won't be disturbed for
          about 15 minutes, and a device to listen to the guided meditations. Headphones are recommended but not
          required.</p>
      </details>
    </div>
  </div>
  <div
    class="mt-10 flex flex-col items-center justify-center gap-4 rounded-xl bg-gray-100 dark:bg-[#19332b] p-8 text-center">
    <h3 class="text-2xl font-bold text-black dark:text-white">Ready to Find Your Inner Peace?</h3>
    <p class="max-w-md text-gray-600 dark:text-[#92c9b7]">Join our community and start your journey to a calmer, more
      resilient you. Your path to overcoming anxiety begins with a single step.</p>
    <button
      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-12 px-5 bg-primary text-background-dark text-base font-bold leading-normal tracking-[0.015em]">
      <span class="truncate">Join the Program Now</span>
    </button>
  </div>
</main>
</div>
</div>
</div>
</div>
<?php
put_footer();
?>