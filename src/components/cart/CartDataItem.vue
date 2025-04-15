<template>
  <div :class="$style.dataItem">
    <slot />
  </div>
</template>

<script setup lang="ts">

</script>

<style module>
.dataItem {
  border: 1px solid #D9D9D9;
  background: #fff;
  border-radius: 20px;
  padding: 30px;
}

@media (max-width: 992px) {
  .dataItem {
    padding: 16px;
  }
}
</style>