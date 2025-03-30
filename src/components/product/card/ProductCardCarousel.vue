<template>
  <div class="product-card-carousel">
    <Carousel
      v-bind="galleryConfig"
      v-model="currentSlide"
      class="carousel carousel-button product-card-carousel__main"
    >
      <Slide
        v-for="image in props.images"
        :key="image"
      >
        <img
          :src="image"
          alt=""
          class="product-card-carousel__main-image"
        >
      </Slide>

      <template #addons>
        <CarouselPagination class="product-card-carousel__pagination" />
      </template>
    </Carousel>

    <Carousel
      v-if="!isMobileScreen"
      v-bind="thumbnailsConfig"
      v-model="currentSlide"
      class="carousel product-card-carousel__thumbnail"
    >
      <Slide
        v-for="image in props.images"
        :key="image"
      >
        <template #default="{ currentIndex, isActive }">
          <div
            :class="['product-card-carousel__thumbnail-item', { 'is-active': isActive }]"
            @click="slideTo(currentIndex)"
          >
            <img
              :src="image"
              alt=""
              class="product-card-carousel__thumbnail-image"
            >
          </div>
        </template>
      </Slide>
    </Carousel>
  </div>
</template>

<script lang="ts" setup>
import { useMedia } from '@/composables/useMedia';
import { ref } from 'vue';
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig } from 'vue3-carousel';

interface Props {
  images: string[];
}

const props = defineProps<Props>();

const galleryConfig: CarouselConfig = {
  itemsToShow: 1,
  wrapAround: true,
  slideEffect: 'fade',
  mouseDrag: false,
  touchDrag: false,
  height: '',
  gap: 0,
  i18n: {},
  enabled: true,
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  snapAlign: 'start',
  itemsToScroll: 1,
}

const thumbnailsConfig: CarouselConfig = {
  dir: 'ttb',
  wrapAround: true,
  itemsToShow: 4,
  snapAlign: 'start',
  height: 488,
  gap: 10,
  enabled: true,
  i18n: {},
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  itemsToScroll: 1,
  slideEffect: 'slide',
  breakpoints: {
    1024: {
      height: 430,
    },
  },
}

const currentSlide = ref(0)

const slideTo = (nextSlide: number) => (currentSlide.value = nextSlide);

const { isMobileScreen } = useMedia();
</script>

<style scoped>
.product-card-carousel {
  margin-bottom: 16px;
}

.product-card-carousel .carousel-button {
  --vc-pgn-width: 16px;
}

.product-card-carousel__main {
  border: 1px solid var(--gray-400-color);
  border-radius: 16px;
}

.product-card-carousel__main-image {
  display: block;
  height: 142px;
  width: 142px;
  object-fit: contain;
  object-position: center;
}

.product-card-carousel__pagination {
  bottom: 20px;
}

.product-card-carousel__thumbnail-item {
  height: 100px;
  width: 100px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 14px;
  border: 1px solid var(--gray-400-color);
}

.product-card-carousel__thumbnail-item.is-active {
  border-color: var(--blue-400-color);
}

.product-card-carousel__thumbnail-image {
  display: block;
  height: 63px;
  width: 63px;
  object-fit: cover;
  object-position: center;
}

@media (max-width: 767px) {
  .product-card-carousel {
    --vc-carousel-height: 250px;
  }
}

@media (min-width: 768px) {
  .product-card-carousel {
    height: 490px;
    border: 1px solid var(--gray-400-color);
    position: relative;
    border-radius: 16px;
    display: flex;
    margin-bottom: 20px;
  }

  .product-card-carousel__main {
    border: none;
    border-radius: 0;
    width: 100%;
  }

  .product-card-carousel__thumbnail {
    order: -1;
    padding: 30px 0 30px 30px;
  }

  .product-card-carousel__pagination {
    bottom: 30px;
    left: auto;
    right: 30px;
    transform: none;
  }

  .product-card-carousel__main-image {
    height: 247px;
    width: 247px;
  }
}

@media (min-width: 1024px) {
  .product-card-carousel {
    border: none;
    border-radius: 0;
    height: 430px;
  }

  .product-card-carousel__thumbnail {
    margin-right: 10px;
    padding: 0;
  }

  .product-card-carousel__main {
    border: 1px solid var(--gray-400-color);
    border-radius: 16px;
  }
}
</style>