<footer class="bg-[#05070a] border-t border-white/5 pt-20 pb-10 px-6 relative overflow-hidden">
    <!-- Subtle Background Graphic -->
    <div class="absolute right-0 bottom-0 size-64 bg-primary/5 rounded-full blur-3xl pointer-events-none -mb-32 -mr-32"></div>

    <div class="max-w-7xl mx-auto col gap-16 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            
            <!-- Brand Section -->
            <div class="md:col-span-5 col gap-6">
                <a href="<?php echo url(''); ?>" class="row gap-3 items-center group">
                    <div class="size-10 rounded-xl bg-primary center text-background-dark shadow-lg shadow-primary/20 group-hover:rotate-12 transition-transform">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <span class="txt-xl font-black italic tracking-tighter">ForestSoul</span>
                </a>
                <p class="txt-sm txt-2 max-w-sm leading-relaxed">
                    A digital sanctuary for mental clarity and conscious living. We combine ancient wisdom with modern technology to help you find your inner balance.
                </p>
                <div class="row gap-4">
                    <a href="#" class="size-10 rounded-xl bg-white/5 border border-white/5 center hover:bg-white/10 transition-all"><i class="fa-brands fa-instagram text-white/40"></i></a>
                    <a href="#" class="size-10 rounded-xl bg-white/5 border border-white/5 center hover:bg-white/10 transition-all"><i class="fa-brands fa-x-twitter text-white/40"></i></a>
                    <a href="#" class="size-10 rounded-xl bg-white/5 border border-white/5 center hover:bg-white/10 transition-all"><i class="fa-brands fa-discord text-white/40"></i></a>
                </div>
            </div>

            <!-- Links Grid -->
            <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-8">
                <div class="col gap-6">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Sanctuary</h4>
                    <div class="col gap-3">
                        <a href="<?php echo url('meditation'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Meditation</a>
                        <a href="<?php echo url('yoga'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Yoga Flow</a>
                        <a href="<?php echo url('games'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Focus Games</a>
                        <a href="<?php echo url('therapy'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Expert Help</a>
                    </div>
                </div>

                <div class="col gap-6">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Community</h4>
                    <div class="col gap-3">
                        <a href="<?php echo url('community'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Global Forum</a>
                        <a href="<?php echo url('events'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Live Events</a>
                        <a href="<?php echo url('questionnaire'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Mental Check</a>
                    </div>
                </div>

                <div class="col gap-6">
                    <h4 class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Persona</h4>
                    <div class="col gap-3">
                        <?php if (Auth::check()): ?>
                            <a href="<?php echo url('profile'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">My Space</a>
                            <a href="<?php echo url('user_progress'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Growth Log</a>
                            <a href="<?php echo url('logout.php'); ?>" class="txt-sm text-red-400/60 hover:text-red-400 transition-colors">Exit Portal</a>
                        <?php else: ?>
                            <a href="<?php echo url('login'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">Re-Enter</a>
                            <a href="<?php echo url('signup'); ?>" class="txt-sm txt-2 hover:text-white transition-colors">New Journey</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="pt-10 border-t border-white/5 between flex-wrap gap-6">
            <p class="text-[10px] font-black uppercase tracking-widest text-white/20">
                &copy; <?php echo date('Y'); ?> ForestSoul Ecosystem &bull; Free Forever &bull; Proudly Mindful
            </p>
            <div class="row gap-6">
                <span class="text-[10px] font-black uppercase tracking-widest text-white/10 row gap-2 items-center">
                    <i class="fa-solid fa-earth-asia"></i> 
                    Kathmandu, Nepal
                </span>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-graphic {
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        height: 100px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.05) 0%, transparent 70%);
        pointer-events: none;
    }
</style>

</body>
</html>
