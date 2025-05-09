<script lang="ts" setup>
import List from "@/components/common/List.vue";
import type { PropType } from 'vue';

const props = defineProps({
  image: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
  positionImage: {
    type: String as PropType<'left' | 'right'>,
    default: 'left',
  },
  list: {
    type: Array as PropType<string[]>,
    default: () => [],
  }
})
</script>

<template>
  <div class="image-card" :class="{ 'image-card_image-right': props.positionImage === 'right' }">
    <img
      :src="props.image"
      alt="Shop info image"
      class="image-card__image"
    >

    <div class="image-card__content">
      <h3 class="image-card__title">
        {{ props.title }}
      </h3>
  
      <p class="image-card__text" v-html="props.text" />

      <List v-if="props.list.length > 0" :list="props.list" />
    </div>
  </div>
</template>

<style scoped>
.image-card {
  display: flex;
  flex-direction: column;
}

.image-card__image {
  display: block;
  border-radius: 20px;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 250px;
  margin-bottom: 30px;
}

.image-card__content {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.image-card__title {
  color: var(--black-color);
  font-weight: 800;
  font-size: 30px;
  line-height: 36px;
  letter-spacing: -0.02em;
  margin-bottom: 0;
}

.image-card__text {
  color: var(--gray-800-color);
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  margin-bottom: 0;
}

@media (min-width: 768px) {
  .image-card__image {
    height: 350px;
  }

  .image-card__title {
    font-size: 30px;
    line-height: 36px;
  }
}

@media (min-width: 1024px) {
  .image-card {
    gap: 60px;
    display: grid;
    grid-template-columns: 467px 1fr;
    align-items: center;
  }

  .image-card_image-right {
    grid-template-columns: 1fr 467px;
  }

  .image-card_image-right .image-card__image {
    order: 1;
  }

  .image-card__image {
    min-height: 430px;
    height: 100%;
    margin-bottom: 0;
  }


  .image-card__title {
    font-size: 34px;
    line-height: 41px;
  }
}

@media (min-width: 1440px) { 
  .image-card {
    grid-template-columns: 570px 1fr;
  }

  .image-card_image-right {
    grid-template-columns: 1fr 570px;
  }
}
</style>