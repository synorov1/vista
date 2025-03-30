<script lang="ts" setup>
import { Carousel, Pagination as CarouselPagination, Slide, type CarouselConfig, type CarouselExposed } from 'vue3-carousel';
import ProfileCard from '@/components/profile/ProfileCard.vue';
import Star from '@/components/common/Star.vue';
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import WhiteButton from '@/components/common/Buttons/WhiteButton.vue';
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import { ref } from 'vue';

type ProfileCardProps = InstanceType<typeof ProfileCard>["$props"];

interface Reviews  {
  card: ProfileCardProps,
  image?: string;
  name: string;
  date: string;
  rating: string;
  text: string;
}

interface Props {
  reviews: Reviews[],
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
      itemsToShow: 2,
    },
    1440: {
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
</script>

<template>
  <div class="profile-reviews">
    <TtileWithArrow
      title="Мои отзывы"
      class="profile-reviews__title"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="(item, index) in props.reviews"
        :key="index"
        class="profile-reviews__slide"
      >
        <div class="profile-reviews__item">
          <ProfileCard v-bind="item.card" />

          <div class="profile-reviews__info">
            <div class="profile-reviews__info-image">
              <img
                v-if="item.image"
                class="profile-reviews__image"
                src=""
                alt=""
              >
              <span v-else>{{ item.name[0] }}</span>
            </div>

            <div class="profile-reviews__info-name">
              <span class="profile-reviews__name">{{ item.name }}</span>
              <span>{{ item.date }}</span>
            </div>

            <Star class="profile-reviews__info-star" :text="item.rating" />
          </div>

          <p class="profile-reviews__text">
            {{ item.text }}
          </p>

          <div class="profile-reviews__button-wrap">
            <GreyButton
              type="secondary"
              size="small"
              text="Показать полностью"
            >
              <template #icon>
                <span class="profile-reviews__info-icon">
                  <IconArrowRight />
                </span>
              </template>
            </GreyButton>

            <WhiteButton text="Удалить" />
          </div>
        </div>
      </Slide>

      <template #addons>
        <CarouselPagination class="profile-reviews__pagination carousel-progress__pagination" />
      </template>
    </Carousel>
  </div>
</template>

<style scoped>
.profile-reviews {
  padding-bottom: 30px;
}

.profile-reviews__title {
  margin-bottom: 30px;
}

.profile-reviews__slide {
  display: block;
  text-align: left;
}

.profile-reviews__pagination {
  bottom: -30px;
}

.profile-reviews__item {
  display: flex;
  flex-direction: column;
  gap: 20px;
  border-radius: 16px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
}

.profile-reviews__info {
  display: flex;
  gap: 10px;
  align-items: center;
}

.profile-reviews__info-image {
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

.profile-reviews__image {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: contain;
}

.profile-reviews__info-name {
  display: flex;
  flex-direction: column;
  gap: 4px;
  color: var(--gray-600-color);
  font-weight: 500;
  font-size: 10px;
  line-height: 12px;
  flex-grow: 1;
}

.profile-reviews__name {
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.profile-reviews__info-star {
  align-self: flex-start;
}

.profile-reviews__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  display: -webkit-box;
  overflow: hidden;
  margin-bottom: 0;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
}

.profile-reviews__button-wrap {
  display: flex;
  gap: 6px;
  justify-content: space-between;
}

.profile-reviews__info-icon {
  font-size: 6px;
}

@media (min-width: 768px) {
  .profile-reviews__item {
    padding: 30px;
  }
}
</style>