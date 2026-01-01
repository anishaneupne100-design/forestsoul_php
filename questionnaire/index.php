<?php
// questionnaire/index.php
// Protect this route - require authentication
require_once __DIR__ . '/../backend/middleware/auth.php';

$title = "Self-Assessment - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

$user = Auth::user();
?>

<main class="flex-grow">
    <div class="max-w-4xl mx-auto py-10 px-4">
        <div class="col gap-lg mb-10">
            <div class="col gap-sm">
                <div class="between">
                    <p class="txt-sm font-bold uppercase tracking-widest text-primary">Step 1 of 4: Well-being</p>
                    <p class="txt-xs txt-2">Confidential</p>
                </div>
                <div class="h-1.5 w-full bg-white/10 rounded-full overflow-hidden">
                    <div class="h-full bg-primary" style="width: 25%"></div>
                </div>
            </div>
            
            <div class="col gap-2">
                <h1 class="txt-3xl font-bold">A Moment for You</h1>
                <p class="txt-2">This assessment helps us tailor your therapy experience. Please answer openly and honestly.</p>
            </div>
        </div>

        <form class="col gap-10">
            <!-- Section 1 -->
            <div class="card bg-surface-dark border-white/5 p-8">
                <h2 class="txt-xl font-bold mb-6 border-b border-white/5 pb-4">General Well-being</h2>
                
                <div class="col gap-8">
                    <div class="col gap-3">
                        <label class="txt-md font-medium">How would you rate your overall life satisfaction this past week?</label>
                        <input type="range" min="1" max="10" value="7" class="w-full accent-primary">
                        <div class="between txt-xs txt-2">
                            <span>1 - Struggling</span>
                            <span>10 - Thriving</span>
                        </div>
                    </div>

                    <div class="col gap-3">
                        <label class="txt-md font-medium">How would you rate your sleep quality?</label>
                        <input type="range" min="1" max="10" value="5" class="w-full accent-primary">
                        <div class="between txt-xs txt-2">
                            <span>1 - Very Poor</span>
                            <span>10 - Excellent</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="card bg-surface-dark border-white/5 p-8">
                <h2 class="txt-xl font-bold mb-6 border-b border-white/5 pb-4">Emotional State</h2>
                <p class="txt-sm txt-2 mb-4">Which emotions have you felt most strongly this week? (Select all that apply)</p>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <?php 
                    $emotions = ['Anxious', 'Sad', 'Happy', 'Angry', 'Overwhelmed', 'Hopeful', 'Numb', 'Content'];
                    foreach($emotions as $emotion): 
                    ?>
                        <label class="row gap-3 p-3 rounded-xl border border-white/5 cursor-pointer hover:bg-white/5 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                            <input type="checkbox" class="accent-primary">
                            <span class="txt-sm"><?php echo $emotion; ?></span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Section 3 -->
            <div class="card bg-surface-dark border-white/5 p-8">
                <h2 class="txt-xl font-bold mb-6 border-b border-white/5 pb-4">Goals</h2>
                <div class="col gap-3">
                    <label class="txt-md font-medium">What do you hope to achieve from therapy?</label>
                    <textarea class="input min-h-[120px]" placeholder="Feel free to write about your goals or what you'd like to change..."></textarea>
                </div>
            </div>

            <div class="between pt-6">
                <button type="button" class="btn-ghost px-8" onclick="history.back()">Back</button>
                <button type="button" class="btn-primary px-8 gap-2" onclick="showToast('Progress saved. Moving to Step 2...', 'success')">
                    <span>Next Step</span>
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </button>
            </div>
        </form>

        <div class="center mt-12 mb-20 gap-2 txt-xs txt-2 italic">
            <span class="material-symbols-outlined text-sm">lock</span>
            <span>Your data is encrypted and only visible to you and your assigned therapist.</span>
        </div>
    </div>
</main>

<?php put_footer(); ?>