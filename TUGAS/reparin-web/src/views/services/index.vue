<script setup>
import { ref, onMounted, computed } from 'vue';
import api from '@/api';


// State untuk layanan dan filter
const services = ref([]);
const loading = ref(false);
const error = ref(null);
const selectedCategory = ref('Semua Kategori');


// Fetch layanan
const fetchDataServices = async () => {
    loading.value = true;
    error.value = null;
    try {
        const response = await api.get('/api/services');
        services.value = response.data.data.data;
    } catch (err) {
        error.value = 'Gagal mengambil data layanan';
        console.error(err);
    } finally {
        loading.value = false;
    }
};


// Dapatkan kategori unik
const categories = computed(() => {
    const uniqueCategories = ['Semua Kategori', ...new Set(services.value.map(service => service.category))];
    return uniqueCategories;
});


// Filter layanan berdasarkan kategori
const filteredServices = computed(() => {
    if (selectedCategory.value === 'Semua Kategori') {
        return services.value;
    }
    return services.value.filter(service => service.category === selectedCategory.value);
});


// Lifecycle hook
onMounted(fetchDataServices);
</script>


<template>
    <div class="container mx-auto px-4 py-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-base-content mb-4">Layanan Kami</h1>

            <!-- Kategori Filter -->
            <div class="flex flex-wrap gap-2 mb-6">
                <button v-for="category in categories" :key="category" @click="selectedCategory = category" :class="[
                    'btn',
                    selectedCategory === category
                        ? 'btn-primary'
                        : 'btn-ghost'
                ]">
                    {{ category }}
                </button>
            </div>
        </div>


        <!-- Loading State -->
        <div v-if="loading" class="flex justify-center items-center min-h-[50vh]">
            <span className="loading loading-spinner loading-lg"></span>
        </div>


        <!-- Error State -->
        <div v-else-if="error" class="alert alert-error shadow-lg">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ error }}</span>
            </div>
        </div>


        <!-- Empty State -->
        <div v-else-if="filteredServices.length === 0" class="text-center py-12">
            <div class="alert alert-warning inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 mr-2" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span>Tidak ada layanan yang tersedia untuk kategori ini</span>
            </div>
        </div>


        <!-- Layanan Grid -->
        <div v-else class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div v-for="service in filteredServices" :key="service.id"
                class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 ease-in-out">
                <figure class="px-4 pt-4">
                    <img :src="service.image" :alt="service.name" class="rounded-xl object-cover h-48 w-full" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title text-lg">{{ service.name }}</h2>
                    <p class="text-sm text-base-content/70 line-clamp-2">
                        {{ service.description }}
                    </p>
                    <div class="card-actions justify-between items-center mt-2">
                        <span class="badge badge-primary">{{ service.category }}</span>
                        <span class="text-sm font-bold">{{ service.price_range }}</span>
                    </div>
                    <div class="card-actions justify-end mt-4">
                        <button class="btn btn-primary btn-sm">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>