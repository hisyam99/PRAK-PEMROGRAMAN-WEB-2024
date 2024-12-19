<template>
    <div class="card bg-base-100 shadow-xl transform-gpu hover:scale-105 transition-transform duration-300"
        data-aos="fade-up">
        <div class="card-body">
            <div class="flex items-center space-x-4 mb-4">
                <div class="avatar placeholder">
                    <div class="bg-primary text-white rounded-full w-12 h-12">
                        <span class="text-xl">
                            {{ name.charAt(0) }}
                        </span>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold">{{ name }}</h3>
                    <p class="text-sm text-base-content/70">{{ location }}</p>
                </div>
            </div>
            <p class="mb-4 italic">"{{ message }}"</p>
            <div class="rating rating-sm">
                <input v-for="n in 5" :key="n" type="radio" :checked="n <= parseInt(rating)"
                    class="mask mask-star-2 bg-primary" disabled />
            </div>
        </div>
    </div>
</template>


<script setup>
import { defineProps } from 'vue';


defineProps({
    name: {
        type: String,
        required: true
    },
    location: {
        type: String,
        required: true
    },
    rating: {
        type: String,
        required: true
    },
    message: {
        type: String,
        required: true
    }
});
</script>