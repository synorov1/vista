<template>
  <div class="discount-container">
    <span class="discount">{{ discount }} </span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  discount: {
    type: String,
    default: '0',
  },
});
</script>

<style scoped>
.discount-container {
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

.discount {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 15px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  flex: none;
  order: 1;
}
</style>
