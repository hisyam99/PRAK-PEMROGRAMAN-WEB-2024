<template>
    <div class="card bg-base-200 shadow-xl overflow-hidden" data-aos="fade-left">
        <div class="card-body p-4 md:p-6">
            <form @submit.prevent="submitForm" id="contact-form" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" v-model="name" placeholder="Nama Lengkap" class="input input-bordered w-full"
                        required />
                    <input type="email" v-model="email" placeholder="Email" class="input input-bordered w-full"
                        required />
                </div>
                <input type="tel" v-model="phone" placeholder="Nomor Telepon" class="input input-bordered w-full"
                    required />
                <select v-model="service" class="select select-bordered w-full" required>
                    <option disabled selected>Pilih Layanan</option>
                    <option>Service Smartphone</option>
                    <option>Service Laptop</option>
                    <option>Service Tablet</option>
                    <option>Service Aksesoris</option>
                </select>
                <div class="form-control w-full">
                    <textarea v-model="message" class="textarea textarea-bordered h-24" placeholder="Tulis pesan Anda"
                        required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-full">
                    Kirim Pesan <i class="fas fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';


const name = ref('');
const email = ref('');
const phone = ref('');
const service = ref('');
const message = ref('');


const submitForm = () => {
    console.log({
        nama: name.value,
        email: email.value,
        telepon: phone.value,
        layanan: service.value,
        pesan: message.value
    });
    alert('Pesan Anda berhasil dikirim!');

    // Reset form
    name.value = '';
    email.value = '';
    phone.value = '';
    service.value = '';
    message.value = '';
};
</script>