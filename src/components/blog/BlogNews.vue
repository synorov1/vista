<script lang="ts" setup>
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import SquareButton from '@/components/common/Buttons/SquareButton.vue';
import BlogNewsCard from '@/components/blog/BlogNewsCard.vue';
import BlogNewsThemes from '@/components/blog/BlogNewsThemes.vue';
import XSBlueButton from '~/components/common/buttons/XSBlueButton.vue';
import dataNews from "@/components/blog/blogNews.json";
import dataThemes from "@/components/blog/blogNewsThemes.json";
import { useRouter } from "vue-router";
import { computed, ref } from "vue";
import GreyButton from "../common/Buttons/GreyButton.vue";

const router = useRouter();

const isShowMore = ref(true);

const currentTheme = ref(0);

function goToHome() {
  router.push({name: 'home'});
}

const showMore = () => {
  isShowMore.value = false;
}

const showedNews = computed(() => {
  if (!isShowMore.value) {
    return dataNews;
  }

  return dataNews.slice(0, 3)
}) 
</script>

<template>
  <section class="blog-news">
    <TitleWithButton
      title="Новости"
      button-text="На главную"
      :on-button-click="goToHome"
      class="blog-news__header"
    >
      <template #additionally>
        <XSBlueButton
          class="blog-news__button-title"
          text="Подписаться на новости"
          height="45px"
        />
      </template>
    </TitleWithButton>

    <SquareButton class="blog-news__button-theme" text="Выберите тему" /> 

    <div class="blog-news__wrapper">
      <BlogNewsThemes
        v-model="currentTheme"
        :list="dataThemes"
        class="blog-news__themes"
      >
        <template #bottom>
          <div class="blog-news__themes-buttons">
            <GreyButton
              class="w-100"
              height="45px"
              type="secondary"
              text="Предложить новость"
            />
  
            <XSBlueButton
              class="w-100"
              text="Подписаться на новости"
              height="45px"
            />
          </div>
        </template>
      </BlogNewsThemes>

      <div class="blog-news__card-wrapper">
        <BlogNewsCard
          v-for="item in showedNews"
          :key="item.id"
          :image="item.image"
          :is-important="item.isImportant"
          :date="item.date"
          :theme="item.theme"
          :title="item.title"
          :text="item.text"
        />

        <SquareButton
          v-if="isShowMore"
          class="blog-news__button-more"
          text="Показать ещё"
          @click="showMore"
        />
      </div>
    </div>
  </section>
</template>

<style scoped>
.blog-news__header {
  margin-bottom: 30px;
}

.blog-news__button-more {
  margin-top: 30px;
  width: 100%;
}

.blog-news__wrapper {
  display: flex;
}

.blog-news__themes {
  display: none;
}

.blog-news__card-wrapper {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.blog-news__button-title,
.blog-news__button-theme {
  display: none;
}

@media (min-width: 768px) {
  .blog-news__button-title {
    display: flex;
    margin-right: 20px;
    width: 224px;
  }

  .blog-news__button-theme {
    display: flex;
    width: 100%;
    margin-bottom: 30px;
  }
}

@media (min-width: 1024px) {
  .blog-news__button-theme {
    display: none;
  }

  .blog-news__wrapper {
    gap: 30px;
  }

  .blog-news__card-wrapper {
    flex-grow: 1;
  }

  .blog-news__themes {
    display: flex;
    width: 284px;
    flex-shrink: 0;
  }

  .blog-news__themes-buttons {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
}

@media (min-width: 1440px) { 
  .blog-news__wrapper {
    gap: 24px;
  }
  
  .blog-news__themes {
    width: 300px;
  }
}
</style>