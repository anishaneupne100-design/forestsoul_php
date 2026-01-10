<?php
// booking session/index.php
require_once '../backend/init.php';
require_login();

// Handle AJAX Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = Auth::id();
    if (!$userId) {
        echo json_encode(['success' => false, 'error' => 'Your session has expired. Please log in again.']);
        exit;
    }
    
    $res = book_therapy_session($userId, $_POST['expert_id'] ?? null, $_POST);
    echo json_encode($res);
    exit;
}

$title = "Book a Session - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow">
    <!-- Hero -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB_s5tMi90t9HCzU2nEN68VWxOL7zEklusUKtwdqFCuhgUgyt-yOBIyaRid6-fFMOBOqzQZrOQWleF6UfrgSBEI8lgBUhUo7lOmttnOU2-z2HScr4mTHL2UKfuho7sGG7O4NHUsLanLOJAAmm_kzLpBYuqqDos05YHLi7APMe7C7xiRx0_P51NTWGot0KuPNqPnIyCUWgKL-E-VzHxcrsQaTCItVfni4mXlvheoGYEN5asY7PdsF-rzCUipzqR4_xiw1wpbDhL8XfA");'>
                <div class="col gap-md text-center max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Take the First Step</h1>
                    <p class="hero-text @[480px]:text-lg">Professional, compassionate therapy tailored to your unique journey. Start your path to healing today.</p>
                </div>
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('therapist-selection')">
                    <span class="truncate">Select Your Specialist</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Booking Form System -->
    <section class="section px-4 pb-20" id="therapist-selection">
        <div class="text-center mb-12">
            <h2 class="txt-3xl txt">Book Your Therapy Session</h2>
            <p class="txt-2 mt-2">Follow these simple steps to schedule your appointment.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Step 1 -->
            <div class="card bg-surface-dark border-white/5 flex flex-col gap-6">
                <div class="row gap-4 items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-background-dark center font-bold">1</div>
                    <h3 class="txt-xl font-bold">Choose Your Path</h3>
                </div>
                
                <div class="col gap-2">
                    <label class="txt-xs font-bold uppercase tracking-wider txt-2">Therapy Type</label>
                    <select class="input h-12 bg-background-dark border-white/10">
                        <option>Individual</option>
                        <option>Group</option>
                        <option>Couples</option>
                    </select>
                </div>

                <div class="col gap-3">
                    <label class="txt-xs font-bold uppercase tracking-wider txt-2">Select a Therapist</label>
                    <div class="col gap-2">
                        <?php 
                        $expertsRes = get_active_experts();
                        $experts = $expertsRes['data'] ?? [];
                        if (empty($experts)): 
                        ?>
                            <div class="p-4 rounded-xl border border-white/10 bg-white/5 text-center">
                                <p class="txt-sm txt-2">No experts available right now.</p>
                            </div>
                        <?php else: foreach($experts as $index => $ex): ?>
                            <label class="row gap-3 p-3 rounded-xl border border-white/10 cursor-pointer hover:bg-white/5 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                                <input type="radio" name="therapist" value="<?php echo $ex['id']; ?>" data-name="<?php echo htmlspecialchars($ex['name'] . ' ' . $ex['lastname'][0] . '.'); ?>" class="accent-primary therapist-radio" <?php echo $index === 0 ? 'checked' : ''; ?>>
                                <div class="col">
                                    <span class="font-medium"><?php echo htmlspecialchars($ex['name'] . ' ' . $ex['lastname']); ?></span>
                                    <span class="text-[10px] txt-2 uppercase"><?php echo htmlspecialchars($ex['specialization']); ?></span>
                                </div>
                            </label>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="card bg-surface-dark border-white/5 flex flex-col gap-6">
                <div class="row gap-4 items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-background-dark center font-bold">2</div>
                    <h3 class="txt-xl font-bold">Pick a Time</h3>
                </div>
                
                <form id="booking-details-form" class="col gap-6">
                    <div class="col gap-2">
                        <label class="txt-xs font-bold uppercase tracking-wider txt-2">Select Date</label>
                        <input type="date" name="date" id="booking-date" class="input h-12 bg-background-dark border-white/10" required min="<?php echo date('Y-m-d'); ?>">
                    </div>

                    <div class="col gap-2">
                        <label class="txt-xs font-bold uppercase tracking-wider txt-2">Select Time</label>
                        <input type="time" name="time" id="booking-time" class="input h-12 bg-background-dark border-white/10" required>
                    </div>

                    <div class="col gap-2">
                        <label class="txt-xs font-bold uppercase tracking-wider txt-2">Message to Specialist (Optional)</label>
                        <textarea name="remarks" id="booking-remarks" class="input p-4 bg-background-dark border-white/10 text-sm" rows="3" placeholder="Tell us what's on your mind..."></textarea>
                    </div>
                </form>
            </div>

            <!-- Step 3 -->
            <div class="card bg-surface-dark border-white/5 flex flex-col gap-6">
                <div class="row gap-4 items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-background-dark center font-bold">3</div>
                    <h3 class="txt-xl font-bold">Confirm Appointment</h3>
                </div>

                <div class="bg-background-dark p-4 rounded-xl border border-white/10 col gap-3">
                    <h4 class="font-bold border-b border-white/5 pb-2">Summary</h4>
                    <div class="col gap-2 txt-sm txt-2">
                        <div class="between"><span>Type:</span> <span class="txt font-bold" id="summary-type">Individual</span></div>
                        <div class="between"><span>Therapist:</span> <span class="txt font-bold" id="summary-therapist">Select one...</span></div>
                        <div class="between"><span>Date:</span> <span class="txt font-bold" id="summary-date">TBD</span></div>
                        <div class="between"><span>Time:</span> <span class="txt font-bold" id="summary-time">TBD</span></div>
                    </div>
                </div>

                <div class="p-5 bg-primary/5 rounded-[1.5rem] border border-primary/20 col gap-4 shadow-inner">
                    <div class="row gap-3 items-center">
                        <i class="fa-solid fa-clipboard-question text-primary"></i>
                        <p class="txt-xs font-bold text-white/50 uppercase tracking-widest">Expert Recommendation</p>
                    </div>
                    <p class="txt-xs txt-2 leading-relaxed italic">"Complete our self-discovery journey to help your therapist understand your unique needs before the first meeting."</p>
                    <a href="<?php echo url('questionnaire/'); ?>" class="btn-ghost h-10 rounded-xl text-[10px] font-black uppercase tracking-widest border border-primary/20 hover:bg-primary/10">Start Questionnaire</a>
                </div>

                <button class="btn-primary btn-lg mt-auto" onclick="confirmBooking()">
                    Confirm Request
                </button>
            </div>
        </div>
    </section>
</main>
<script>
    $(document).ready(function() {
        // Initial summary update
        updateSummary();

        // Listen for changes
        $('.therapist-radio, #booking-date, #booking-time').on('change input', function() {
            updateSummary();
        });

        function updateSummary() {
            const therapist = $('input[name="therapist"]:checked');
            const date = $('#booking-date').val();
            const time = $('#booking-time').val();

            if (therapist.length) {
                $('#summary-therapist').text(therapist.data('name'));
            }
            if (date) $('#summary-date').text(date);
            if (time) $('#summary-time').text(time);
        }

        window.confirmBooking = function() {
            const therapistId = $('input[name="therapist"]:checked').val();
            const date = $('#booking-date').val();
            const time = $('#booking-time').val();
            const remarks = $('#booking-remarks').val();

            if (!therapistId || !date || !time) {
                showToast('Please select a therapist, date, and time.', 'error');
                return;
            }

            const btn = $(event.currentTarget);
            btn.prop('disabled', true).text('Processing...');

            $.post('', {
                action: 'book_session',
                expert_id: therapistId,
                date: date,
                time: time,
                remarks: remarks
            }, function(res) {
                const data = JSON.parse(res);
                if (data.success) {
                    showToast('Journey started! Your request has been sent.', 'success');
                    setTimeout(() => {
                        gotoPage('<?php echo url('profile/my_bookings.php'); ?>');
                    }, 1500);
                } else {
                    showToast(data.error || 'Failed to book session.', 'error');
                    btn.prop('disabled', false).text('Confirm Request');
                }
            });
        }
    });
</script>

<?php put_footer(); ?>