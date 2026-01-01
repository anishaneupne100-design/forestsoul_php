<?php
// staff/index.php
// Protect this route
include_once '../head.php';

if (!Auth::isStaff()) {
    header('Location: ' . url('login/'));
    exit;
}

$title = "Staff Management - ForestSoul";
include_once '../components/navbar.php';

$user = Auth::user();
?>

<main class="flex-grow">
    <div class="flex min-h-[calc(100vh-64px)]">
        <!-- Sidebar -->
        <aside class="hidden md:flex flex-col w-64 bg-surface-dark/50 border-r border-white/5 p-4">
            <div class="row gap-md p-3 mb-8 bg-primary/5 rounded-xl border border-primary/10">
                <div class="w-10 h-10 rounded-full bg-primary/20 center overflow-hidden">
                    <span class="material-symbols-outlined text-primary">admin_panel_settings</span>
                </div>
                <div class="col overflow-hidden">
                    <p class="txt-sm font-bold truncate">Staff Portal</p>
                    <p class="txt-xs txt-2 truncate"><?php echo htmlspecialchars($user['email']); ?></p>
                </div>
            </div>

            <nav class="col gap-1">
                <a href="#" class="row gap-3 px-4 py-3 rounded-xl bg-primary text-background-dark font-bold">
                    <span class="material-symbols-outlined text-sm">dashboard</span>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="row gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors txt-2">
                    <span class="material-symbols-outlined text-sm">group</span>
                    <span>Users</span>
                </a>
                <a href="#" class="row gap-3 px-4 py-3 rounded-xl hover:bg-white/5 transition-colors txt-2">
                    <span class="material-symbols-outlined text-sm">volunteer_activism</span>
                    <span>Donations</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6 md:p-10">
            <div class="between flex-wrap gap-md mb-8">
                <div class="col gap-1">
                    <h1 class="txt-3xl font-bold">Staff & Expert Management</h1>
                    <p class="txt-2">Manage staff profiles, roles, and therapeutic credentials.</p>
                </div>
                <button class="btn-primary gap-2" onclick="showToast('Feature coming soon', 'info')">
                    <span class="material-symbols-outlined text-sm">add_circle</span>
                    <span>Add New Staff</span>
                </button>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
                <div class="card bg-surface-dark border-white/5 p-6">
                    <p class="txt-xs txt-2 font-bold uppercase tracking-widest mb-1">Total Staff</p>
                    <p class="txt-3xl font-bold">12</p>
                </div>
                <div class="card bg-surface-dark border-white/5 p-6">
                    <p class="txt-xs txt-2 font-bold uppercase tracking-widest mb-1">Active Therapists</p>
                    <p class="txt-3xl font-bold text-primary">8</p>
                </div>
                <div class="card bg-surface-dark border-white/5 p-6">
                    <p class="txt-xs txt-2 font-bold uppercase tracking-widest mb-1">Pending Reviews</p>
                    <p class="txt-3xl font-bold text-yellow-500">3</p>
                </div>
            </div>

            <!-- Table -->
            <div class="card bg-surface-dark border-white/5 overflow-hidden">
                <div class="p-4 border-b border-white/5">
                    <input type="text" class="input h-10 max-w-sm" placeholder="Search staff...">
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-white/5">
                            <tr class="txt-xs txt-2 uppercase font-bold tracking-widest">
                                <th class="px-6 py-4">Name</th>
                                <th class="px-6 py-4">Role</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5">
                            <?php 
                            $staff = [
                                ['name' => 'Dr. Sita Gurung', 'role' => 'Therapist', 'status' => 'Active'],
                                ['name' => 'Ramesh Thapa', 'role' => 'Yoga Instructor', 'status' => 'Inactive'],
                                ['name' => 'Anjali Devi', 'role' => 'Admin', 'status' => 'Active'],
                            ];
                            foreach($staff as $s): 
                            ?>
                                <tr class="hover:bg-white/5 transition-colors">
                                    <td class="px-6 py-4 font-medium"><?php echo $s['name']; ?></td>
                                    <td class="px-6 py-4"><span class="chip txt-xs"><?php echo $s['role']; ?></span></td>
                                    <td class="px-6 py-4">
                                        <span class="row gap-2 items-center">
                                            <span class="w-2 h-2 rounded-full <?php echo $s['status'] == 'Active' ? 'bg-primary shadow-[0_0_8px_rgba(50,230,120,0.5)]' : 'bg-white/20'; ?>"></span>
                                            <span class="txt-sm"><?php echo $s['status']; ?></span>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <button class="p-2 txt-2 hover:text-primary transition-colors">
                                            <span class="material-symbols-outlined text-sm">edit</span>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<?php put_footer(); ?>