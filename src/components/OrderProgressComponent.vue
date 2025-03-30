<template>
  <div class="order-progress">
    <div class="progress-step active">
      <div class="step-icon">
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
      <span>Корзина</span>
    </div>
    <div class="progress-line"></div>
    <div class="progress-step">
      <div class="step-icon">
        <svg 
          width="20" 
          height="20" 
          viewBox="0 0 20 20" 
          fill="none"
        >
          <path 
            d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" 
            stroke="#F0F0F0" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
          <path 
            d="M6.66669 10L8.33335 11.6667L13.3334 6.66669" 
            stroke="#F0F0F0" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <span>Авторизация</span>
    </div>
    <div class="progress-line"></div>
    <div class="progress-step">
      <div class="step-icon">
        <svg 
          width="20" 
          height="20" 
          viewBox="0 0 20 20" 
          fill="none"
        >
          <path 
            d="M10 18.3334C14.6024 18.3334 18.3334 14.6024 18.3334 10C18.3334 5.39765 14.6024 1.66669 10 1.66669C5.39765 1.66669 1.66669 5.39765 1.66669 10C1.66669 14.6024 5.39765 18.3334 10 18.3334Z" 
            stroke="#F0F0F0" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
          <path 
            d="M6.66669 10L8.33335 11.6667L13.3334 6.66669" 
            stroke="#F0F0F0" 
            stroke-width="1.5" 
            stroke-linecap="round" 
            stroke-linejoin="round"
          />
        </svg>
      </div>
      <span>Оплата</span>
    </div>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.order-progress {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 20px;
  max-width: 1440px;
  margin: 0 auto;
}

.progress-step {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 4px;
}

.progress-step span {
  font-size: 12px;
  line-height: 1.17;
  color: #4D4D4D;
}

.progress-step.active span {
  color: #000000;
}

.step-icon {
  width: 20px;
  height: 20px;
}

.progress-line {
  flex: 1;
  height: 1px;
  background: #F0F0F0;
  margin: 0 20px;
}

@media (max-width: 1024px) {
  .order-progress {
    max-width: 1024px;
  }
}

@media (max-width: 720px) {
  .order-progress {
    max-width: 720px;
    padding: 16px;
  }

  .progress-line {
    margin: 0 10px;
  }
}
</style> 