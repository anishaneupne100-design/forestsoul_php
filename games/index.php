<?php
// games/index.php
$title = "Mindful Games - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

// Game collection
$games = [
    [
        'id' => 'memory',
        'name' => 'Memory Match',
        'description' => 'Match pairs of cards. Simple, relaxing, trains memory.',
        'icon' => 'brain',
        'difficulty' => 'Easy'
    ],
    [
        'id' => 'pattern',
        'name' => 'Pattern Flow',
        'description' => 'Follow the color sequences. Builds focus naturally.',
        'icon' => 'shuffle',
        'difficulty' => 'Medium'
    ],
    [
        'id' => 'zen',
        'name' => 'Zen Puzzle',
        'description' => 'Arrange tiles to form patterns. Peaceful and mindful.',
        'icon' => 'puzzle',
        'difficulty' => 'Easy'
    ]
];

$selectedGame = $_GET['game'] ?? 'memory';
?>

<main class="flex-grow bg-[#0a0a0c] text-white min-h-screen relative overflow-hidden">
    <!-- Subtle Background -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 size-96 bg-primary/5 rounded-full blur-3xl -mt-48 -ml-48"></div>
        <div class="absolute bottom-0 right-0 size-96 bg-secondary/5 rounded-full blur-3xl -mb-48 -mr-48"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 py-20 col gap-16">
        
        <!-- Header -->
        <div class="text-center col gap-4 animate-slide-up">
            <span class="text-primary font-black uppercase tracking-[0.3em] text-xs">Playful Mindfulness</span>
            <h1 class="txt-5xl font-black italic l-tight">Mindful Games</h1>
            <p class="txt-lg txt-2 max-w-2xl mx-auto">Play simple, refreshing games. No stress, just focus.</p>
        </div>

        <!-- Game Selection & Play Area -->
        <div class="col gap-8">
            <!-- Game Selector -->
            <div class="flex gap-3 justify-center flex-wrap">
                <?php foreach($games as $game): ?>
                <a href="?game=<?php echo $game['id']; ?>" class="px-6 py-3 rounded-2xl font-bold text-sm uppercase tracking-wider transition-all <?php echo $selectedGame === $game['id'] ? 'bg-primary text-background-dark shadow-lg shadow-primary/30' : 'bg-white/5 text-white/60 hover:bg-white/10 hover:text-white'; ?>">
                    <i class="fa-solid fa-<?php echo $game['icon']; ?> mr-2"></i><?php echo $game['name']; ?>
                </a>
                <?php endforeach; ?>
            </div>

            <!-- Game Instructions Accordion -->
            <div class="card bg-white/5 border border-white/5 rounded-[2rem] overflow-hidden">
                <button id="accordion-btn" class="w-full px-8 py-6 flex items-center justify-between hover:bg-white/5 transition-all cursor-pointer">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-primary text-lg"></i>
                        <span class="font-bold uppercase tracking-wider text-white">How to Play</span>
                    </div>
                    <i id="accordion-icon" class="fa-solid fa-chevron-down text-primary transition-transform"></i>
                </button>
                
                <div id="accordion-content" class="max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-8 py-6 border-t border-white/5">
                        <!-- Memory Match Instructions -->
                        <div id="instructions-memory" class="col gap-4 <?php echo $selectedGame !== 'memory' ? 'hidden' : ''; ?>">
                            <h3 class="font-bold text-primary text-lg">Memory Match 🧠</h3>
                            <p class="text-sm text-white/70 leading-relaxed">
                                Test your memory by matching pairs of colored cards.
                            </p>
                            <ul class="text-sm text-white/70 space-y-2">
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">1.</span>
                                    <span>Click on cards to flip them and reveal colors</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">2.</span>
                                    <span>Try to find two cards with the same color</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">3.</span>
                                    <span>Match all pairs to complete the game</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">⭐</span>
                                    <span>Gain 10 points for each matched pair</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Pattern Flow Instructions -->
                        <div id="instructions-pattern" class="col gap-4 <?php echo $selectedGame !== 'pattern' ? 'hidden' : ''; ?>">
                            <h3 class="font-bold text-primary text-lg">Pattern Flow 🔀</h3>
                            <p class="text-sm text-white/70 leading-relaxed">
                                Watch the pattern and repeat it. The pattern gets longer each round!
                            </p>
                            <ul class="text-sm text-white/70 space-y-2">
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">1.</span>
                                    <span>Watch as colored buttons flash in a sequence</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">2.</span>
                                    <span>Click the buttons in the same order</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">3.</span>
                                    <span>Each level adds one more button to the pattern</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">⭐</span>
                                    <span>Get 10 points per level completed</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Zen Puzzle Instructions -->
                        <div id="instructions-zen" class="col gap-4 <?php echo $selectedGame !== 'zen' ? 'hidden' : ''; ?>">
                            <h3 class="font-bold text-primary text-lg">Zen Puzzle 🧩</h3>
                            <p class="text-sm text-white/70 leading-relaxed">
                                A peaceful, pressure-free tile arrangement game. No rules, just relax.
                            </p>
                            <ul class="text-sm text-white/70 space-y-2">
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">1.</span>
                                    <span>Drag and drop colored tiles freely</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">2.</span>
                                    <span>Arrange them however you like</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">3.</span>
                                    <span>Click "Shuffle" to randomize the layout</span>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-primary font-bold">⭐</span>
                                    <span>Earn points every time you move a tile</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Game Container -->
            <div class="card bg-white/5 border border-white/5 p-8 rounded-[2.5rem] min-h-[500px] flex items-center justify-center">
                <div id="game-container" class="w-full h-full flex items-center justify-center">
                    <!-- Games will load here -->
                </div>
            </div>

            <!-- Score Display -->
            <div class="flex gap-6 justify-center flex-wrap">
                <div class="px-6 py-3 rounded-2xl bg-white/5 border border-white/5 center gap-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-white/50">Score</span>
                    <span id="game-score" class="txt-2xl font-black text-primary">0</span>
                </div>
                <div class="px-6 py-3 rounded-2xl bg-white/5 border border-white/5 center gap-2">
                    <span class="text-xs font-bold uppercase tracking-widest text-white/50">Time</span>
                    <span id="game-time" class="txt-2xl font-black text-secondary">0:00</span>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Load Game Libraries -->
<script src="https://cdn.jsdelivr.net/npm/phaser@3.55.2/dist/phaser.js"></script>

<script>
// Accordion Functionality
const accordionBtn = document.getElementById('accordion-btn');
const accordionContent = document.getElementById('accordion-content');
const accordionIcon = document.getElementById('accordion-icon');
let accordionOpen = false;

accordionBtn.addEventListener('click', () => {
    accordionOpen = !accordionOpen;
    if (accordionOpen) {
        accordionContent.style.maxHeight = '500px';
        accordionIcon.style.transform = 'rotate(180deg)';
    } else {
        accordionContent.style.maxHeight = '0px';
        accordionIcon.style.transform = 'rotate(0deg)';
    }
});

// Show instructions for selected game
function updateInstructions(gameName) {
    document.getElementById('instructions-memory')?.classList.add('hidden');
    document.getElementById('instructions-pattern')?.classList.add('hidden');
    document.getElementById('instructions-zen')?.classList.add('hidden');
    
    const instructionsEl = document.getElementById(`instructions-${gameName}`);
    if (instructionsEl) {
        instructionsEl.classList.remove('hidden');
        // Auto-open accordion when switching games
        if (!accordionOpen) {
            accordionBtn.click();
        }
    }
}

let currentGame = '<?php echo $selectedGame; ?>';
let gameScore = 0;
let gameTime = 0;
let gameTimer = null;

function updateScore(points) {
    gameScore += points;
    document.getElementById('game-score').textContent = gameScore;
}

function startTimer() {
    gameTime = 0;
    clearInterval(gameTimer);
    gameTimer = setInterval(() => {
        gameTime++;
        const mins = Math.floor(gameTime / 60);
        const secs = gameTime % 60;
        document.getElementById('game-time').textContent = 
            `${mins}:${secs.toString().padStart(2, '0')}`;
    }, 1000);
}

function stopTimer() {
    clearInterval(gameTimer);
}

// Load game based on selection
function loadGame(gameName) {
    currentGame = gameName;
    gameScore = 0;
    document.getElementById('game-score').textContent = '0';
    document.getElementById('game-time').textContent = '0:00';
    updateInstructions(gameName);
    const container = document.getElementById('game-container');
    container.innerHTML = '';
    
    switch(gameName) {
        case 'memory':
            loadMemoryGame();
            break;
        case 'pattern':
            loadPatternGame();
            break;
        case 'zen':
            loadZenGame();
            break;
    }
}

// Memory Match Game
function loadMemoryGame() {
    startTimer();
    const colors = ['#6366f1', '#f59e0b', '#10b981', '#ef4444', '#8b5cf6', '#ec4899'];
    const cards = [...colors, ...colors].sort(() => Math.random() - 0.5);
    let flipped = [];
    let matched = 0;
    
    const container = document.getElementById('game-container');
    container.innerHTML = '';
    
    const grid = document.createElement('div');
    grid.className = 'grid grid-cols-4 gap-4 p-8 w-full max-w-md';
    
    cards.forEach((color, idx) => {
        const card = document.createElement('button');
        card.className = 'aspect-square rounded-2xl bg-white/10 border-2 border-white/20 transition-all cursor-pointer font-black text-2xl hover:bg-white/20';
        card.dataset.color = color;
        card.dataset.id = idx;
        card.textContent = '?';
        
        card.addEventListener('click', () => {
            if(flipped.length < 2 && !flipped.includes(idx) && card.style.backgroundColor !== color) {
                card.style.backgroundColor = color;
                card.style.color = '#fff';
                card.textContent = '✓';
                flipped.push(idx);
                
                if(flipped.length === 2) {
                    const [id1, id2] = flipped;
                    if(cards[id1] === cards[id2]) {
                        matched++;
                        updateScore(10);
                        flipped = [];
                        if(matched === colors.length) {
                            stopTimer();
                            showToast('🎉 Perfect! All pairs matched!', 'success');
                        }
                    } else {
                        setTimeout(() => {
                            document.querySelectorAll('[data-id="' + id1 + '"]')[0].style.backgroundColor = '';
                            document.querySelectorAll('[data-id="' + id2 + '"]')[0].style.backgroundColor = '';
                            document.querySelectorAll('[data-id="' + id1 + '"]')[0].textContent = '?';
                            document.querySelectorAll('[data-id="' + id2 + '"]')[0].textContent = '?';
                            flipped = [];
                        }, 800);
                    }
                }
            }
        });
        grid.appendChild(card);
    });
    
    container.appendChild(grid);
}

// Pattern Follow Game
function loadPatternGame() {
    startTimer();
    const colors = ['#6366f1', '#f59e0b', '#10b981', '#ef4444'];
    let sequence = [];
    let playerSequence = [];
    let level = 1;
    
    const container = document.getElementById('game-container');
    container.innerHTML = `
        <div class="col gap-8 items-center">
            <div class="txt-3xl font-black text-primary">Level ${level}</div>
            <div class="grid grid-cols-2 gap-4">
                ${colors.map((c, i) => `<button id="btn-${i}" class="size-24 rounded-2xl transition-all cursor-pointer shadow-lg" style="background-color: ${c}30; border: 3px solid ${c};" onmousedown="this.style.transform='scale(0.95)'" onmouseup="this.style.transform='scale(1)'" onclick="playerClick(${i})"></button>`).join('')}
            </div>
            <div class="text-center">
                <div class="text-xs text-white/50 uppercase font-bold">Watch the pattern</div>
                <div id="pattern-status" class="txt-sm font-bold text-primary mt-2">Ready...</div>
            </div>
        </div>
    `;
    
    window.playerClick = function(idx) {
        playerSequence.push(idx);
        const btn = document.getElementById(`btn-${idx}`);
        btn.style.opacity = '0.5';
        setTimeout(() => btn.style.opacity = '1', 200);
        
        if(playerSequence[playerSequence.length - 1] !== sequence[playerSequence.length - 1]) {
            stopTimer();
            showToast(`❌ Game Over! Reached Level ${level}`, 'info');
            return;
        }
        
        if(playerSequence.length === sequence.length) {
            updateScore(10 * level);
            level++;
            sequence = [];
            playerSequence = [];
            document.querySelector('.txt-3xl').textContent = `Level ${level}`;
            setTimeout(playSequence, 800);
        }
    };
    
    function playSequence() {
        sequence.push(Math.floor(Math.random() * 4));
        const status = document.getElementById('pattern-status');
        status.textContent = 'Showing pattern...';
        playerSequence = [];
        
        let delay = 500;
        sequence.forEach((color, idx) => {
            setTimeout(() => {
                const btn = document.getElementById(`btn-${color}`);
                btn.style.opacity = '0.8';
                setTimeout(() => btn.style.opacity = '1', 300);
            }, delay);
            delay += 600;
        });
        
        setTimeout(() => {
            status.textContent = 'Your turn!';
        }, delay);
    }
    
    playSequence();
}

// Zen Puzzle Game
function loadZenGame() {
    startTimer();
    const container = document.getElementById('game-container');
    container.innerHTML = `
        <div class="col gap-8 items-center">
            <div class="text-center col gap-4">
                <h3 class="txt-2xl font-black text-primary">Arrange the Tiles</h3>
                <p class="txt-sm text-white/60">Drag tiles to form a complete grid</p>
            </div>
            <div class="grid grid-cols-3 gap-2 p-8 bg-white/10 rounded-2xl" id="puzzle-grid">
                <!-- Tiles will be placed here -->
            </div>
            <div class="row gap-4">
                <button onclick="shufflePuzzle()" class="px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 transition-all">Shuffle</button>
                <button onclick="resetPuzzle()" class="px-6 py-3 rounded-xl bg-primary text-background-dark font-bold">Reset</button>
            </div>
        </div>
    `;
    
    const colors = ['#6366f1', '#f59e0b', '#10b981', '#ef4444', '#8b5cf6', '#ec4899', '#06b6d4', '#f97316', '#14b8a6'];
    const grid = document.getElementById('puzzle-grid');
    
    colors.forEach((c, i) => {
        const tile = document.createElement('div');
        tile.className = 'size-20 rounded-lg cursor-grab active:cursor-grabbing transition-all';
        tile.style.backgroundColor = c;
        tile.draggable = true;
        tile.id = `tile-${i}`;
        
        tile.addEventListener('dragstart', (e) => e.dataTransfer.setData('id', i));
        tile.addEventListener('dragover', (e) => e.preventDefault());
        tile.addEventListener('drop', (e) => {
            e.preventDefault();
            updateScore(5);
        });
        
        grid.appendChild(tile);
    });
    
    window.shufflePuzzle = function() {
        const tiles = Array.from(document.querySelectorAll('#puzzle-grid div'));
        tiles.sort(() => Math.random() - 0.5);
        grid.innerHTML = '';
        tiles.forEach(t => grid.appendChild(t));
    };
    
    window.resetPuzzle = function() {
        loadZenGame();
    };
}

// Load initial game
loadGame(currentGame);
updateInstructions(currentGame);

// Handle game selection clicks
document.addEventListener('click', (e) => {
    if(e.target.closest('a[href*="?game="]')) {
        const href = e.target.closest('a').href;
        const game = new URL(href).searchParams.get('game');
        e.preventDefault();
        loadGame(game);
    }
});
</script>

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