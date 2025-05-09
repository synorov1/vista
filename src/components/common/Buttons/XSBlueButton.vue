<template>
  <component
    :is="to ? RouterLink : 'button'"
    :to="to"
    :class="[
      'btn custom-btn',
      { 'custom-btn--border': isBorder }
    ]"
    :style="{ height: height }"
  >
    <span>{{ text }}</span>
  </component>
</template>

<script setup lang="ts">
import {RouterLink} from "vue-router";

defineProps({
  text: {
    type: String,
    default: 'Button',
  },
  height: {
    type: String,
    default: '34px',
  },
  isBorder: {
    type: Boolean,
    default: false,
  },
  to: {
    type: [String, Object],
    default: null,
  }
});
</script>

<style scoped>
.custom-btn {
  width: min-content;
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  white-space: nowrap;
  padding: 14px;
  gap: 10px;
  min-width: 58px;
  background-color: var(--blue-400-color);
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.custom-btn:hover {
  background-color: var(--blue-300-color);
}

.custom-btn:focus {
  outline: none;
  box-shadow: none;
}

.custom-btn--border {
  border: 1px solid var(--white-color);
}
</style>
