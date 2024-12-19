<template>
    <div class="card bg-base-100 shadow-xl transform-gpu hover:scale-105 transition-transform duration-300"
        data-aos="fade-up">
        <div class="card-body items-center text-center">
            <div
                class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center mb-4 text-2xl font-bold">
                {{ step }}
            </div>
            <h3 class="card-title">{{ title }}</h3>
            <p class="text-base-content/70 text-center">{{ description }}</p>
            <div class="mt-4 w-full border-t border-base-200 pt-4 text-center">
                <span class="text-primary font-semibold">Langkah {{ step }}</span>
            </div>
        </div>
    </div>
</template>


<script setup>
import { defineProps } from 'vue';


defineProps({
    step: {
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
    }
});
</script>