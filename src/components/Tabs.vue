<template>
  <div class="tabs">
    <Tab
      v-for="tab in props.list"
      :key="tab.id"
      :is-active="tab.id === props.modelValue"
      :theme="props.theme"
      @click="emits('update:modelValue', tab.id)"
    >
      {{ tab.title }}
    </Tab>
  </div>
</template>

<script setup lang="ts">
import Tab from '@/components/Tab.vue';

interface List {
  id: string | number;
  title: string;
}

interface Props {
  modelValue: number | string;
  list: List[],
  theme?: 'default' | 'white'
}

const props = withDefaults(defineProps<Props>(), {
  theme: 'default',
});

const emits = defineEmits(['update:modelValue']);
</script>

<style scoped>
.tabs {
  display: flex;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
  overflow: hidden;
}
</style>
