<script lang="ts" setup>
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import Bread from '~/components/common/Bread.vue';
import Date from '@/components/common/Date.vue';

const props = defineProps({
  image: {
    type: String,
    default: '',  
  },
  title: {
    type: String,
    required: true,
  },
  theme: {
    type: String,
    required: true,
  },
  date: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <div class="blog-carousel-card">
    <img
      class="blog-carousel-card__image"
      :src="props.image"
      :alt="props.title"
    >

    <div class="blog-carousel-card__content">
      <div class="blog-carousel-card__content-top">
        <Bread :text="props.theme" />

        <Date :date="props.date" />
      </div>
      
      <h2 class="blog-carousel-card__title">
        {{ props.title }}
      </h2>
      
      <p class="blog-carousel-card__text">
        {{ props.text }}
      </p>

      <XSBlueButton
        class="blog-carousel-card__button"
        text="Читать"
        height="45px"
      />
    </div>
  </div>
</template>

<style scoped>
.blog-carousel-card {
  display: flex;
  flex-direction: column;
  letter-spacing: -0.02em;
}

.blog-carousel-card__image {
  display: block;
  border-radius: 20px;
  align-self: center;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 200px;
}

.blog-carousel-card__content {
  background-color: var(--gray-200-color);
  border-radius: 20px;
  padding: 16px;
  display: flex;
  flex-direction: column;
}

.blog-carousel-card__content-top {
  display: flex;
  justify-content: space-between;
  margin-bottom: 10px;
}

.blog-carousel-card__title {
  font-size: 24px;
  font-weight: 800;
  line-height: 40px;
  margin-bottom: 10px;
}

.blog-carousel-card__text {
  font-size: 16px;
  line-height: 24px;
  margin-bottom: 20px;
}

.blog-carousel-card__button {
  width: 170px;
}

@media (min-width: 768px) {
  .blog-carousel-card__content {
    padding: 30px;
  }

  .blog-carousel-card__image {
    height: 350px;
  }
}

@media (min-width: 1024px) {
  .blog-carousel-card {
    display: grid;
    grid-template-columns: 1fr 1fr;
  }

  .blog-carousel-card__image {
    height: 450px;
  }

  .blog-carousel-card__title {
    font-size: 34px;
    line-height: 40px;
  }

  .blog-carousel-card__text {
    font-size: 18px;
    line-height: 30px;
  }

  .blog-carousel-card__button {
    margin-top: auto;
  }
}
</style>