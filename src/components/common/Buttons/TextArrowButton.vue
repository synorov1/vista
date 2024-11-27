<template>
  <div>
    <button class="btn custom-btn">
      <span class="text">{{ text }}</span>
      <span class="icon"></span>
    </button>
  </div>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    default: 'Button',
  },
});
</script>

<style scoped>
.custom-btn {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
}

.custom-btn .text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 12px;
  line-height: 15px;
  color: var(--black-color);
  flex: none;
  order: 0;
  flex-grow: 0;
  margin-right: 5px;
}

.custom-btn .icon {
  width: 5px;
  height: 9px;
  background-image: url('/src/assets/icons/arrow.svg');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  flex: none;
  order: 1;
  flex-grow: 0;
  transition: filter 0.3s ease;
}

.custom-btn:hover .text {
  color: var(--blue-400-color);
}

.custom-btn:hover .icon {
  filter: brightness(0) saturate(100%) invert(0.5) sepia(1) saturate(2) hue-rotate(180deg);
}
</style>
