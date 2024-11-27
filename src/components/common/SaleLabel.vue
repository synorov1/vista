<template>
  <div class="price-container">
    <img src="/src/assets/icons/sale.svg" alt="Sale Icon" class="icon sale-icon" />
    <span class="price">{{ currentPrice }} ₽</span>
    <span v-if="oldPrice" class="old-price">{{ oldPrice }} ₽</span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  currentPrice: {
    type: Number,
    required: true,
  },
  oldPrice: {
    type: Number,
    default: null,
  },
});
</script>

<style scoped>
.price-container {
  display: inline-flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 4px 6px;
  gap: 6px;
  background-color: var(--red-color);
  border-radius: 30px;
  width: fit-content;
}

.icon {
  width: 20px;
  height: 20px;
  flex: none;
  order: 0;
}

.price {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 14px;
  line-height: 17px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  flex: none;
  order: 1;
}

.old-price {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 15px;
  letter-spacing: -0.02em;
  text-decoration-line: line-through;
  color: var(--white-color);
  flex: none;
  order: 2;
}
</style>
