<template>
  <div class="time-container">
    <img src="/src/assets/icons/clock.svg" alt="Clock Icon" class="clock-icon" />
    <span class="time-text">{{ time }}</span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  time: {
    type: String,
    default: '',
  },
});
</script>

<style scoped>
.time-container {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  background-color: var(--white-color);
  border: 1px solid var(--gray-400-color);
  border-radius: 100px;
  width: fit-content;
  height: auto; 
}

.clock-icon {
  width: 20px;
  height: 20px;
  flex: none;
  order: 0;
  flex-grow: 0;
}

.time-text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  flex: none;
  order: 1;
  flex-grow: 0;
}
</style>
