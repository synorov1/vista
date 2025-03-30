<template>
  <div v-drag-scroller.onlyX class="product-card-params hide-scrollbar">
    <button
      v-for="item in props.list"
      :key="item.id"
      type="button"
      class="product-card-params__button btn"
      :class="{ 'is-active': item.id === currentParam }"
      @click="currentParam = item.id"
    >
      {{ item.text }}
    </button>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue';

interface ParamsList {
  id: number;
  text: string;
}

interface Props {
  list: ParamsList[];
}

const props = defineProps<Props>();

const currentParam = ref(props.list[0].id)
</script>

<style scoped>
.product-card-params {
  display: flex;
  gap: 4px;
  overflow-x: auto;
}

.product-card-params__button {
  white-space: nowrap;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 14px;
  height: 34px;
  border: 1px solid transparent;
  border-radius: 100px;
  font-family: 'Inter', sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 14px;
  line-height: 100%;
  color: var(--black-color);
  outline: none;
  transition: all 0.3s ease, color 0.3s ease;
}

.product-card-params__button:focus {
  outline: none;
  box-shadow: none;
}

.product-card-params__button:hover {
  border-color: var(--blue-400-color);
  color: var(--blue-400-color);
}

.product-card-params__button.is-active {
  border-color: var(--blue-400-color);
  color: var(--blue-400-color);
}
</style>