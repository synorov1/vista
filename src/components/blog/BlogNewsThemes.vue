<script lang="ts" setup>
import type { PropType } from 'vue';
import { useSlots } from 'vue';

interface List {
  key: number;
  title: string;
}

const props = defineProps({
  modelValue: {
    type: Number,
    required: true,
  },
  list: {
    type: Array as PropType<List[]>,
    required: true,
  }
})

const emit = defineEmits(['update:modelValue']);

const slots = useSlots();
</script>
<!-- TODO CatalogTabsMenu очень похож, возможно можно будет сделать одним компонентом -->
<template>
  <div div class="blog-news-themes">
    <h3 class="blog-news-themes__title">
      Темы
    </h3>

    <div class="blog-news-themes__list">
      <a
        v-for="(item, index) in props.list"
        :key="index"
        href="#"
        :class="[
          'blog-news-themes__item',
          {'active': props.modelValue === item.key},
        ]"
        @click="emit('update:modelValue', item.key)"
      >
        <span class="blog-news-themes__text">{{ item.title }}</span>

      </a>
    </div>

    <div v-if="slots.bottom" class="blog-news-themes__bottom">
      <slot name="bottom" />
    </div>
  </div>
</template>

<style scoped>
.blog-news-themes {
  padding: 30px;
  border: 1px solid rgb(217, 217, 217);
  border-radius: 20px;
  display: flex;
  flex-direction: column;
}

.blog-news-themes__title {
  font-size: 26px;
  font-weight: 800;
  margin-bottom: 16px;
  line-height: 32px;
  letter-spacing: -0.02em;
}

.blog-news-themes__list {
  width: 100%;
}

.blog-news-themes__item {
  display: block;
  color: var(--black-color);
  position: relative;
  width: 100%;
  padding: 14px;
  border-radius: 6px;
  cursor: pointer;
}

.blog-news-themes__text {
  width: 185px;
    font-size: 14px;
    font-weight: 600;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    margin-bottom: 0;
}

.blog-news-themes__item:after {
  content: '';
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 14px;
  width: 7px;
  padding: 10px;
  background: url("/src/assets/icons/gray-arrow-right.svg") no-repeat center center;
}

.blog-news-themes__item.active {
  background: var(--gray-50-color);
}

.blog-news-themes__bottom {
  margin-top: auto;
}
</style>