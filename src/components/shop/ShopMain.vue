<script lang="ts" setup>
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import { ref, type PropType } from 'vue';
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';

const props = defineProps({
  list: {
    type: Array as PropType<any[]>,
    required: true,
  }
})

const carouselRef = ref<CarouselExposed | null>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1,
  wrapAround: true,
  gap: 16,
  breakpoints: {
    768: {
      itemsToShow: 2,
      gap: 30
    },
    1024: {
      itemsToShow: 3,
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
  <section class="shop-main">
    <TtileWithArrow
      title="Самое главное о нас"
      class="shop-main__title"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(item, index) in props.list"
        :key="index"
        class="shop-main__slide"
      >
        <div class="shop-main__card">
          <h4 class="shop-main__card-title">
            {{ item.title }}
          </h4>

          <span class="shop-main__card-text">{{ item.text }}</span>
        </div>
      </Slide>

      <template #addons>
        <CarouselPagination class="shop-main__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </section>
</template>

<style scoped>
.shop-main__title {
  margin-bottom: 20px;
}

.shop-main__slide {
  display: block;
  text-align: left;
}

.shop-main__card {
  padding: 16px;
  background-color: var(--gray-200-color);
  border-radius: 16px;
  height: 100%;
}

.shop-main__card-title {
  font-weight: 800;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 20px;
}

.shop-main__card-text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
}

.shop-main__pagination {
  bottom: -30px;
}

@media (min-width: 768px) {
  .shop-main__title {
    margin-bottom: 30px;
  }

  .shop-main__card {
    padding: 30px;
  }
}

@media (min-width: 1440px) {
  .shop-main__pagination {
    bottom: -37px;
  }
}
</style>