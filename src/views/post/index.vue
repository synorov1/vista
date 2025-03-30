<script setup lang="ts">
import PostMain from '@/components/post/PostMain.vue';
import PostBanner from '@/components/post/PostBanner.vue';
import PostNews from '@/components/post/PostNews.vue';
import PostArticles from '@/components/post/PostArticles.vue';
import data from './post.json';
import { usePageTitle } from '@/composables/usePageTitle';

usePageTitle('Статья');
</script>

<template>
  <div class="post">
    <div class="post__left">
      <router-link class="btn post__button" to="/blog">
        На главную  блога
      </router-link>
    </div>

    <PostMain
      class="post__main"
      :image="data.mainImage"
      :title="data.title"
      :text="data.text"
      :items="data.items"
      :theme="data.theme"
      :date="data.date"
    />

    <div class="post__right">
      <PostNews :title="data.news.title" :list="data.news.list" />

      <PostBanner
        :title="data.bannerTitle"
        :text="data.bannerText"
        :image="data.bannerImage"
      />
    </div>
    <!-- TODO по макету слайдер не в общем контейнер и футера нету, если исправлять то через lauoyt -->
    <PostArticles class="post__articles" :list="data.articles" />
  </div>
</template>

<style scoped>
.post {
  padding-bottom: 68px;
  position: relative;
}

.post__left {
  margin-bottom: 20px;
}

.post__button {
  height: 45px;
  padding: 14px;
  background-color: var(--gray-300-color);
  border-radius: 6px;
  color: var(--gray-600-color);
  font-weight: 600;
  line-height: 17px;
  border: none;
  font-size: 14px;
}

.post__main {
  margin-bottom: 40px;
}

.post__banner {
  margin-bottom: 40px;
}

.post__right {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 40px;
}

@media (min-width: 768px) {
  .post {
    padding-bottom: 98px;
  }
  
  .post__left,
  .post__main,
  .post__right {
    max-width: 568px;
    margin-left: auto;
    margin-right: auto;
  }

  .post__main,
  .post__right {
    margin-bottom: 60px;
  }

  .post__right {
    gap: 30px;
  }
}

@media (min-width: 1024px) {
  .post {
    padding-bottom: 80px;
  }

  .post__left {
    position: absolute;
    left: 0;
    top: 0;
    margin: 0;
  }
}

@media (min-width: 1440px) {
  .post {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    column-gap: 50px;
    padding-bottom: 157px;
  }

  .post__left {
    position: static;
    width: 155px;
    flex-shrink: 0;
    margin-right: auto;
  }

  .post__main {
    margin: 0
  }

  .post__right {
    width: 300px;
    margin: 0;
  }

  .post__articles {
    width: 100%;
    margin-top: 100px;
  }
}
</style>
