<template>
    <section id="process" class="py-20 bg-base-200">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold mb-4">Cara Kerja Kami</h2>
                <p class="text-lg opacity-80 max-w-2xl mx-auto">
                    Proses service yang transparan dan profesional untuk kepuasan
                    pelanggan
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <ProcessStep step="1" title="Konsultasi"
                    description="Diagnosa awal gratis dan estimasi biaya yang transparan" />
                <ProcessStep step="2" title="Pemeriksaan" description="Analisa mendalam oleh teknisi profesional" />
                <ProcessStep step="3" title="Perbaikan" description="Proses service dengan sparepart original" />
                <ProcessStep step="4" title="Serah Terima" description="Testing final dan garansi service" />
            </div>
        </div>
    </section>
</template>


<script setup>
import ProcessStep from './ProcessStep.vue';
</script>