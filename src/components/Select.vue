<template>
  <label>
    <span v-if="props.label">{{ props.label }} <b v-if="props.required">*</b></span>
  </label>
  <div
    ref="dropdown"
    class="select-wrapper"
    @click="toggleDropdown"
  >
    <div class="selected">
      <template v-if="selectedOption">
  <template v-if="$slots.default">
    <slot :option="selectedOption"></slot>
  </template>
  <template v-else>
    <span>{{ selectedOption.title }}</span>
  </template>
</template>
<template v-else>
  {{ props.placeholder || 'Выберите...' }}
</template>

      <img
        src="../assets/icons/arrow.svg"
        :class="{ 'select-arrow-active': isOpen, 'select-arrow': !isOpen }"
      >
    </div>
    <ul v-if="isOpen" class="dropdown">
      <li
  v-for="option in options"
  :key="option.id"
  :class="{
    active: props.accept && option.id === pendingSelection,
    'selected-option': props.accept && !pendingSelection && option.id === props.modelValue
  }"
  @click.stop="handleOptionClick(option.id)"
>

        <template v-if="$slots.option">
          <slot name="option" :option="option"></slot>
        </template>
        <template v-else>
          {{ option.title }}
        </template>
      </li>

      <template v-if="$slots.accept">
        <div class="accept">
          <slot name="accept" :onConfirm="confirmSelection"></slot>
        </div>
      </template>
    </ul>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted, computed } from "vue";

export interface Options {
  id: number | string;
  title: string;
  [key: string]: any;
}

interface Props {
  options: Options[];
  modelValue?: number | string;
  placeholder?: string;
  label?: string;
  required?: boolean;
  accept?: boolean;
}

const props = defineProps<Props>();
const emit = defineEmits(["update:modelValue"]);

const isOpen = ref(false);
const dropdown = ref<HTMLElement | null>(null);

const selectedOption = computed(() => {
  return props.options.find(v => v.id === props.modelValue);
});

const pendingSelection = ref<number | string | null>(null);

const toggleDropdown = () => {
  isOpen.value = !isOpen.value;
  if (isOpen.value) {
    pendingSelection.value = props.modelValue ?? null;
  }
};

const handleOptionClick = (id: number | string) => {
  if (props.accept) {
    pendingSelection.value = id;
  } else {
    emit("update:modelValue", id);
    isOpen.value = false;
  }
};


const confirmSelection = () => {
  if (pendingSelection.value !== null) {
    emit("update:modelValue", pendingSelection.value);
  }
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
  padding: 0 14px;
  cursor: pointer;
  background: var(--white-color);
  user-select: none;
  height: 45px;
  display: flex;
}

.selected {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  font-size: 14px;
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
  top: calc(100% + 5px);
  left: 0;
  border: 1px solid var(--gray-400-color);
  list-style: none;
  padding: 10px;
  max-height: 200px;
  overflow-y: auto;
  box-shadow: 0px 4px 10px 0px #00000026;
  border-radius: 10px;
  background: var(--white-color);
  z-index: 2;
}

.dropdown li {
  cursor: pointer;
  font-size: 14px;
  border-radius: 6px;
  height: 45px;
  padding-left: 14px;
  display: flex;
  align-items: center;
  border: 1px solid transparent;
}

.dropdown li.active {
  border: 1px solid #0084FF;
}

.dropdown li.selected-option {
  border: 1px solid #0084FF;
}

.dropdown li:hover {
  background: #f0f0f0;
}

span {
  font-size: 14px;
  font-weight: 400;
  line-height: 100%;
  color: #000;
}

b {
  color: #0084FF;
  font-size: 14px;
  font-weight: 400;
  line-height: 100%;
}

.accept {
  margin-top: 30px;
}

.accept:deep(button) {
  padding: 0 42px;
}

@media (max-width: 768px) {
  .select-wrapper {
    padding: 10px 16px;
  }
}
</style>
