<template>
  <div>
    <button class="btn custom-btn" :style="{ height: height }">
      <span>{{ text }}</span>
    </button>
  </div>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    default: 'Button',
  },
  height: {
    type: String,
    default: '34px',
  },
});
</script>

<style scoped>
.custom-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
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
  width: inherit;
}

.custom-btn:hover {
  background-color: var(--blue-300-color);
}

.custom-btn:focus {
  outline: none;
  box-shadow: none;
}
</style>
