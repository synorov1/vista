<template>
  <Carousel
    :gap="30"
    :transition="600"
    :autoplay="2000"
    class="services-carousel"
    :mouse-drag="false"
    :touch-drag="false"
    wrap-around
    :items-to-scroll="1"
    :items-to-show="1"
  >
    <Slide
      v-for="(item, index) in serviceCarouselItems"
      :key="index"
      class="services-carousel__slide"
    >
      <GradientBanner
        :title="item.title"
        :image-src="item.image"
        :subtitle="item.text"
      />
    </Slide>

    <template #addons>
      <CarouselPagination class="services-carousel-pagination" />
    </template>
  </Carousel>
</template>

<script setup lang="ts">
import { Carousel, Pagination as CarouselPagination, Slide } from 'vue3-carousel';
import GradientBanner from "@/components/common/GradientBanner.vue";
import serviceCarouselItems from "./serviceCarouselItems.json"
</script>

<style scoped>

.services-carousel {
  border-radius: 20px;
  --vc-pgn-background-color: var(--gray-100-color) ;
  --vc-pgn-width: 30px ;
  --vc-pgn-height: 5px ;
  --vc-pgn-active-color: var( --blue-400-color) ;
  --vc-pgn-border-radius: 30px ;
  --vc-pgn-margin: 6px ;
}

.services-carousel__slide {
  display: block;
}

.services-carousel-pagination {
  display: none;
  bottom: -36px;

  @media (min-width: 321px) {
    display: flex;
  }
}
</style>