<template>
  <div
    ref="dropdown"
    class="select-wrapper"
    @click="toggleDropdown"
  >
    <div class="selected">
      {{ currentValue }}
      <img
        src="../assets/icons/arrow.svg"
        :class="{ 'select-arrow-active': isOpen, 'select-arrow': !isOpen }"
      >
    </div>
    <ul v-if="isOpen" class="dropdown">
      <li
        v-for="option in options"
        :key="option.id"
        :class="{ active: option.id === modelValue }"
        @click.stop="selectOption(option.id)"
      >
        {{ option.title }}
      </li>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from "vue";

export interface Options {
  id: number | string;
  title: string;
}

interface Props {
  options: Options[];
  modelValue?: number | string;
  placeholder?: string;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);

const isOpen = ref(false);
const dropdown = ref<HTMLElement | null>(null);

const currentValue = computed(() => {
  if (typeof props.modelValue === "undefined") {
    return props.placeholder || '';
  }

  const option = props.options.find(v => v.id === props.modelValue);

  if (!option) {
    return '';
  }

  return option.title;
})

const toggleDropdown = () => {
  isOpen.value = !isOpen.value;
};

const selectOption = (id: number | string) => {
  emit("update:modelValue", id);
  isOpen.value = false;
};

const handleClickOutside = (event: MouseEvent) => {
  if (dropdown.value && !dropdown.value.contains(event.target as Node)) {
    isOpen.value = false;
  }
};

onMounted(() => {
  document.addEventListener("click", handleClickOutside);
});

onUnmounted(() => {
  document.removeEventListener("click", handleClickOutside);
});
</script>

<style scoped>
.select-wrapper {
  width: 100%;
  position: relative;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
  padding: 14px;
  cursor: pointer;
  background: var(--white-color);
  user-select: none;
}

.selected {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 16px;
}

.select-arrow {
  rotate: 90deg;
}

.select-arrow-active {
  rotate: -90deg;
}

.dropdown {
  position: absolute;
  width: 100%;
  top: 100%;
  left: 0;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
  list-style: none;
  padding: 0;
  margin: 5px 0 0;
  max-height: 200px;
  overflow-y: auto;
  box-shadow: 0 4px 6px var(--gray-400-color);
  background: var(--white-color);
  z-index: 1;
}

.dropdown::-webkit-scrollbar {
  width: 0px;
}

.dropdown li {
  padding: 10px;
  cursor: pointer;
}

.dropdown li:hover,
.dropdown .active {
  background: #f0f0f0;
}
</style>
