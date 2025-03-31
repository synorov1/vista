<template>
  <div>
    <button
      class="btn black-btn"
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
.black-btn {
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
  color: var(--white-color);
  background-color: var(--black-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease, border 0.3s ease;
  width: inherit;
}

.black-btn:hover {
  background-color: var(--gray-800-color);
}

.black-btn:focus {
  outline: none;
  box-shadow: none;
}
</style>