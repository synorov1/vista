<script lang="ts" setup>
import PostArticlesCard from '@/components/post/PostArticlesCard.vue';
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';
import { ref, type PropType } from 'vue';

const props = defineProps({
  list: {
    type: Array as PropType<any[]>,
    required: true,
  }
})

const carouselRef = ref<CarouselExposed | null>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1.1,
  wrapAround: true,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 1.5,
      gap: 30
    },
    1024: {
      itemsToShow: 2,
      gap: 30
    },
    1440: {
      itemsToShow: 3,
      gap: 30
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
  <section class="post-articles">
    <div class="post-articles__title-wrap">
      <router-link class="post-articles__title-link" to="/">
        Читать все
      </router-link>

      <h3 class="post-articles__title">
        Полезные статьи
      </h3>

      <RoundButton class="post-articles__title-button" text="Читать все" />

      <div class="post-articles__navigation">
        <LeftArrowButton @click="carouselRef?.prev" />
        <RightArrowButton @click="carouselRef?.next" />
      </div>
    </div>

    <Carousel
      ref="carouselRef"
      class="carousel post-articles__carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(article, index) in props.list"
        :key="index"
        class="post-articles__slide"
      >
        <PostArticlesCard
          :image="article.image"
          :title="article.title"
          :text="article.text"
          :is-important="article.isImportant"
        />
      </Slide>

      <template #addons>
        <CarouselPagination class="post-articles__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </section>
</template>

<style scoped>
.post-articles__title {
  margin-bottom: 20px;
}

.post-articles__slide {
  display: block;
  text-align: left;
}

.post-articles__pagination {
  bottom: -20px;
}

@media (min-width: 768px) {
  .post-articles__title {
    margin-bottom: 30px;
  }
}
</style>