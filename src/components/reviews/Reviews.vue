<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import ReviewsItem from '@/components/reviews/ReviewsItem.vue';
import { ref, useSlots } from 'vue';

type ReviewsItemProps = InstanceType<typeof ReviewsItem>["$props"];

interface Props {
  reviews: ReviewsItemProps[];
  hasArrows?: boolean;
}

const props = defineProps<Props>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1,
  wrapAround: true,
  gap: 30,
  breakpoints: {
    768: {
      itemsToShow: 2,
    },
    1024: {
      itemsToShow: 3,
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

const slots = useSlots();
</script>

<template>
  <div class="product-reviews">
    <div v-if="slots.head" class="head">
      <slot
        name="head"
        :prev="carouselRef?.prev"
        :next="carouselRef?.next"
      />
      <TtileWithArrow
        @click-arrow-left="carouselRef?.prev"
        @click-arrow-right="carouselRef?.next"
        :hasArrows="props.hasArrows"
        v-if="props.hasArrows"
      />
    </div>
    <TtileWithArrow
      v-else
      title="Отзывы о товаре"
      button-text="Смотреть все отзывы"
      button-type="blue"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(review, index) in props.reviews"
        :key="index"
        class="product-reviews__slide"
      >
        <ReviewsItem v-bind="review" />
      </Slide>

      <template #addons>
        <CarouselPagination class="product-reviews__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.product-reviews {
  display: flex;
  flex-direction: column;
  gap: 20px;
  padding-bottom: 16px;
  margin-bottom: 60px;
}

.head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 22px;
}

.product-reviews__slide {
  display: block;
  text-align: left;
}

.product-reviews__pagination {
  bottom: -16px;
}

@media (min-width: 768px) {
  .product-reviews {
    padding-bottom: 30px;
  }

  .product-reviews__pagination {
    bottom: -30px;
  }
}

@media (min-width: 1024px) {
  .product-reviews {
    margin-bottom: 80px;
  }
}
</style>