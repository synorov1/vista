<template>
  <div class="reklama-container">
    <slot></slot>
  </div>
</template>

<script setup lang="ts">
</script>

<style scoped>
.reklama-container {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
}

@media (min-width: 1024px) {
  .reklama-container {
    flex-direction: row;
    justify-content: space-between;
  }
}
</style>
