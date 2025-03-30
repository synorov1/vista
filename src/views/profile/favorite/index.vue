<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig } from 'vue3-carousel';
import ItemCard from '@/components/cards/ItemCard.vue';
import data from '@/components/blocks/popularProducts.json';
import { usePageTitle } from '@/composables/usePageTitle';

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1,
  wrapAround: true,
  gap: 16,
  breakpoints: {
    768: {
      itemsToShow: 3,
    },
    1024: {
      itemsToShow: 4,
    },
    1440: {
      itemsToShow: 5,
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

usePageTitle('Избранное');
</script>

<template>
  <div class="favorite">
    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="product in data"
        :key="product.href"
        class="favorite__slide"
      >
        <ItemCard
          :content="product"
        />
      </Slide>

      <template #addons>
        <CarouselPagination class="favorite__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.favorite {
  margin-bottom: 40px;
  padding-bottom: 30px;
}

.favorite__slide {
  display: block;
  text-align: left;
}

.favorite__pagination {
  bottom: -30px;
}

@media (min-width: 768px) {
  .favorite {
    margin-bottom: 60px;
  }
}

@media (min-width: 1024px) {
  .favorite {
    margin-bottom: 80px;
  }
}

@media (min-width: 1440px) {
  .favorite {
    margin-bottom: 100px;
  }
}
</style>