<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/head.php';
?>



<!-- Main Content -->
<main class="flex-1 p-8">
  <div class="mx-auto max-w-7xl">
    <!-- PageHeading -->
    <div class="flex flex-wrap justify-between gap-4 items-center mb-8">
      <p class="text-white text-4xl font-black leading-tight tracking-[-0.033em]">Notifications</p>
      <button
        class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-10 px-4 bg-[#23482f] text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-[#326744] transition-colors">
        <span class="truncate">Mark All as Read</span>
      </button>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
      <!-- Left Filter Panel -->
      <div class="lg:col-span-1 flex flex-col gap-8">
        <div>
          <!-- SectionHeader: Filter by Type -->
          <h3 class="text-white text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Filter by Type</h3>
          <!-- Checklists -->
          <div class="px-4">
            <label class="flex gap-x-3 py-3 flex-row cursor-pointer">
              <input checked=""
                class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none"
                type="checkbox" />
              <p class="text-white text-base font-normal leading-normal">All</p>
            </label>
            <label class="flex gap-x-3 py-3 flex-row cursor-pointer">
              <input
                class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none"
                type="checkbox" />
              <p class="text-white text-base font-normal leading-normal">Donations</p>
            </label>
            <label class="flex gap-x-3 py-3 flex-row cursor-pointer">
              <input
                class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none"
                type="checkbox" />
              <p class="text-white text-base font-normal leading-normal">User Feedback</p>
            </label>
            <label class="flex gap-x-3 py-3 flex-row cursor-pointer">
              <input
                class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none"
                type="checkbox" />
              <p class="text-white text-base font-normal leading-normal">Registrations</p>
            </label>
            <label class="flex gap-x-3 py-3 flex-row cursor-pointer">
              <input
                class="h-5 w-5 rounded border-[#326744] border-2 bg-transparent text-primary checked:bg-primary checked:border-primary checked:bg-[image:var(--checkbox-tick-svg)] focus:ring-0 focus:ring-offset-0 focus:border-[#326744] focus:outline-none"
                type="checkbox" />
              <p class="text-white text-base font-normal leading-normal">System Alerts</p>
            </label>
          </div>
        </div>
        <div>
          <!-- SectionHeader: Filter by Status -->
          <h3 class="text-white text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Filter by Status
          </h3>
          <div class="flex flex-col gap-2 px-4 py-3">
            <label class="flex items-center gap-3 cursor-pointer">
              <input checked=""
                class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent"
                name="status" type="radio" />
              <span class="text-white text-base">All</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer">
              <input
                class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent"
                name="status" type="radio" />
              <span class="text-white text-base">Unread</span>
            </label>
            <label class="flex items-center gap-3 cursor-pointer">
              <input
                class="h-5 w-5 border-2 border-[#326744] text-primary focus:ring-0 focus:ring-offset-0 bg-transparent"
                name="status" type="radio" />
              <span class="text-white text-base">Read</span>
            </label>
          </div>
        </div>
      </div>
      <!-- Right Notification List -->
      <div class="lg:col-span-3 flex flex-col gap-4">
        <!-- Notification Card - Unread -->
        <div
          class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
          <div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
          <div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">favorite</span></div>
          <div class="flex-1">
            <p class="font-bold text-white">New Donation Received</p>
            <p class="text-gray-300">Jane Doe has donated $50 to the 'Reforestation Project'.</p>
            <p class="text-xs text-gray-400 mt-1">5 minutes ago</p>
          </div>
          <div
            class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">done</span></button>
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">delete</span></button>
          </div>
        </div>
        <!-- Notification Card - Read -->
        <div
          class="relative flex items-start gap-4 p-4 bg-[#112217]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
          <div class="flex-shrink-0 text-gray-400 pt-1"><span class="material-symbols-outlined">chat</span></div>
          <div class="flex-1 opacity-70">
            <p class="font-bold text-white">New User Feedback</p>
            <p class="text-gray-300">Feedback submitted on the 'Guided Meditation' page.</p>
            <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
          </div>
          <div
            class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">undo</span></button>
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">delete</span></button>
          </div>
        </div>
        <!-- Notification Card - Unread -->
        <div
          class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
          <div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
          <div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">person_add</span></div>
          <div class="flex-1">
            <p class="font-bold text-white">New Program Registration</p>
            <p class="text-gray-300">John Smith has registered for the 'Mindfulness 101' course.</p>
            <p class="text-xs text-gray-400 mt-1">1 day ago</p>
          </div>
          <div
            class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">done</span></button>
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">delete</span></button>
          </div>
        </div>
        <!-- Notification Card - Read -->
        <div
          class="relative flex items-start gap-4 p-4 bg-[#112217]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
          <div class="flex-shrink-0 text-gray-400 pt-1"><span class="material-symbols-outlined">clinical_notes</span>
          </div>
          <div class="flex-1 opacity-70">
            <p class="font-bold text-white">New Therapy Session Request</p>
            <p class="text-gray-300">Emily Carter has requested a new therapy session.</p>
            <p class="text-xs text-gray-400 mt-1">2 days ago</p>
          </div>
          <div
            class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">undo</span></button>
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">delete</span></button>
          </div>
        </div>
        <!-- Notification Card - System Alert (Unread) -->
        <div
          class="relative flex items-start gap-4 p-4 bg-[#23482f]/50 rounded-xl border border-transparent hover:border-primary/50 transition-all group">
          <div class="absolute left-0 top-4 bottom-4 w-1 bg-primary rounded-r-full"></div>
          <div class="flex-shrink-0 text-primary pt-1"><span class="material-symbols-outlined">warning</span></div>
          <div class="flex-1">
            <p class="font-bold text-white">System Alert: Payment Gateway API Unresponsive</p>
            <p class="text-gray-300">The system detected an error with the payment gateway. Donations may be affected.
            </p>
            <p class="text-xs text-gray-400 mt-1">3 days ago</p>
          </div>
          <div
            class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">done</span></button>
            <button class="text-gray-400 hover:text-white"><span
                class="material-symbols-outlined text-xl">delete</span></button>
          </div>
        </div>
        <!-- Empty State Example -->
        <div class="flex flex-col items-center justify-center text-center p-12 bg-[#112217]/50 rounded-xl mt-8">
          <span class="material-symbols-outlined text-6xl text-primary mb-4">task_alt</span>
          <h4 class="text-xl font-bold text-white">All Caught Up!</h4>
          <p class="text-gray-400 mt-2">There are no new notifications to show.</p>
        </div>
      </div>
    </div>
  </div>
</main>
</div>
</div>

:root {
--checkbox-tick-svg: url('data:image/svg+xml,%3csvg viewBox=%270 0 16 16%27 fill=%27rgb(17,34,23)%27
xmlns=%27http://www.w3.org/2000/svg%27%3e%3cpath d=%27M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0
011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z%27/%3e%3c/svg%3e');
}
<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/footer.php';
?>