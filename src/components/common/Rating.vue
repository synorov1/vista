<script setup lang="ts">
defineProps<{
  stars: number;
}>();
</script>

<template>
  <div class="rating">
    <img
      src="/src/assets/icons/star.svg"
      alt="Rating Star"
      class="rating-img"
    >
    <div class="flex rating-text">
      {{ stars }} <slot />
    </div>
  </div>
</template>

<style scoped>
.rating {
  display: flex;
  flex-direction: row;
  padding: 0;
  gap: 4px;
}

.rating-img {
  width: 14px;
  height: 14px;
}

.rating-text {
  gap: 4px;
  font-weight: 700;
  font-size: 12px;
  line-height: 15px;
  color: var(--black-color);
  
  @media (min-width: 768px) {
    font-size: 16px;
    line-height: 17px;
  }
}
</style>
