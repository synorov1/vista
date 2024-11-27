<template>
  <div class="outer-container">
    <div :class="['label-wrapper', color]">
      <span class="text">{{ text }}</span>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { PropType } from 'vue';

defineProps({
  text: {
    type: String,
    default: 'Войти',
  },
  color: {
    type: String as PropType<'blue' | 'black' | 'red'>
  }
});
</script>

<style scoped>
.outer-container {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.label-wrapper {
  display: inline-flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 4px 6px;
  gap: 10px;
  height: 23px;
  border-radius: 4px;
  transition: background-color 0.3s ease, top 0.3s ease;
}
.blue {
  background-color: var(--blue-400-color);
}
.black {
  background-color: var(--black-color);
}
.red {
  background-color: var(--red-color);
}

.label-wrapper:hover {
  background-color: var(--blue-300-color);
  top: 576px;
}

.text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 500;
  font-size: 12px;
  line-height: 15px;
  letter-spacing: -0.02em;
  color: var(--white-color);
  flex: none;
  order: 0;
  flex-grow: 0;
}
</style>
