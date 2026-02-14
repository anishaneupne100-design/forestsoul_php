<?php
// community/index.php
require_once '../backend/init.php';

// UI PARTS
$title = "Community - ForestSoul Feed";
include_once '../head.php';
include_once '../components/navbar.php';

// Fetch stories directly
$storiesRes = get_community_posts();
$stories = $storiesRes['data'] ?? [];
?>

<main class="flex-grow bg-[#0f1115] min-h-screen">
    <!-- Header Section -->
    <div class="relative overflow-hidden pt-12 pb-20 px-4">
        <div class="absolute inset-0 bg-primary/5 [mask-image:radial-gradient(ellipse_at_center,transparent_0%,black_100%)]"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 py-10">
                <div class="col gap-4">
                    <span class="chip bg-primary/10 text-primary w-fit uppercase font-bold tracking-widest text-[10px]">Heart of ForestSoul</span>
                    <h1 class="txt-5xl font-black tracking-tight text-white leading-[1.1]">Community Feed</h1>
                    <p class="txt-lg txt-2 max-w-xl">Join thousands of others in sharing wisdom and finding support.</p>
                </div>
                <div class="row gap-4 items-center">
                    <a href="<?php echo url('community/create.php'); ?>" class="btn-primary h-14 px-8 rounded-2xl row gap-3 items-center group shadow-2xl shadow-primary/20">
                        <i class="fa-solid fa-plus text-sm group-hover:rotate-90 transition-transform"></i>
                        <span class="font-bold">Share Your Story</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Feed Layout -->
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-12 gap-10 pb-20 -mt-10 relative z-10">
        
        <!-- Left Sidebar -->
        <aside class="lg:col-span-3 hidden lg:flex flex-col gap-8">
            <div class="card bg-surface-dark/50 backdrop-blur-xl border-white/5 p-6 rounded-3xl sticky top-24">
                <h3 class="txt-xs font-black uppercase text-white/50 tracking-widest mb-6">Explore Topics</h3>
                <nav class="col gap-2">
                    <a href="#" class="row gap-3 px-4 py-3 rounded-2xl bg-primary/10 text-primary font-bold">
                        <i class="fa-solid fa-clock"></i> Latest Stories
                    </a>
                    <a href="#" class="row gap-3 px-4 py-3 rounded-2xl text-white/50 hover:bg-white/5">
                        <i class="fa-solid fa-leaf"></i> Nature & Healing
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Center: The Feed -->
        <div class="lg:col-span-6 col gap-8">
            <?php if (empty($stories)): ?>
                <div class="card bg-surface-dark border-white/5 p-20 text-center col items-center gap-6 rounded-[2.5rem]">
                    <i class="fa-solid fa-ghost text-5xl text-white/10"></i>
                    <h3 class="txt-xl font-bold">Silence in the Forest</h3>
                    <p class="txt-2">No stories have been shared yet.</p>
                    <a href="<?php echo url('community/create.php'); ?>" class="btn-primary px-8 h-12">Create First Post</a>
                </div>
            <?php else: foreach($stories as $post): ?>
                <article class="card bg-surface-dark border-white/5 p-0 rounded-[2.5rem] overflow-hidden group">
                    <div class="p-8">
                        <div class="row items-center justify-between mb-8">
                            <div class="row gap-4 items-center">
                                <div class="size-11 rounded-2xl bg-primary/20 center font-bold text-primary">
                                    <?php echo $post['user_name'][0]; ?>
                                </div>
                                <div class="col">
                                    <h4 class="txt-sm font-bold text-white"><?php echo htmlspecialchars($post['user_name']); ?></h4>
                                    <span class="text-[10px] text-white/30 uppercase font-bold"><?php echo date('M d', strtotime($post['created_at'])); ?></span>
                                </div>
                            </div>
                        </div>

                        <h2 class="txt-2xl font-bold mb-4 leading-tight group-hover:text-primary transition-colors"><?php echo htmlspecialchars($post['title']); ?></h2>
                        <p class="txt-base txt-2 line-clamp-4 leading-relaxed mb-8"><?php echo htmlspecialchars($post['description']); ?></p>
                        
                        <div class="row items-center justify-between pt-8 border-t border-white/5">
                            <div class="row gap-2">
                                <button onclick="handleLike(<?php echo $post['id']; ?>, this)" class="row gap-3 py-3 px-6 rounded-2xl bg-white/3 text-white/50 hover:bg-red-500/10 hover:text-red-500 transition-all font-bold">
                                    <i class="fa-regular fa-heart"></i>
                                    <span><?php echo $post['like_count']; ?></span>
                                </button>
                                <button class="row gap-3 py-3 px-6 rounded-2xl bg-white/3 text-white/50 hover:bg-blue-500/10 hover:text-blue-500 transition-all font-bold">
                                    <i class="fa-regular fa-comment"></i>
                                    <span><?php echo $post['comment_count']; ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; endif; ?>
        </div>

        <!-- Right Sidebar -->
        <aside class="lg:col-span-3 col gap-8">
            <div class="card bg-[#1a1c22] p-8 rounded-3xl border-primary/20 border text-center col gap-4">
                <i class="fa-solid fa-shield-heart text-3xl text-primary"></i>
                <h4 class="txt-lg font-bold">Need help?</h4>
                <p class="txt-sm txt-2">Talk to our certified therapists for support.</p>
                <a href="<?php echo url('therapy/'); ?>" class="btn-ghost h-11 w-full bg-primary/10 text-primary">View Experts</a>
            </div>
        </aside>
    </div>
</main>

<script>
async function handleLike(postId, btn) {
    if (!requireAuth()) return;
    try {
        const res = await api('toggle_like', { post_id: postId });
        if (res.success) {
            window.location.reload(); // Simple reload for state update
        }
    } catch(e) {}
}
</script>

<?php put_footer(); ?>