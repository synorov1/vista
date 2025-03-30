<script lang="ts" setup>
const props = defineProps({
  text: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <span class="bread">
    {{ props.text }}
  </span>
</template>

<style scoped>
.bread {
  border-radius: 30px;
  padding: 6px 10px;
  background-color: var(--white-color);
  font-size: 14px;
  font-weight: 500;
  line-height: 17px;
  letter-spacing: -0.02em;
  color: var(--gray-600-color);
}
</style>