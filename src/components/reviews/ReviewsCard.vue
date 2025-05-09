<template>
  <div class="reviews-card">
    <div class="reviews-card__image-wrap">
      <img
        :src="props.image"
        alt=""
        class="reviews-card__image"
      >
    </div>

    <div class="reviews-card__info">
      <span class="reviews-card__name">{{ props.name }}</span>

      <div class="reviews-card__rating">
        <Star :text="props.rating" />
        <span>&nbsp;- {{ props.numberRatings.toLocaleString('ru-RU') }} оценки</span>
        <span>&nbsp;• <a href="#">Читать отзывы</a></span>
      </div>

      <YesNoButton
        :is-available="props.available"
        available-text="В наличии"
        unavailable-text="Нет в наличии"
      />
    </div>

    <div class="reviews-card__price">
      <span>{{ props.price }}</span>

      <span v-if="props.oldPrice" class="reviews-card__price-old">{{ props.oldPrice }}</span>
    </div>

    <div class="reviews-card__buttons">
      <XSBlueButton height="45px" text="Купить" />

      <div class="reviews-card__like">
        <Like :liked="props.liked" />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Star from '@/components/common/Star.vue';
import YesNoButton from '~/components/common/buttons/YesNoButton.vue';
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';
import Like from '~/components/common/Like.vue';

interface Props {
  image: string;
  name: string;
  available: boolean;
  rating: string;
  numberRatings: number;
  price: string;
  oldPrice?: string;
  liked: boolean;
}

const props = defineProps<Props>();
</script>

<style scoped>
.reviews-card {
  border: 1px solid var(--gray-400-color);
  border-radius: 20px;
  padding: 16px;
  display: flex;
  align-items: center;
  width: 100%;
}

.reviews-card__image-wrap {
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
  border: 1px solid var(--gray-400-color);
  padding: 12px;
  flex-shrink: 0;
  margin-right: 16px;
}

.reviews-card__image {
  display: block;
  object-fit: contain;
  width: 46px;
  height: 46px;
}

.reviews-card__info {
  display: flex;
  flex-direction: column;
  gap: 6px;
  width: 260px;
}

.reviews-card__name {
  font-weight: 700;
  font-size: 16px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.reviews-card__rating {
  display: flex;
  font-weight: 400;
  font-size: 14px;
  line-height: 100%;
  color: var(--gray-600-color);

  a {
    color: var(--gray-600-color);
    text-decoration: underline;
  }
}

.reviews-card__price {
  display: flex;
  gap: 10px;
  align-items: center;
  color: var(--blue-400-color);
  font-weight: 800;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -0.02em;
  margin-left: auto;
}

.reviews-card__price-old {
  font-weight: 600;
  font-size: 12px;
  letter-spacing: 0;
  text-decoration: line-through;
  color: var(--gray-600-color);
}

.reviews-card__buttons {
  display: flex;
  gap: 10px;
  margin-left: 10px;
  align-items: center;
}

.reviews-card__like {
  border-radius: 10px;
  background-color: var(--gray-50-color);
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 45px;
}

@media (min-width: 1024px) {
  .reviews-card__info {
    width: auto;
  }
}
</style>
