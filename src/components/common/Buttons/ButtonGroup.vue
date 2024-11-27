<template>
  <div class="button-group">
    <ButtonComponent v-for="(button, index) in buttons" :key="index" :text="button" />
  </div>
</template>

<script setup lang="ts">
import ButtonComponent from '@/components/common/Buttons/ButtonComponent.vue';
import type { PropType } from 'vue';

defineProps({
  buttons: {
    type: Array as PropType<string[]>,
    required: true
  }
})
</script>

<style scoped>
.button-group {
  display: flex;
  flex-direction: row;
  gap: 10px;
  overflow-x: auto;
  white-space: nowrap;
  padding: 10px;
  box-sizing: border-box;
  width: 100vw; /* 100vw для полной ширины экрана */
  position: relative;
  right: 50%;
  transform: translateX(50%);
}

@media (min-width: 768px) {
  .button-group {
    flex-wrap: wrap;
    overflow-x: hidden;
    white-space: normal;
    right: 0;
    transform: none;
  }
}

.button-group > * {
  flex: 0 1 auto;
}
</style>
