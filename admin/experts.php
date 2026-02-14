<?php
// admin/experts.php
require_once __DIR__ . '/../backend/init.php';

// Handle Actions (Before output)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'approve' && isset($_POST['app_id'])) {
        $res = approve_expert_application($_POST['app_id']);
    } elseif ($_POST['action'] === 'reject' && isset($_POST['app_id'])) {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("UPDATE expert_applications SET status = 'rejected' WHERE id = ?");
        $stmt->execute([$_POST['app_id']]);
        $res = ['success' => true];
    }
    
    if (isset($res['success']) && $res['success']) {
        header("Location: " . url('admin/experts.php?success=1'));
        exit;
    }
}

$title = "Expert Management - ForestSoul Admin";
require_once 'head.php';
require_once 'navbar.php';

$pdo = get_db_connection();
$pendingApps = get_pending_expert_applications(Auth::adminId())['data'] ?? [];
$activeExperts = $pdo->query("SELECT * FROM experts ORDER BY created_at DESC")->fetchAll();
?>

<main class="px-6 pb-20 max-w-7xl mx-auto">
    <div class="py-10">
        <h1 class="text-4xl font-black tracking-tight text-white mb-2">Expert Ecosystem</h1>
        <p class="text-white/40 font-medium">Vet and manage the guardians of ForestSoul.</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="admin-card p-8 col gap-1">
            <span class="text-4xl font-black text-admin-primary"><?php echo count($pendingApps); ?></span>
            <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Pending Applications</span>
        </div>
        <div class="admin-card p-8 col gap-1">
            <span class="text-4xl font-black text-white"><?php echo count($activeExperts); ?></span>
            <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Active Experts</span>
        </div>
    </div>

    <!-- Pending Applications Section -->
    <section class="mb-16">
        <h2 class="text-xl font-black uppercase tracking-tight mb-8 text-white/80 row gap-3 items-center">
            <span class="size-2 rounded-full bg-admin-primary animate-pulse"></span>
            Pending Reviews
        </h2>
        
        <div class="grid grid-cols-1 gap-4">
            <?php if (empty($pendingApps)): ?>
                <div class="admin-card p-12 center border-dashed">
                    <p class="text-white/20 italic">No applications awaiting review.</p>
                </div>
            <?php else: foreach($pendingApps as $app): ?>
                <div class="admin-card p-8 row gap-8 items-center flex-wrap">
                    <div class="size-20 rounded-2xl bg-white/5 border border-white/5 overflow-hidden">
                        <?php if ($app['profile_picture']): ?>
                            <img src="<?php echo url($app['profile_picture']); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full center text-white/10"><i class="fa-solid fa-user text-2xl"></i></div>
                        <?php endif; ?>
                    </div>
                    <div class="col flex-1 gap-1">
                        <h4 class="text-lg font-bold"><?php echo htmlspecialchars($app['name'] . ' ' . $app['lastname']); ?></h4>
                        <p class="text-xs text-admin-primary font-black uppercase tracking-tighter"><?php echo htmlspecialchars($app['specialization']); ?> &bull; <?php echo $app['experience_years']; ?> Years Exp</p>
                        <p class="text-xs text-white/40 mt-2 line-clamp-1 italic">"<?php echo htmlspecialchars($app['bio']); ?>"</p>
                    </div>
                    <div class="row gap-3">
                        <form method="POST" class="row gap-3">
                            <input type="hidden" name="app_id" value="<?php echo $app['id']; ?>">
                            <button type="submit" name="action" value="reject" class="size-11 rounded-xl border border-white/5 text-white/20 hover:text-red-500 hover:border-red-500/20 center transition-all">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <button type="submit" name="action" value="approve" class="h-11 px-6 rounded-xl bg-admin-primary text-white font-black text-xs uppercase tracking-widest shadow-lg shadow-admin-primary/20 hover:scale-[1.02] transition-all">
                                Approve Guardian
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </section>

    <!-- Active Experts Table -->
    <section>
        <h2 class="text-xl font-black uppercase tracking-tight mb-8 text-white/80">Active Guardians</h2>
        <div class="admin-card overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/2 text-[10px] font-black uppercase tracking-[0.2em] text-white/20">
                        <th class="p-6">Guardian</th>
                        <th class="p-6">Specialization</th>
                        <th class="p-6">Status</th>
                        <th class="p-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach($activeExperts as $ex): ?>
                        <tr class="hover:bg-white/2 transition-colors">
                            <td class="p-6 row gap-4 items-center">
                                <div class="size-10 rounded-lg bg-admin-bg center text-admin-primary font-black uppercase shadow-inner text-xs">
                                    <?php echo $ex['name'][0]; ?>
                                </div>
                                <div class="col">
                                    <span class="text-sm font-bold"><?php echo htmlspecialchars($ex['name'] . ' ' . $ex['lastname']); ?></span>
                                    <span class="text-[10px] text-white/30"><?php echo htmlspecialchars($ex['email']); ?></span>
                                </div>
                            </td>
                            <td class="p-6 text-sm text-white/60 font-medium"><?php echo htmlspecialchars($ex['specialization']); ?></td>
                            <td class="p-6">
                                <span class="px-3 py-1 bg-green-500/10 text-green-500 text-[10px] font-black rounded-lg uppercase border border-green-500/10">Active</span>
                            </td>
                            <td class="p-6 text-right">
                                <button class="size-9 rounded-lg border border-white/5 text-white/20 hover:text-white hover:bg-white/5 center ml-auto">
                                    <i class="fa-solid fa-ellipsis-vertical text-xs"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>
</main>

<?php if (isset($_GET['success'])): ?>
    <script>setTimeout(() => showToast('Database Synchronized.', 'success'), 100);</script>
<?php endif; ?>

</body>
</html>
