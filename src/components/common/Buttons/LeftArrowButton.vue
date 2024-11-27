<template>
  <button class="arrow-btn left-arrow">
    <img src="/src/assets/icons/arrow-left.svg" alt="Left Arrow" class="arrow-icon" />
  </button>
</template>

<script setup lang="ts">
</script>

<style scoped>
.arrow-btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  width: 45px;
  height: 45px;
  border: 1px solid var(--gray-400-color);
  border-radius: 100px;
  background-color: var(--white-color);
  outline: none;
  transition: background-color 0.3s ease, border 0.3s ease, color 0.3s ease;
}

.arrow-btn:hover {
  background-color: var(--white-color);
  border: 1px solid var(--black-color);
  color: var(--black-color);
}

.arrow-btn:focus {
  outline: none;
  box-shadow: none;
}

.arrow-icon {
  width: 24px;
  height: 24px;
  transition: filter 0.3s ease;
}

.arrow-btn:hover .arrow-icon {
  filter: brightness(0) invert(0); 
}
</style>
