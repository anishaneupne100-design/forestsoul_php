<?php
// community/index.php
$title = "Community Grove - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

// Fetch real community posts from backend
$postsResponse = get_community_posts();
$posts = $postsResponse['success'] ? $postsResponse['data'] : [];
?>

<main class="flex-grow">
    <!-- HeroSection -->
    <section class="section @container mt-0">
        <div class="@[480px]:p-4">
            <div class="hero @[480px]:rounded-xl text-center"
                data-alt="A serene, soft-focus image of a sunlit forest path"
                style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuARkyWJWRxbGWSw9_bYsonTf40fjXNXBoN8MFW9gQG9_Zi6FRp1D1VC1-eDWFRp3x9RHOTH3S4MJzaLuR6UYRH2uM5nb92eKObyDLkSBLznmGcAcRxY6oH9qG20A_ihmB6ZgVbLbvLl_HO4x7QnQ6RTZ1aPLCkzOne-FY4vBrR8m901pbbGT-Yj8xCOdqNaue3lgJbJkpOVl6sVScsD14Wv1nshF0IK1nQ53EhIC3qbU6FY04LSGvhmsAqZdV530bOGaImGo-0LCQI");'>
                <div class="col gap-sm max-w-2xl">
                    <h1 class="hero-title @[480px]:text-5xl">Connect, Share, and Grow Together</h1>
                    <p class="hero-text @[480px]:text-base">Share your experiences and support one another in our community grove. This is a safe space to find connection and healing.</p>
                </div>
                <div class="mt-6 flex gap-4">
                    <button class="btn-primary btn-lg" onclick="requireAuth(() => gotoPage('#create-post'))">
                        <span class="truncate">Share Your Story</span>
                    </button>
                    <button class="btn-ghost btn-lg" onclick="scrollToElement('discussions')">
                        <span class="truncate">Browse Discussions</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Stories Carousel (Featured Posts) -->
    <section class="section">
        <h2 class="section-title">Stories from the Forest</h2>
        <div class="flex overflow-x-auto pb-6 px-4 gap-6 [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
            <div class="card w-80 shrink-0">
                <div class="col h-full justify-between">
                    <div>
                        <h3 class="title">My Journey with Meditation</h3>
                        <p class="subtitle mt-2">"ForestSoul helped me find a moment of calm in my chaotic life. The guided meditations are a true gift."</p>
                    </div>
                    <div class="row items-center gap-2 mt-4">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center">
                            <span class="material-symbols-outlined text-sm">person</span>
                        </div>
                        <span class="txt-sm font-medium">Alex P.</span>
                    </div>
                </div>
            </div>
            <div class="card w-80 shrink-0">
                <div class="col h-full justify-between">
                    <div>
                        <h3 class="title">Finding Peace in Nature</h3>
                        <p class="subtitle mt-2">"Connecting with nature has been so healing. I'm grateful for this community that understands."</p>
                    </div>
                    <div class="row items-center gap-2 mt-4">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center">
                            <span class="material-symbols-outlined text-sm">person</span>
                        </div>
                        <span class="txt-sm font-medium">Sarah K.</span>
                    </div>
                </div>
            </div>
            <div class="card w-80 shrink-0">
                <div class="col h-full justify-between">
                    <div>
                        <h3 class="title">How Yoga Changed My Life</h3>
                        <p class="subtitle mt-2">"I never thought I could do yoga, but the beginner sessions here made it so accessible and welcoming."</p>
                    </div>
                    <div class="row items-center gap-2 mt-4">
                        <div class="w-8 h-8 rounded-full bg-primary/20 center">
                            <span class="material-symbols-outlined text-sm">person</span>
                        </div>
                        <span class="txt-sm font-medium">David L.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Discussions Section -->
    <section class="section" id="discussions">
        <div class="between px-4 mb-6">
            <h2 class="heading">Community Discussions</h2>
            <button class="btn-primary gap-2" onclick="requireAuth(() => gotoPage('#create-post'))">
                <span class="material-symbols-outlined text-base">add</span>
                <span class="truncate">Create Post</span>
            </button>
        </div>

        <div class="p-4">
            <!-- Filter Tabs -->
            <div class="row gap-2 overflow-x-auto mb-6 pb-2 [-ms-scrollbar-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                <button class="chip bg-primary text-background-dark">All Posts</button>
                <button class="chip">Meditation</button>
                <button class="chip">Yoga</button>
                <button class="chip">Mindfulness</button>
                <button class="chip">Nature</button>
            </div>

            <div class="col gap-6">
                <?php if (empty($posts)): ?>
                    <div class="card center py-20 text-center">
                        <span class="material-symbols-outlined text-5xl txt-2 mb-4">forum</span>
                        <h3 class="txt-xl">No discussions yet</h3>
                        <p class="txt-2 mt-2">Be the first to start a conversation!</p>
                        <button class="btn-primary mt-6" onclick="requireAuth(() => gotoPage('#create-post'))">Create a Post</button>
                    </div>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <div class="card-hover">
                            <div class="col sm:row gap-md">
                                <div class="flex-1">
                                    <div class="row items-center gap-2 mb-2">
                                        <div class="w-6 h-6 rounded-full bg-primary/20 center">
                                            <span class="material-symbols-outlined text-xs">person</span>
                                        </div>
                                        <span class="txt-sm font-bold"><?php echo htmlspecialchars($post['user_name'] . ' ' . $post['user_lastname']); ?></span>
                                        <span class="txt-2 txt-xs">• <?php echo date('M j, Y', strtotime($post['created_at'])); ?></span>
                                    </div>
                                    <h3 class="title text-xl mb-2"><?php echo htmlspecialchars($post['title']); ?></h3>
                                    <p class="txt-2 txt-sm line-clamp-3"><?php echo htmlspecialchars($post['description']); ?></p>
                                    
                                    <?php if (!empty($post['images'])): ?>
                                        <div class="row gap-2 mt-4 overflow-x-auto">
                                            <?php foreach ($post['images'] as $img): ?>
                                                <img src="<?php echo htmlspecialchars($img); ?>" alt="Post image" class="h-40 rounded-lg object-cover">
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="row sm:col center gap-6 sm:gap-4 sm:border-l border-border-light dark:border-border-dark sm:pl-6">
                                    <button class="row gap-2 items-center txt-2 hover:text-primary transition-colors" title="Like">
                                        <span class="material-symbols-outlined">thumb_up</span>
                                        <span class="txt-sm font-bold"><?php echo $post['like_count']; ?></span>
                                    </button>
                                    <button class="row gap-2 items-center txt-2 hover:text-primary transition-colors" title="Comment">
                                        <span class="material-symbols-outlined">chat_bubble</span>
                                        <span class="txt-sm font-bold"><?php echo $post['comment_count']; ?></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php put_footer(); ?>