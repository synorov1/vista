<template>
  <button
    class="btn"
    :class="buttonClass"
    :style="{ height: height }"
  >
    <span>{{ props.text }}</span>

    <slot v-if="slots.icon" name="icon" />
  </button>
</template>

<script setup lang="ts">
import {computed, useSlots} from "vue";

interface Props {
  text: string;
  type?: 'primary' | 'secondary';
  height?: string;
  size?: 'default' | 'small';
}

const props = withDefaults(defineProps<Props>(), {
  text: 'Button',
  type: 'primary',
  height: '34px',
  size: 'default',
});

const buttonClass = computed(() => ({
  'gray-btn': props.type === 'primary',
  'gray-btn-secondary': props.type === 'secondary',
  'gray-btn_small': props.size === 'small',
}));

const slots = useSlots();
</script>

<style scoped>
.btn {
  box-sizing: border-box;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 14px;
  min-width: 58px;
  height: 34px;
  gap: 10px;
  border-radius: 6px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  outline: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.gray-btn_small {
  padding: 6px 10px;
}

.btn:focus {
  outline: none;
  box-shadow: none;
}

.gray-btn {
  border: 1px solid var(--gray-600-color);
  color: var(--gray-600-color);
}

.gray-btn:hover {
  background-color: var(--gray-100-color);
}

.gray-btn:focus {
  outline: none;
  box-shadow: none;
}

.gray-btn-secondary {
  background-color: var(--gray-100-color);
  color: var(--black-color);
}
.gray-btn-secondary:hover {
  background-color: transparent;
  color: var(--gray-600-color);
}

</style>
