<?php
// events/index.php
require_once '../backend/init.php';

$title = "Upcoming Events - ForestSoul";
include_once '../head.php';
include_once '../components/navbar.php';

// Prepare filters from query params
$filters = [
    'date_from' => $_GET['date_from'] ?? '',
    'date_to' => $_GET['date_to'] ?? ''
];

$eventsRes = get_events($filters);
$events = $eventsRes['data'] ?? [];
?>

<!-- Include jQuery UI for Datepicker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<main class="flex-grow bg-background-light dark:bg-background-dark py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-12 text-center animate-fade-in col gap-4">
            <span class="chip bg-primary/10 text-primary w-fit mx-auto uppercase font-black tracking-widest text-[10px]">Nature's Calendar</span>
            <h1 class="txt-5xl font-black text-white leading-tight">Gatherings & Workshops</h1>
            <p class="txt-lg txt-2 max-w-2xl mx-auto">Join us in the heart of the forest for transformative experiences.</p>
        </div>

        <!-- Filter Sidebar/Panel -->
        <div class="mb-12">
            <form action="" method="GET" class="card bg-surface-dark/50 border-white/5 p-6 rounded-[2rem] row flex-wrap gap-6 items-end justify-center">
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/30 ml-1">From Date</span>
                    <input type="text" name="date_from" id="date_from" value="<?php echo htmlspecialchars($filters['date_from']); ?>" class="input h-12 bg-white/5 border-white/10 px-6 rounded-xl w-48 text-sm" placeholder="Pick a date">
                </label>
                
                <label class="col gap-2">
                    <span class="text-[10px] font-black uppercase tracking-widest text-white/30 ml-1">To Date</span>
                    <input type="text" name="date_to" id="date_to" value="<?php echo htmlspecialchars($filters['date_to']); ?>" class="input h-12 bg-white/5 border-white/10 px-6 rounded-xl w-48 text-sm" placeholder="Pick a date">
                </label>

                <div class="row gap-2">
                    <button type="submit" class="btn-primary h-12 px-8 rounded-xl font-bold row gap-2 items-center">
                        <i class="fa-solid fa-filter text-xs"></i> Apply Filters
                    </button>
                    <?php if (!empty($filters['date_from']) || !empty($filters['date_to'])): ?>
                        <a href="index.php" class="btn-ghost size-12 rounded-xl bg-white/5 center text-white/40 hover:text-white" title="Clear Filters">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if (empty($events)): ?>
                <div class="col-span-full py-24 text-center card bg-surface-dark border-dashed border-white/10 rounded-[3rem]">
                    <div class="size-20 rounded-full bg-white/5 center mx-auto mb-6 text-white/10">
                        <i class="fa-solid fa-calendar-xmark text-4xl"></i>
                    </div>
                    <h3 class="txt-xl font-bold text-white/60">No events found</h3>
                    <p class="txt-2 italic mt-2">Try adjusting your date filters or check back later.</p>
                </div>
            <?php else: foreach($events as $event): ?>
                <div class="card bg-surface-dark border-white/5 p-0 rounded-[2.5rem] overflow-hidden group hover:border-primary/30 transition-all duration-500 flex flex-col h-full">
                    <!-- Preview -->
                    <div class="h-56 bg-primary/5 relative overflow-hidden shrink-0">
                        <?php if ($event['thumbnail']): ?>
                            <img src="<?php echo url($event['thumbnail']); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-surface-dark to-transparent opacity-80 z-10"></div>
                        <div class="absolute bottom-6 left-8 z-20">
                            <span class="px-4 py-1.5 rounded-full bg-primary text-background-dark text-[10px] font-black uppercase tracking-widest shadow-lg shadow-primary/20">
                                <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                            </span>
                        </div>
                        <?php if ($event['needs_approval']): ?>
                            <div class="absolute top-6 right-6 z-20 px-3 py-1 bg-amber-500/20 backdrop-blur-md rounded-lg text-amber-500 text-[10px] font-black uppercase tracking-widest border border-amber-500/20">
                                <i class="fa-solid fa-lock text-[8px] mr-1"></i> Reserved
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="txt-2xl font-bold mb-3 group-hover:text-primary transition-colors"><?php echo htmlspecialchars($event['title']); ?></h3>
                        <p class="txt-sm txt-2 line-clamp-3 mb-8 leading-relaxed flex-grow"><?php echo htmlspecialchars($event['description']); ?></p>
                        
                        <div class="row items-center justify-between pt-6 border-t border-white/5">
                            <div class="row gap-2 items-center text-white/40 text-[10px] font-bold uppercase tracking-widest">
                                <i class="fa-solid fa-location-dot text-primary"></i>
                                <span><?php echo htmlspecialchars($event['location']); ?></span>
                            </div>
                            <a href="details.php?id=<?php echo $event['id']; ?>" class="btn-ghost h-12 px-6 rounded-2xl bg-white/5 row gap-3 items-center group-hover:bg-primary group-hover:text-background-dark transition-all font-bold">
                                <span>Learn More</span>
                                <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</main>

<script>
$(function() {
    $("#date_from, #date_to").datepicker({
        dateFormat: "yy-mm-dd",
        showAnim: "slideDown"
    });
});
</script>

<?php put_footer(); ?>
