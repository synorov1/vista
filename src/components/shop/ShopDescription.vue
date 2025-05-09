<script lang="ts" setup>
import TitleWithButton from "@/components/common/TitleWithButton.vue";
import ArrowCard from "@/components/cards/ArrowCard.vue";
import { useQuestionModal } from '@/composables/useModal'
import type { PropType } from "vue";

const props = defineProps({
  text: {
    type: String,
    required: true,
  },
  items: {
    type: Array as PropType<any[]>,
    default: () => [],
  }
})

const { openQuestionModal } = useQuestionModal()

const onTitleButtonClick = () => {
  openQuestionModal()
}
</script>

<template>
  <section class="shop-description">
    <TitleWithButton
      title="Наш магазин"
      button-text="Задать вопрос"
      :on-button-click="onTitleButtonClick"
    />

    <p class="shop-description__text">
      {{ props.text }}
    </p>
    
    <div v-if="props.items.length > 0" class="shop-description__items">
      <ArrowCard
        v-for="(item, index) in props.items"
        :key="index"
        :title="item.title"
        :text="item.text"
        :icon="item.icon"
        to="/"
      />
    </div>
  </section>
</template>

<style scoped>
.shop-description {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.shop-description__text {
  font-weight: 400;
  font-size: 16px;
  line-height: 24px;
  color: var(--gray-800-color);
  margin-bottom: 0;
}

.shop-description__items {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

@media (min-width: 768px) {
  .shop-description {
    gap: 30px;
  }
}

@media (min-width: 1024px) {
  .shop-description__items {
    display: grid;
    gap: 30px;
    grid-template-columns: 1fr 1fr 1fr;
  }
}

@media (min-width: 1440px) {
  .shop-description__items {
    margin-top: 20px;
  }
}
</style>