<template>
  <div class="order-summary">
    <div class="summary-section">
      <h3>Ваш заказ:</h3>
      <div class="summary-row">
        <span>1 товар, 1 шт.</span>
        <span>6 750 ₽</span>
      </div>
      <div class="summary-row">
        <span>Услуга, 1 шт.</span>
        <span>750 ₽</span>
      </div>
    </div>

    <div class="promo-section">
      <span>Сертификат / промокод:</span>
      <div class="promo-button">
        <span>Jolla24</span>
        <svg 
          width="20" 
          height="20" 
          viewBox="0 0 20 20" 
          fill="none"
        >
          <path 
            d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" 
            stroke="#0084FF" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
          <path 
            d="M6.66669 10L8.33335 11.6667L13.3334 6.66669" 
            stroke="#0084FF" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
        </svg>
      </div>
    </div>

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

    <button class="checkout-button">Перейти к оформлению</button>
  </div>
</template>

<script setup lang="ts">
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
.promo-section,
.total-section {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 228px;
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

.promo-section span {
  font-weight: 400;
  font-size: 14px;
  line-height: 1.21;
  color: #000000;
}

.promo-button {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  background: #FFFFFF;
  border-radius: 6px;
  cursor: pointer;
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

@media (max-width: 720px) {
  .order-summary {
    max-width: 720px;
    width: 708px;
  }
}

@media (max-width: 320px) {
  .order-summary {
    max-width: 320px;
    width: 288px;
    padding: 16px;
    gap: 16px;
    border-radius: 16px;
  }

  .checkout-button {
    width: 100%;
  }
}
</style> 