<template>
  <div class="block-container">
    <p class="title">
      {{ title }}
    </p>
    <p v-if="subtitle" class="subtitle">
      {{ subtitle }}
    </p>
    <slot class="slot" />
  </div>
</template>

<script setup lang="ts">

defineProps({
  title: {
    type: String,
    required: true,
  },
  subtitle: {
    type: String,
    default: '',
  },
});

</script>

<style scoped>
.block-container {
  display: flex;
  flex-direction: column;
  padding: 30px;
  color: var(--gray-800-color);
  background-color: var(--gray-200-color);
  border-radius: 20px;
}

.title {
  font-size: 26px;
  font-weight: 700;
  line-height: 31px;
  color: var(--black-color);
  margin-bottom: 6px;
}
.subtitle {
  font-size: 16px;
  font-weight: 500;
  line-height: 19px;
  color: var(--gray-600-color);
  margin-bottom: 10px;
}
</style>