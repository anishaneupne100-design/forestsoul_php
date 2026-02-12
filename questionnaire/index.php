<?php
// questionnaire/index.php
require_once __DIR__ . '/../backend/init.php';
require_login();

// Handle AJAX Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = Auth::id();
    if (!$userId) {
        echo json_encode(['success' => false, 'error' => 'Session expired or user record missing. Please log in again.']);
        exit;
    }
    
    $res = submit_questionnaire($userId, json_encode($_POST));
    echo json_encode($res);
    exit;
}

$title = "Mental Well-being Assessment - ForestSoul";
require_once __DIR__ . '/../head.php';
require_once __DIR__ . '/../components/navbar.php';

$user = Auth::user();
?>

<style>
    .q-step { display: none; }
    .q-step.active { display: flex; animation: slideIn 0.5s cubic-bezier(0.23, 1, 0.32, 1); }
    
    @keyframes slideIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .glass-option {
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.05);
        transition: all 0.3s ease;
    }
    .glass-option:hover {
        background: rgba(255, 255, 255, 0.05);
        border-color: var(--color-primary);
        transform: scale(1.02);
    }
    .glass-option.selected {
        background: rgba(var(--color-primary-rgb), 0.1);
        border-color: var(--color-primary);
        box-shadow: 0 0 20px rgba(var(--color-primary-rgb), 0.1);
    }

    .infographic-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        background: linear-gradient(135deg, rgba(var(--color-primary-rgb), 0.2) 0%, transparent 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 24px;
        font-size: 32px;
        color: var(--color-primary);
        box-shadow: 0 10px 20px -5px rgba(0,0,0,0.3);
    }

    input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        height: 24px;
        width: 24px;
        border-radius: 50%;
        background: var(--color-primary);
        cursor: pointer;
        box-shadow: 0 0 10px var(--color-primary);
        margin-top: -8px;
    }
    input[type="range"]::-webkit-slider-runnable-track {
        width: 100%;
        height: 6px;
        background: rgba(255,255,255,0.05);
        border-radius: 3px;
    }
</style>

<span id="primary-color-rgb" class="hidden">var(--color-primary)</span>

<main class="flex-grow py-16 px-4 bg-gradient-to-b from-background-dark to-admin-bg/50 min-h-screen">
    <div class="max-w-4xl mx-auto">
        
        <!-- Progress Header -->
        <div class="col gap-6 mb-16 px-4">
            <div class="row items-center gap-4">
                <div class="size-14 rounded-2xl bg-primary center shadow-glow shadow-primary/20">
                    <i class="fa-solid fa-puzzle-piece text-background-dark text-xl"></i>
                </div>
                <div class="col">
                    <h1 class="txt-3xl font-black text-white italic">Self-Discovery Journey</h1>
                    <p class="txt-2 text-xs font-bold uppercase tracking-widest opacity-50">Confidential Mental Well-being Mapping</p>
                </div>
            </div>
            
            <div class="col gap-3">
                <div class="between txt-[9px] font-black uppercase tracking-[0.2em] text-white/30">
                    <span id="step-count">Phase 1 / 4</span>
                    <span id="step-label">Emotional Foundation</span>
                </div>
                <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                    <div id="progress-bar" class="h-full bg-primary transition-all duration-700 shadow-[0_0_15px_rgba(var(--color-primary-rgb),0.4)]" style="width: 25%"></div>
                </div>
            </div>
        </div>

        <form id="questionnaire-form" class="col gap-10">
            
            <!-- STEP 1: Emotional Baseline -->
            <div class="q-step active col gap-10" data-step="1">
                <div class="card bg-surface-dark border-white/5 p-12 rounded-[3rem] shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-10 opacity-5 pointer-events-none">
                        <i class="fa-solid fa-brain text-[12rem]"></i>
                    </div>
                    
                    <div class="infographic-icon">
                        <i class="fa-solid fa-cloud-sun"></i>
                    </div>
                    
                    <h2 class="txt-2xl font-black mb-8 italic">Emotional Foundation</h2>
                    
                    <div class="col gap-12">
                        <div class="col gap-6">
                            <label class="txt-lg font-bold text-white/80">How light or heavy has your heart felt this past week?</label>
                            <div class="col gap-4">
                                <input type="range" name="mood_level" min="1" max="10" value="5" class="w-full">
                                <div class="between text-[10px] font-black uppercase tracking-widest text-white/30">
                                    <span class="row gap-2"><i class="fa-solid fa-cloud-rain text-primary"></i> Heavy / Struggling</span>
                                    <span class="row gap-2">Luminous / Content <i class="fa-solid fa-sun text-amber-500"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col gap-6">
                            <label class="txt-lg font-bold text-white/80">Current Energy Resonance</label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <label class="glass-option p-6 rounded-3xl cursor-pointer center flex-col gap-3 group">
                                    <input type="radio" name="energy" value="low" class="hidden">
                                    <i class="fa-solid fa-battery-quarter text-2xl group-hover:text-primary transition-colors"></i>
                                    <span class="text-xs font-bold uppercase">Depleted</span>
                                </label>
                                <label class="glass-option p-6 rounded-3xl cursor-pointer center flex-col gap-3 group">
                                    <input type="radio" name="energy" value="mid" class="hidden" checked>
                                    <i class="fa-solid fa-battery-half text-2xl group-hover:text-primary transition-colors"></i>
                                    <span class="text-xs font-bold uppercase">Stable</span>
                                </label>
                                <label class="glass-option p-6 rounded-3xl cursor-pointer center flex-col gap-3 group">
                                    <input type="radio" name="energy" value="high" class="hidden">
                                    <i class="fa-solid fa-battery-full text-2xl group-hover:text-primary transition-colors"></i>
                                    <span class="text-xs font-bold uppercase">Radiant</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 2: The Inner Echo -->
            <div class="q-step col gap-10" data-step="2">
                <div class="card bg-surface-dark border-white/5 p-12 rounded-[3rem] shadow-2xl relative overflow-hidden">
                    <div class="infographic-icon">
                        <i class="fa-solid fa-wind"></i>
                    </div>
                    
                    <h2 class="txt-2xl font-black mb-8 italic">The Inner Echo</h2>
                    <p class="txt-sm text-white/40 mb-8 font-medium">Select any patterns that have mirrored your thoughts lately.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php 
                        $patterns = [
                            ['icon' => 'fa-gear', 'label' => 'Endless Overthinking'],
                            ['icon' => 'fa-ghost', 'label' => 'Shadows of Anxiety'],
                            ['icon' => 'fa-link-slash', 'label' => 'Feeling Disconnected'],
                            ['icon' => 'fa-fire-burner', 'label' => 'Approaching Burnout'],
                            ['icon' => 'fa-shield-heart', 'label' => 'Defensive Guarding'],
                            ['icon' => 'fa-sparkles', 'label' => 'Moments of Clarity']
                        ];
                        foreach($patterns as $p):
                        ?>
                            <label class="glass-option p-5 rounded-3xl cursor-pointer row gap-4 items-center group">
                                <input type="checkbox" name="patterns[]" value="<?php echo $p['label']; ?>" class="hidden">
                                <div class="size-10 rounded-xl bg-white/5 center group-hover:bg-primary/20 transition-all">
                                    <i class="fa-solid <?php echo $p['icon']; ?> text-sm group-hover:text-primary"></i>
                                </div>
                                <span class="text-sm font-bold opacity-70 group-hover:opacity-100 transition-all"><?php echo $p['label']; ?></span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- STEP 3: Harmony Architecture -->
            <div class="q-step col gap-10" data-step="3">
                <div class="card bg-surface-dark border-white/5 p-12 rounded-[3rem] shadow-2xl relative overflow-hidden">
                    <div class="infographic-icon">
                        <i class="fa-solid fa-bed"></i>
                    </div>
                    
                    <h2 class="txt-2xl font-black mb-8 italic">Harmony Architecture</h2>

                    <div class="col gap-10">
                        <div class="col gap-4">
                            <label class="txt-lg font-bold text-white/80">Sleep Sanctity</label>
                            <p class="text-xs text-white/40 italic">How restorative is your rest?</p>
                            <select name="sleep_quality" class="input h-14 bg-white/2 border-white/10 rounded-2xl px-6">
                                <option value="chaotic">Chaotic / Fragmented</option>
                                <option value="short">Short but stable</option>
                                <option value="optimal" selected>Deep & Restorative</option>
                            </select>
                        </div>

                        <div class="col gap-4">
                            <label class="txt-lg font-bold text-white/80">Social Connection Frequency</label>
                            <div class="row gap-4 items-center">
                                <i class="fa-solid fa-users-slash opacity-20"></i>
                                <input type="range" name="social_meter" min="0" max="100" value="50" class="flex-1">
                                <i class="fa-solid fa-users text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- STEP 4: Path to Renewal -->
            <div class="q-step col gap-10" data-step="4">
                <div class="card bg-surface-dark border-white/5 p-12 rounded-[3rem] shadow-2xl relative overflow-hidden">
                    <div class="infographic-icon">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    
                    <h2 class="txt-2xl font-black mb-8 italic">Path to Renewal</h2>
                    
                    <div class="col gap-8">
                        <label class="col gap-4">
                            <span class="txt-lg font-bold text-white/80">Define your North Star</span>
                            <span class="text-xs text-white/30 italic">What does 'healing' look like for you in 3 months?</span>
                            <textarea name="goals" class="input min-h-[160px] p-8 text-lg font-medium bg-white/2 border-white/10 rounded-[2rem] resize-none" placeholder="Visualize your tranquility..."></textarea>
                        </label>
                    </div>
                </div>
            </div>

            <!-- NAVIGATION -->
            <div class="between px-4">
                <button type="button" id="prev-btn" class="btn-ghost px-10 h-14 rounded-2xl font-black uppercase text-[10px] tracking-widest opacity-0 pointer-events-none transition-all">
                    <i class="fa-solid fa-chevron-left mr-2"></i> Retrace Step
                </button>
                <button type="button" id="next-btn" class="btn-primary px-10 h-14 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-xl shadow-primary/20 group">
                    <span>Venture Forward</span>
                    <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>

        </form>

        <div class="center mt-20 gap-3 opacity-20">
            <i class="fa-solid fa-vial-circle-check"></i>
            <p class="text-[10px] font-bold uppercase tracking-widest">Endorsed by ForestSoul Wellness Matrix</p>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    let currentStep = 1;
    const totalSteps = 4;

    function updateUI() {
        // Steps visibility
        $('.q-step').removeClass('active');
        $(`.q-step[data-step="${currentStep}"]`).addClass('active');

        // Progress components
        const progress = (currentStep / totalSteps) * 100;
        $('#progress-bar').css('width', progress + '%');
        $('#step-count').text(`Phase ${currentStep} / ${totalSteps}`);
        
        const labels = {
            1: 'Emotional Foundation',
            2: 'The Inner Echo',
            3: 'Harmony Architecture',
            4: 'Path to Renewal'
        };
        $('#step-label').text(labels[currentStep]);

        // Nav buttons
        if (currentStep === 1) {
            $('#prev-btn').addClass('opacity-0 pointer-events-none');
        } else {
            $('#prev-btn').removeClass('opacity-0 pointer-events-none');
        }

        if (currentStep === totalSteps) {
            $('#next-btn span').text('Seal Assessment');
            $('#next-btn i').removeClass('fa-arrow-right').addClass('fa-certificate');
        } else {
            $('#next-btn span').text('Venture Forward');
            $('#next-btn i').removeClass('fa-certificate').addClass('fa-arrow-right');
        }
    }

    // Option selection visual feedback
    $('input[type="radio"], input[type="checkbox"]').on('change', function() {
        const name = $(this).attr('name');
        if ($(this).attr('type') === 'radio') {
            $(`input[name="${name}"]`).closest('.glass-option').removeClass('selected');
        }
        
        if ($(this).is(':checked')) {
            $(this).closest('.glass-option').addClass('selected');
        } else {
            $(this).closest('.glass-option').removeClass('selected');
        }
    });

    $('#next-btn').on('click', function() {
        if (currentStep < totalSteps) {
            currentStep++;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            // Final Submit
            const btn = $(this);
            const originalText = btn.html();
            btn.prop('disabled', true).html('<i class="fa-solid fa-circle-notch fa-spin"></i> Securing Map...');

            $.post('', $('#questionnaire-form').serialize(), function(res) {
                const data = JSON.parse(res);
                if (data.success) {
                    showToast('Your mental map has been secured.', 'success');
                    setTimeout(() => {
                        location.href = '<?php echo url('profile/my_bookings.php'); ?>';
                    }, 2000);
                } else {
                    showToast(data.error || 'Failed to save assessment.', 'error');
                    btn.prop('disabled', false).html(originalText);
                }
            });
        }
    });

    $('#prev-btn').on('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateUI();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });

    // Initialize labels for radios that are pre-checked
    $('input:checked').closest('.glass-option').addClass('selected');
});
</script>

<?php put_footer(); ?>