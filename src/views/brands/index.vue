<template>
  <div :class="$style.brands">
    <GradientBanner
      :class="$style.banner"
      title="Бренды" 
      image-src="#"
      subtitle="В нашем интернет-магазине представлена только оригинальная продукция популярных брендов. Мы гарантируем 100% качество товара."
    />

    <BrandsList />
  </div>
</template>

<script setup lang="ts">
import GradientBanner from "@/components/common/GradientBanner.vue";
import BrandsList from "@/components/brandsList/BrandsList.vue";
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Бренды');
</script>

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