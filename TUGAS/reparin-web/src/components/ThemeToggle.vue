<template>
    <label class="swap swap-rotate relative w-16 h-8">
        <input type="checkbox" class="theme-controller toggle toggle-primary h-8 w-16" :checked="theme === 'dark'"
            @change="toggleTheme" data-toggle-theme="dark,winter" data-act-class="checked" />
        <div class="swap-on absolute inset-0 flex items-center justify-between px-2 pointer-events-none">
            <i class="fas fa-moon text-base-600 text-lg"></i>
            <div class="w-8"></div>
        </div>
        <div class="swap-off absolute inset-0 flex items-center justify-between px-2 pointer-events-none">
            <div class="w-8"></div>
            <i class="fas fa-sun text-yellow-500 text-lg"></i>
        </div>
    </label>
</template>


<script setup>
import { inject } from 'vue'
import { themeChange } from 'theme-change'


// Inject tema dari parent
const theme = inject('current-theme')


const toggleTheme = () => {
    const newTheme = theme.value === 'winter' ? 'dark' : 'winter'

    // Set attribute pada elemen HTML
    document.documentElement.setAttribute('data-theme', newTheme)

    // Simpan tema ke localStorage
    localStorage.setItem("theme", newTheme)

    // Update theme value
    theme.value = newTheme
}
</script>


<style scoped>
.swap input {
    z-index: 1;
}

.swap-on,
.swap-off {
    z-index: 2;
}
</style>