<template>
  <div class="reviews-item">
    <div class="reviews-item__top">
      <div class="reviews-item__image-wrap">
        <img
          v-if="props.image"
          class="reviews-item__image"
          src=""
          alt=""
        >
        <span v-else>{{ props.name[0] }}</span>
      </div>

      <div class="reviews-item__info">
        <span class="reviews-item__name">{{ props.name }}</span>
        <span class="reviews-item__date">{{ props.date }}</span>
      </div>

      <Star class="reviews-item__star" :text="props.rating" />
    </div>

    <Carousel
      v-if="props.images.length !== 0"
      class="reviews-item__images carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(src, index) in props.images"
        :key="index"
        class="reviews-item__images-slide"
      >
        <a href="#">
          <img
            :src="src"
            alt=""
            class="reviews-item__images-item"
          >
        </a>
      </Slide>

      <template #addons>
        <CarouselPagination class="reviews-item__images-pagination carousel-progress__pagination" />
      </template>
    </Carousel>

    <p class="reviews-item__text" :class="{ 'reviews-item__text_short' : props.hasButton}">
      {{ props.text }}
    </p>

    <GreyButton
      v-if="props.hasButton"
      class="reviews-item__button"
      type="secondary"
      size="small"
      text="Показать полностью"
    >
      <template #icon>
        <span class="reviews-item__button-icon">
          <IconArrowRight />
        </span>
      </template>
    </GreyButton>
  </div>
</template>

<script lang="ts" setup>
import Star from '@/components/common/Star.vue';
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig } from 'vue3-carousel';

interface Props {
  image?: string;
  name: string;
  date: string;
  rating: string;
  text: string;
  hasButton?: boolean;
  images?: string[];
}

const props = withDefaults(defineProps<Props>(), {
  image: '',
  hasButton: true,
  images: () => [],
});

const config: CarouselConfig = {
  snapAlign: 'start',
  wrapAround: true,
  gap: 16,
  itemsToScroll: 1,
  height: '',
  i18n: {},
  enabled: true,
  itemsToShow: 'auto',
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  slideEffect: 'slide',
};

</script>

<style scoped>
.reviews-item {
  display: flex;
  flex-direction: column;
  gap: 20px;
  border-radius: 16px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
}

.reviews-item__top {
  display: flex;
  gap: 10px;
  align-items: center;
}

.reviews-item__images {
  padding-bottom: 20px;
}

.reviews-item__images-slide {
  display: block;
}

.reviews-item__images-item {
  display: block;
  overflow: hidden;
  object-fit: cover;
  height: 150px;
  width: 120px;
  border-radius: 14px;
  border: 1px solid var(--gray-400-color);
}

.reviews-item__images-pagination {
  bottom: 0;
}

.reviews-item__image-wrap {
  border-radius: 50%;
  overflow: hidden;
  background-color: var(--gray-200-color);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 600;
  font-size: 24px;
  line-height: 29px;
  letter-spacing: -0.02em;
  color: #A9B2D6;
  text-transform: uppercase;
  flex-shrink: 0;
  width: 42px;
  height: 42px;
}

.reviews-item__image {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.reviews-item__info {
  display: flex;
  flex-direction: column;
  gap: 4px;
  flex-grow: 1;
}

.reviews-item__name {
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.reviews-item__date {
  color: var(--gray-600-color);
  font-weight: 500;
  font-size: 10px;
  line-height: 12px;
}

.reviews-item__star {
  align-self: flex-start;
}

.reviews-item__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin-bottom: 0;
}

.reviews-item__text_short {
  display: -webkit-box;
  overflow: hidden;
  margin-bottom: 0;
  -webkit-line-clamp: 5;
  -webkit-box-orient: vertical;
}

.reviews-item__button {
  margin-top: auto;
  align-self: flex-start;
}

.reviews-item__button-icon {
  font-size: 6px;
}

@media (min-width: 768px) {
  .reviews-item {
    padding: 30px;
  }
}
</style>