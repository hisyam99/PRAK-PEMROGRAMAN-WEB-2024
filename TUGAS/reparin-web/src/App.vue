<script setup>
import { ref, onMounted, provide } from 'vue'
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'
import { themeChange } from 'theme-change'


// Inisialisasi tema dari localStorage atau default
const theme = ref('winter')


onMounted(() => {
  // Cek tema yang disimpan di localStorage
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme) {
    theme.value = savedTheme;
    document.documentElement.setAttribute("data-theme", savedTheme);
  }


  // Pastikan theme-change diinisialisasi
  themeChange(false)
});


const toggleTheme = () => {
  // Toggle antara 'winter' dan 'dark'
  const newTheme = theme.value === 'winter' ? 'dark' : 'winter'

  // Set attribute pada elemen HTML
  document.documentElement.setAttribute('data-theme', newTheme)

  // Simpan tema ke localStorage
  localStorage.setItem("theme", newTheme)

  // Update theme value
  theme.value = newTheme
}


// Sediakan tema sebagai global provide
provide('current-theme', theme)
</script>


<template>
  <div :data-theme="theme">
    <Navbar @toggle-theme="toggleTheme" :current-theme="theme" />
    <router-view class="min-h-screen"></router-view>
    <Footer :theme="theme" />
  </div>
</template>