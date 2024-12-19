<script setup>
import { ref, onMounted } from 'vue';
import api from '@/api';


const services = ref([]);
const loading = ref(false);
const error = ref(null);


const fetchDataServices = async () => {
    loading.value = true;
    error.value = null;
    try {
        const response = await api.get('/api/services');
        // Sesuaikan dengan struktur respons API Anda
        services.value = response.data.data.data;
    } catch (err) {
        error.value = 'Gagal mengambil data layanan';
        console.error(err);
    } finally {
        loading.value = false;
    }
};


const deleteService = async (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus layanan ini?')) {
        try {
            await api.delete(`/api/services/${id}`);
            fetchDataServices(); // Refresh the list
        } catch (err) {
            error.value = 'Gagal menghapus layanan';
            console.error(err);
        }
    }
};


onMounted(fetchDataServices);
</script>


<template>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-base-content">Daftar Layanan</h1>
            <router-link :to="{ name: 'admin.services.create' }" class="btn btn-primary">
                <i class="fas fa-plus mr-2"></i>
                Tambah Layanan Baru
            </router-link>
        </div>


        <div class="card bg-base-100 shadow-xl">
            <div class="card-body overflow-x-auto">
                <!-- Loading State -->
                <div v-if="loading" class="flex justify-center items-center py-8">
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


                <!-- Data Table -->
                <table v-else class="table table-zebra w-full">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Layanan</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Rentang Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Empty State -->
                        <tr v-if="services.length === 0">
                            <td colspan="6" class="text-center py-4">
                                <div class="alert alert-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 mr-2"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span>Belum ada data layanan tersedia</span>
                                </div>
                            </td>
                        </tr>


                        <!-- Data Rows -->
                        <tr v-else v-for="service in services" :key="service.id">
                            <td>
                                <div class="avatar">
                                    <div class="w-16 rounded">
                                        <img :src="service.image" alt="Layanan" />
                                    </div>
                                </div>
                            </td>
                            <td>{{ service.name }}</td>
                            <td>{{ service.description }}</td>
                            <td>{{ service.category }}</td>
                            <td>{{ service.price_range }}</td>
                            <td>
                                <div class="flex space-x-2">
                                    <router-link :to="{ name: 'admin.services.edit', params: { id: service.id } }"
                                        class="btn btn-sm btn-primary">
                                        Edit
                                    </router-link>
                                    <button @click.prevent="deleteService(service.id)" class="btn btn-sm btn-error">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>


<style scoped>
/* Optional: tambahkan transisi lembut */
.table-enter-active,
.table-leave-active {
    transition: all 0.3s ease;
}


.table-enter-from,
.table-leave-to {
    opacity: 0;
    transform: translateY(10px);
}
</style>