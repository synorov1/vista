<script lang="ts" setup>
const props = defineProps({
  text: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <span class="sale">
    {{ props.text }}
  </span>
</template>

<style scoped>
.sale {
  background-color: var(--blue-400-color);
  border-radius: 30px;
  padding: 4px 6px;
  color: var(--white-color);
  font-size: 12px;
  font-weight: 500;
  line-height: 14px;
  letter-spacing: -0.02em;
}
</style>