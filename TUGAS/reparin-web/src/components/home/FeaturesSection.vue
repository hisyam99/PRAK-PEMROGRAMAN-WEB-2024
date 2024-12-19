<template>
    <section id="features" class="py-20 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">Kenapa Memilih Reparin?</h2>
                <p class="text-lg opacity-80 max-w-2xl mx-auto">
                    Kami menggabungkan teknologi modern dan keahlian profesional untuk
                    memberikan layanan terbaik bagi pelanggan kami.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <FeatureCard icon="fas fa-bolt-lightning" title="Service Express 1 Jam"
                    description="Layanan perbaikan cepat untuk kerusakan ringan dengan teknisi profesional dan garansi penuh."
                    features="Diagnosis gratis, Sparepart original, Garansi 90 hari" />
                <FeatureCard icon="fas fa-shield-halved" title="Garansi Terpercaya"
                    description="Jaminan kualitas dengan garansi layanan hingga 90 hari dan garansi uang kembali."
                    features="Garansi sparepart, Uang kembali, Asuransi service" />
                <FeatureCard icon="fas fa-user-gear" title="Teknisi Profesional"
                    description="Tim teknisi berpengalaman dengan sertifikasi resmi dari berbagai brand ternama."
                    features="Bersertifikasi, >5 tahun pengalaman, Training berkala" />
            </div>
        </div>
    </section>
</template>


<script setup>
import FeatureCard from './FeatureCard.vue';
</script>