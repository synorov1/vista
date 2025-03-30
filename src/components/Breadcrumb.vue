<script setup lang="ts">
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
});
</script>

<template>
  <router-link :to="'/' + path" class="breadcrumb">
    <div :class="['breadcrumb__text', {'breadcrumb__text--disabled': disabled}]">
      {{ text }}
    </div>
    <img :src="disabled ? '/src/assets/icons/gray-arrow-right.svg' : '/src/assets/icons/arrow.svg'" :class="['breadcrumb__arrow', {'breadcrumb__arrow--disabled': disabled}]">
  </router-link>
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

</style>