<template>
  <a class="card" :href="product.href">
    <div class="card-image">
      <div class="top-buttons-wrapper">
        <Label v-if="product.label" :color="product.label.color" :text="product.label.text" />
        <Like class="like" :liked="product.like" />
      </div>
      <img src="@/assets/images/backpack.png" alt="backpack" class="img-fluid">
      <RedLabel v-if="product.discount" class="sale-badge" :discount="`-${product.discount}%`"/>
    </div>
    <div class="card-info">
      <div class="card-price">
        <span class="current-price">{{ prices.main }} ₽</span>
        <span class="old-price" v-if="prices.old">{{ prices.old }} ₽</span>
      </div>
      <div class="card-title">{{ product.title }}</div>
      <div class="card-rating">
        <img src="/src/assets/icons/star.svg" alt="Rating Star" class="rating-img" />
        <div class="rating-text">{{ product.rating.stars }} <span class="rating-quantity">- {{ prices.rating }} оценки</span></div>
      </div>
      <div class="card-availability">
        <YesNoButton :isAvailable="available" availableText="В наличии" unavailableText="Нет в наличии" />
      </div>
    </div>
    <XSBlueButton class="card-btn" :text="product.button.text" />
  </a>
</template>

<script setup lang="ts">
import Label from '~/components/common/Label.vue';
import RedLabel from '~/components/common/RedLabel.vue';
import Like from '~/components/common/Like.vue';
import YesNoButton from '~/components/common/buttons/YesNoButton.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import { computed, toRef } from 'vue';

const props = defineProps({
  available: {
    type: Boolean,
    default: true
  },
  content: {
    type: Object,
    required: true,
  }
})

const product = toRef(props, 'content');

const prices = computed(() => {
  return {
    main: new Intl.NumberFormat('ru-RU').format(product.value.price),
    ...(product.value.oldPrice ? { old: new Intl.NumberFormat('ru-RU').format(product.value.oldPrice) } : {}),
    rating: new Intl.NumberFormat('ru-RU').format(product.value.rating.count),
  }
})
</script>

<style scoped>
.card {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 10px;
  position: relative;
  min-width: 139px;
  min-height: 348px;
  border: none;
  width: 100%;
  text-decoration: none;
}

.top-buttons-wrapper {
  position: absolute;
  display: flex;
  left: 16px;
  right: 16px;
  top: 16px;
  flex-direction: row;
  justify-content: space-between;
}

.card-image {
  display: flex;
  position: relative;
  flex-direction: column;
  justify-content: space-between;
  min-width: 139px;
  min-height: 200px;
  padding: 16px;
  border: 1px solid var(--gray-400-color);
  border-radius: 12px;
  box-sizing: border-box;
  margin-bottom: 10px;
  width: 100%;
}

.img-fluid {
  max-width: 100%;
  height: 111px;
  object-fit: contain;
  margin: 10px 0;
  flex-shrink: 0;
}

.sale-badge {
  position: absolute;
  bottom: 16px;
  left: 16px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 4px 6px;
  gap: 10px;
  width: 42px;
  height: 23px;
  margin-top: auto;
}

.like {
  width: 20px;
  height: 20px;
  margin-left: auto;
}

.card-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  padding: 0px;
  gap: 10px;
  width: 100%;
}

.card-price {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
  margin-bottom: 10px;
}

.current-price {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 800;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.02em;
  color: var(--blue-400-color);
}

.old-price {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  text-decoration-line: line-through;
  color: var(--gray-600-color);
}

.card-title {
  width: 100%;
  height: 15px;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 12px;
  line-height: 15px;
  text-align: left;
  color: var(--black-color);
}

.card-rating {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
}

.rating-img {
  width: 14px;
  height: 14px;
}

.rating-text {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 12px;
  line-height: 15px;
  color: var(--black-color);
}

.rating-quantity {
  font-weight: 400;
  color: var(--gray-600-color);
}

.card-availability {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
}

.card-btn {
  width: 100%
}

.btn-text {
  width: 51px;
  height: 17px;
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
}

@media (min-width: 768px) {
  .card {
    min-width: 227px;
    height: 480px;
  }

  .card-image {
    min-height: 240px;
    margin-bottom: 16px;
  }

  .img-fluid {
    height: 169px;
  }

  .card-title {
    font-size: 16px;
    line-height: 17px;
    min-height: 34px;
  }

  .rating-text {
    font-size: 16px;
    line-height: 17px;
  }

  .current-price {
    font-size: 18px;
    line-height: 21px;
  }
}
@media (min-width: 768px) {
  .card {
    min-width: 206px;
  }
}
</style>
