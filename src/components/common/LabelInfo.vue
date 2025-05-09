<script lang="ts" setup>
interface Props {
  title: string;
  text: string;
}

const props = defineProps<Props>();
</script>

<template>
  <div class="label-info">
    <span>{{ props.title }}: <span class="label-info__text">{{ props.text }}</span></span>
  </div>
</template>

<style scoped>
.label-info {
  padding: 6px 10px;
  border-radius: 30px;
  background-color: var(--gray-300-color);
  font-weight: 500;
  font-size: 14px;
  line-height: 17x;
  color: var(--gray-600-color);
  letter-spacing: -0.02em;
}

.label-info__text {
  color: var(--black-color);
}
</style>