<template>
  <div class="product-card-instalment">
    <div class="product-card-instalment__top">
      <div class="product-card-instalment__top-left">
        <div class="product-card-instalment__prices">
          <span class="product-card-instalment__current-price">{{ props.price }}</span>
          <span v-if="props.oldPrice" class="product-card-instalment__old-price">{{ props.oldPrice }}</span>
        </div>

        <div class="product-card-instalment__label">
          {{ props.label }}
        </div>
      </div>

      <img
        :src="props.logo"
        alt=""
        class="product-card-instalment__logo"
      >
    </div>


    <div class="product-card-instalment__text">
      {{ props.text }}
    </div>

    <div class="product-card-instalment__button-wrap">
      <BlackButton
        height="45px"
        text="Оплатить Долями"
        class="w-100"
      />

      <GreyButton
        height="45px"
        text="Рассрочка на 3/5/6 мес."
        type="secondary"
        class="w-100"
      />
    </div>
  </div>
</template>

<script lang="ts" setup>
import BlackButton from '~/components/common/buttons/BlackButton.vue';
import GreyButton from '~/components/common/buttons/GreyButton.vue';

interface Props {
  price: string;
  oldPrice?: string;
  label: string;
  text: string;
  logo: string;
}

const props = defineProps<Props>();
</script>

<style scoped>
.product-card-instalment {
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  background-color: var(--white-color);
  padding: 16px;
  display: flex;
  flex-direction: column;
}

.product-card-instalment__top {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.product-card-instalment__top-left {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.product-card-instalment__prices {
  display: flex;
  align-items: center;
  gap: 10px;
}

.product-card-instalment__current-price {
  font-weight: 800;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.product-card-instalment__old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 100%;
  text-decoration-line: line-through;
  color: var(--gray-600-color);
}

.product-card-instalment__label {
  border-radius: 100px;
  border: 1px solid var(--black-color);
  color: var(--black-color);
  padding: 6px 10px;
  font-weight: 500;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: -0.02em;
}

.product-card-instalment__logo {
  display: block;
  height: 45px;
  width: 45px;
  object-fit: contain;
}

.product-card-instalment__text {
  font-weight: 400;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: -0.02em;
  color: var(--gray-800-color);
  margin-bottom: 16px;
}

.product-card-instalment__button-wrap {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

@media (min-width: 768px) {
  .product-card-instalment {
    padding: 30px;
  }
  
  .product-card-instalment__text {
    margin-bottom: 30px;
  }

  .product-card-instalment__button-wrap {
    margin-top: auto;
  }
}
</style>