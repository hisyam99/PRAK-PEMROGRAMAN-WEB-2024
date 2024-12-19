<template>
    <div>
        <section id="home" class="min-h-screen relative overflow-hidden">
            <HeroSection />
        </section>
        <StatsSection />
        <FeaturesSection />
        <ServicesSection />
        <ProcessSection />
        <TestimonialsSection />
        <BookingSection />
        <ContactSection />
    </div>
</template>
<script setup>
import HeroSection from '../components/home/HeroSection.vue';
import StatsSection from '../components/home/StatsSection.vue';
import FeaturesSection from '../components/home/FeaturesSection.vue';
import ServicesSection from '../components/home/ServicesSection.vue';
import ProcessSection from '../components/home/ProcessSection.vue';
import TestimonialsSection from '../components/home/TestimonialsSection.vue';
import BookingSection from '../components/home/BookingSection.vue';
import ContactSection from '../components/home/ContactSection.vue';
</script>