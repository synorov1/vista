<script lang="ts" setup>
import SquareButton from '@/components/common/Buttons/SquareButton.vue';
import PostMainItem from '@/components/post/PostMainItem.vue';
import type { PropType } from 'vue';
import SocialLinks from '@/components/socialLinks/SocialLinks.vue';
import SocialLinksItem from '@/components/socialLinks/SocialLinksItem.vue';
import PostMainInfo from '@/components/post/PostMainInfo.vue';

const props = defineProps({
  image: {
    type: String,
    default: '',
  },
  title: {
    type: String,
    required: true,
  },
  text: {
    type: String,
    required: true,
  },
  items: {
    type: Array as PropType<any[]>,
    default: () => [],
  },
  theme: {
    type: String,
    required: true,
  },
  date: {
    type: String,
    required: true,
  },
})
</script>

<template>
  <section class="post-main">
    <PostMainInfo :theme="props.theme" :date="props.date" />

    <div class="post-main__content">
      <img
        v-if="props.image"
        class="post-main__image"
        :src="props.image"
        alt="Post image"
      >

      <h1 class="post-main__title">
        {{ props.title }}
      </h1>

      <p class="post-main__text">
        {{ props.text }}
      </p>

      <SquareButton class="w-100" text="Хочу начать тренироваться" />
    </div>

    <div v-if="props.items.length > 0" class="post-main__items">
      <PostMainItem
        v-for="(item, index) in props.items"
        :key="index"
        :title="item.title"
        :images="item.images"
        :text="item.text"
        :has-button="item.hasButton"
      />
    </div>

    <div class="post-main__social">
      <SocialLinks>
        <template #additionally>
          <SocialLinksItem
            class="post-main__social-link"
            image="/src/assets/icons/repost-round.svg"
            alt="repost"
          />
        </template>
      </SocialLinks>
    </div>
  </section>
</template>

<style scoped>
.post-main {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.post-main__content {
  display: flex;
  flex-direction: column;
}

.post-main__image {
  display: block;
  border-radius: 16px;
  object-fit: cover;
  object-position: center;
  width: 100%;
  height: 200px;
  margin-bottom: 20px;
}

.post-main__title {
  font-size: 20px;
  font-weight: 800;
  line-height: 24px;
  letter-spacing: -0.02em;
  color: var(--black-color);
  margin-bottom: 16px;
}

.post-main__items {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.post-main__text {
  font-size: 14px;
  font-weight: 400;
  line-height: 20px;
  margin-bottom: 16px;
}

.post-main__social-link {
  margin-left: auto;
}

@media (min-width: 768px) {
  .post-main__image {
    height: 300px;
  }

  .post-main__title {
    font-size: 26px;
    line-height: 31px;
  }

  .post-main__text {
    font-size: 16px;
    line-height: 24px;
  }
}

@media (min-width: 1024px) {
  .post-main,
  .post-main__items {
    gap: 30px;
  }
  
  .post-main__image {
    margin-bottom: 30px;
  }
}
</style>