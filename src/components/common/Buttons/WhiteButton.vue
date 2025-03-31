<template>
  <div>
    <button
      class="btn white-btn"
      :style="{ height: height }"
      type="button"
    >
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
.white-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 58px;
  border-radius: 6px;
  font-weight: 700;
  font-size: 14px;
  line-height: 1.4;
  color: var(--black-color);
  background-color: var(--white-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
  width: inherit;
}

.white-btn:hover {
  border: 1px solid var(--gray-600-color);
  background-color: var(--gray-100-color);
  color: var(--gray-600-color);
}

.white-btn:focus {
  outline: none;
  box-shadow: none;
}
</style>