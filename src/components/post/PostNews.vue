<script lang="ts" setup>
import GreyButton from '@/components/common/Buttons/GreyButton.vue';
import IconArrowRight from '@/components/icons/IconArrowRight.vue';
import SquareButton from '@/components/common/Buttons/SquareButton.vue';
import type { PropType } from 'vue';

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  list: {
    type: Array as PropType<any[]>,
    required: true,
  },
})
</script>

<template>
  <section class="post-news">
    <h3 class="post-news__title">
      {{ props.title }}
    </h3>

    <div class="post-news__list">
      <router-link
        v-for="(item, index) in props.list"
        :key="index"
        to="/"
        class="post-news__item"
      >
        <h4 class="post-news__subtitle">
          {{ item.title }}
        </h4>

        <GreyButton
          text="Читать"
          type="secondary"
          size="small"
        >
          <template #icon>
            <span class="post-news__button-icon">
              <IconArrowRight />
            </span>
          </template>
        </GreyButton>
      </router-link>
    </div>
    
    <SquareButton class="w-100" text="Еще 1 200 новостей" />
  </section>
</template>

<style scoped>
.post-news {
  padding: 16px;
  border-radius: 16px;
  border: 1px solid var(--gray-400-color);
}

.post-news__title {
  font-size: 20px;
  font-weight: 800;
  line-height: 24px;
  letter-spacing: -0.02em;
  margin-bottom: 4px;
}

.post-news__list {
  display: flex;
  flex-direction: column;
}

.post-news__item {
  padding: 16px 0;
  color: var(--black-color);
  text-decoration: none;
}

.post-news__item + .post-news__item {
  border-top: 1px solid var(--gray-400-color);
}

.post-news__subtitle {
  font-size: 14px;
  font-weight: 700;
  line-height: 17px;
  margin-bottom: 9px;
}

.post-news__button-icon {
  font-size: 6px;
}

@media (min-width: 768px) {
  .post-news {
    padding: 30px;
  }

  .post-news__title {
    font-size: 26px;
    line-height: 31px;
  }
}
</style>