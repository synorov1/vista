<script setup lang="ts">
import BlogCarousel from "@/components/blog/BlogCarousel.vue";
import BlogNews from "@/components/blog/BlogNews.vue";
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Блог');
</script>

<template>
  <div class="blog">
    <BlogCarousel class="blog__carousel" />
    <BlogNews class="blog__news" />
  </div>
</template>

<style scoped>
.blog__carousel {
  margin-bottom: 75px;

  @media (min-width: 768px) {
    margin-bottom: 95px;
  }

  @media (min-width: 1024px) {
    margin-bottom: 115px;
  }
}

.blog__news {
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
