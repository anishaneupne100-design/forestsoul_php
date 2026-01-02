<?php
// events/index.php
require_once '../backend/init.php';

$title = "Upcoming Events - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

$events = get_events()['data'] ?? [];
?>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-16 text-center animate-fade-in">
            <span class="chip bg-primary/10 text-primary w-fit mx-auto uppercase font-black tracking-widest text-[10px] mb-4">Nature's Calendar</span>
            <h1 class="txt-5xl font-black text-white leading-tight">Gatherings & Workshops</h1>
            <p class="txt-lg txt-2 max-w-2xl mx-auto mt-4">Join us in the heart of the forest for transformative experiences, movement, and community support.</p>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($events)): ?>
                <div class="col-span-full py-20 text-center card bg-surface-dark border-white/5">
                    <p class="txt-2 italic">The forest is quiet right now. Check back soon for new events.</p>
                </div>
            <?php else: foreach($events as $event): ?>
                <div class="card bg-surface-dark border-white/5 p-0 rounded-[2.5rem] overflow-hidden group hover:border-primary/30 transition-all duration-500">
                    <div class="h-56 bg-primary/5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-t from-surface-dark to-transparent opacity-80 z-10"></div>
                        <div class="absolute bottom-6 left-8 z-20">
                            <span class="px-3 py-1 rounded-full bg-primary text-background-dark text-[10px] font-black uppercase tracking-widest">
                                <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="txt-2xl font-bold mb-3 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($event['title']); ?></h3>
                        <p class="txt-sm txt-2 line-clamp-3 mb-8 leading-relaxed"><?php echo htmlspecialchars($event['description']); ?></p>
                        
                        <div class="row items-center justify-between pt-6 border-t border-white/5">
                            <div class="row gap-2 items-center text-white/40 text-xs">
                                <i class="fa-solid fa-location-dot text-primary"></i>
                                <span><?php echo htmlspecialchars($event['location']); ?></span>
                            </div>
                            <a href="details.php?id=<?php echo $event['id']; ?>" class="btn-ghost size-12 rounded-2xl bg-white/5 center group-hover:bg-primary group-hover:text-background-dark transition-all">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</main>

<?php put_footer(); ?>
