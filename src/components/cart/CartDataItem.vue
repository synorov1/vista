<template>
  <div class="data-item">
    <slot></slot>
  </div>
</template>

<script setup lang="ts">

</script>

<style scoped>
.data-item {
  border: 1px solid #D9D9D9;
  background: #fff;
  border-radius: 20px;
  padding: 30px;
}

@media (max-width: 992px) {
  .data-item {
    padding: 16px;
  }
}
</style>base