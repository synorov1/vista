<template>
  <div class="product-card-payment">
    <div class="product-card-payment__prices">
      <span class="product-card-payment__current-price">{{ props.price }}</span>
      <span v-if="props.oldPrice" class="product-card-payment__old-price">{{ props.oldPrice }}</span>
    </div>

    <div class="product-card-payment__specifications">
      <div
        v-for="item in props.specifications"
        :key="item.title"
        class="product-card-payment__specifications-item"
      >
        {{ item.title }}: {{ item.text }}
      </div>
    </div>

    <div class="product-card-payment__button-wrap">
      <XSBlueButton
        height="45px"
        text="Добавить в корзину"
        class="product-card-payment__button"
      />

      <div class="product-card-payment__like">
        <Like :liked="props.liked" />
      </div>
    </div>

    <div class="product-card-payment__info">
      <div class="product-card-payment__info-row">
        <span class="product-card-payment__info-title">Способы получения заказа:</span>

        <div class="product-card-payment__info-item">
          <div class="product-card-payment__info-icon">
            <IconBox />
          </div>

          <div class="product-card-payment__info-text">
            Самовызов из магазина - бесплатно. <a href="#">Доставка</a> от 290 ₽
          </div>
        </div>
      </div>
      <div class="product-card-payment__info-row">
        <span class="product-card-payment__info-title">Сертификат / промокод:</span>

        <div class="product-card-payment__info-item">
          <div class="product-card-payment__info-icon">
            <IconTicket />
          </div>

          <div class="product-card-payment__info-text">
            Применить <a href="#">сертификат/промокод</a> можно при оформлении заказа
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import XSBlueButton from '@/components/common/Buttons/XSBlueButton.vue';
import IconBox from '@/components/icons/IconBox.vue';
import IconTicket from '@/components/icons/IconTicket.vue';
import Like from '~/components/common/Like.vue';

interface Specifications {
  title: string;
  text: string;
}

interface Props {
  price: string;
  oldPrice?: string;
  specifications: Specifications[];
  liked: boolean;
}

const props = defineProps<Props>();
</script>

<style scoped>
.product-card-payment {
  border-radius: 16px;
  padding: 16px;
  background-color: var(--gray-200-color);
  width: 100%;
}

.product-card-payment__prices {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 10px;
}

.product-card-payment__current-price {
  font-weight: 800;
  font-size: 24px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--blue-400-color);
}

.product-card-payment__old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 100%;
  text-decoration-line: line-through;
  color: var(--gray-600-color);
}

.product-card-payment__specifications {
  display: flex;
  flex-direction: column;
  margin-bottom: 16px;
}

.product-card-payment__specifications-item {
  font-weight: 500;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
  padding-top: 6px;
  padding-bottom: 6px;
}

.product-card-payment__button-wrap {
  display: flex;
  gap: 10px;
  margin-bottom: 16px;
}

.product-card-payment__button {
  width: 100%;
}

.product-card-payment__like {
  border-radius: 10px;
  background-color: var(--white-color);
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 45px;
  flex-shrink: 0;
}

.product-card-payment__info {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.product-card-payment__info-row {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.product-card-payment__info-title {
  font-weight: 500;
  font-size: 14px;
  line-height: 100%;
  letter-spacing: -0.02em;
  color: var(--black-color);
}

.product-card-payment__info-item {
  display: flex;
  gap: 6px;
}

.product-card-payment__info-icon {
  font-size: 20px;
  color: var(--blue-400-color);
  display: flex;
}

.product-card-payment__info-text {
  font-weight: 400;
  font-size: 12px;
  line-height: 18px;
  color: var(--gray-800-color);
}

.product-card-payment__info-text a {
  text-decoration: underline;
  color: var(--gray-800-color);
}

@media (min-width: 768px) {
  .product-card-payment {
    padding: 30px;
  }

  .product-card-payment__button-wrap {
    margin-bottom: 30px;
  }
}
</style>
