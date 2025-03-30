<script setup lang="ts">
import type { IImg, ISource } from '@/types';

interface IBannerItem {
  id: number;
  source: ISource[];
  img: IImg;
}

defineProps<{
  data: IBannerItem[];
}>();
</script>

<template>
  <section class="flex" :class="$style.section">
    <picture
      v-for="{ id, source, img } in data"
      :key="id"
      class="flex"
      :class="$style.picture"
    >
      <source
        v-for="(item, index) in source"
        :key="index"
        v-bind="item"
      >
      <img
        v-bind="img"
        :class="$style.image"
      >
    </picture>
  </section>
</template>

<style module>
.section {
  flex-direction: column;
  row-gap: 10px;

  margin-top: 40px;
  margin-bottom: 40px;

  @media (min-width: 768px) {
    margin-top: 60px;
    margin-bottom: 60px;
  }
  @media (min-width: 1024px) {
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    row-gap: 30px;

    margin-top: 80px;
    margin-bottom: 80px;
  }
}

.picture {
  align-items: center;
  justify-content: center;
}

.image {
  display: block;
  object-fit: contain;
  max-width: 100%;
  height: auto;
  object-position: center;
  border-radius: unset;
}
</style>