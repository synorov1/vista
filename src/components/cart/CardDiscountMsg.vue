<template>
    <div class="discount-banner">
      <div class="discount-info">
        <div class="discount-icon">
          <img :src="DiscountIcon" height="20" width="20" alt="Discount"/>
        </div>
        <div class="discount">Получите скидку <span>5%</span> - просто добавьте товара еще на <span>12 442 ₽</span></div>
      </div>
      <button class="add-btn">Добавить</button>
    </div>
</template>

<script setup lang="ts">
import DiscountIcon from "@/assets/icons/cart/discount.svg"
</script>

<style scoped>
.discount-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  min-height: 45px;
}

.discount-info {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  font-weight: 600;
  color: #A0A0A0;
  line-height: 100%;
}

.discount-info span {
  color: #000;
}

.discount-icon {
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.add-btn {
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #0084FF;
  background: none;
  border: none;
  cursor: pointer;
}

@media (max-width: 468px) {
  .discount-banner {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
   .discount-info {
    align-items: flex-start;
    justify-content: flex-start;
   }
  }
</style>