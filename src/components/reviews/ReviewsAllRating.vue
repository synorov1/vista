<template>
    <div class="rating">
      <img 
        :src="StarIcon" 
        height="21" 
        width="21" 
        alt="Star"
      />
      <span class="rating__text">5.0 из 5.0 на основе всех оценок</span>
    </div>
</template>

<script setup lang="ts">
// @ts-ignore
import StarIcon from "@/assets/icons/reviews/star.svg";
</script>

<style scoped>
.rating {
  display: flex;
  align-items: center;
  gap: 4px;
  flex-shrink: 1;
  min-width: 0;
}

.rating__text {
  font-size: 14px;
  color: #000;
  font-weight: 700;
  line-height: 100%;
  white-space: normal;
  overflow-wrap: break-word;
}

@media (max-width: 768px) {
  img {
    height: 14px;
    width: 14px;
  }
}

</style>