<script setup lang='ts'>
import MainBanner from '@/components/home/MainBanner.vue';
import PopularCategories from '@/components/home/PopularCategories.vue';
import HotDeals from '@/components/home/HotDeals.vue';
import ReklamaBanner from '@/components/home/ReklamaBanner.vue';
import BestOffers from '@/components/home/BestOffers.vue';
import BrandList from '@/components/home/BrandList.vue';
import ArticlesSection from '@/components/home/ArticlesSection.vue';
import { usePageTitle } from '@/composables/usePageTitle';

import data from '@/views/index.json';

usePageTitle('Главная');

const routes = [
  { path: '/catalog', label: '/catalog' },
  { path: '/catalog/blades', label: '/catalog/blades' },
  { path: '/catalog/blades/product', label: '/catalog/blades/product' },
  { path: '/catalog/blades/product/reviews', label: '/catalog/blades/product/reviews' },
  { path: '/components', label: '/components' },
  { path: '/404', label: '/404' },
  { path: '/returns', label: '/returns' },
  { path: '/delivery', label: '/delivery' },
  { path: '/services', label: '/services' },
  { path: '/reviews', label: '/reviews' },
  { path: '/service', label: '/service' },
  { path: '/blog', label: '/blog' },
  { path: '/post', label: '/post' },
  { path: '/games', label: '/games' },
  { path: '/shop', label: '/shop' },
  { path: '/about', label: '/about' },
  { path: '/contacts', label: '/contacts' },
  { path: '/profile', label: '/profile' },
  { path: '/profile/favorite', label: '/profile/favorite' },
  { path: '/profile/orders', label: '/profile/orders' },
  { path: '/profile/reviews', label: '/profile/reviews' },
  { path: '/profile/history', label: '/profile/history' }
];
</script>

<template>
  <MainBanner :data="data.mainBanner" />

  <!--  Популярные категории-->
  <PopularCategories :data="data.popularCategories" />

  <!--  Горячие скидки-->
  <HotDeals :data="data.hotDeals" />

  <ReklamaBanner :data="data.reklamaTop" />

  <!--  Выгодные предложения-->
  <BestOffers :data="data.bestOffers" />

  <ReklamaBanner :data="data.reklamaBottom" />

  <!--  Бренды  в продаже-->
  <BrandList :data="data.brandList" />

  <!--  Полезные статьи-->
  <ArticlesSection :data="data.articlesSection" />

  <div :class="$style.routesContainer">
    <router-link
      v-for="route in routes"
      :key="route.path"
      :class="$style.link"
      :to="route.path"
    >
      {{ route.label }}
    </router-link>
  </div>
</template>

<style>
@layer home {
  .container {
    display: block;

    @media (min-width: 1024px) {
      --bs-gutter-x: 0;

      max-width: 964px;
    }
    @media (min-width: 1440px) {
      max-width: 1200px;
    }
  }
}
</style>

<style module>
.routesContainer {
  display: grid;
  grid-template-columns: 1fr;
  gap: 8px;
  margin-top: 60px;
  margin-bottom: 60px;
}

.link {
  font-size: 16px;
  font-weight: 500;
  color: var(--blue-400-color);
  text-decoration: none;
  padding: 8px;
  border-radius: 4px;
  transition: background-color 0.2s;
}

.link:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

@media (min-width: 768px) {
  .routesContainer {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (min-width: 1024px) {
  .routesContainer {
    grid-template-columns: repeat(4, 1fr);
  }
}
</style>
