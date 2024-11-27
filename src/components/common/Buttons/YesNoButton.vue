<template>
  <div class="yes-no-container">
    <div class="ellipse" :style="{ background: isAvailable ? '#8CFF63' : '#FF6363' }"></div>
    <span class="text">{{ isAvailable ? availableText : unavailableText }}</span>
  </div>
</template>

<script setup lang="ts">
defineProps({
  isAvailable: {
    type: Boolean,
    default: true,
  },
  availableText: {
    type: String,
    default: 'Yes',
  },
  unavailableText: {
    type: String,
    default: 'No',
  },
});
</script>

<style scoped>
.yes-no-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0px;
  gap: 4px;
  width: 44px;
  height: 17px;
  cursor: pointer;
}

.ellipse {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  flex: none;
  order: 0;
  flex-grow: 0;
}

.text {
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 700;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  flex: none;
  order: 1;
  flex-grow: 0;
}
</style>
