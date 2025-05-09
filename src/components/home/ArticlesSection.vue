<script setup lang="ts">
import { ref } from 'vue';
import type { IBaseList, IButton, IItem } from '@/types'
import { Carousel, Slide, Pagination } from 'vue3-carousel';
import type { CarouselConfig, CarouselExposed } from 'vue3-carousel';

import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import GreyButton from "@/components/common/Buttons/GreyButton.vue";

interface SourceItem {
  srcset: string;
  type: string;
}

interface IArticlesItem extends IItem {
  desc: string;
  label?: string;
  button: IButton;
  source?: SourceItem[];
}
interface IArticlesList extends IBaseList<IArticlesItem> {}

defineProps<{
  data: IArticlesList;
}>();

const carouselRef = ref<CarouselExposed | null>();

const config: CarouselConfig = {
  snapAlign: 'start',
  itemsToShow: 1.2,
  wrapAround: true,
  gap: 10,
  breakpoints: {
    768: {
      itemsToShow: 1.5,
      gap: 30
    },
    1024: {
      itemsToShow: 2,
      gap: 30
    },
    1440: {
      itemsToShow: 3,
      gap: 30
    },
  },
  itemsToScroll: 1,
  height: '',
  i18n: {},
  enabled: true,
  ignoreAnimations: false,
  preventExcessiveDragging: false,
  slideEffect: 'slide',
};
</script>

<template>
  <section :class="$style.section">
    <TtileWithArrow
      :title="data.title"
      :button-text="data.button.title ?? ''"
      :has-arrow="false"
      :class="$style.header"
      @click-arrow-left="carouselRef?.prev"
      @click-arrow-right="carouselRef?.next"
      @button-click="() => console.log(data.button?.title)"
    />

    <Carousel
      ref="carouselRef"
      class="carousel carousel-progress"
      v-bind="config"
    >
      <Slide
        v-for="{ title, desc, label = '', button, source = [], img } in data.items"
        :key="title"
        :class="$style.card"
      >
        <div v-if="label" :class="$style.label">
          {{ label }}
        </div>
        <picture :class="$style.picture">
          <source
            v-for="(item, index) in source"
            :key="index"
            v-bind="item"
          >
          <img v-bind="img" :class="$style.image">
        </picture>

        <div class="flex flex-col h-full">
          <div class="flex flex-col" :class="$style['header-item']">
            <div :class="$style.title" v-html="title" />
            <div :class="$style.desc" v-html="desc" />
          </div>

          <GreyButton
            v-if="button"
            :class="$style.button"
            :text="button.title || 'Читать'"
          />
        </div>
      </Slide>

      <template #addons>
        <Pagination class="carousel-progress__pagination" :class="$style.pagination" />
      </template>
    </Carousel>
  </section>
</template>

<style module>
.section {
  margin-bottom: 70px;
  margin-right: -0.75rem;

  @media (min-width: 768px) {
    margin-bottom: 90px;
    margin-right: initial;
  }
  @media (min-width: 1024px) {
    margin-bottom: 130px;
  }
}
.header {
  margin-bottom: 20px;

  @media (min-width: 768px) {
    margin-bottom: 30px;
  }
}
.card {
  flex-direction: column;
  padding: 16px;
  align-items: flex-start;
  gap: 16px;
  border-radius: 20px;
  background: #F5F5F5;
  text-align: left;

  @media (min-width: 768px) {
    flex-direction: row;
    padding: 20px;
    gap: 20px;
  }
}
.label {
  position: absolute;
  top: 32px;
  left: 32px;
  font-size: 12px;
  padding: 4px 6px;
  border-radius: 30px;
  background: #0084FF;
  color: #fff;
}
.image {
  //margin-top: auto;
  //margin-bottom: auto;
}
.header-item {
  flex: 1 1 auto;
  gap: 9px;
  font-size: 14px;
}
.title {
  color: #000;
  font-weight: 700;
  line-height: normal;
}
.desc {
  color: #A0A0A0;

  display: -webkit-box;
  -webkit-line-clamp: 2; /* Ограничиваем до 2 строк */
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis;
  word-break: break-word; /* Перенос слов, если длинные */
}
.button {
  margin-top: 16px;

  @media (min-width: 768px) {
    width: 170px;
  }
}

.pagination {
  bottom: -20px;

  @media (min-width: 768px) {
    bottom: -30px;
  }
}
</style>