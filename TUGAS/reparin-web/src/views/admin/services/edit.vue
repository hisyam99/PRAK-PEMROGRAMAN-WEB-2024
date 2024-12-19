<script setup>
import { ref, onMounted } from "vue";
import { useRouter, useRoute } from 'vue-router';
import api from "@/api";


const router = useRouter();
const route = useRoute();


const image = ref(null);
const name = ref('');
const description = ref('');
const category = ref('');
const priceRange = ref('');
const errors = ref({});


onMounted(async () => {
    try {
        const response = await api.get(`/api/services/${route.params.id}`);
        const service = response.data.data;

        name.value = service.name;
        description.value = service.description;
        category.value = service.category;
        priceRange.value = service.price_range;
    } catch (error) {
        console.error('Gagal mengambil detail layanan:', error);
    }
});


const handleFileChange = (e) => {
    image.value = e.target.files[0];
};


const updateService = async () => {
    const formData = new FormData();

    if (image.value) formData.append('image', image.value);
    formData.append('name', name.value);
    formData.append('description', description.value);
    formData.append('category', category.value);
    formData.append('price_range', priceRange.value);
    formData.append('_method', 'PATCH');


    try {
        await api.post(`/api/services/${route.params.id}`, formData, {
            headers: { 'Content-Type': 'multipart/form-data' }
        });
        router.push('/admin/services');
    } catch (error) {
        errors.value = error.response?.data?.errors || {};
    }
};
</script>


<template>
    <div class="container mx-auto px-4 py-8">
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-2xl mb-6">Edit Layanan</h2>
                <form @submit.prevent="updateService" class="space-y-4">
                    <!-- Image Upload -->
                    <div>
                        <label class="label">
                            <span class="label-text font-bold">Gambar Layanan</span>
                        </label>
                        <input type="file" class="file-input file-input-bordered w-full" @change="handleFileChange"
                            accept="image/*" />
                        <p v-if="errors.image" class="text-error mt-1">
                            {{ errors.image[0] }}
                        </p>
                    </div>


                    <!-- Name -->
                    <div>
                        <label class="label">
                            <span class="label-text font-bold">Nama Layanan</span>
                        </label>
                        <input type="text" v-model="name" placeholder="Masukkan nama layanan"
                            class="input input-bordered w-full" />
                        <p v-if="errors.name" class="text-error mt-1">
                            {{ errors.name[0] }}
                        </p>
                    </div>




                    <!-- Description -->
                    <div>
                        <label class="label">
                            <span class="label-text font-bold">Deskripsi</span>
                        </label>
                        <textarea v-model="description" placeholder="Masukkan deskripsi layanan"
                            class="textarea textarea-bordered w-full h-24"></textarea>
                        <p v-if="errors.description" class="text-error mt-1">
                            {{ errors.description[0] }}
                        </p>
                    </div>




                    <!-- Category -->
                    <div>
                        <label class="label">
                            <span class="label-text font-bold">Kategori</span>
                        </label>
                        <input type="text" v-model="category" placeholder="Masukkan kategori layanan"
                            class="input input-bordered w-full" />
                        <p v-if="errors.category" class="text-error mt-1">
                            {{ errors.category[0] }}
                        </p>
                    </div>




                    <!-- Price Range -->
                    <div>
                        <label class="label">
                            <span class="label-text font-bold">Rentang Harga</span>
                        </label>
                        <input type="text" v-model="priceRange" placeholder="Masukkan rentang harga"
                            class="input input-bordered w-full" />
                        <p v-if="errors.price_range" class="text-error mt-1">
                            {{ errors.price_range[0] }}
                        </p>
                    </div>




                    <!-- Submit Button -->
                    <div class="card-actions justify-end mt-6">
                        <button type="submit" class="btn btn-primary">
                            Update Layanan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>