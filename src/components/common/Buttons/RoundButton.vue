<template>
  <div>
    <button class="btn round-btn">
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
.round-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 58px;
  height: 45px;
  left: 164px;
  border: 1px solid var(--blue-400-color);
  border-radius: 100px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--blue-400-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.round-btn:hover {
  background-color: var(--blue-400-color);
  color: var(--white-color);
}

.round-btn:focus {
  outline: none;
  box-shadow: none;
}

@media (max-width: 600px) {
  .round-btn {
    width: 58px;
    height: 34px;
    left: 164px;
    font-size: 14px;
    line-height: 17px;
  }

  .round-btn:hover {
    background-color: var(--blue-400-color);
    color: var(--white-color);
  }
}
</style>
