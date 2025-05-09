<template>
  <div :class="$style.reklamaContainer">
    <slot />
  </div>
</template>

<script setup lang="ts">
</script>

<style module>
.reklamaContainer {
  display: flex;
  flex-direction: column;
  gap: 16px;
  width: 100%;
}

@media (min-width: 1024px) {
  .reklamaContainer {
    flex-direction: row;
    justify-content: space-between;
  }
}
</style>
