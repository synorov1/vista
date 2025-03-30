<script setup lang="ts">
import {Carousel, Pagination as CarouselPagination, Slide, type CarouselExposed} from 'vue3-carousel';
import LeftArrowButton from '~/components/common/buttons/LeftArrowButton.vue';
import RightArrowButton from '~/components/common/buttons/RightArrowButton.vue';
import data from "@/components/blog/blogCarousel.json";
import BlogCarouselCard from "@/components/blog/BlogCarouselCard.vue";
import { ref } from 'vue';

const carouselRef = ref<CarouselExposed | null>();
</script>

<template>
  <div class="blog-carousel">
    <Carousel
      ref="carouselRef"
      :transition="600"
      :autoplay="2000"
      class="carousel carousel-button blog-carousel__carousel"
      wrap-around
      :mouse-drag="false"
      :touch-drag="false"
      :items-to-scroll="1"
      :items-to-show="1"
    >
      <Slide
        v-for="(item, index) in data"
        :key="index"
        class="blog-carousel__slide"
      >
        <BlogCarouselCard
          :image="item.image"
          :title="item.title"
          :theme="item.theme"
          :date="item.date"
          :text="item.text"
        />
      </Slide>

      <template #addons>
        <CarouselPagination class="blog-carousel__pagination" />
      </template>
    </Carousel>

    <div class="blog-carousel__navigation">
      <LeftArrowButton @click="carouselRef?.prev" />
      <RightArrowButton @click="carouselRef?.next" />
    </div>
  </div>
</template>

<style scoped>

.blog-carousel {
  position: relative;
}

.blog-carousel__slide {
  display: block;
  text-align: left;
}

.blog-carousel__navigation {
  display: none;
}

.blog-carousel__pagination {
  bottom: -30px;
}

@media (min-width: 768px) {
  .blog-carousel__navigation {
    display: flex;
    position: absolute;
    bottom: 30px;
    right: 30px;
    column-gap: 10px;
  }
}
</style>