<template>
  <div>
    <button class="btn custom-btn">
      <span>{{ text }}</span>
      <span class="icon"></span>
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
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  gap: 10px;
  min-width: 88px;
  height: 45px;
  border: 1px solid var(--black-color);
  border-radius: 100px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.custom-btn:hover {
  background-color: var(--black-color);
  color: var(--white-color);
}

.custom-btn:hover .icon {
  filter: brightness(0) invert(1);
}

.custom-btn:focus {
  outline: none;
  box-shadow: none;
}

.custom-btn .icon {
  width: 20px;
  height: 20px;
  background-image: url('/src/assets/icons/arrow.svg');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  min-width: 20px;
  min-height: 20px;
  transition: filter 0.3s ease;
}

@media (max-width: 600px) {
  .custom-btn {
    min-width: 70px;
    height: 34px;
    padding: 10px 14px;
    font-size: 14px;
    line-height: 17px;
  }
}
</style>
