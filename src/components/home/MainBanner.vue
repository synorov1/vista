<script setup lang="ts">
import { ref } from 'vue';
import { Carousel, Slide, Pagination } from 'vue3-carousel';
import type { CarouselExposed } from 'vue3-carousel';
import type { IImg, ISource } from '@/types';

interface IBannerItem {
  id: number;
  source: ISource[];
  img: IImg;
}

defineProps<{
  data: IBannerItem[];
}>();

const carouselRef = ref<CarouselExposed | null>(null); // Указываем начальное значение null
</script>

<template>
  <section class="section">
    <Carousel
      ref="carouselRef"
      :transition="600"
      class="carousel carousel-button"
      wrap-around
      :items-to-scroll="1"
      :items-to-show="1"
    >
      <Slide
        v-for="{ id, source, img } in data"
        :key="id"
        class="slide"
      >
        <picture class="picture">
          <source
            v-for="(item, index) in source"
            :key="index"
            v-bind="item"
          >
          <img
            v-bind="img"
            class="image"
          >
        </picture>
      </Slide>

      <template #addons>
        <Pagination v-if="data.length > 1" />
      </template>
    </Carousel>
  </section>
</template>

<style scoped>
.section {
  --vc-png-bottom: -16px;
  --section-margin: 40px;

  margin-bottom: calc(var(--section-margin) - var(--vc-png-bottom));

  @media (min-width: 768px) {
    --section-margin: 50px;
  }
  @media (min-width: 1024px) {
    --section-margin: 80px;
  }
}

.slide {
  display: block;
  text-align: left;
}

.picture {
  display: flex;
  align-items: center;
  justify-content: center;
}

.image {
  display: block;
  object-fit: contain;
  max-width: 100%;
  height: auto;
  object-position: center;
  border-radius: unset;
}
</style>