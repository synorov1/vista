<script setup lang="ts">

import ServiceInfo from "@/components/servicesList/ServiceInfo.vue";
import GradientBanner from "@/components/common/GradientBanner.vue";
import currentService from './currentService.json';
</script>

<template>
<div class="service">
  <GradientBanner
      :title="currentService.title"
      :image-src="currentService.bannerImage"
      :subtitle="currentService.text"
      :price="currentService.price"
      class="currentService-banner"
  />

  <ServiceInfo
      :title="currentService.title"
      :text="currentService.text"
      :price="currentService.price"
      :bannerImage="currentService.bannerImage"
      :imageFirst="currentService.imageFirst"
      :imageSecond="currentService.imageSecond"
      :description="currentService.description"
  />
</div>
</template>

<style scoped>
  .currentService-banner {
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

 .service__banner > img {
    height: unset !important;
  }
</style>