<template>
  <div :class="$style.rating">
    <img 
      :src="StarIcon" 
      height="21" 
      width="21" 
      alt="Star"
    >
    <span :class="$style.ratingText">5.0 из 5.0 на основе всех оценок</span>
  </div>
</template>

<script setup lang="ts">
import StarIcon from "@/assets/icons/reviews/star.svg";
</script>

<style module>
.rating {
  display: flex;
  align-items: center;
  gap: 4px;
  flex-shrink: 1;
  min-width: 0;
}

.ratingText {
  font-size: 14px;
  color: #000;
  font-weight: 700;
  line-height: 100%;
  white-space: normal;
  overflow-wrap: break-word;
}

@media (max-width: 768px) {
  .rating img {
    height: 14px;
    width: 14px;
  }
}

</style>