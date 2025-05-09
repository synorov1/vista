<script setup lang="ts">

import ServiceInfo from "@/components/servicesList/ServiceInfo.vue";
import GradientBanner from "@/components/common/GradientBanner.vue";
import currentService from './currentService.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Сервис');
</script>

<template>
  <div>
    <GradientBanner
      :title="currentService.title"
      :image-src="currentService.bannerImage"
      :subtitle="currentService.text"
      :price="currentService.price"
      :class="$style.banner"
    />

    <ServiceInfo
      :title="currentService.title"
      :text="currentService.text"
      :price="currentService.price"
      :banner-image="currentService.bannerImage"
      :image-first="currentService.imageFirst"
      :image-second="currentService.imageSecond"
      :description="currentService.description"
    />
  </div>
</template>

<style module>
.banner {
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