<template>
  <Icon>
    <svg
      width="33"
      height="32"
      viewBox="0 0 33 32"
      fill="#F0F0F0"
      xmlns="http://www.w3.org/2000/svg"
    >
      <path
        fill-rule="evenodd"
        clip-rule="evenodd"
        d="M29.8334 16.0001C29.8334 23.3638 23.8638 29.3334 16.5001 29.3334C9.13628 29.3334 3.16675 23.3638 3.16675 16.0001C3.16675 8.63628 9.13628 2.66675 16.5001 2.66675C23.8638 2.66675 29.8334 8.63628 29.8334 16.0001ZM21.8738 11.9596C22.2643 12.3502 22.2643 12.9833 21.8738 13.3738L15.2071 20.0405C14.8166 20.431 14.1835 20.431 13.793 20.0405L11.1263 17.3738C10.7358 16.9833 10.7358 16.3502 11.1263 15.9597C11.5168 15.5691 12.15 15.5691 12.5405 15.9597L14.5001 17.9191L17.4798 14.9394L20.4597 11.9596C20.8502 11.5691 21.4833 11.5691 21.8738 11.9596Z"
        :fill="completed || active ? '#0084FF' : '#F0F0F0'"
        :stroke="completed || active ? '#0084FF' : '#F0F0F0'"
      />
    </svg>
  </Icon>
</template>

<script setup lang="ts">
import Icon from '../common/Icon.vue';

defineProps({
  completed: {
    type: Boolean,
    default: false
  },
  active: {
    type: Boolean,
    default: false
  }
});
</script>