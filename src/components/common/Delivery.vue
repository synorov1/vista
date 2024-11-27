<template>
  <a :href="link" class="text-icon-container">
    <div class="icon"></div>
    <span class="text">{{ text }}</span>
  </a>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    default: 'Доставка по РФ',
  },
  link: {
    type: String,
    default: '/',
  },
});
</script>

<style scoped>
.text-icon-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
  width: 137px;
  height: 20px;
  cursor: pointer;
  text-decoration: none;
}

.icon {
  width: 20px;
  height: 20px;
  background-image: url('/src/assets/icons/map-point.svg');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  transition: filter 0.3s ease;
}

.text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.text-icon-container:hover .icon {
  filter: brightness(0) saturate(100%) invert(42%) sepia(93%) saturate(5619%) hue-rotate(196deg);
}

.text-icon-container:hover .text {
  color: var(--blue-400-color);
}
</style>