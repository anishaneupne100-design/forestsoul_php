<?php
// admin/community.php
require_once __DIR__ . '/../backend/init.php';

// Handle Post Deletion (Before output)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['post_id'])) {
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("UPDATE community_posts SET is_archived = 1 WHERE id = ?");
    $stmt->execute([$_POST['post_id']]);
    header("Location: " . url('admin/community.php?success=1'));
    exit;
}

$title = "Community Oversight - ForestSoul Admin";
require_once 'head.php';
require_once 'navbar.php';

$pdo = get_db_connection();
$posts = $pdo->query("SELECT p.*, u.name, u.lastname FROM community_posts p JOIN users u ON p.posted_by = u.id WHERE p.is_archived = 0 ORDER BY p.created_at DESC")->fetchAll();
?>

<main class="px-6 pb-20 max-w-7xl mx-auto">
    <div class="py-10">
        <h1 class="text-4xl font-black tracking-tight text-white mb-2">Community Feed Control</h1>
        <p class="text-white/40 font-medium">Moderate the collective voice of the forest.</p>
    </div>

    <!-- Feed Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="admin-card p-8 col gap-1">
            <span class="text-4xl font-black text-admin-primary"><?php echo count($posts); ?></span>
            <span class="text-[10px] font-black uppercase tracking-widest text-white/40">Visible Stories</span>
        </div>
    </div>

    <!-- Feed Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <?php if (empty($posts)): ?>
            <div class="col-span-full py-20 admin-card center border-dashed">
                <p class="text-white/20 italic">The forest is silent... No posts found.</p>
            </div>
        <?php else: foreach($posts as $post): ?>
            <div class="admin-card p-10 col gap-6 group">
                <div class="between">
                    <div class="row gap-4 items-center">
                        <div class="size-10 rounded-xl bg-admin-bg center text-admin-primary font-black uppercase shadow-inner text-xs">
                            <?php echo $post['name'][0]; ?>
                        </div>
                        <div class="col">
                            <span class="text-sm font-bold text-white"><?php echo htmlspecialchars($post['name'] . ' ' . $post['lastname']); ?></span>
                            <span class="text-[10px] text-white/20 font-mono uppercase"><?php echo date('M d, Y', strtotime($post['created_at'])); ?></span>
                        </div>
                    </div>
                    <form method="POST" onsubmit="return confirm('Archive this story?')">
                        <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                        <button type="submit" class="size-10 rounded-xl bg-red-500/10 text-red-500 center hover:bg-red-500 transition-all hover:text-white border border-red-500/10">
                            <i class="fa-solid fa-trash-can text-xs"></i>
                        </button>
                    </form>
                </div>

                <div class="col gap-3">
                    <h3 class="text-xl font-black italic l-tight group-hover:text-admin-primary transition-colors"><?php echo htmlspecialchars($post['title']); ?></h3>
                    <p class="text-sm txt-2 leading-relaxed opacity-60 line-clamp-3"><?php echo nl2br(htmlspecialchars($post['description'])); ?></p>
                </div>

                <div class="row gap-6 pt-6 border-t border-white/5 opacity-40">
                    <div class="row gap-2 items-center text-[10px] font-black uppercase tracking-widest">
                        <i class="fa-solid fa-heart text-admin-primary"></i> 
                        <?php 
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM community_likes WHERE post_id = ?");
                        $stmt->execute([$post['id']]);
                        echo $stmt->fetchColumn(); 
                        ?> Echoes
                    </div>
                    <div class="row gap-2 items-center text-[10px] font-black uppercase tracking-widest">
                        <i class="fa-solid fa-comment text-admin-primary"></i> 
                        <?php 
                        $stmt = $pdo->prepare("SELECT COUNT(*) FROM community_comments WHERE post_id = ?");
                        $stmt->execute([$post['id']]);
                        echo $stmt->fetchColumn(); 
                        ?> Whispers
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
</main>

<?php if (isset($_GET['success'])): ?>
    <script>setTimeout(() => showToast('Post Archived.', 'success'), 100);</script>
<?php endif; ?>

</body>
</html>
