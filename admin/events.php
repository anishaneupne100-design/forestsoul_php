<?php
// admin/events.php
$title = "Manage Events - ForestSoul Admin";
require_once 'head.php';
require_once 'navbar.php';

$events = get_admin_events()['data'] ?? [];
?>

<main class="px-6 pb-20 max-w-7xl mx-auto">
    <div class="py-10 flex justify-between items-end">
        <div class="col gap-2">
            <h1 class="text-4xl font-black tracking-tight text-white italic">Events Forge</h1>
            <p class="text-white/40 font-medium uppercase tracking-widest text-[10px]">Deploy and monitor community gatherings</p>
        </div>
        <button onclick="openModal('create-event-modal')" class="btn-admin-primary px-8 h-12 shadow-xl shadow-admin-primary/20">
            <i class="fa-solid fa-plus text-xs"></i>
            <span>Orchestrate New Event</span>
        </button>
    </div>

    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12 animate-fade-in">
        <?php if (empty($events)): ?>
            <div class="col-span-full py-20 admin-card center border-dashed">
                <p class="text-white/20 italic">No events have been orchestrated yet.</p>
            </div>
        <?php else: foreach($events as $event): ?>
            <div class="admin-card overflow-hidden group cursor-pointer" onclick="location.href='event_details.php?id=<?php echo $event['id']; ?>'">
                <!-- Preview / Header -->
                <div class="h-48 bg-admin-bg relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-admin-surface to-transparent z-10"></div>
                    <div class="absolute top-4 right-4 z-20 flex flex-col gap-2 items-end">
                        <span class="px-3 py-1 bg-admin-bg/80 backdrop-blur rounded-full text-[10px] font-black uppercase tracking-widest text-admin-primary border border-admin-primary/20">
                            <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                        </span>
                    </div>
                    <?php if ($event['needs_approval']): ?>
                        <div class="absolute bottom-4 left-6 z-20 row gap-2 items-center text-amber-500">
                            <i class="fa-solid fa-lock text-[10px]"></i>
                            <span class="text-[10px] font-black uppercase tracking-widest">Requires Approval</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Info -->
                <div class="p-8">
                    <h3 class="text-xl font-bold mb-2 group-hover:text-admin-primary transition-colors"><?php echo htmlspecialchars($event['title']); ?></h3>
                    <p class="text-sm text-white/40 line-clamp-2 mb-6 font-medium"><?php echo htmlspecialchars($event['description']); ?></p>

                    <div class="between pt-6 border-t border-white/5">
                        <div class="row gap-4">
                            <div class="col gap-1">
                                <span class="text-lg font-black leading-none"><?php echo $event['total_applicants']; ?></span>
                                <span class="text-[8px] font-black uppercase tracking-tighter text-white/30">Applicants</span>
                            </div>
                            <?php if ($event['pending_applicants'] > 0): ?>
                            <div class="col gap-1">
                                <span class="text-lg font-black leading-none text-amber-500"><?php echo $event['pending_applicants']; ?></span>
                                <span class="text-[8px] font-black uppercase tracking-tighter text-amber-500">Pending</span>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="size-10 rounded-xl bg-white/5 center group-hover:bg-admin-primary group-hover:text-white transition-all">
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
</main>

<!-- Create Event Modal (Simplified for now) -->
<div id="create-event-modal" class="fixed inset-0 z-[2000] hidden items-center justify-center bg-black/80 backdrop-blur-md p-4">
    <div class="admin-card w-full max-w-xl p-10 shadow-2xl scale-95 transition-all">
        <div class="between mb-8">
            <h2 class="text-2xl font-black italic">Create New Event</h2>
            <button onclick="closeModal('create-event-modal')" class="text-white/30 hover:text-white transition-colors">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <form action="" method="POST" class="col gap-6">
            <label class="col gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Event Title</span>
                <input type="text" name="title" class="input-admin text-lg font-bold" placeholder="Atmospheric Yoga Session..." required>
            </label>
            <div class="grid grid-cols-2 gap-4">
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Start Date</span>
                    <input type="date" name="start_date" class="input-admin" required>
                </label>
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Registration Deadline</span>
                    <input type="date" name="deadline" class="input-admin">
                </label>
            </div>
            <label class="col gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40 ml-1">Location / Link</span>
                <input type="text" name="location" class="input-admin" placeholder="Forest Soul Sanctuary / Zoom Link">
            </label>
            <label class="row gap-3 items-center p-4 bg-white/2 rounded-xl border border-white/5 cursor-pointer">
                <input type="checkbox" name="needs_approval" class="size-4 accent-admin-primary">
                <span class="text-sm font-bold text-white/80">Require Admin approval for registrations</span>
            </label>
            <button type="submit" class="btn-admin-primary w-full h-14 mt-4 uppercase tracking-widest font-black">Forge Event</button>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    $('#' + id).removeClass('hidden').addClass('flex');
    $('body').addClass('overflow-hidden');
}
function closeModal(id) {
    $('#' + id).addClass('hidden').removeClass('flex');
    $('body').removeClass('overflow-hidden');
}
</script>
</body>
</html>
