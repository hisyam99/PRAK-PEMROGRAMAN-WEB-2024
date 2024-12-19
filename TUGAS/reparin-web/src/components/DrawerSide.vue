<template>
    <div class="drawer-side z-20">
        <label for="my-drawer-3" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-200">
            <li v-for="(item, index) in menuItems" :key="index">
                <a :href="item.link">{{ item.label }}</a>
            </li>
        </ul>
    </div>
</template>


<script setup>
import { ref } from 'vue';


const menuItems = ref([
    { label: 'Beranda', link: '#home' },
    { label: 'Fitur', link: '#features' },
    { label: 'Layanan', link: '#services' },
    { label: 'Testimoni', link: '#testimonials' },
    { label: 'Kontak', link: '#contact' }
]);
</script>