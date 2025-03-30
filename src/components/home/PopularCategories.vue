<script setup lang="ts">
import { ref } from 'vue';
import type { IBaseList } from '@/types'
import { Carousel, Slide, Pagination } from 'vue3-carousel';
import type { CarouselConfig, CarouselExposed } from 'vue3-carousel';

import TtileWithArrow from '@/components/common/TtileWithArrow.vue';

interface IPopularCategories extends IBaseList {}

defineProps<{
  data: IPopularCategories;
}>();


const carouselRef = ref<CarouselExposed | null>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 2.2,
  wrapAround: true,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 3,
      gap: 16
    },
    1024: {
      itemsToShow: 4,
      gap: 16
    },
    1440: {
      itemsToShow: 5,
      gap: 16
    },
  },
  itemsToScroll: 1,
  height: '',
  i18n: {},
  enabled: true,
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  slideEffect: 'slide',
};
</script>

<template>
  <section :class="$style.section">
    <TtileWithArrow
      :title="data.title"
      :button-text="data.button.title ?? ''"
      :class="$style.header"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
      @button-click="() => console.log(data.button?.title)"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="{ title, img } in data.items"
        :key="title"
        class="flex-col"
        :class="$style.card"
      >
        <img v-bind="img" :class="$style.image">
        <div :class="$style.title">
          {{ title }}
        </div>
      </Slide>

      <template #addons>
        <Pagination class="carousel-progress__pagination" />
      </template>
    </Carousel>
  </section>
</template>

<style module>
.section {
  --vc-png-bottom: -20px;
  --section-margin: 50px;

  margin-right: -0.75rem;
  margin-bottom: calc(var(--section-margin) - var(--vc-png-bottom));

  @media (min-width: 768px) {
    --section-margin: 60px;
    margin-right: initial;
  }
  @media (min-width: 1024px) {
    --section-margin: 100px;
  }
}
.header {
  margin-bottom: 20px;

  @media (min-width: 768px) {
    margin-bottom: 30px;
  }
}
.card {
  height: 150px;
  padding-bottom: 20px;
  border-radius: 14px;
  background: #F5F6FA;

  @media (min-width: 768px) {
    padding-bottom: 30px;
  }
}
.image {
  margin-top: auto;
  margin-bottom: auto;
  width: 100%;
}
.title {
  font-size: 14px;
  font-weight: 700;
  line-height: normal;
}
</style>