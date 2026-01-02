<?php
// meditation/index.php
$title = "Meditation Room - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
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
            
            <!-- Left: Soundscapes -->
            <div class="lg:col-span-4 col gap-8 animate-fade-in-left">
                <h3 class="txt-xl font-bold row gap-3 items-center">
                    <span class="material-symbols-outlined text-primary">surround_sound</span>
                    Ambient Soundscapes
                </h3>
                <div class="grid grid-cols-1 gap-4">
                    <button onclick="playAmbient('forest')" class="ambient-btn group p-6 rounded-3xl bg-white/5 border border-white/5 hover:border-primary/40 transition-all row gap-6 items-center text-left" data-sound="forest">
                        <div class="size-16 rounded-2xl bg-primary/10 center text-primary group-hover:bg-primary group-hover:text-background-dark transition-all">
                            <i class="fa-solid fa-tree text-2xl"></i>
                        </div>
                        <div class="col gap-1">
                            <h4 class="font-bold">Forest Rain</h4>
                            <p class="text-[10px] uppercase font-black tracking-widest text-white/20">Soothing Droplets</p>
                        </div>
                    </button>

                    <button onclick="playAmbient('ocean')" class="ambient-btn group p-6 rounded-3xl bg-white/5 border border-white/5 hover:border-blue-500/40 transition-all row gap-6 items-center text-left" data-sound="ocean">
                        <div class="size-16 rounded-2xl bg-blue-500/10 center text-blue-500 group-hover:bg-blue-500 group-hover:text-background-dark transition-all">
                            <i class="fa-solid fa-water text-2xl"></i>
                        </div>
                        <div class="col gap-1">
                            <h4 class="font-bold">Deep Ocean</h4>
                            <p class="text-[10px] uppercase font-black tracking-widest text-white/20">Rhythmic Waves</p>
                        </div>
                    </button>

                    <button onclick="playAmbient('zen')" class="ambient-btn group p-6 rounded-3xl bg-white/5 border border-white/5 hover:border-amber-500/40 transition-all row gap-6 items-center text-left" data-sound="zen">
                        <div class="size-16 rounded-2xl bg-amber-500/10 center text-amber-500 group-hover:bg-amber-500 group-hover:text-background-dark transition-all">
                            <i class="fa-solid fa-om text-2xl"></i>
                        </div>
                        <div class="col gap-1">
                            <h4 class="font-bold">Zen Temple</h4>
                            <p class="text-[10px] uppercase font-black tracking-widest text-white/20">Singing Bowls</p>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Center: Breathing Guide -->
            <div class="lg:col-span-8 col gap-12 items-center text-center py-10">
                <div class="relative center">
                    <!-- Breathing Ring -->
                    <div id="breathing-ring" class="size-64 md:size-80 rounded-full border-4 border-primary/20 flex items-center justify-center transition-all duration-[4s] ease-in-out relative">
                        <div id="ring-inner" class="absolute inset-0 rounded-full bg-primary/10 blur-xl scale-50 transition-all duration-[4s] ease-in-out"></div>
                        <div class="relative z-10 col gap-2">
                            <h2 id="breathing-text" class="txt-3xl font-black italic l-tight">Ready?</h2>
                            <p id="breathing-subtext" class="text-xs font-bold uppercase tracking-[0.3em] text-white/40">Press Start to Begin</p>
                        </div>
                    </div>
                </div>

                <div class="row gap-6">
                    <button id="start-btn" onclick="toggleMeditation()" class="btn-primary h-16 px-12 rounded-2xl font-black uppercase tracking-widest text-sm shadow-2xl shadow-primary/20 group">
                        Start Session 
                        <i class="fa-solid fa-play ml-3 group-hover:scale-110 transition-transform"></i>
                    </button>
                    <button onclick="resetMeditation()" class="btn-ghost size-16 rounded-2xl border border-white/5 text-white/40 hover:text-white hover:bg-white/5 center">
                        <i class="fa-solid fa-rotate-right"></i>
                    </button>
                </div>

                <!-- Timer -->
                <div class="col gap-2">
                    <div id="session-timer" class="txt-5xl font-thin tracking-tighter text-white/20">05:00</div>
                    <p class="text-[10px] font-black uppercase tracking-widest text-primary">Remaining Peace</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Audio Elements (Placeholder paths - would ideally use high quality loop assets) -->
    <audio id="audio-forest" loop src="https://assets.mixkit.co/sfx/preview/mixkit-crickets-and-insects-in-the-wild-2470.mp3"></audio>
    <audio id="audio-ocean" loop src="https://assets.mixkit.co/sfx/preview/mixkit-soft-ocean-waves-loop-448.mp3"></audio>
    <audio id="audio-zen" loop src="https://assets.mixkit.co/sfx/preview/mixkit-wind-chimes-gentle-tinkling-2983.mp3"></audio>
</main>

<style>
    @keyframes breathe-in {
        0% { transform: scale(1); border-color: rgba(var(--primary-rgb), 0.2); }
        100% { transform: scale(1.4); border-color: rgba(var(--primary-rgb), 0.8); }
    }
    
    .breathing-active-in {
        animation: breathe-in 4s ease-in-out infinite alternate;
    }
    
    .inner-active-in {
        transform: scale(1) !important;
        opacity: 0.5;
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
let breathingPhase = 'in'; // 'in', 'hold', 'out'

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
        $('#breathing-ring').removeClass('breathing-active-in');
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
            showToast("Deep release complete. You are centered.", "success");
        }
    }, 1000);
}

function startBreathingCycle() {
    let phases = [
        { text: 'Inhale', sub: 'Fill your lungs', time: 4000 },
        { text: 'Hold', sub: 'Cherish the breath', time: 4000 },
        { text: 'Exhale', sub: 'Let everything go', time: 4000 }
    ];
    let i = 0;
    
    const cycle = () => {
        if (!medActive) return;
        let phase = phases[i % 3];
        $('#breathing-text').text(phase.text);
        $('#breathing-subtext').text(phase.sub);
        
        if (phase.text === 'Inhale') {
            $('#ring-inner').css('transform', 'scale(1)').css('opacity', '0.5');
        } else if (phase.text === 'Exhale') {
            $('#ring-inner').css('transform', 'scale(0.5)').css('opacity', '0.1');
        }
        
        i++;
        setTimeout(cycle, phase.time);
    };
    cycle();
}

function resetMeditation() {
    medActive = false;
    timer = 300;
    clearInterval(timerInterval);
    if (currentAudio) currentAudio.pause();
    $('#start-btn').html('Start Session <i class="fa-solid fa-play ml-3"></i>');
    $('#breathing-ring').removeClass('breathing-active-in');
    $('#session-timer').text("05:00");
    $('#breathing-text').text("Ready?");
    $('#breathing-subtext').text("Press Start to Begin");
    $('#ring-inner').css('transform', 'scale(0.5)').css('opacity', '0.1');
}
</script>

<?php put_footer(); ?>