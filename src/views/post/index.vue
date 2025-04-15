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
  <div :class="$style.post">
    <div :class="$style.left">
      <router-link :class="[$style.btn, $style.button]" to="/blog">
        На главную  блога
      </router-link>
    </div>

    <PostMain
      :class="$style.main"
      :image="data.mainImage"
      :title="data.title"
      :text="data.text"
      :items="data.items"
      :theme="data.theme"
      :date="data.date"
    />

    <div :class="$style.right">
      <PostNews :title="data.news.title" :list="data.news.list" />

      <PostBanner
        :title="data.bannerTitle"
        :text="data.bannerText"
        :image="data.bannerImage"
      />
    </div>
    <!-- TODO по макету слайдер не в общем контейнер и футера нету, если исправлять то через lauoyt -->
    <PostArticles :class="$style.articles" :list="data.articles" />
  </div>
</template>

<style module>
.post {
  padding-bottom: 68px;
  position: relative;
}

.left {
  margin-bottom: 20px;
}

.button {
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

.main {
  margin-bottom: 40px;
}

.banner {
  margin-bottom: 40px;
}

.right {
  display: flex;
  flex-direction: column;
  gap: 16px;
  margin-bottom: 40px;
}

@media (min-width: 768px) {
  .post {
    padding-bottom: 98px;
  }
  
  .left,
  .main,
  .right {
    max-width: 568px;
    margin-left: auto;
    margin-right: auto;
  }

  .main,
  .right {
    margin-bottom: 60px;
  }

  .right {
    gap: 30px;
  }
}

@media (min-width: 1024px) {
  .post {
    padding-bottom: 80px;
  }

  .left {
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

  .left {
    position: static;
    width: 155px;
    flex-shrink: 0;
    margin-right: auto;
  }

  .main {
    margin: 0
  }

  .right {
    width: 300px;
    margin: 0;
  }

  .articles {
    width: 100%;
    margin-top: 100px;
  }
}
</style>
