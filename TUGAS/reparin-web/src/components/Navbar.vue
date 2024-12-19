<template>
    <nav class="navbar bg-base-100/80 backdrop-blur-lg shadow-md sticky top-0 left-0 right-0 z-50">
        <div class="navbar-start">
            <!-- Hamburger Menu (Mobile) -->
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100/80 backdrop-blur-lg rounded-box w-52">
                    <li v-for="item in menuItems" :key="item.id">
                        <router-link :to="item.href">{{ item.label }}</router-link>
                    </li>
                </ul>
            </div>
            <!-- Logo -->
            <router-link to="/" class="btn btn-ghost px-2">
                <img src="../assets/reparin-icon.png" alt="Reparin" class="h-8 light-logo" />
                <img src="../assets/reparin-icon-dark.png" alt="Reparin" class="h-8 dark-logo" />
            </router-link>
        </div>
        <div class="navbar-end flex items-center">
            <!-- Theme Switcher -->
            <ThemeToggle class="mr-4" />
            <!-- Navigation Links -->
            <ul class="menu menu-horizontal px-1 hidden lg:flex">
                <li v-for="item in menuItems" :key="item.id">
                    <router-link :to="item.href">{{ item.label }}</router-link>
                </li>
            </ul>
            <!-- Login/User Section -->
            <div v-if="isAuthenticated" class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="User avatar" :src="userAvatar" />
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <router-link to="/profile" class="justify-between">
                            Profile
                        </router-link>
                    </li>
                    <li @click="logout">
                        <a>Logout</a>
                    </li>
                </ul>
            </div>
            <router-link v-else to="/login" class="btn btn-primary ml-2">
                Login
            </router-link>
        </div>
    </nav>
</template>


<script setup>
import { ref } from 'vue'
import ThemeToggle from './ThemeToggle.vue'


// Definisikan prop untuk tema
const props = defineProps({
    currentTheme: {
        type: String,
        default: 'winter'
    }
})


// Emit untuk toggle theme
const emit = defineEmits(['toggle-theme'])


// Definisi menu items dengan router link
const menuItems = [
    { id: 'home', label: 'Home', href: '/' },
    { id: 'features', label: 'Features', href: '/features' },
    { id: 'services', label: 'Services', href: '/services' },
    { id: 'testimonials', label: 'Testimoni', href: '/testimonials' },
    { id: 'contact', label: 'Contact', href: '/#contact' }
]


// Contoh state autentikasi
const isAuthenticated = ref(false)
const userAvatar = ref('https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg')


// Fungsi logout
const logout = () => {
    isAuthenticated.value = false
}
</script>


<style scoped>
.router-link-active {
    font-weight: bold;
    color: var(--primary-color);
}


/* Responsive adjustments */
@media (max-width: 1024px) {
    .navbar-center {
        display: none;
    }
}
</style>