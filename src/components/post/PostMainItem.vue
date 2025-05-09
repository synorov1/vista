<script lang="ts" setup>
import type { PropType } from 'vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  images: {
    type: Array as PropType<string[]>,
    default: ()=> [],
  },
  text: {
    type: String,
    required: true,
  },
  hasButton: {
    type: Boolean,
    default: false,
  },
})
</script>

<template>
  <div class="post-main-item">
    <h2 class="post-main-item__title">
      {{ props.title }}
    </h2>

    <div v-if="props.images.length > 0" class="post-main-item__image-wrapper">
      <img
        v-for="(image, index) in props.images"
        :key="index"
        class="post-main-item__image"
        :src="image"
      >
    </div>

    <p class="post-main-item__text" v-html="props.text" />

    <!-- TODO не знаю как будет button появляться, поэтому через props.hasButton -->
    <XSBlueButton
      v-if="props.hasButton"
      class="w-100"
      text="Купить"
      height="45px"
    />
  </div>
</template>

<style scoped>
.post-main-item {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.post-main-item__title {
  font-size: 20px;
  font-weight: 800;
  line-height: 24px;
  letter-spacing: -0.02em;
  margin-bottom: 0;
  color: var(--black-color);
}

.post-main-item__image-wrapper {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.post-main-item__image {
  display: block;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
  overflow: hidden;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 240px;
}

.post-main-item__text {
  font-size: 14px;
  font-weight: 400;
  line-height: 20px;
  color: var(--gray-800-color);
  margin-bottom: 0;
}

@media (min-width: 768px) {
  .post-main-item__title  {
    font-size: 26px;
    line-height: 31px;
  }

  .post-main-item__text {
    font-size: 16px;
    line-height: 24px;
  }

  .post-main-item__image-wrapper {
    /* TODO не понятно сколько может быть картинок, в будующем можно изменить на grid или типо того */
    flex-direction: row;
    gap: 30px;
  }
}

@media (min-width: 1024px) {
  .post-main-item  {
    gap: 30px;
  }
}
</style>