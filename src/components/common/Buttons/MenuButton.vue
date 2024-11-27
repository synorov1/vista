<template>
  <div>
    <button class="btn custom-btn">
      <span class="icon"></span>
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
.custom-btn {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 88px;
  height: 45px;
  background-color: var(--blue-400-color);
  border-radius: 6px;
  border: none;
  color: var(--white-color);
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  transition: background-color 0.3s ease;
  outline: none;
}

.custom-btn:focus {
  outline: none;
  box-shadow: none;
}

.custom-btn:hover {
  background-color: var(--blue-300-color);
}

.custom-btn .icon {
  width: 20px;
  height: 20px;
  background-image: url('/src/assets/icons/menu.svg');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  min-width: 20px;
  min-height: 20px;
}

@media (max-width: 600px) {
  .custom-btn {
    height: 34px;
  }
}
</style>
