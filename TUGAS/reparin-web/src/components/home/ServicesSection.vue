<template>
    <section id="services" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">Layanan Kami</h2>
                <p class="text-lg opacity-80 max-w-2xl mx-auto">
                    Solusi lengkap untuk berbagai kebutuhan perbaikan gadget Anda dengan
                    standar layanan profesional.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                <ServiceCard title="Service Smartphone" :imageSrc="smartphoneImg"
                    features="Ganti LCD & Touchscreen, Perbaikan Hardware, Software & OS, Water Damage" />
                <ServiceCard title="Service Laptop" :imageSrc="laptopImg"
                    features="Perbaikan Motherboard, Upgrade Hardware, Install Ulang OS, Data Recovery" />
                <ServiceCard title="Service Tablet" :imageSrc="tabletImg"
                    features="Ganti LCD iPad, Perbaikan Charging, Upgrade Storage, Battery Replacement" />
                <ServiceCard title="Service Aksesoris" :imageSrc="aksesorisImg"
                    features="Headphone & TWS, Smartwatch, Power Bank, Game Console" />
            </div>
        </div>
    </section>
</template>


<script setup>
import { ref } from 'vue'
import ServiceCard from './ServiceCard.vue'


// Menggunakan import dengan path absolut
import smartphoneImg from '@/assets/smartphone.png'
import laptopImg from '@/assets/laptop.png'
import tabletImg from '@/assets/tablet.png'
import aksesorisImg from '@/assets/aksesoris.png'
</script>