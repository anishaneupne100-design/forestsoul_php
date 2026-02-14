<?php
// community/create.php
require_once '../backend/init.php';

// Check auth FIRST before any output
if (!Auth::check()) {
    header('Location: ' . url('login/'));
    exit;
}

// HANDLE REQUEST AT TOP
$error_msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_post') {
    $data = [
        'title' => $_POST['title'] ?? '',
        'description' => $_POST['description'] ?? '',
        'files' => $_FILES['images'] ?? null
    ];
    
    $res = create_community_post($_SESSION['user_id'], $data);
    if (isset($res['success']) && $res['success']) {
        header('Location: ' . url('community/'));
        exit;
    }
    $error_msg = $res['error'] ?? ($res['message'] ?? 'Failed to create post');
}

// UI PARTS - Include after all redirects/headers
$title = "Share Your Story - ForestSoul Community";
include_once '../head.php';
include_once '../components/navbar.php';
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-10 text-center col gap-4">
            <div class="size-16 rounded-full bg-primary/10 text-primary center mx-auto shadow-lg shadow-primary/5">
                <i class="fa-solid fa-pen-nib text-2xl"></i>
            </div>
            <h1 class="txt-3xl font-bold tracking-tight">Create a Community Post</h1>
            <p class="txt-2 max-w-lg mx-auto">Your voice matters. Share your experiences with the community.</p>
        </div>

        <?php if (isset($error_msg)): ?>
            <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 text-red-500 rounded-xl text-center font-bold animate-shake">
                <?php echo htmlspecialchars($error_msg); ?>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="card bg-surface-dark border border-white/5 shadow-2xl overflow-hidden animate-fade-in">
            <form action="" method="POST" enctype="multipart/form-data" class="p-8 col gap-8">
                <input type="hidden" name="action" value="create_post">
                
                <!-- Title -->
                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold uppercase tracking-widest pl-1">Story Title</span>
                    <input type="text" name="title" placeholder="Give your story a meaningful title..." 
                           class="input h-14 px-6 text-lg font-bold border-white/10 focus:border-primary transition-all shadow-inner" 
                           value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>" required>
                </label>

                <!-- Description -->
                <label class="col gap-2">
                    <span class="txt-xs txt-2 font-bold uppercase tracking-widest pl-1">The Narrative</span>
                    <textarea name="description" placeholder="Share your thoughts, journey, or helpful tips..." 
                              class="input p-6 min-h-[300px] text-base leading-relaxed border-white/10 focus:border-primary transition-all shadow-inner" required><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
                </label>

                <!-- Multimedia Support -->
                <div class="col gap-3">
                    <span class="txt-xs txt-2 font-bold uppercase tracking-widest pl-1">Add Images (Max 5)</span>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4" id="preview-grid">
                        <button type="button" onclick="$('#image-input').click()" class="aspect-square rounded-2xl border-2 border-dashed border-white/10 center hover:border-primary/50 hover:bg-primary/5 transition-all group">
                            <div class="col items-center gap-2 text-white/30 group-hover:text-primary">
                                <i class="fa-solid fa-cloud-arrow-up text-2xl"></i>
                                <span class="text-[10px] font-bold uppercase">Upload</span>
                            </div>
                        </button>
                    </div>
                    <input type="file" name="images[]" id="image-input" multiple accept="image/*" class="hidden">
                    <p class="text-[10px] txt-2 italic pl-1">High quality images help your story reach more people.</p>
                </div>

                <!-- Guidance -->
                <div class="bg-primary/5 rounded-2xl p-6 border border-primary/10 row gap-4 items-start">
                    <i class="fa-solid fa-circle-info text-primary mt-1"></i>
                    <div class="col gap-1">
                        <p class="txt-sm font-bold text-primary">Community Guidelines</p>
                        <p class="txt-xs txt-2">Be kind, supportive, and avoid sharing sensitive personal data.</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="row items-center justify-between pt-4 border-t border-white/5">
                    <a href="<?php echo url('community/'); ?>" class="btn-ghost px-8 h-12">Discard</a>
                    <button type="submit" class="btn-primary px-12 h-12 row gap-3 items-center group shadow-xl shadow-primary/20">
                        <span>Publish Post</span>
                        <i class="fa-solid fa-paper-plane text-xs group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
$(document).ready(function() {
    $('#image-input').on('change', function() {
        const files = Array.from(this.files);
        // Clear previous previews except the upload button
        $('#preview-grid div').remove();
        
        files.slice(0, 5).forEach(file => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const html = `
                    <div class="aspect-square rounded-2xl overflow-hidden border border-white/10 animate-scale-in">
                        <img src="${e.target.result}" class="size-full object-cover">
                    </div>
                `;
                $('#preview-grid').append(html);
            };
            reader.readAsDataURL(file);
        });
    });
});
</script>

<?php put_footer(); ?>
