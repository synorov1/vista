<template>
  <div class="order-summary" :class="{ 'hide-order': props.currentStep !== 0 }">
    <div class="summary-section">
      <h3 v-if="props.currentStep === 0">Ваш заказ:</h3>
      <h3 v-else>Итого:</h3>
      <div class="summary-row">
        <span>1 товар, 1 шт.</span>
        <span>6 750 ₽</span>
      </div>
      <div class="summary-row">
        <span>Услуга, 1 шт.</span>
        <span>750 ₽</span>
      </div>
    </div>

    <CartPromocode v-if="props.currentStep === 0"/>

    <div class="total-section">
      <h3>Итого к оплате:</h3>
      <div class="price-block">
        <span class="current-price">6 750 ₽</span>
        <span class="old-price">20 000 ₽</span>
      </div>
      <div class="installment">
        <span>1 687 ₽ х 4 платежа</span>
      </div>
      <div class="summary-row">
        <span>Скидки и акции</span>
        <span class="discount">-10 343 ₽</span>
      </div>
      <div class="summary-row">
        <span>Промо скидка</span>
        <span class="discount">-3 343 ₽</span>
      </div>
    </div>

    <button v-if="props.currentStep === 0" class="checkout-button" @click="handleNextStep">Перейти к оформлению</button>
  </div>
</template>

<script setup lang="ts">
import {useRouter} from "vue-router";
import CartPromocode from "./cart/CartPromocode.vue";

interface Props {
  currentStep?: number;
}

const props = withDefaults(defineProps<Props>(), {
  currentStep: 0
});

const router = useRouter();

const handleNextStep = () => {
  router.push("/cart/auth")
}
</script>

<style scoped>
.order-summary {
  display: flex;
  flex-direction: column;
  gap: 30px;
  padding: 30px;
  background: #F5F6FA;
  border-radius: 20px;
  max-width: 1440px;
  margin: 0 auto;
}

h3 {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
  margin: 0 0 10px;
}

.summary-section,
.total-section {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 228px;
}

h3 {
  margin: 0;
}

.summary-row {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
}

.summary-row span {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
}

.price-block {
  display: flex;
  align-items: center;
  gap: 10px;
}

.current-price {
  font-weight: 800;
  font-size: 24px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #0084FF;
}

.old-price {
  font-weight: 600;
  font-size: 12px;
  line-height: 1.21;
  color: #A0A0A0;
  text-decoration: line-through;
}

.installment {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 6px 10px;
  border: 1px solid #000000;
  border-radius: 100px;
  width: fit-content;
}

.installment span {
  font-weight: 500;
  font-size: 14px;
  line-height: 1.21;
  letter-spacing: -0.02em;
  color: #000000;
}

.discount {
  color: #0084FF !important;
}

.checkout-button {
  width: 228px;
  height: 45px;
  background: #0084FF;
  border-radius: 6px;
  border: none;
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #FFFFFF;
  cursor: pointer;
}

@media (max-width: 1024px) {
  .order-summary {
    max-width: 1024px;
  }
}

@media (max-width: 768px) {
  .hide-order {
    display: none;
  }
}

@media (max-width: 720px) {
  .order-summary {
    max-width: 720px;
    width: 100%;
  }
}

@media (max-width: 468px) {
  .checkout-button {
    max-width: 100%;
    width: 100%;
  }

  .summary-section, .order-summary, .summary-row, .total-section {
    max-width: 100%;
    width: 100%;
  }

  .order-summary {
    padding: 16px;
    gap: 16px;
    border-radius: 16px;
  }
}
</style> 