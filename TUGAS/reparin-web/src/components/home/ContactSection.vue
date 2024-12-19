<template>
    <section id="contact" class="py-8 md:py-20 bg-base-100 overflow-x-hidden">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center mb-8 md:mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-bold mb-3 md:mb-4">
                    Hubungi Kami
                </h2>
                <p class="text-base md:text-lg opacity-80 max-w-2xl mx-auto px-4">
                    Kami siap membantu menyelesaikan masalah gadget Anda
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8 max-w-6xl mx-auto">
                <ContactInfo />
                <ContactForm />
            </div>
        </div>
    </section>
</template>


<script setup>
import ContactInfo from './ContactInfo.vue';
import ContactForm from './ContactForm.vue';
</script>