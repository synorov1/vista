<template>
  <div class="star-container">
    <img 
        :src="StarIcon" 
        height="14" 
        width="14" 
        alt="Star"
      />
    <span class="text">{{ text }}</span>
  </div>
</template>

<script setup lang="ts">
import StarIcon from "@/assets/icons/reviews/star.svg";

defineProps({
  text: {
    type: String,
    default: '',
  },
});
</script>

<style scoped>
.star-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 4px;
  cursor:pointer;
}

.star {
  width: 14px;
  height: 14px;
  flex-shrink: 1;
  display: block;
}

.text {
  font-weight: 700;
  font-size: 14px;
  line-height: 100%;
  color: var(--black-color);
  transition: color 0.3s ease;
}

.text:hover {
  color: var(--blue-400-color);
}
</style>