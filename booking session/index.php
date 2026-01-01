<?php
// booking session/index.php
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
                <button class="btn-primary btn-lg mt-6" onclick="scrollToElement('booking-form')">
                    <span class="truncate">Select Your Slot</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Booking Form System -->
    <section class="section px-4 pb-20" id="booking-form">
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
                        <label class="row gap-3 p-3 rounded-xl border border-white/10 cursor-pointer hover:bg-white/5 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                            <input type="radio" name="therapist" class="accent-primary" checked>
                            <span class="font-medium">Dr. Anya Sharma</span>
                        </label>
                        <label class="row gap-3 p-3 rounded-xl border border-white/10 cursor-pointer hover:bg-white/5 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                            <input type="radio" name="therapist" class="accent-primary">
                            <span class="font-medium">David Chen</span>
                        </label>
                        <label class="row gap-3 p-3 rounded-xl border border-white/10 cursor-pointer hover:bg-white/5 transition-colors has-[:checked]:border-primary has-[:checked]:bg-primary/5">
                            <input type="radio" name="therapist" class="accent-primary">
                            <span class="font-medium">Maria Garcia</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="card bg-surface-dark border-white/5 flex flex-col gap-6">
                <div class="row gap-4 items-center">
                    <div class="w-10 h-10 rounded-full bg-primary text-background-dark center font-bold">2</div>
                    <h3 class="txt-xl font-bold">Pick a Time</h3>
                </div>
                
                <!-- Simple Calendar Placeholder -->
                <div class="bg-background-dark p-4 rounded-xl border border-white/10">
                    <div class="between mb-4">
                        <span class="material-symbols-outlined cursor-pointer txt-2">chevron_left</span>
                        <span class="font-bold">January 2026</span>
                        <span class="material-symbols-outlined cursor-pointer txt-2">chevron_right</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center text-[10px] txt-2 mb-2 font-bold uppercase tracking-widest">
                        <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center">
                        <?php for($i=1; $i<=31; $i++): ?>
                            <div class="p-2 text-sm rounded-lg cursor-pointer hover:bg-primary/20 <?php echo $i == 5 ? 'bg-primary text-background-dark font-bold' : ''; ?>">
                                <?php echo $i; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="col gap-2">
                    <label class="txt-xs font-bold uppercase tracking-wider txt-2">Available Slots (Jan 5)</label>
                    <div class="grid grid-cols-2 gap-2">
                        <button class="btn-ghost border border-white/10 h-10 txt-sm hover:border-primary">09:00 AM</button>
                        <button class="btn-primary h-10 txt-sm">11:30 AM</button>
                        <button class="btn-ghost border border-white/10 h-10 txt-sm hover:border-primary">02:00 PM</button>
                        <button class="btn-ghost border border-white/10 h-10 txt-sm hover:border-primary">04:30 PM</button>
                    </div>
                </div>
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
                        <div class="between"><span>Type:</span> <span class="txt font-bold">Individual</span></div>
                        <div class="between"><span>Therapist:</span> <span class="txt font-bold">Dr. Anya S.</span></div>
                        <div class="between"><span>Date:</span> <span class="txt font-bold">Jan 5, 2026</span></div>
                        <div class="between"><span>Time:</span> <span class="txt font-bold">11:30 AM</span></div>
                    </div>
                </div>

                <div class="p-4 bg-primary/5 rounded-xl border border-primary/10 row gap-3 items-start">
                    <span class="material-symbols-outlined text-primary text-sm">assignment</span>
                    <p class="txt-xs txt-2 leading-tight italic">Before your first session, please complete our self-questionnaire to help us prepare.</p>
                </div>

                <button class="btn-primary btn-lg mt-auto" onclick="showToast('Your session has been requested! Redirecting to payment...', 'success')">
                    Confirm & Pay
                </button>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>