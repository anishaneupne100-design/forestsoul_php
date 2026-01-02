<?php
// admin/event_details.php
$title = "Event Intelligence - ForestSoul Admin";
require_once 'head.php';

$eventId = $_GET['id'] ?? null;
if (!$eventId) {
    header('Location: events.php');
    exit;
}

// HANDLE ACTIONS
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $regId = $_POST['reg_id'] ?? null;
    $adminId = $_SESSION['user_id'];

    if ($action === 'approve_reg' && $regId) {
        approve_registration($adminId, $regId);
    }
    
    if ($action === 'reject_reg' && $regId) {
        $remarks = $_POST['reject_remarks'] ?? 'Incomplete information';
        // Need to implement reject_registration
        reject_registration($adminId, $regId, $remarks);
    }

    if ($action === 'delete_event') {
        // Simple delete logic
        $pdo = get_db_connection();
        $pdo->prepare("DELETE FROM events WHERE id = ?")->execute([$eventId]);
        header('Location: events.php');
        exit;
    }
}

require_once 'navbar.php';

$res = get_event_with_registrations($eventId);
$event = $res['data'] ?? null;

if (!$event) {
    echo "<div class='p-20 text-center text-white/40'>Event not found.</div>";
    exit;
}
?>

<main class="px-6 pb-20 max-w-7xl mx-auto">
    <!-- Header -->
    <div class="py-10 flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
        <div class="col gap-4">
            <a href="events.php" class="row gap-2 items-center text-white/30 hover:text-admin-primary transition-colors text-[10px] font-black uppercase tracking-widest">
                <i class="fa-solid fa-arrow-left"></i> Back to Arsenal
            </a>
            <h1 class="text-4xl font-black text-white"><?php echo htmlspecialchars($event['title']); ?></h1>
            <div class="row gap-4 items-center">
                <span class="row gap-2 items-center text-white/40 text-xs font-medium">
                    <i class="fa-solid fa-location-dot text-admin-primary"></i> <?php echo htmlspecialchars($event['location']); ?>
                </span>
                <span class="row gap-2 items-center text-white/40 text-xs font-medium">
                    <i class="fa-solid fa-calendar text-admin-primary"></i> <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                </span>
            </div>
        </div>
        <div class="row gap-3">
             <button class="btn-ghost h-12 px-6 border border-white/10 hover:border-admin-primary">
                <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="" method="POST" onsubmit="return confirm('ABORT EVENT? This is permanent.')">
                <input type="hidden" name="action" value="delete_event">
                <button class="btn-ghost h-12 px-6 border border-red-500/20 text-red-500 hover:bg-red-500/10">
                    <i class="fa-solid fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <!-- Applicant List -->
        <div class="lg:col-span-8 col gap-6">
            <div class="admin-card p-0 overflow-hidden">
                <div class="p-8 border-b border-white/5 between">
                    <h3 class="text-xl font-black uppercase tracking-tight text-white/80 italic">Manifest / Participants</h3>
                    <span class="px-4 py-1 rounded-full bg-admin-bg text-[10px] font-black text-admin-primary border border-white/10"><?php echo count($event['registrations']); ?> Total</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-admin-bg/50 text-[10px] font-black uppercase tracking-widest text-white/30">
                                <th class="px-8 py-4">User</th>
                                <th class="px-8 py-4">Status</th>
                                <th class="px-8 py-4">Joined At</th>
                                <th class="px-8 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <?php if (empty($event['registrations'])): ?>
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center text-white/20 italic">No one has stepped forward yet.</td>
                                </tr>
                            <?php else: foreach($event['registrations'] as $reg): ?>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="px-8 py-6">
                                        <div class="row gap-4 items-center">
                                            <div class="size-10 rounded-xl bg-white/5 center text-white/40 font-black uppercase"><?php echo $reg['name'][0]; ?></div>
                                            <div class="col">
                                                <p class="text-sm font-bold text-white group-hover:text-admin-primary transition-colors"><?php echo htmlspecialchars($reg['name'] . ' ' . $reg['lastname']); ?></p>
                                                <p class="text-[10px] text-white/30 font-medium"><?php echo htmlspecialchars($reg['email']); ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <?php if ($reg['is_approved']): ?>
                                            <span class="px-3 py-1 rounded-full bg-green-500/10 text-green-500 text-[9px] font-black uppercase tracking-widest">Confirmed</span>
                                        <?php else: ?>
                                            <span class="px-3 py-1 rounded-full bg-amber-500/10 text-amber-500 text-[9px] font-black uppercase tracking-widest">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-8 py-6 text-xs text-white/40 font-medium">
                                        <?php echo htmlspecialchars($reg['plan_to_join_at'] ?? 'Site'); ?>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="flex justify-end gap-2">
                                            <?php if (!$reg['is_approved']): ?>
                                                <form action="" method="POST">
                                                    <input type="hidden" name="action" value="approve_reg">
                                                    <input type="hidden" name="reg_id" value="<?php echo $reg['id']; ?>">
                                                    <button class="size-9 rounded-lg bg-green-500/10 text-green-500 center hover:bg-green-500 transition-all hover:text-white" title="Approve">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                                <button onclick="rejectRegistration(<?php echo $reg['id']; ?>)" class="size-9 rounded-lg bg-red-500/10 text-red-500 center hover:bg-red-500 transition-all hover:text-white" title="Reject">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            <?php endif; ?>
                                            <button class="size-9 rounded-lg border border-white/5 text-white/20 center hover:text-white">
                                                <i class="fa-solid fa-comment-dots text-xs"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Event Metrics -->
        <aside class="lg:col-span-4 col gap-8">
            <div class="admin-card p-8 col gap-6">
                <h3 class="text-lg font-black uppercase tracking-tight italic">Mission Intelligence</h3>
                
                <div class="col gap-6">
                    <div class="between pb-4 border-b border-white/5">
                        <span class="text-xs text-white/40 font-black uppercase tracking-widest">System Load</span>
                        <span class="text-sm font-black text-admin-primary">Nominal</span>
                    </div>
                    
                    <div class="col gap-2">
                        <span class="text-[10px] font-black uppercase tracking-widest text-white/30">Engagement Intensity</span>
                        <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                            <div class="h-full bg-admin-primary w-[75%] rounded-full shadow-[0_0_15px_rgba(99,102,241,0.6)]"></div>
                        </div>
                    </div>

                    <div class="bg-admin-bg p-6 rounded-2xl border border-white/5">
                        <h4 class="text-[10px] font-black uppercase tracking-widest text-white/40 mb-4 italic">Registry Metadata</h4>
                        <div class="col gap-3">
                            <div class="between">
                                <span class="text-xs text-white/60">Approvals Required</span>
                                <span class="text-xs font-bold"><?php echo $event['needs_approval'] ? 'YES' : 'NO'; ?></span>
                            </div>
                            <div class="between">
                                <span class="text-xs text-white/60">Created By</span>
                                <span class="text-xs font-bold text-admin-primary">Admin_01</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

<!-- Reject Modal -->
<div id="reject-modal" class="fixed inset-0 z-[2000] hidden items-center justify-center bg-black/80 backdrop-blur-md p-4">
    <div class="admin-card w-full max-w-md p-10 shadow-2xl">
        <h2 class="text-xl font-black italic mb-6">Execution Remarks</h2>
        <form action="" method="POST" class="col gap-6">
            <input type="hidden" name="action" value="reject_reg">
            <input type="hidden" name="reg_id" id="reject-reg-id">
            <label class="col gap-2">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/40 pl-1">Reason for Rejection</span>
                <textarea name="reject_remarks" class="input-admin min-h-[120px]" placeholder="State why the applicant was denied..."></textarea>
            </label>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" onclick="closeModal('reject-modal')" class="btn-ghost h-12 border border-white/10">Abort</button>
                <button type="submit" class="btn-admin-primary h-12 bg-red-500 hover:bg-red-600 shadow-red-500/20">Confirm Denial</button>
            </div>
        </form>
    </div>
</div>

<script>
function rejectRegistration(id) {
    $('#reject-reg-id').val(id);
    openModal('reject-modal');
}
function openModal(id) {
    $('#' + id).removeClass('hidden').addClass('flex');
}
function closeModal(id) {
    $('#' + id).addClass('hidden').removeClass('flex');
}
</script>
</body>
</html>
