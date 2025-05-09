<script setup lang="ts">
  defineProps({
    image: {
      type: String,
      required: true
    }
  })
</script>

<template>
  <div class="advertising-banner">
    <img :src="image" alt="advertising">
  </div>
</template>

<style scoped>
  .advertising-banner {
    width: 470px;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }
</style>