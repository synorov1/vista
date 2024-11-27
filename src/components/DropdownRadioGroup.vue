<template>
  <div class="dropdown-radio-group">
    <div class="dropdown" v-if="isMobile">
      <button class="btn btn-secondary dropdown-toggle" type="button" @click="toggleDropdown">
        {{ selectedOption }}
      </button>
      <ul class="dropdown-menu" v-if="isDropdownOpen">
        <li v-for="(option, index) in options" :key="index" @click="selectOption(option)">
          {{ option }}
        </li>
      </ul>
    </div>
    <div class="radio-group" v-else>
      <label v-for="(option, index) in options" :key="index" class="radio-label" :class="{ active: option === selectedOption }">
        <input type="radio" name="options" :value="option" v-model="selectedOption" />
        <span>{{ option }}</span>
        <div v-if="index < options.length - 1" class="separator"></div>
      </label>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, computed, toRef } from 'vue';
import type { PropType } from 'vue';

  const props = defineProps({
    options: {
      type: Array as PropType<string[]>,
      required: true
    }
  })
  const options = toRef(props, 'options');
  const selectedOption = ref(options.value[0]);
  const isDropdownOpen = ref(false);

  const isMobile = computed(() => {
    return window.innerWidth <= 768;
  })
  const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
  };
  const selectOption = (option: string) => {
    selectedOption.value = option;
    isDropdownOpen.value = false;
  }
</script>

<style scoped>
.dropdown-radio-group {
  position: relative;
  width: 100%;
}

.dropdown {
  position: relative;
  display: inline-block;
  width: 100%;
}

.dropdown-toggle {
  width: 100%;
  height: 45px;
  border-radius: 6px;
  background-color: white;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
  display: flex;
  justify-content: center;
  align-items: center;
}

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  background-color: white;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
  list-style: none;
  padding: 0;
  margin: 0;
  z-index: 1;
}

.dropdown-menu li {
  padding: 14px 16px;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-weight: 400;
  font-size: 14px;
  line-height: 17px;
  color: var(--black-color);
}

.dropdown-menu li:hover {
  background-color: var(--gray-100-color);
}

.radio-group {
  display: flex;
  flex-direction: row;
  align-items: center;
  padding: 0;
  border: 1px solid var(--gray-400-color);
  border-radius: 6px;
}

.radio-label {
  display: flex;
  align-items: center;
  padding: 14px;
  gap: 10px;
  cursor: pointer;
  font-family: 'Inter', sans-serif;
  font-weight: 600;
  font-size: 14px;
  line-height: 17px;
  color: var(--gray-600-color);
}

.radio-label input[type="radio"] {
  display: none;
}

.radio-label.active {
  background-color: var(--gray-100-color);
}

.radio-label span {
  display: inline-block;
  width: 100%;
  text-align: center;
}

.radio-label:first-child {
  border-radius: 6px 0 0 6px;
}

.radio-label:last-child {
  border-radius: 0 6px 6px 0;
}

.separator {
  width: 1px;
  height: 16px;
  background-color: var(--gray-400-color);
  margin: 0 10px;
}

@media (min-width: 768px) {
  .dropdown-radio-group {
    width: auto;
  }
}
</style>
