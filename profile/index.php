<?php
// Protect this route - require authentication
require_once __DIR__ . '/../backend/middleware/auth.php';

$title = "My Profile - ForestSoul";
include '../head.php';

$user = Auth::user();
$memberSince = date('M Y', strtotime($user['created_at'] ?? 'now'));

include_once '../components/navbar.php';
?>

<!-- Main Content -->
<main class="flex-1 overflow-y-auto p-8">
    <div class="max-w-4xl mx-auto">
        <!-- Page Heading -->
        <div class="between flex-wrap gap-md mb-8">
            <div class="col gap-sm">
                <p class="txt txt-hero">Welcome back, <?php echo htmlspecialchars($user['name']); ?></p>
                <p class="txt-2 txt-md">You're doing great, keep up the practice.</p>
            </div>
            <a href="<?php echo url('meditation'); ?>" class="btn-primary btn-lg shadow-sm hover:opacity-90">
                <span class="truncate">Start Today's Meditation</span>
            </a>
        </div>
        <!-- My Progress Section -->
        <section class="mb-12">
            <h2 class="heading mb-4">My Progress</h2>
            <div class="grid-2 @container">
                <!-- Card 1: Meditation -->
                <div class="card row @xl:items-start flex-col @xl:flex-row shadow-sm">
                    <div class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-square @xl:aspect-auto @xl:h-full bg-cover rounded-lg"
                        data-alt="Abstract green and gold flowing lines"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBY7Q1WXwXAXaH2wWBnqmlSc8P_Nr8JBCjoOqxd5LS3SkvBzqLAfST32_yyEwikOWp4p5137168hRZaRjI1CmzH2Kfv84bJG_OH_0JwUuiBYlQy7e2v1xe9jmuM40TSavEvTYrXYInEEk2Pw5nnFeHtYO_D5fsMTPWNK4ovKPFUg2eLHUHYCF8LJgZ4yMzg4myxqtxDWis4f2A8vz9JPm6ZhyExRCyzMTzJLWtJ4WZY3hA0tVXXZHWlqZwVHTtfxQErgQDek6kYLUc");'>
                    </div>
                    <div class="col items-stretch justify-center gap-2 w-full grow py-4 @xl:px-4 @xl:py-1">
                        <p class="txt txt-lg">Meditation</p>
                        <div class="col gap-1">
                            <p class="txt-2 txt-sm">Total Hours Meditated: 42</p>
                            <p class="txt-2 txt-sm">Current Streak: 12 days</p>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mt-2">
                            <div class="bg-secondary-light dark:bg-secondary-dark h-2.5 rounded-full"
                                style="width: 75%"></div>
                        </div>
                    </div>
                </div>
                <!-- Card 2: Yoga -->
                <div class="card row @xl:items-start flex-col @xl:flex-row shadow-sm">
                    <div class="w-full @xl:w-1/3 bg-center bg-no-repeat aspect-square @xl:aspect-auto @xl:h-full bg-cover rounded-lg"
                        data-alt="Abstract image of a calming blue wave pattern"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBtntkrabQlawmQVultjO1GwhqdvVZSdRJZcYInAsRnxi1ahiTrC9vJF8PNKpud8dXMSKZSC5RGmdQg2L7iqOl6pvtze6WmWk0nc-DEytUHNjtdRTlqMLFMJ1JSH5BrbZGbleQu8j4O8BLhU2qSrd4wUEGgb-vPDoAfC0D5iema7TvTdE1XrMRq2eibk8rkeAxe6BSrjs6cZ7lh5F55OsjfViEv2Tou1MMoaCYTv6GA1IsJ5Bci2bxQRz0fYSmdjVstaG16aQVYwnE");'>
                    </div>
                    <div class="col items-stretch justify-center gap-2 w-full grow py-4 @xl:px-4 @xl:py-1">
                        <p class="txt txt-lg">Yoga</p>
                        <div class="col gap-1">
                            <p class="txt-2 txt-sm">Sessions Completed: 25</p>
                            <p class="txt-2 txt-sm">Last session: Yesterday</p>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5 mt-2">
                            <div class="bg-secondary-light dark:bg-secondary-dark h-2.5 rounded-full"
                                style="width: 50%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Therapy Sessions Section -->
        <section class="mb-12">
            <div class="between mb-4">
                <h2 class="heading">Therapy Sessions</h2>
                <button class="btn-primary btn-sm gap-2">
                    <span class="material-symbols-outlined text-base">add</span>
                    <span class="truncate">Book a New Session</span>
                </button>
            </div>
            <div class="card p-6 shadow-sm">
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <nav aria-label="Tabs" class="-mb-px flex space-x-6">
                        <a class="whitespace-nowrap py-3 px-1 border-b-2 font-medium txt-sm text-primary dark:text-primary-dark border-primary dark:border-primary-dark"
                            href="#">Upcoming</a>
                        <a class="whitespace-nowrap py-3 px-1 border-b-2 font-medium txt-sm text-text-secondary-light dark:text-text-secondary-dark border-transparent hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-600"
                            href="#">Past</a>
                    </nav>
                </div>
                <ul class="divide-y divide-gray-200 dark:divide-gray-700 mt-4">
                    <li class="py-4 between flex-wrap gap-md">
                        <div class="row gap-md">
                            <div>
                                <p class="txt-sm font-medium txt">Dr. Evelyn Reed</p>
                                <p class="txt-sm txt-2">June 28, 2025 at 2:00 PM</p>
                            </div>
                        </div>
                        <button class="btn-secondary btn-sm">Join Session</button>
                    </li>
                    <li class="py-4 between flex-wrap gap-md">
                        <div class="row gap-md">
                            <div>
                                <p class="txt-sm font-medium txt">Dr shyam gurung</p>
                                <p class="txt-sm txt-2">July 5, 2025 at 11:00 AM</p>
                            </div>
                        </div>
                        <button class="btn-secondary btn-sm">Join Session</button>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Community Stories Section -->
        <section>
            <h2 class="heading mb-4">Share Your Story</h2>
            <div class="card p-6 shadow-sm">
                <p class="txt-2 txt-sm mb-4">Share your experiences and insights with the community. Your
                    story will be posted anonymously to protect your privacy.</p>
                <textarea class="input" id="story" name="story" placeholder="Write your story here..."
                    rows="5"></textarea>
                <div class="mt-4 flex justify-end">
                    <button class="btn-primary btn-sm">Share Anonymously</button>
                </div>
            </div>
        </section>
    </div>
</main>
</div>
</div>

<?php

put_footer();

?>