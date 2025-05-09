<script lang="ts" setup>
import type { PropType } from 'vue';

const props = defineProps({
  isActive: {
    type: Boolean,
    default: false,
  },
  theme: {
    type: String as PropType<'default' | 'white'>,
    default: 'default',
  },
})
</script>

<template>
  <button
    class="tab"
    :class="[{ _active: props.isActive }, props.theme]"
    type="button"
  >
    <slot />
  </button>
</template>

<style scoped>
.tab {
  padding: 14px;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
  font-weight: 600;
  background: transparent;
  border: none;
  transition: 0.2s;
  flex-grow: 1;
  position: relative;
}

.tab._active {
  pointer-events: none;
}

.tab.default:hover,
.tab._active.default {
  color: var(--black-color);
  background-color: var(--gray-100-color);
}

.tab.white:hover,
.tab._active.white {
  color: var(--black-color);
  background-color: var(--white-color);
}


.tab + .tab::before {
  content: '';
  position: absolute;
  width: 1px;
  height: 16px;
  background-color: var(--gray-400-color);
  top: 50%;
  transform: translateY(-50%);
  left: 0;
}

.tab + .tab::before {
  content: '';
  position: absolute;
  width: 1px;
  height: 16px;
  background-color: var(--gray-400-color);
  top: 50%;
  transform: translateY(-50%);
  left: 0;
}
</style>  