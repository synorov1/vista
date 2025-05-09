<template>
  <div class="services">
    <ServicesCarousel class="services-carousel" />
    <ServicesList class="services-list" />
  </div>
</template>

<script setup lang="ts">
import ServicesList from "@/components/servicesList/ServicesList.vue";
import ServicesCarousel from "@/components/serviceCarousel/ServicesCarousel.vue";
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Услуги');
</script>

<style>
.services-carousel {
  margin-bottom: 40px;

  @media (min-width: 321px) {
    margin-bottom: 95px;
  }

  @media (min-width: 769px) {
    margin-bottom: 115px;
  }

  @media (min-width: 1025px) {
    margin-bottom: 135px;
  }
}

.services-list {
  margin-bottom: 40px;

  @media (min-width: 321px) {
    margin-bottom: 60px;
  }

  @media (min-width: 769px) {
    margin-bottom: 80px;
  }

  @media (min-width: 1025px) {
    margin-bottom: 100px;
  }
}

</style>
