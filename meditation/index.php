<?php
// meditation/index.php
$title = "Meditation Room - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

// Meditation Programs Database
$meditationPrograms = [
    [
        'id' => 'morning-mindfulness',
        'title' => '7 Days of Mindful Mornings',
        'description' => 'Start your day with clarity',
        'duration' => '10',
        'level' => 'Beginner',
        'category' => 'Morning',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBdJGI0wg2GRYqt4evRJQK4jPjz4JHFEgFIGr40JBhesbthLnz8uQSEtxtzj8EvG3ZDV5et7urYK95ds1Os0z5s5kvL0NqCobgF0MueU4Ctq5F-MN4i7w4hZGsRRcsGvh4Iv91WEsO5E_BctApi1fpO__-2pVWIehlnuO8e5beJI1MmHD8O_59ZZ4UBsRDfrZZXZZrGRuf5VdXZEwXIN9oKr9axqTCva1Y5fmiRD514QGkLYuO3B-dC8UCz9w-85nQHX6AwCRwtXBI',
        'link' => './7_day_ morning.php',
        'tags' => ['Stress Relief', 'Sleep', 'Focus']
    ],
    [
        'id' => 'deep-sleep',
        'title' => 'Deep Sleep Journey',
        'description' => 'Drift into restful slumber',
        'duration' => '20',
        'level' => 'All Levels',
        'category' => 'Sleep',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHfAKLcAccI5mrKbrDgmLbS0q9UueLv4lHiNTKAqJthcDsGUEfqIXnH5zJfzkjpfMd-eCVepEVBqd8fx0jRZ1fPAjqXX22atS7FMpR5IeOHbq2RdY6PcM4Jpcs_4nAKJDeR0vJ8KL3YZjrhQuzsWtwFu-xN_ctKdmO-VEeFMOMfOOhyX_qjCNT794-VSppqr3te-Vso_gI90zQZ8GxwAPe037LEz84x21WPHzEkDObA4-psFdFl_zGIwwUcxo-Jy4IZ_xabXadyyc',
        'link' => './deep_sleep.php',
        'tags' => ['Sleep', '<10 min']
    ],
    [
        'id' => 'anxiety-relief',
        'title' => 'Overcoming Anxiety',
        'description' => 'Cultivate resilience and peace',
        'duration' => '15',
        'level' => 'Intermediate',
        'category' => 'Stress Relief',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBoMzn3JLhccyzoR65tH14xS1GoxJodxT_o7-lgo5hqeTjQkBHFXty6cLKFSC9ZVcc7OddxtflZj4wq6EnE2dlU3GlGAHJLu-chq0jeXwd7rhSHFPX5M1V1VTtex-if4mduOy-tKDdYldXJ9gzU8EdeQfmbp3fchZf5mK_Qhh9g7w0xR7ugIj5X1mSWm1kOXGMn0bFeT1bqmLhr0qaN5m4rE7fi5i2iQuLxjjJeBhcOkAC-5XJ2QTsuawtBiYCWS1GwmJq_ZGNVEfg',
        'link' => './overcoming_anxiety.php',
        'tags' => ['Stress Relief', '10-20 min']
    ],
    [
        'id' => 'productivity-focus',
        'title' => 'Focus & Productivity Boost',
        'description' => 'Sharpen your mental edge',
        'duration' => '15',
        'level' => 'All Levels',
        'category' => 'Focus',
        'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC5RJOQqsLu5F7kGBxwQNtHfyTkPkLDIv4kaua3kNFnCPfF45WQmD4UskTMeuGXQfoKo1LI9CzwX9qLDVu2mBwglW9JsEJRmpQDcjXNk5tAiQtkYq5eJAZkpMkR1pvJEA51b9E4m8y3P75gFM90aDnT84vXPHh9ebo0UVqYyKJXQmqOtAkNciiZgEA26Pdd27Md899nQX04OCdbu012YyRJo_Tpj7XsRfs-ht8ZOBOhHLpLkfqlHueWQKKW4ie4lVMvuJgsJaviBus',
        'link' => './focus_productivity.php',
        'tags' => ['Focus', '10-20 min']
    ]
];

// Get filter from URL params
$filterCategory = $_GET['category'] ?? '';

// Filter programs if category is set
$displayPrograms = $meditationPrograms;
if (!empty($filterCategory)) {
    $displayPrograms = array_filter($meditationPrograms, function($prog) use ($filterCategory) {
        return strtolower($prog['category']) === strtolower($filterCategory);
    });
}
?>

<main class="flex-grow bg-[#05070a] text-white min-h-screen relative overflow-hidden">
    <!-- Immersive Background Elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] size-[600px] bg-primary/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[-10%] right-[-10%] size-[600px] bg-secondary/10 rounded-full blur-[120px] animate-pulse" style="animation-delay: 2s;"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 py-20 col gap-16">
        
        <!-- Hero Section -->
        <div class="text-center col gap-4 animate-slide-up">
            <span class="text-primary font-black uppercase tracking-[0.3em] text-xs">Inner Peace</span>
            <h1 class="txt-5xl font-black italic l-tight">Find Your Stillness</h1>
            <p class="txt-lg txt-2 max-w-2xl mx-auto">Escape the noise of the world. Choose your atmosphere and breathe with us.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
          

            <!-- Center: Breathing Guide -->
            <div class="lg:col-span-8 col gap-12 items-center text-center py-10">
                
                <!-- Modern Breathing Exercise Container -->
                <div class="relative w-full max-w-md mx-auto">
                    <!-- Main Breathing Circle with Lungs Icon -->
                    <div id="breathing-ring" class="size-72 md:size-80 rounded-full border-4 border-primary/30 flex items-center justify-center transition-all duration-[4s] ease-in-out relative bg-gradient-to-br from-primary/5 to-transparent">
                        
                        <!-- Animated Background Glow -->
                        <div id="ring-inner" class="absolute inset-0 rounded-full bg-primary/15 blur-2xl scale-50 transition-all duration-[4s] ease-in-out"></div>
                        
                        <!-- Content -->
                        <div class="relative z-10 col gap-6 items-center">
                            <!-- Lungs Icon with Animation -->
                            <div class="relative size-24 center">
                                <i id="breathing-icon" class="fa-solid fa-lungs text-primary text-6xl transition-all duration-[4s] ease-in-out"></i>
                                <div class="absolute inset-0 rounded-full border-2 border-primary/20 animate-pulse"></div>
                            </div>
                            
                            <!-- Breathing Text -->
                            <div class="col gap-3">
                                <h2 id="breathing-text" class="txt-4xl font-black italic tracking-tighter text-primary">Inhale</h2>
                                <p id="breathing-subtext" class="text-sm font-bold uppercase tracking-[0.2em] text-white/50">Fill your lungs slowly</p>
                            </div>
                            
                            <!-- Progress Indicator -->
                            <div class="w-32 h-1 bg-white/10 rounded-full overflow-hidden">
                                <div id="breathing-progress" class="h-full bg-gradient-to-r from-primary to-secondary transition-all duration-[4s] ease-in-out w-0"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Breathing Phases Indicator -->
                    <div class="flex gap-2 justify-center mt-8">
                        <div id="phase-inhale" class="flex flex-col items-center gap-2 px-4 py-3 rounded-2xl bg-primary/20 border border-primary/30 transition-all duration-300">
                            <i class="fa-solid fa-arrow-down text-primary text-lg"></i>
                            <span class="text-[10px] font-black uppercase tracking-wider text-primary">Inhale</span>
                        </div>
                        <div id="phase-hold" class="flex flex-col items-center gap-2 px-4 py-3 rounded-2xl bg-white/5 border border-white/10 transition-all duration-300">
                            <i class="fa-solid fa-pause text-white/50 text-lg"></i>
                            <span class="text-[10px] font-black uppercase tracking-wider text-white/50">Hold</span>
                        </div>
                        <div id="phase-exhale" class="flex flex-col items-center gap-2 px-4 py-3 rounded-2xl bg-white/5 border border-white/10 transition-all duration-300">
                            <i class="fa-solid fa-arrow-up text-white/50 text-lg"></i>
                            <span class="text-[10px] font-black uppercase tracking-wider text-white/50">Exhale</span>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <div class="col gap-6 items-center w-full mt-8">
                    <div class="row gap-4 justify-center">
                        <button id="start-btn" onclick="toggleMeditation()" class="btn-primary h-16 px-12 rounded-2xl font-black uppercase tracking-widest text-sm shadow-2xl shadow-primary/20 group transition-all">
                            Start Session 
                            <i class="fa-solid fa-play ml-3 group-hover:scale-110 transition-transform"></i>
                        </button>
                        <button onclick="resetMeditation()" class="btn-ghost size-16 rounded-2xl border border-white/5 text-white/40 hover:text-white hover:bg-white/5 center transition-all">
                            <i class="fa-solid fa-rotate-right"></i>
                        </button>
                    </div>

                    <!-- Timer -->
                    <div class="col gap-2">
                        <div id="session-timer" class="txt-6xl font-bold tracking-tighter text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">05:00</div>
                        <p class="text-[10px] font-black uppercase tracking-widest text-white/40">Session Duration</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <center>
      <!-- Chips/Filters -->
<div class="flex flex-col sm:flex-row gap-4 p-4 items-start sm:items-center">
  <div class="flex gap-3 flex-wrap">
    <a href="?category=" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl <?php echo empty($filterCategory) ? 'bg-primary/20 text-primary' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary'; ?> px-3">
      <p class="text-sm font-medium leading-normal">All</p>
    </a>
    <a href="?category=Morning" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl <?php echo $filterCategory === 'Morning' ? 'bg-primary/20 text-primary' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary'; ?> px-3">
      <p class="text-sm font-medium leading-normal">Morning</p>
    </a>
    <a href="?category=Sleep" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl <?php echo $filterCategory === 'Sleep' ? 'bg-primary/20 text-primary' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary'; ?> px-3">
      <p class="text-sm font-medium leading-normal">Sleep</p>
    </a>
    <a href="?category=Focus" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl <?php echo $filterCategory === 'Focus' ? 'bg-primary/20 text-primary' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary'; ?> px-3">
      <p class="text-sm font-medium leading-normal">Focus</p>
    </a>
    <a href="?category=Stress Relief" class="flex h-8 shrink-0 items-center justify-center gap-x-2 rounded-xl <?php echo $filterCategory === 'Stress Relief' ? 'bg-primary/20 text-primary' : 'bg-gray-200 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-primary/20 hover:text-primary'; ?> px-3">
      <p class="text-sm font-medium leading-normal">Stress Relief</p>
    </a>
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
  <?php if (empty($displayPrograms)): ?>
    <div class="col-span-full py-12 text-center">
      <span class="material-symbols-outlined text-5xl text-white/10 mb-4 block">meditation</span>
      <p class="txt-2 italic text-white/60">No programs found for this category.</p>
    </div>
  <?php else: foreach($displayPrograms as $program): ?>
  <a href="<?php echo $program['link']; ?>" class="flex flex-col gap-3 pb-3 group cursor-pointer">
    <div class="w-full bg-center bg-no-repeat aspect-[3/4] bg-cover rounded-xl overflow-hidden">
      <div class="w-full h-full bg-cover bg-center transition-transform duration-300 group-hover:scale-105"
        data-alt="<?php echo htmlspecialchars($program['title']); ?>"
        style='background-image: url("<?php echo $program['image']; ?>");'>
      </div>
    </div>

    <div>
      <div class="text-black dark:text-white text-base font-bold leading-normal group-hover:text-primary transition-colors"><?php echo htmlspecialchars($program['title']); ?></div>
      <div class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><?php echo htmlspecialchars($program['description']); ?></div>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal"><?php echo $program['duration']; ?> min • <?php echo $program['level']; ?></p>
    </div>
  </a>
  <?php endforeach; endif; ?>
</div>
    </center>
    </center>

    <!-- Audio Elements (Placeholder paths - would ideally use high quality loop assets) -->
    <audio id="audio-forest" loop src="https://assets.mixkit.co/sfx/preview/mixkit-crickets-and-insects-in-the-wild-2470.mp3"></audio>
    <audio id="audio-ocean" loop src="https://assets.mixkit.co/sfx/preview/mixkit-soft-ocean-waves-loop-448.mp3"></audio>
    <audio id="audio-zen" loop src="https://assets.mixkit.co/sfx/preview/mixkit-wind-chimes-gentle-tinkling-2983.mp3"></audio>
</main>

<style>
    @keyframes breathe-in {
        0% { transform: scale(1); border-color: rgba(var(--primary-rgb), 0.3); }
        50% { transform: scale(1.15); border-color: rgba(var(--primary-rgb), 0.7); }
        100% { transform: scale(1.3); border-color: rgba(var(--primary-rgb), 0.5); }
    }
    
    @keyframes breathe-out {
        0% { transform: scale(1.3); border-color: rgba(var(--primary-rgb), 0.5); }
        100% { transform: scale(0.9); border-color: rgba(var(--primary-rgb), 0.2); }
    }

    @keyframes icon-expand {
        0% { transform: scale(1); }
        100% { transform: scale(1.3); }
    }

    @keyframes icon-contract {
        0% { transform: scale(1.3); }
        100% { transform: scale(0.85); }
    }
    
    .breathing-active-in {
        animation: breathe-in 4s ease-in-out infinite;
    }
    
    .breathing-active-out {
        animation: breathe-out 4s ease-in-out infinite;
    }

    .breathing-active-icon-expand {
        animation: icon-expand 4s ease-in-out infinite;
    }

    .breathing-active-icon-contract {
        animation: icon-contract 4s ease-in-out infinite;
    }
    
    .inner-active-in {
        transform: scale(1) !important;
        opacity: 0.5;
    }

    .phase-indicator {
        transition: all 300ms ease-in-out;
    }

    .phase-active {
        transform: scale(1.1);
        background: rgba(99, 102, 241, 0.3) !important;
        border-color: rgba(99, 102, 241, 0.6) !important;
    }

    .ambient-btn.active {
        border-color: currentColor;
        background: rgba(255, 255, 255, 0.05);
    }
    .ambient-btn.active div {
        background: currentColor;
        color: #000;
    }
</style>

<script>
let medActive = false;
let currentAudio = null;
let timer = 300; // 5 mins
let timerInterval = null;
let breathingPhase = 'in';
let currentTechnique = 'box'; // box, 4-7-8, alternate

// Breathing Techniques
const breathingTechniques = {
    box: {
        name: 'Box Breathing',
        phases: [
            { text: 'Inhale', sub: 'Fill your lungs slowly', time: 4000, phase: 'in', icon: 'fa-arrow-down' },
            { text: 'Hold', sub: 'Cherish the breath', time: 4000, phase: 'hold', icon: 'fa-pause' },
            { text: 'Exhale', sub: 'Release gently', time: 4000, phase: 'out', icon: 'fa-arrow-up' },
            { text: 'Hold', sub: 'Rest in stillness', time: 4000, phase: 'hold', icon: 'fa-pause' }
        ]
    },
    deepRelax: {
        name: '4-7-8 Technique',
        phases: [
            { text: 'Inhale', sub: 'Count to 4 slowly', time: 4000, phase: 'in', icon: 'fa-arrow-down' },
            { text: 'Hold', sub: 'Count to 7', time: 7000, phase: 'hold', icon: 'fa-pause' },
            { text: 'Exhale', sub: 'Count to 8 slowly', time: 8000, phase: 'out', icon: 'fa-arrow-up' }
        ]
    },
    alternate: {
        name: 'Alternate Nostril',
        phases: [
            { text: 'Inhale Left', sub: 'Breathe through left', time: 5000, phase: 'in', icon: 'fa-arrow-down' },
            { text: 'Hold', sub: 'Balance your energy', time: 4000, phase: 'hold', icon: 'fa-pause' },
            { text: 'Exhale Right', sub: 'Release smoothly', time: 5000, phase: 'out', icon: 'fa-arrow-up' }
        ]
    }
};

function playAmbient(type) {
    if (currentAudio) {
        currentAudio.pause();
        currentAudio.currentTime = 0;
    }
    
    $('.ambient-btn').removeClass('active');
    $(`[onclick="playAmbient('${type}')"]`).addClass('active');
    
    currentAudio = document.getElementById('audio-' + type);
    if (medActive) currentAudio.play();
}

function toggleMeditation() {
    medActive = !medActive;
    
    if (medActive) {
        $('#start-btn').html('Pause <i class="fa-solid fa-pause ml-3"></i>');
        $('#breathing-ring').addClass('breathing-active-in');
        startTimer();
        startBreathingCycle();
        if (currentAudio) currentAudio.play();
    } else {
        $('#start-btn').html('Resume <i class="fa-solid fa-play ml-3"></i>');
        $('#breathing-ring').removeClass('breathing-active-in breathing-active-out');
        $('#breathing-icon').removeClass('breathing-active-icon-expand breathing-active-icon-contract');
        clearInterval(timerInterval);
        if (currentAudio) currentAudio.pause();
    }
}

function startTimer() {
    timerInterval = setInterval(() => {
        if (timer > 0) {
            timer--;
            let mins = Math.floor(timer / 60);
            let secs = timer % 60;
            $('#session-timer').text(`${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`);
        } else {
            resetMeditation();
            showToast("✨ Deep release complete. You are centered.", "success");
        }
    }, 1000);
}

function startBreathingCycle() {
    const technique = breathingTechniques[currentTechnique];
    const phases = technique.phases;
    let i = 0;
    
    const cycle = () => {
        if (!medActive) return;
        
        let phase = phases[i % phases.length];
        
        // Update text and icon
        $('#breathing-text').text(phase.text);
        $('#breathing-subtext').text(phase.sub);
        
        // Update phase indicators
        updatePhaseIndicators(phase.phase);
        
        // Update main ring animation
        if (phase.phase === 'in') {
            $('#breathing-ring').removeClass('breathing-active-out').addClass('breathing-active-in');
            $('#breathing-icon').removeClass('breathing-active-icon-contract').addClass('breathing-active-icon-expand');
        } else if (phase.phase === 'out') {
            $('#breathing-ring').removeClass('breathing-active-in').addClass('breathing-active-out');
            $('#breathing-icon').removeClass('breathing-active-icon-expand').addClass('breathing-active-icon-contract');
        } else {
            $('#breathing-ring').removeClass('breathing-active-in breathing-active-out');
            $('#breathing-icon').removeClass('breathing-active-icon-expand breathing-active-icon-contract');
        }
        
        // Update progress bar
        const totalTime = phases.reduce((sum, p) => sum + p.time, 0);
        const progressPercent = ((i + 1) / phases.length) * 100;
        $('#breathing-progress').css('width', progressPercent + '%');
        
        i++;
        setTimeout(cycle, phase.time);
    };
    cycle();
}

function updatePhaseIndicators(currentPhase) {
    $('#phase-inhale, #phase-hold, #phase-exhale').removeClass('phase-active');
    
    if (currentPhase === 'in') {
        $('#phase-inhale').addClass('phase-active');
    } else if (currentPhase === 'hold') {
        $('#phase-hold').addClass('phase-active');
    } else if (currentPhase === 'out') {
        $('#phase-exhale').addClass('phase-active');
    }
}

function resetMeditation() {
    medActive = false;
    timer = 300;
    clearInterval(timerInterval);
    if (currentAudio) currentAudio.pause();
    $('#start-btn').html('Start Session <i class="fa-solid fa-play ml-3"></i>');
    $('#breathing-ring').removeClass('breathing-active-in breathing-active-out');
    $('#breathing-icon').removeClass('breathing-active-icon-expand breathing-active-icon-contract');
    $('#session-timer').text("05:00");
    $('#breathing-text').text("Ready?");
    $('#breathing-subtext').text("Press Start to Begin");
    $('#breathing-progress').css('width', '0');
    $('#phase-inhale, #phase-hold, #phase-exhale').removeClass('phase-active');
    $('#ring-inner').css('transform', 'scale(0.5)').css('opacity', '0.1');
}
</script>

<?php put_footer(); ?>