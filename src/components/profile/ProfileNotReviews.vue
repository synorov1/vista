<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';
import ProfileItemCard from '@/components/profile/ProfileItemCard.vue';
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import { ref, type PropType } from 'vue';

const props = defineProps({
  products: {
    type: Array as PropType<Object>,
    required: true,
  }
})


const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 2,
  wrapAround: true,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 3,
      gap: 16,
    },
    1024: {
      itemsToShow: 4,
      gap: 16,
    },
    1440: {
      itemsToShow: 5,
      gap: 16,
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

const carouselRef = ref<CarouselExposed | null>();
</script>

<template>
  <div class="profile-not-reviews">
    <TtileWithArrow
      title="Еще нет вашего отзыва"
      class="profile-not-reviews__title"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(item, index) in props.products"
        :key="index"
        class="profile-not-reviews__slide"
      >
        <ProfileItemCard :content="item" />
      </Slide>

      <template #addons>
        <CarouselPagination class="profile-not-reviews__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.profile-not-reviews {
  padding-bottom: 30px;
}

.profile-not-reviews__title {
  margin-bottom: 30px;
}

.profile-not-reviews__slide {
  display: block;
  text-align: left;
}

.profile-not-reviews__pagination {
  bottom: -30px;
}
</style>