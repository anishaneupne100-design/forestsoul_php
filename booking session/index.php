<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/components/navbar.php';
?>


      <main class="flex flex-1 justify-center py-5 sm:py-10">
        <div class="layout-content-container flex flex-col max-w-5xl flex-1 px-4 sm:px-6 lg:px-8">
          <div class="@container mb-12">
            <div class="@[480px]:p-0">
              <div
                class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-xl items-center justify-center p-4"
                data-alt="A serene, sunlit path through a lush green forest, conveying tranquility and hope."
                style='background-image: linear-gradient(rgba(16, 34, 22, 0.5) 0%, rgba(16, 34, 22, 0.8) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuB_s5tMi90t9HCzU2nEN68VWxOL7zEklusUKtwdqFCuhgUgyt-yOBIyaRid6-fFMOBOqzQZrOQWleF6UfrgSBEI8lgBUhUo7lOmttnOU2-z2HScr4mTHL2UKfuho7sGG7O4NHUsLanLOJAAmm_kzLpBYuqqDos05YHLi7APMe7C7xiRx0_P51NTWGot0KuPNqPnIyCUWgKL-E-VzHxcrsQaTCItVfni4mXlvheoGYEN5asY7PdsF-rzCUipzqR4_xiw1wpbDhL8XfA");'>
                <div class="flex flex-col gap-4 text-center max-w-2xl">
                  <h1
                    class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                    Personalized Therapy for Your Journey to Wellness
                  </h1>
                  <h2
                    class="text-text-secondary text-base font-normal leading-normal @[480px]:text-lg @[480px]:font-normal @[480px]:leading-normal">
                    Find peace and clarity with compassionate, professional support tailored to your unique needs. Start
                    your path to healing with us today.
                  </h2>
                </div>
                <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-brand text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors"
                  href="#booking-system">
                  <span class="truncate">Book a Session</span>
                </a>
              </div>
            </div>
          </div>
          <div class="py-16 px-4 bg-surface/30 rounded-xl border border-surface" id="booking-system">
            <h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] pb-3 text-center">Book Your
              Therapy Session</h2>
            <p class="text-text-secondary text-center max-w-2xl mx-auto pb-10">Follow these simple steps to schedule
              your appointment.</p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
              <div class="flex flex-col gap-6 p-6 bg-surface/50 rounded-lg border border-surface">
                <div class="flex items-center gap-4">
                  <div
                    class="flex items-center justify-center size-10 rounded-full bg-primary text-brand font-bold text-lg">
                    1</div>
                  <h3 class="text-xl font-bold text-white">Choose Your Path</h3>
                </div>
                <div class="space-y-4">
                  <label class="block text-sm font-medium text-text-secondary">Therapy Type</label>
                  <select
                    class="w-full bg-background-dark border border-surface rounded-md h-11 px-3 text-white focus:ring-primary focus:border-primary">
                    <option>Individual</option>
                    <option>Group</option>
                    <option>Couples</option>
                  </select>
                </div>
                <div class="space-y-4">
                  <label class="block text-sm font-medium text-text-secondary">Select a Therapist</label>
                  <div class="space-y-3">
                    <label
                      class="flex items-center gap-3 p-3 rounded-md border border-surface has-[:checked]:border-primary has-[:checked]:bg-primary/10 cursor-pointer transition-colors">
                      <input checked=""
                        class="h-4 w-4 text-primary bg-background-dark border-surface focus:ring-primary"
                        name="therapist" type="radio" />
                      <span class="text-white font-medium">Anya S.</span>
                    </label>
                    <label
                      class="flex items-center gap-3 p-3 rounded-md border border-surface has-[:checked]:border-primary has-[:checked]:bg-primary/10 cursor-pointer transition-colors">
                      <input class="h-4 w-4 text-primary bg-background-dark border-surface focus:ring-primary"
                        name="therapist" type="radio" />
                      <span class="text-white font-medium">David C.</span>
                    </label>
                    <label
                      class="flex items-center gap-3 p-3 rounded-md border border-surface has-[:checked]:border-primary has-[:checked]:bg-primary/10 cursor-pointer transition-colors">
                      <input class="h-4 w-4 text-primary bg-background-dark border-surface focus:ring-primary"
                        name="therapist" type="radio" />
                      <span class="text-white font-medium">Maria G.</span>
                    </label>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-6 p-6 bg-surface/50 rounded-lg border border-surface">
                <div class="flex items-center gap-4">
                  <div
                    class="flex items-center justify-center size-10 rounded-full bg-primary text-brand font-bold text-lg">
                    2</div>
                  <h3 class="text-xl font-bold text-white">Find a Time</h3>
                </div>
                <div class="bg-background-dark rounded-lg p-4 border border-surface">
                  <div class="flex items-center justify-between mb-4">
                    <button class="p-2 rounded-md hover:bg-surface/80 transition-colors"><span
                        class="material-symbols-outlined text-text-secondary">chevron_left</span></button>
                    <h4 class="text-white font-semibold">October 2024</h4>
                    <button class="p-2 rounded-md hover:bg-surface/80 transition-colors"><span
                        class="material-symbols-outlined text-text-secondary">chevron_right</span></button>
                  </div>
                  <div class="grid grid-cols-7 text-center text-xs text-text-secondary pb-2">
                    <div>Sun</div>
                    <div>Mon</div>
                    <div>Tue</div>
                    <div>Wed</div>
                    <div>Thu</div>
                    <div>Fri</div>
                    <div>Sat</div>
                  </div>
                  <div class="grid grid-cols-7 text-center text-sm">
                    <div class="text-text-secondary/50">30</div>
                    <div class="text-text-secondary/50">31</div>
                    <div class="py-1">1</div>
                    <div class="py-1">2</div>
                    <div class="py-1">3</div>
                    <div class="py-1">4</div>
                    <div class="py-1">5</div>
                    <div class="py-1">6</div>
                    <div class="py-1">7</div>
                    <div class="py-1">8</div>
                    <div class="py-1">9</div>
                    <div class="py-1">10</div>
                    <div class="py-1">11</div>
                    <div class="py-1">12</div>
                    <div class="py-1">13</div>
                    <div class="py-1">14</div>
                    <div class="py-1">15</div>
                    <div class="py-1">16</div>
                    <div class="py-1">17</div>
                    <div class="py-1">18</div>
                    <div class="py-1">19</div>
                    <div class="py-1">20</div>
                    <div class="py-1 cursor-pointer rounded-full hover:bg-surface">21</div>
                    <div class="py-1 cursor-pointer rounded-full text-brand bg-primary ring-2 ring-primary">22</div>
                    <div class="py-1 cursor-pointer rounded-full hover:bg-surface">23</div>
                    <div class="py-1 cursor-pointer rounded-full hover:bg-surface">24</div>
                    <div class="py-1 cursor-pointer rounded-full hover:bg-surface">25</div>
                    <div class="py-1">26</div>
                    <div class="py-1">27</div>
                    <div class="py-1">28</div>
                    <div class="py-1">29</div>
                    <div class="py-1">30</div>
                    <div class="py-1">31</div>
                  </div>
                </div>
                <div class="space-y-2">
                  <h4 class="text-sm font-medium text-text-secondary">Available Times for Tuesday, Oct 22</h4>
                  <div class="grid grid-cols-2 gap-2">
                    <button
                      class="h-10 rounded-md border border-surface text-text-secondary hover:border-primary hover:text-white transition-colors">09:00
                      AM</button>
                    <button
                      class="h-10 rounded-md border border-surface text-text-secondary hover:border-primary hover:text-white transition-colors">11:00
                      AM</button>
                    <button class="h-10 rounded-md border border-primary bg-primary/10 text-primary">02:00 PM</button>
                    <button
                      class="h-10 rounded-md border border-surface text-text-secondary hover:border-primary hover:text-white transition-colors">04:00
                      PM</button>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-6 p-6 bg-surface/50 rounded-lg border border-surface">
                <div class="flex items-center gap-4">
                  <div
                    class="flex items-center justify-center size-10 rounded-full bg-primary text-brand font-bold text-lg">
                    3</div>
                  <h3 class="text-xl font-bold text-white">Confirm &amp; Book</h3>
                </div>
                <div class="bg-background-dark rounded-lg p-4 border border-surface space-y-3">
                  <h4 class="font-bold text-white">Your Appointment</h4>
                  <div class="text-sm space-y-2 text-text-secondary">
                    <p><strong class="text-white">Type:</strong> Individual Therapy</p>
                    <p><strong class="text-white">Therapist:</strong> Anya S.</p>
                    <p><strong class="text-white">Date:</strong> Tuesday, October 22, 2024</p>
                    <p><strong class="text-white">Time:</strong> 2:00 PM - 2:50 PM</p>
                  </div>
                </div>
                <div class="border-t border-surface pt-4">
                  <p class="text-sm text-text-secondary mb-3">Before your first session, please complete our
                    self-questionnaire. This helps us tailor our approach to your needs.</p>
                  <a class="flex w-full items-center justify-center gap-2 rounded-lg h-11 px-4 bg-surface text-white text-sm font-bold leading-normal tracking-[0.015em] hover:bg-surface/80 transition-colors"
                    href="#">
                    <span class="material-symbols-outlined text-lg">assignment</span>
                    <span>Pre-Therapy Self-Questionnaire</span>
                  </a>
                </div>
                <button
                  class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 bg-primary text-brand text-base font-bold leading-normal tracking-[0.015em] hover:bg-primary/90 transition-colors w-full mt-auto">
                  <span class="truncate">Confirm Booking</span>
                </button>
              </div>
            </div>
          </div>
          <div class="py-16 mt-16 px-4">
            <h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] pb-3 text-center">Our Therapeutic
              Approaches</h2>
            <p class="text-text-secondary text-center max-w-2xl mx-auto pb-10">We utilize a range of evidence-based
              methods to create a personalized treatment plan that best suits your needs.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
              <div class="p-6 bg-surface/50 rounded-lg border border-surface">
                <h3 class="text-lg font-bold text-white mb-2">Cognitive Behavioral Therapy (CBT)</h3>
                <p class="text-text-secondary text-sm">A practical, hands-on approach to problem-solving. Its goal is to
                  change patterns of thinking or behavior that are behind people’s difficulties.</p>
              </div>
              <div class="p-6 bg-surface/50 rounded-lg border border-surface">
                <h3 class="text-lg font-bold text-white mb-2">Mindfulness-Based Therapy</h3>
                <p class="text-text-secondary text-sm">Integrates mindfulness practices like meditation and breathing
                  exercises to help you better manage your thoughts and emotions.</p>
              </div>
              <div class="p-6 bg-surface/50 rounded-lg border border-surface">
                <h3 class="text-lg font-bold text-white mb-2">Humanistic Therapy</h3>
                <p class="text-text-secondary text-sm">Focuses on your unique potential and stresses the importance of
                  growth and self-actualization, helping you recognize your strengths.</p>
              </div>
              <div class="p-6 bg-surface/50 rounded-lg border border-surface">
                <h3 class="text-lg font-bold text-white mb-2">Psychodynamic Therapy</h3>
                <p class="text-text-secondary text-sm">Explores how your unconscious mind and past experiences shape
                  your current behaviors and feelings.</p>
              </div>
            </div>
          </div>
          <div class="py-16 px-4">
            <h2 class="text-white text-3xl font-bold leading-tight tracking-[-0.015em] pb-10 text-center">Frequently
              Asked Questions</h2>
            <div class="max-w-3xl mx-auto space-y-4">
              <details
                class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5">
                  <h3 class="text-white font-semibold">What can I expect in my first session?</h3>
                  <span
                    class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
                </summary>
                <p class="mt-4 leading-relaxed text-text-secondary">Your first session is an opportunity for you and
                  your therapist to get to know each other. You'll discuss what brought you to therapy, your goals, and
                  any concerns you have. It's a collaborative process to ensure you feel comfortable and understood.</p>
              </details>
              <details
                class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5">
                  <h3 class="text-white font-semibold">How long does each therapy session last?</h3>
                  <span
                    class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
                </summary>
                <p class="mt-4 leading-relaxed text-text-secondary">Individual therapy sessions typically last for 50
                  minutes. Group therapy sessions may range from 60 to 90 minutes, depending on the specific group's
                  format and goals.</p>
              </details>
              <details
                class="group rounded-lg bg-surface/50 p-6 [&amp;_summary::-webkit-details-marker]:hidden border border-surface">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5">
                  <h3 class="text-white font-semibold">Is what I share in therapy confidential?</h3>
                  <span
                    class="material-symbols-outlined text-text-secondary transition group-open:rotate-180">expand_more</span>
                </summary>
                <p class="mt-4 leading-relaxed text-text-secondary">Yes, confidentiality is a cornerstone of therapy.
                  Everything you discuss with your therapist is private, with a few legal and ethical exceptions
                  designed to protect your safety and the safety of others, which will be explained in your first
                  session.</p>
              </details>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <?php
  put_footer();
  ?>