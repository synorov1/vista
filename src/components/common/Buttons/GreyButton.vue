<template>
  <div>
    <button class="btn gray-btn">
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
});
</script>

<style scoped>
.gray-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 58px;
  height: 34px;
  border: 1px solid var(--gray-600-color);
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.gray-btn:hover {
  background-color: var(--gray-100-color);
  color: var(--gray-600-color);
}

.gray-btn:focus {
  outline: none;
  box-shadow: none;
}
</style>
