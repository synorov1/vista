<template>
  <div class="star-container">
    <img src="/src/assets/icons/star.svg" alt="Star Icon" class="star" />
    <span class="text">{{ text }}</span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    default: '',
  },
});
</script>

<style scoped>
.star-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
  width: 48px;
  height: 17px;
  cursor:pointer;
}

.star {
  width: 14px;
  height: 14px;
  flex: none;
  order: 0;
  flex-grow: 0;
}

.text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  flex: none;
  order: 1;
  flex-grow: 0;
  transition: color 0.3s ease;
}

.text:hover {
  color: var(--blue-400-color);
}
</style>