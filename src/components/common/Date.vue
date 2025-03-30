<script lang="ts" setup>
const props = defineProps({
  date: {
    type: String,
    required: true,
  },
});
</script>

<!-- TODO мб еще где то будет использоваться, если нет, то можно в блог перенести -->
<template>
  <span class="date">{{ props.date }}</span>
</template>

<style scoped>
.date {
  font-size: 14px;
  font-weight: 500;
  line-height: 17px;
  letter-spacing: -0.02em;
  color: var(--gray-600-color);
}
</style>