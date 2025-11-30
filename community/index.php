<?php
$title = "Our Community - ForestSoul";
include '../head.php';
?>


<body class="body">
<div class="page group/design-root">
<div class="layout-container layout">
<div class="container-main">
<div class="content">

<?php include '../navbar/index.php'; ?>

<!-- HeroSection -->
<main class="flex-1 mt-5">
<div class="@container">
<div class="@[480px]:p-4">
<div class="hero @[480px]:rounded-xl text-center" data-alt="A serene, soft-focus image of a sunlit forest path" style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(16, 34, 22, 0.6) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuARkyWJWRxbGWSw9_bYsonTf40fjXNXBoN8MFW9gQG9_Zi6FRp1D1VC1-eDWFRp3x9RHOTH3S4MJzaLuR6UYRH2uM5nb92eKObyDLkSBLznmGcAcRxY6oH9qG20A_ihmB6ZgVbLbvLl_HO4x7QnQ6RTZ1aPLCkzOne-FY4vBrR8m901pbbGT-Yj8xCOdqNaue3lgJbJkpOVl6sVScsD14Wv1nshF0IK1nQ53EhIC3qbU6FY04LSGvhmsAqZdV530bOGaImGo-0LCQI");'>
<div class="col gap-sm">
<h1 class="hero-title @[480px]:text-5xl">Connect, Share, and Grow Together</h1>
<h2 class="hero-text @[480px]:text-base max-w-lg mx-auto">Share your experiences and support one another in our community grove. This is a safe space to find connection and healing.</h2>
</div>
<button class="btn-primary btn-lg">
<span class="truncate">Share Your Story</span>
</button>
</div>
</div>
</div>
<!-- SectionHeader for Stories -->
<h2 class="heading px-4 pb-3 pt-10">Stories from the Forest</h2>
<!-- Carousel for Stories -->
<div class="flex overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
<div class="row gap-md p-4">
<div class="col h-full w-72 flex-shrink-0 gap-md rounded-xl surface shadow-sm">
<div class="col flex-1 justify-between p-4 pt-0 gap-md">
<div>
<p class="title">My Journey with Meditation</p>
<p class="subtitle mt-1">"ForestSoul helped me find a moment of calm in my chaotic life. The guided meditations are a true gift." - Alex P.</p>
</div>
<button class="btn-secondary w-full">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
<div class="col h-full w-72 flex-shrink-0 gap-md rounded-xl surface shadow-sm">
<div class="col flex-1 justify-between p-4 pt-0 gap-md">
<div>
<p class="title">Finding Peace in Nature</p>
<p class="subtitle mt-1">"Connecting with nature has been so healing. I'm grateful for this community that understands." - Sarah K.</p>
</div>
<button class="btn-secondary w-full">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
<div class="col h-full w-72 flex-shrink-0 gap-md rounded-xl surface shadow-sm">
<div class="col flex-1 justify-between p-4 pt-0 gap-md">
<div>
<p class="title">How Yoga Changed My Life</p>
<p class="subtitle mt-1">"I never thought I could do yoga, but the beginner sessions here made it so accessible and welcoming." - David L.</p>
</div>
<button class="btn-secondary w-full">
<span class="truncate">Read Full Story</span>
</button>
</div>
</div>
</div>
</div>
<!-- SectionHeader for Discussions -->
<h2 class="heading px-4 pb-3 pt-10">Community Discussions</h2>
<!-- Community Forum Section -->
<div class="p-4">
<div class="between flex-col sm:flex-row gap-md mb-4">
<div class="row gap-sm overflow-x-auto [-ms-scrollbar-style:none] [scrollbar-width:none] [&amp;::-webkit-scrollbar]:hidden">
<button class="btn-primary flex-shrink-0">Recent</button>
<button class="flex-shrink-0 btn-ghost txt px-4 py-2">Popular</button>
<button class="flex-shrink-0 btn-ghost txt px-4 py-2">Meditation</button>
<button class="flex-shrink-0 btn-ghost txt px-4 py-2">Yoga</button>
</div>
<button class="btn-primary row gap-sm">
<span class="material-symbols-outlined text-base">add</span>
<span class="truncate">Create Post</span>
</button>
</div>
<div class="col gap-md">
<!-- Post Summary Card 1 -->
<div class="col sm:row gap-md p-4 rounded-xl surface shadow-sm w-full">
<div class="flex-1">
<p class="title">Struggling with consistency in my meditation practice. Any tips?</p>
<p class="subtitle mt-1">by Jamie_L</p>
<p class="txt-2 txt-sm mt-2 line-clamp-2">Hey everyone, I've been trying to build a consistent meditation habit for a few months now, but I keep falling off the wagon. Some weeks I'm great and do it daily, but then something throws me off and I miss a week. It's frustrating! Does anyone have any advice on how to stay motivated and consistent?</p>
</div>
<div class="row sm:col center gap-md sm:gap-sm mt-2 sm:mt-0 ml-14 sm:ml-0">
<div class="row gap-sm txt-2">
<span class="material-symbols-outlined text-lg">thumb_up</span>
<span class="txt-sm font-medium">12</span>
</div>
<div class="row gap-sm txt-2">
<span class="material-symbols-outlined text-lg">chat_bubble</span>
<span class="txt-sm font-medium">5</span>
</div>
</div>
</div>
<!-- Post Summary Card 2 -->
<div class="col sm:row gap-md p-4 rounded-xl surface shadow-sm w-full">
<div class="flex-1">
<p class="title">A small win I wanted to share</p>
<p class="subtitle mt-1">by Anonymous</p>
<p class="txt-2 txt-sm mt-2 line-clamp-2">Today, for the first time in months, I felt a genuine sense of peace while walking through a local park. I just wanted to share this little victory with a community that would understand. It's the small steps that count.</p>
</div>
<div class="row sm:col center gap-md sm:gap-sm mt-2 sm:mt-0 ml-14 sm:ml-0">
<div class="row gap-sm txt-2">
<span class="material-symbols-outlined text-lg">thumb_up</span>
<span class="txt-sm font-medium">38</span>
</div>
<div class="row gap-sm txt-2">
<span class="material-symbols-outlined text-lg">chat_bubble</span>
<span class="text-sm font-medium">15</span>
</div>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<?php include_once '.././components/footer.php';  ?>

</div>
</div>
</div>
</div>
</body></html>
