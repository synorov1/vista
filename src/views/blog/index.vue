<script setup lang="ts">
import BlogCarousel from "@/components/blog/BlogCarousel.vue";
import BlogNews from "@/components/blog/BlogNews.vue";
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Блог');
</script>

<template>
  <div>
    <BlogCarousel :class="$style.carousel" />
    <BlogNews :class="$style.news" />
  </div>
</template>

<style module>
.carousel {
  margin-bottom: 75px;

  @media (min-width: 768px) {
    margin-bottom: 95px;
  }

  @media (min-width: 1024px) {
    margin-bottom: 115px;
  }
}

.news {
  margin-bottom: 56px;

  @media (min-width: 768px) {
    margin-bottom: 60px;
  }

  @media (min-width: 1024px) {
    margin-bottom: 80px;
  }

  @media (min-width: 1440px) {
    margin-bottom: 110px;
  }
}
</style>
