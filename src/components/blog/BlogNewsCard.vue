<script lang="ts" setup>
import Bread from '@/components/common/Bread.vue';
import Sale from '@/components/common/Sale.vue';
import IconImageEmpty from '@/components/icons/IconImageEmpty.vue';
import BlackArrowButton from "@/components/common/Buttons/BlackArrowButton.vue";
import Date from '@/components/common/Date.vue';

const props = defineProps({
  image: {
    type: String,
    default: '',  
  },
  isImportant: {
    type: Boolean,
    default: false,
  },
  date: {
    type: String,
    required: true,
  },
  theme: {
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
})

</script>

<template>
  <router-link to="/" class="blog-news-card">
    <div class="blog-news-card__image-wrapper">
      <Sale
        v-if="props.isImportant"
        class="blog-news-card__important"
        text="Важно"
      />

      <img
        v-if="props.image"
        :src="props.image"
        alt="Blog news image"
        class="blog-news-card__image"
      >

      <div class="blog-news-card__image-empty">
        <IconImageEmpty />
      </div>
    </div>

    <div class="blog-news-card__content">
      <Date class="blog-news-card__date" :date="props.date" />

      <Bread :text="props.theme" class="blog-news-card__bread" />

      <h3 class="blog-news-card__title">
        {{ props.title }}
      </h3>

      <p class="blog-news-card__text">
        {{ props.text }}
      </p>
    </div>

    <BlackArrowButton text="Читать" class="blog-news-card__button" />
  </router-link>
</template>

<style scoped>
.blog-news-card {
  padding: 16px;
  background-color: var(--gray-100-color);
  gap: 16px;
  display: flex;
  flex-direction: column;
  border-radius: 16px;
  color: var(--black-color);
  text-decoration: none;
}

.blog-news-card:hover {
  color: inherit;
}

.blog-news-card__image-wrapper {
  position: relative;
  background-color: var(--white-color);
  border-radius: 16px;
  overflow: hidden;
  width: 100%;
  height: 150px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.blog-news-card__important {
  position: absolute;
  left: 16px;
  top: 16px;
  z-index: 2;
}

.blog-news-card__image {
  display: block;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  width: 183px;
  object-fit: contain;
}

.blog-news-card__image-empty {
  font-size: 67px;
  line-height: 0;
  color: var(--gray-400-color);
}

.blog-news-card__content {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.blog-news-card__bread {
  align-self: flex-start;
}

.blog-news-card__title {
  font-size: 20px;
  font-weight: 700;
  line-height: 24px;
  color: var(--black-color);
  margin-bottom: 0;
}

.blog-news-card__text {
  font-size: 14px;
  font-weight: 400;
  line-height: 20px;
  margin-bottom: 0;
  color: var(--gray-800-color);
}

.blog-news-card__button {
  width: 100%;
}

@media (min-width: 768px) {
  .blog-news-card {
    flex-direction: row;
    gap: 20px;
    padding: 20px;
  }

  .blog-news-card__image-wrapper {
    width: 150px;
    height: 210px;
    flex-shrink: 0;
  }

  .blog-news-card__image {
    top: 45px;
    left: auto;
    right: 10px;
    transform: none;
  }

  .blog-news-card__content {
    flex-grow: 1;
  }

  .blog-news-card__button {
    width: auto;
  }

  .blog-news-card__date {
    order: 1;
    margin-top: auto;
  }

  .blog-news-card__text {
    font-size: 16px;
    line-height: 24px;
  }
}
</style>