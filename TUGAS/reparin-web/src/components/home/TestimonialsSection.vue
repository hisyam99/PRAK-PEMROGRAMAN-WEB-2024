<template>
    <section id="testimonials" class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">Testimoni Pelanggan</h2>
                <p class="text-lg opacity-80 max-w-2xl mx-auto">
                    Apa kata mereka tentang layanan Reparin
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <TestimonialCard name="Muhammad Hisyam Kamil" location="Malang" rating="5"
                    message="Pelayanan sangat cepat dan profesional." />
                <TestimonialCard name="Ahmad Syahputra" location="Jakarta" rating="5"
                    message="Service cepat dan profesional. Teknisinya ramah dan menjelaskan masalah dengan detail. Recommended!" />
                <TestimonialCard name="Linda Wijaya" location="Surabaya" rating="4"
                    message="Kualitas sparepart terjamin original. Harga transparan dan ada garansi service. Sangat puas!" />
            </div>
        </div>
    </section>
</template>


<script setup>
import TestimonialCard from './TestimonialCard.vue';
</script>