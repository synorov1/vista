<template>
  <div :class="$style.discountBanner">
    <div :class="$style.discountInfo">
      <div :class="$style.discountIcon">
        <img
          :src="DiscountIcon"
          height="20"
          width="20"
          alt="Discount"
        >
      </div>
      <div :class="$style.discount">
        Получите скидку <span>5%</span> - просто добавьте товара еще на <span>12 442 ₽</span>
      </div>
    </div>
    <button :class="$style.addBtn">
      Добавить
    </button>
  </div>
</template>

<script setup lang="ts">
import DiscountIcon from "@/assets/icons/cart/discount.svg"
</script>

<style module>
.discountBanner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 14px 16px;
  background: #FFFFFF;
  border: 1px solid #D9D9D9;
  border-radius: 6px;
  min-height: 45px;
}

.discountInfo {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 14px;
  font-weight: 600;
  color: #A0A0A0;
  line-height: 100%;
}

.discountInfo span {
  color: #000;
}

.discountIcon {
  width: 24px;
  height: 24px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.addBtn {
  font-weight: 600;
  font-size: 14px;
  line-height: 1.21;
  color: #0084FF;
  background: none;
  border: none;
  cursor: pointer;
}

@media (max-width: 468px) {
  .discountBanner {
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
  }
  
  .discountInfo {
    align-items: flex-start;
    justify-content: flex-start;
  }
}
</style>