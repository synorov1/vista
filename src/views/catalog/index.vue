<template>
  <Categories />
  <PopularProducts />
</template>

<script setup lang="ts">
import Categories from '@/components/blocks/Categories.vue';
import PopularProducts from '@/components/blocks/PopularProducts.vue';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Каталог');
</script>

<style module>
</style>
