<footer class="bg-[#05070a] border-t border-white/5 py-16 px-6 relative overflow-hidden">
    <!-- Subtle Background Graphic -->
    <div class="absolute right-0 top-0 size-96 bg-primary/5 rounded-full blur-3xl pointer-events-none -mt-48 -mr-48"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        
        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
            
            <!-- Brand Section - Minimal -->
            <div class="col gap-4">
                <a href="<?php echo url(''); ?>" class="row gap-2 items-center w-fit group">
                    <div class="size-8 rounded-lg bg-primary/20 center overflow-hidden">
                        <img src="<?php echo url('components/logo.png'); ?>" alt="ForestSoul" class="w-full h-full object-cover">
                    </div>
                    <span class="txt-lg font-black italic tracking-tight">ForestSoul</span>
                </a>
                <p class="txt-xs txt-2 max-w-xs leading-relaxed">
                    Mental wellness redefined. Ancient wisdom, modern technology.
                </p>
            </div>

            <!-- Quick Links - Minimal -->
            <div class="col gap-4">
                <div class="txt-xs font-black uppercase tracking-wider text-white/40">Quick Access</div>
                <div class="grid grid-cols-2 gap-3">
                    <a href="<?php echo url('meditation'); ?>" class="txt-xs txt-2 hover:text-primary transition-colors">Meditation</a>
                    <a href="<?php echo url('yoga'); ?>" class="txt-xs txt-2 hover:text-primary transition-colors">Yoga</a>
                    <a href="<?php echo url('therapy'); ?>" class="txt-xs txt-2 hover:text-primary transition-colors">Therapy</a>
                    <a href="<?php echo url('community'); ?>" class="txt-xs txt-2 hover:text-primary transition-colors">Community</a>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="h-px bg-gradient-to-r from-transparent via-white/10 to-transparent mb-8"></div>

        <!-- Footer Bottom - Clean -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-6">
            <div class="text-[11px] font-medium text-white/40">
                &copy; <?php echo date('Y'); ?> ForestSoul. Find your inner peace.
            </div>
            
            <div class="flex items-center gap-6">
                <!-- Social Links -->
                <div class="flex gap-3">
                    <a href="#" class="w-8 h-8 rounded-lg bg-white/5 center text-white/40 hover:text-primary hover:bg-primary/10 transition-all text-xs">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-white/5 center text-white/40 hover:text-primary hover:bg-primary/10 transition-all text-xs">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-lg bg-white/5 center text-white/40 hover:text-primary hover:bg-primary/10 transition-all text-xs">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                </div>
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
