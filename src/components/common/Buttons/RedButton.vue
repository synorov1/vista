<template>
  <div>
    <button
      class="btn red-btn"
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
.red-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 58px;
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--white-color);
  background-color: var(--red-200-color);
  outline: none;
  transition: background-color 0.3s ease;
  width: inherit;
}

.red-btn:hover {
  background-color: var(--blue-300-color);
}

.red-btn:focus {
  outline: none;
  box-shadow: none;
}
</style>