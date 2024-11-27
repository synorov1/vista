<template>
  <button class="button-component">{{ text }}</button>
</template>

<script setup lang="ts">
defineProps({
  text: {
    type: String,
    required: true
  }
})
</script>

<style scoped>
.button-component {
  padding: 14px;
  background-color: var(--blue-400-color);
  color: white;
  border: none;
  border-radius: 100px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 10px;
  width: auto;
  height: 34px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  white-space: nowrap;
}
</style>
