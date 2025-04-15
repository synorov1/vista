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
  <section :class="$style.postArticles">
    <div :class="$style.titleWrap">
      <router-link :class="$style.titleLink" to="/">
        Читать все
      </router-link>

      <h3 :class="$style.title">
        Полезные статьи
      </h3>

      <RoundButton :class="$style.titleButton" text="Читать все" />

      <div :class="$style.navigation">
        <LeftArrowButton @click="carouselRef?.prev" />
        <RightArrowButton @click="carouselRef?.next" />
      </div>
    </div>

    <Carousel
      ref="carouselRef"
      :class="[$style.carousel, $style.carouselProgress]"
      v-bind="config"
    >
      <Slide
        v-for="(article, index) in props.list"
        :key="index"
        :class="$style.slide"
      >
        <PostArticlesCard
          :image="article.image"
          :title="article.title"
          :text="article.text"
          :is-important="article.isImportant"
        />
      </Slide>

      <template #addons>
        <CarouselPagination :class="[$style.pagination, $style.carouselProgressPagination]" />
      </template>
    </Carousel>
  </section>
</template>

<style module>
.title {
  margin-bottom: 20px;
}

.slide {
  display: block;
  text-align: left;
}

.pagination {
  bottom: -20px;
}

@media (min-width: 768px) {
  .title {
    margin-bottom: 30px;
  }
}
</style>