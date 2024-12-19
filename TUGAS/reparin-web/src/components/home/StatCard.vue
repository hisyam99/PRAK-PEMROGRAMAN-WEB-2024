<template>
    <div class="card bg-base-100 shadow-xl transform-gpu hover:scale-105 transition-transform duration-300"
        data-aos="fade-up">
        <div class="card-body items-center text-center">
            <div class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center mb-4">
                <i :class="icon" class="text-3xl"></i>
            </div>
            <h2 class="card-title text-4xl font-bold text-primary">{{ value }}</h2>
            <p class="text-base-content/70">{{ title }}</p>
        </div>
    </div>
</template>


<script setup>
import { defineProps } from 'vue';


defineProps({
    icon: {
        type: String,
        required: true
    },
    value: {
        type: String,
        required: true
    },
    title: {
        type: String,
        required: true
    }
});
</script>