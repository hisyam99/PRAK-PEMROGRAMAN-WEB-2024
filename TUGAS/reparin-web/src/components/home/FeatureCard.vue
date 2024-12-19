<template>
    <div class="card bg-base-100 shadow-xl transform-gpu hover:scale-105 transition-transform duration-300"
        data-aos="fade-up">
        <div class="card-body">
            <div class="flex items-center justify-center w-16 h-16 bg-primary text-white rounded-full mb-4">
                <i :class="icon" class="text-3xl"></i>
            </div>
            <h3 class="card-title">{{ title }}</h3>
            <p class="text-base-content/70">{{ description }}</p>
            <div class="mt-4 space-y-2">
                <div v-for="(feature, index) in featuresList" :key="index" class="flex items-center gap-2">
                    <i class="fas fa-check-circle text-primary"></i>
                    <span>{{ feature }}</span>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { defineProps, computed } from 'vue';


const props = defineProps({
    icon: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    },
    description: {
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