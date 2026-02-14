<?php
// games/index.php
$title = "Mindful Games - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow bg-[#0a0a0c] text-white min-h-screen relative overflow-hidden">
    <!-- Starry Background -->
    <canvas id="stars-bg" class="fixed inset-0 pointer-events-none"></canvas>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-20 col gap-16">
        
        <div class="text-center col gap-4 animate-slide-up">
            <span class="text-secondary font-black uppercase tracking-[0.3em] text-xs">Playful Mindfulness</span>
            <h1 class="txt-5xl font-black italic l-tight">The Joy of Focus</h1>
            <p class="txt-lg txt-2 max-w-2xl mx-auto">Train your attention and release stress through interactive play.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Game Sidebar: Stats -->
            <div class="lg:col-span-3 col gap-6 animate-fade-in-left">
                <div class="card bg-white/5 border border-white/5 p-8 rounded-[2.5rem] col gap-8 sticky top-24">
                    <div class="col gap-1">
                        <h3 class="txt-xl font-bold">Zen Master</h3>
                        <p class="text-xs text-white/30 font-medium">Player Level: Focus Novice</p>
                    </div>

                    <div class="col gap-6">
                        <div class="between px-4 py-3 rounded-2xl bg-white/5 border border-white/5">
                            <span class="text-xs font-bold uppercase tracking-widest text-white/30">Score</span>
                            <span id="game-score" class="txt-xl font-black text-secondary">000</span>
                        </div>
                        <div class="between px-4 py-3 rounded-2xl bg-white/5 border border-white/5">
                            <span class="text-xs font-bold uppercase tracking-widest text-white/30">Streak</span>
                            <span id="game-streak" class="txt-xl font-black text-primary">x0</span>
                        </div>
                    </div>

                    <p class="text-[10px] txt-2 leading-relaxed italic">"Games are not just for fun; they are mirrors of our focus."</p>
                </div>
            </div>

            <!-- Game Canvas Container -->
            <div class="lg:col-span-9 col gap-8 animate-scale-in">
                <div class="relative aspect-video w-full bg-surface-dark border border-white/5 rounded-[3rem] shadow-2xl overflow-hidden group">
                    <canvas id="game-canvas" class="w-full h-full cursor-none"></canvas>
                    
                    <!-- Game Overlay -->
                    <div id="game-overlay" class="absolute inset-0 bg-background-dark/80 backdrop-blur-md center p-12 text-center col gap-8 transition-all">
                        <div class="size-24 rounded-[2rem] bg-secondary/20 center text-secondary shadow-2xl shadow-secondary/20 rotate-12">
                            <i class="fa-solid fa-ghost text-4xl"></i>
                        </div>
                        <div class="col gap-2">
                            <h2 class="txt-4xl font-black italic">Focus Flow</h2>
                            <p class="txt-lg txt-2 max-w-sm">Catch the falling Zen Orbs to build your focus. Avoid the Distractions (Red Orbs).</p>
                        </div>
                        <button onclick="startGame()" class="btn-primary h-16 px-12 rounded-2xl font-black uppercase tracking-widest text-sm shadow-2xl shadow-primary/20">
                            Begin Challenge
                        </button>
                    </div>

                    <!-- Custom Cursor -->
                    <div id="game-cursor" class="absolute size-12 rounded-full border-2 border-primary/50 pointer-events-none hidden center">
                        <div class="size-2 rounded-full bg-primary animate-ping"></div>
                    </div>
                </div>

                <div class="row gap-4 items-center justify-center p-6 bg-white/5 rounded-[2rem] border border-white/5">
                    <kbd class="px-3 py-1 rounded-lg bg-white/10 text-[10px] font-black uppercase tracking-widest">Mouse Movement</kbd>
                    <span class="text-[10px] text-white/20">to control collector</span>
                    <kbd class="px-3 py-1 rounded-lg bg-white/10 text-[10px] font-black uppercase tracking-widest">Left Click</kbd>
                    <span class="text-[10px] text-white/20">to expand range</span>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
// Stars Background
const starsCanvas = document.getElementById('stars-bg');
const ctxStars = starsCanvas.getContext('2d');
let stars = [];

function initStars() {
    starsCanvas.width = window.innerWidth;
    starsCanvas.height = window.innerHeight;
    stars = [];
    for(let i=0; i<200; i++) {
        stars.push({
            x: Math.random() * starsCanvas.width,
            y: Math.random() * starsCanvas.height,
            size: Math.random() * 2,
            opacity: Math.random(),
            speed: Math.random() * 0.5
        });
    }
}

function animateStars() {
    ctxStars.clearRect(0, 0, starsCanvas.width, starsCanvas.height);
    stars.forEach(s => {
        ctxStars.fillStyle = `rgba(255, 255, 255, ${s.opacity})`;
        ctxStars.beginPath();
        ctxStars.arc(s.x, s.y, s.size, 0, Math.PI*2);
        ctxStars.fill();
        s.y += s.speed;
        if(s.y > starsCanvas.height) s.y = 0;
    });
    requestAnimationFrame(animateStars);
}

// Game Logic
const canvas = document.getElementById('game-canvas');
const ctx = canvas.getContext('2d');
const cursor = document.getElementById('game-cursor');
let gameActive = false;
let score = 0;
let streak = 0;
let orbs = [];
let particles = [];
let playerX = 0;

function ResizeCanvas() {
    const parent = canvas.parentElement;
    canvas.width = parent.clientWidth;
    canvas.height = parent.clientHeight;
}

window.addEventListener('resize', () => {
    initStars();
    ResizeCanvas();
});

initStars();
animateStars();
ResizeCanvas();

canvas.addEventListener('mousemove', (e) => {
    const rect = canvas.getBoundingClientRect();
    playerX = e.clientX - rect.left;
    cursor.style.left = (e.clientX - rect.left - 24) + 'px';
    cursor.style.top = (e.clientY - rect.top - 24) + 'px';
});

function startGame() {
    $('#game-overlay').addClass('opacity-0 pointer-events-none scale-110');
    $('#game-cursor').removeClass('hidden');
    gameActive = true;
    score = 0;
    streak = 0;
    orbs = [];
    UpdateStats();
    GameLoop();
}

function CreateOrb() {
    if(!gameActive) return;
    const isEnemy = Math.random() > 0.8;
    orbs.push({
        x: Math.random() * canvas.width,
        y: -50,
        vy: 2 + Math.random() * 4,
        size: 15 + Math.random() * 10,
        isEnemy: isEnemy,
        color: isEnemy ? '#ef4444' : '#6366f1'
    });
    setTimeout(CreateOrb, 800 - Math.min(score, 500));
}

function GameLoop() {
    if(!gameActive) return;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw Player
    ctx.strokeStyle = '#6366f1';
    ctx.lineWidth = 4;
    ctx.beginPath();
    ctx.arc(playerX, canvas.height - 50, 40, 0, Math.PI, true);
    ctx.stroke();

    // Orbs
    orbs.forEach((orb, index) => {
        orb.y += orb.vy;
        
        ctx.fillStyle = orb.color;
        ctx.shadowBlur = 15;
        ctx.shadowColor = orb.color;
        ctx.beginPath();
        ctx.arc(orb.x, orb.y, orb.size, 0, Math.PI*2);
        ctx.fill();
        ctx.shadowBlur = 0;

        // Collision
        const dist = Math.hypot(orb.x - playerX, orb.y - (canvas.height - 50));
        if(dist < 50) {
            if(orb.isEnemy) {
                GameOver();
            } else {
                score += 10 + (streak * 2);
                streak++;
                CreateParticles(orb.x, orb.y, orb.color);
                orbs.splice(index, 1);
                UpdateStats();
            }
        }

        if(orb.y > canvas.height + 50) {
            if(!orb.isEnemy) streak = 0;
            orbs.splice(index, 1);
            UpdateStats();
        }
    });

    // Particles
    particles.forEach((p, index) => {
        p.x += p.vx;
        p.y += p.vy;
        p.life -= 0.02;
        ctx.fillStyle = `rgba(${p.r}, ${p.g}, ${p.b}, ${p.life})`;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI*2);
        ctx.fill();
        if(p.life <= 0) particles.splice(index, 1);
    });

    requestAnimationFrame(GameLoop);
}

function CreateParticles(x, y, color) {
    const rgb = HexToRgb(color);
    for(let i=0; i<10; i++) {
        particles.push({
            x, y, 
            vx: (Math.random()-0.5)*10,
            vy: (Math.random()-0.5)*10,
            size: Math.random()*4,
            life: 1,
            ...rgb
        });
    }
}

function HexToRgb(hex) {
    const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : {r:255, g:255, b:255};
}

function UpdateStats() {
    $('#game-score').text(score.toString().padStart(3, '0'));
    $('#game-streak').text('x' + streak);
}

function GameOver() {
    gameActive = false;
    $('#game-overlay').removeClass('opacity-0 pointer-events-none scale-110');
    $('#game-overlay h2').text('Flow Broken');
    $('#game-overlay p').text(`You achieved a score of ${score}. Take a deep breath and try again.`);
    $('#game-overlay button').text('Re-Center');
    $('#game-cursor').addClass('hidden');
    showToast(`Session Ended. Score: ${score}`, "info");
}

setTimeout(CreateOrb, 1000);
</script>

<?php put_footer(); ?>