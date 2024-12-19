<template>
    <div class="parallax hero min-h-screen" :style="{ backgroundImage: `url(${heroBgImage})` }">
        <div class="hero-overlay bg-opacity-80"></div>
        <div class="container mx-auto px-4 flex items-center min-h-screen relative">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left" data-aos="fade-right">
                    <h1 class="text-5xl lg:text-7xl font-bold mb-6 text-white">
                        Servis Gadget Profesional
                    </h1>
                    <p class="text-xl mb-8 text-white opacity-90">
                        Solusi terpercaya untuk perbaikan smartphone, laptop, dan tablet
                        Anda. Didukung teknisi berpengalaman dan garansi layanan hingga
                        90 hari.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#contact" class="btn btn-primary btn-lg gap-2">
                            <i class="fas fa-calendar-check"></i>
                            Booking Service
                        </a>
                        <a href="#" class="btn btn-ghost btn-lg text-white border-white gap-2">
                            <i class="fas fa-play"></i>
                            Lihat Video
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue'
import heroBgImage from '@/assets/hero-bg.jpg'
</script>