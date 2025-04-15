<script lang="ts" setup>
import ProfileReviews from '@/components/profile/ProfileReviews.vue';
import ProfileNotReviews from '@/components/profile/ProfileNotReviews.vue';
import data from '@/views/profile/reviews/data.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Мои отзывы');
</script>

<template>
  <div :class="$style.reviews">
    <ProfileNotReviews :products="data.products" />

    <ProfileReviews :reviews="data.reviews" />
  </div>
</template>

<style module>
.reviews {
  margin-bottom: 40px;
  display: flex;
  flex-direction: column;
  gap: 40px;
}

@media (min-width: 768px) {
  .reviews {
    margin-bottom: 60px;
    gap: 60px;
  }
}

@media (min-width: 1024px) {
  .reviews {
    margin-bottom: 80px;
    gap: 80px;
  }
}

@media (min-width: 1440px) {
  .reviews {
    margin-bottom: 100px;
  }
}
</style>