<template>
  <div class="icon-container">
    <div class="icon"></div>
    <span class="text">{{ text }}</span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    default: 'Войти',
  },
});
</script>

<style scoped>
.icon-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 0px;
  gap: 3px;
  width: 35px;
  height: 38px;
  cursor: pointer;
}

.icon {
  width: 20px;
  height: 20px;
  background-image: url('/src/assets/icons/home.svg');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  transition: filter 0.3s ease;
}

.icon-container:hover .icon {
  filter: brightness(0) saturate(100%) invert(42%) sepia(93%) saturate(5619%) hue-rotate(196deg);
}

.text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 15px;
  letter-spacing: -0.02em;
  color: var(--gray-600-color);
  text-align: center;
}
</style>
