<template>
    <div class="card bg-base-100 shadow-xl transform-gpu hover:scale-105 transition-transform duration-300"
        data-aos="fade-up">
        <figure class="px-6 pt-6">
            <img :src="imageSrc" :alt="title" class="rounded-xl object-contain w-full h-48" />
        </figure>
        <div class="card-body items-center text-center">
            <h2 class="card-title">{{ title }}</h2>
            <div class="space-y-2 mt-2">
                <div v-for="(feature, index) in featuresList" :key="index"
                    class="flex items-center gap-2 justify-center">
                    <i class="fas fa-check-circle text-primary"></i>
                    <span>{{ feature }}</span>
                </div>
            </div>
            <div class="card-actions mt-4">
                <a href="#contact" class="btn btn-primary btn-sm">
                    Booking Service
                </a>
            </div>
        </div>
    </div>
</template>


<script setup>
import { defineProps, computed } from 'vue';


const props = defineProps({
    title: {
        type: String,
        required: true
    },
    imageSrc: {
        type: String,
        required: true
    },
    features: {
        type: String,
        required: true
    }
});


const featuresList = computed(() => props.features.split(', '));
</script>