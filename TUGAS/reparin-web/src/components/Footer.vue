<template>
    <footer class="bg-base-200">
        <div class="footer p-6 md:p-10 container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
            <div class="space-y-4">
                <img src="../assets/reparin-icon.png" alt="Reparin" class="h-12 light-logo" />
                <img src="../assets/reparin-icon-dark.png" alt="Reparin" class="h-12 dark-logo" />
                <p class="max-w-xs">
                    Solusi terpercaya untuk perbaikan gadget Anda dengan teknisi profesional dan garansi layanan.
                </p>
                <div class="flex space-x-4">
                    <a class="btn btn-circle btn-ghost hover:btn-primary transition-colors duration-300">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a class="btn btn-circle btn-ghost hover:btn-primary transition-colors duration-300">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a class="btn btn-circle btn-ghost hover:btn-primary transition-colors duration-300">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
            <nav class="space-y-2">
                <h6 class="footer-title">Layanan</h6>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Service Smartphone
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Service Laptop
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Service Tablet
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Service Aksesoris
                </a>
            </nav>
            <nav class="space-y-2">
                <h6 class="footer-title">Perusahaan</h6>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Tentang Kami
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Karir
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Blog
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> FAQ
                </a>
            </nav>
            <nav class="space-y-2">
                <h6 class="footer-title">Support</h6>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Syarat & Ketentuan
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Kebijakan Privasi
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Bantuan
                </a>
                <a class="link link-hover hover:text-primary transition-colors duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Kontak
                </a>
            </nav>
        </div>
        <div class="footer footer-center p-4 bg-base-300 text-base-content">
            <div class="flex flex-col md:flex-row items-center justify-between w-full container mx-auto">
                <div class="flex flex-col md:flex-row items-center gap-2 text-center md:text-left">
                    <p>&copy; 2024 Reparin. All rights reserved.</p>
                    <p class="flex items-center gap-2">
                        Made with ❤️ by
                        <a href="https://hisyam99.my.id" target="_blank"
                            class="link link-primary font-medium hover:underline flex items-center gap-1">
                            hisyam99
                            <i class="fa fa-globe"></i>
                        </a>
                    </p>
                </div>
                <div class="flex gap-4 mt-4 md:mt-0">
                    <a class="link link-hover">Terms</a>
                    <span>|</span>
                    <a class="link link-hover">Privacy</a>
                    <span>|</span>
                    <a class="link link-hover">Cookies</a>
                    <span>|</span>
                    <a href="https://github.com/hisyam99" target="_blank" class="link link-hover">
                        <i class="fab fa-github text-lg"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>


<script setup>
// You can keep this file empty if you don't have specific logic for the footer.
</script>