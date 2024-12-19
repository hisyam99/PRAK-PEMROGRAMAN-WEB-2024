<template>
    <section class="py-12 bg-base-100">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <StatCard icon="fas fa-users" value="50K+" title="Pelanggan Puas" />
                <StatCard icon="fas fa-tools" value="100+" title="Teknisi Ahli" />
                <StatCard icon="fas fa-store" value="30+" title="Cabang" />
                <StatCard icon="fas fa-star" value="4.9" title="Rating Google" />
            </div>
        </div>
    </section>
</template>


<script setup>
import StatCard from './StatCard.vue';
</script>