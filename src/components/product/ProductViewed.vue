<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';
import ItemCard from '@/components/cards/ItemCard.vue';
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
  <div class="product-viewed">
    <TtileWithArrow
      title="Недавно просмотренные товары"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(product, index) in props.products"
        :key="index"
        class="product-viewed__slide"
      >
        <ItemCard
          :content="product"
        />
      </Slide>

      <template #addons>
        <CarouselPagination class="product-viewed__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.product-viewed {
  display: flex;
  flex-direction: column;
  gap: 16px;
  padding-bottom: 16px;
  margin-bottom: 56px;
}

.product-viewed__slide {
  display: block;
  text-align: left;
}

.product-viewed__pagination {
  bottom: -16px;
}

@media (min-width: 768px) {
  .product-viewed {
    gap: 30px;
    padding-bottom: 30px;
    margin-bottom: 60px;
  }

  .product-viewed__pagination {
    bottom: -30px;
  }
}

@media (min-width: 1024px) {
  .product-viewed {
    margin-bottom: 80px;
  }
}

@media (min-width: 1440px) {
  .product-viewed {
    margin-bottom: 90px;
  }
}
</style>