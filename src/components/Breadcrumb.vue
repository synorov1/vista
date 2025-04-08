<script setup lang="ts">
import { ref, type PropType } from "vue"
defineProps({
  text: {
    type: String,
    default: 'Button',
  },
  path: {
    type: String,
    default: 'Button',
  },
  disabled: {
    type: Boolean,
    required: false,
  },
  dropdownItems: {
    type: Array as PropType<string[]>,
    default: () => [],
  },
});

const isDropdownVisible = ref(false);

function toggleDropdown() {
  isDropdownVisible.value = !isDropdownVisible.value;
}
</script>

<template>
  <div @click.stop>
    <template v-if="dropdownItems.length">
      <div class="breadcrumb" @click="toggleDropdown">
        <div :class="['breadcrumb__text', {'breadcrumb__text--disabled': disabled}]">
          {{ text }}
        </div>
        <img :src="disabled ? '/src/assets/icons/gray-arrow-right.svg' : '/src/assets/icons/arrow.svg'" :class="['breadcrumb__arrow', {'breadcrumb__arrow--disabled': disabled}]">
      </div>
      <ul v-if="isDropdownVisible" class="dropdown">
        <li v-for="item in dropdownItems" :key="item">
          <span>{{ item }}</span>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.24457 18.6926C8.59658 19.0738 9.19898 19.1047 9.59011 18.7616L11.7973 16.8256C12.7328 16.0051 13.5087 15.3245 14.0415 14.7073C14.6017 14.0582 15 13.3609 15 12.5C15 11.6392 14.6017 10.9418 14.0415 10.2928C13.5087 9.67545 12.7328 8.99487 11.7973 8.17438L9.59011 6.23837C9.19898 5.8953 8.59658 5.92625 8.24457 6.30733C7.89255 6.68854 7.92431 7.27565 8.31545 7.61872L10.4705 9.50917C11.4714 10.387 12.1462 10.9818 12.5833 11.4883C13.0029 11.9743 13.0945 12.258 13.0945 12.5C13.0945 12.742 13.0029 13.0257 12.5833 13.5118C12.1462 14.0182 11.4714 14.613 10.4705 15.4909L8.31545 17.3812C7.92431 17.7243 7.89255 18.3114 8.24457 18.6926Z" fill="#D9D9D9"/>
          </svg>
        </li>
      </ul>
    </template>
    <template v-else>
      <router-link :to="'/' + path" class="breadcrumb">
        <div :class="['breadcrumb__text', {'breadcrumb__text--disabled': disabled}]">
          {{ text }}
        </div>
        <img :src="disabled ? '/src/assets/icons/gray-arrow-right.svg' : '/src/assets/icons/arrow.svg'" :class="['breadcrumb__arrow', {'breadcrumb__arrow--disabled': disabled}]">
      </router-link>
    </template>
  </div>
</template>

<style scoped>

  .breadcrumb {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 6px 10px;
    background-color: var(--gray-300-color);
    border-radius: 30px;
    color: var(--black-color);
    text-decoration: none;
    position: relative;
  }

  .breadcrumb__text--disabled {
    color: var(--gray-600-color);
  }

  .breadcrumb__arrow {
    width: 13px;
    height: 13px;
    transform: rotate(90deg);
  }

  .breadcrumb__arrow--disabled {
    transform: rotate(0deg);
  }

  .dropdown {
  position: absolute;
  top: 100%; 
  left: 0;
  background-color: #fff;
  border-radius: 10px;
  z-index: 2; 
  box-shadow: 0px 4px 10px 0px #00000026;
  list-style: none;
  padding: 16px;
  min-width: 275px;
}

.dropdown li {
  height: 36px;
  border-radius: 6px;
  cursor: pointer;
  font-weight: 600;
  font-size: 14px;
  line-break: 100%;
  letter-spacing: 0;
  color: #000;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.dropdown li:hover {
  color: #0084FF;
}
.dropdown li:hover svg path {
  fill: #0084FF;
}

</style>