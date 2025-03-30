<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue';
import TtileWithArrow from '@/components/common/TtileWithArrow.vue';
import ItemCard from '@/components/cards/ItemCard.vue';
import Tabs from '@/components/Tabs.vue';
import SquareButton from '@/components/common/Buttons/SquareButton.vue';
import type { IButton } from '@/types';

interface IProduct {
  title: string;
  image: Record<string, unknown>;
  href: string;
  price: number;
  oldPrice?: number;
  liked: boolean;
  label?: {
    color: string;
    text: string;
  };
  discount?: number;
  button: {
    text: string;
    link: string;
  };
  rating: {
    stars: number;
    count: number;
    link: string;
  };
}

interface IBestOffersData {
  title: string;
  button: IButton;
  tabs: Array<{
    id: string;
    title: string;
  }>;
  items: Record<string, IProduct[]>;
}

const props = defineProps<{
  data: IBestOffersData;
}>();

const isShowMore = ref(false);
const windowWidth = ref(0);
const activeTab = ref(props.data.tabs[0].id);

const itemsPerRow = computed(() => {
  if (windowWidth.value >= 1440) return 5;
  if (windowWidth.value >= 1024) return 4;
  if (windowWidth.value >= 768) return 3;
  return 2;
});

const initialRows = 2;
const visibleItems = computed(() => itemsPerRow.value * initialRows);

const showedProducts = computed(() => {
  const products = props.data.items[activeTab.value] || [];
  return isShowMore.value ? products : products.slice(0, visibleItems.value);
});

const hasMoreProducts = computed(() => {
  const products = props.data.items[activeTab.value] || [];
  return products.length > visibleItems.value;
});

const handleShowMore = () => {
  isShowMore.value = true;
};

// Обновляем ширину окна
const updateWindowWidth = () => {
  windowWidth.value = window.innerWidth;
};

onMounted(() => {
  updateWindowWidth();
  window.addEventListener('resize', updateWindowWidth);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateWindowWidth);
});
</script>

<template>
  <div class="section">
    <TtileWithArrow
      :title="data.title"
      :button-text="data.button.title ?? ''"
      :has-arrows="false"
      :class="$style.header"
      @button-click="() => console.log(data.button?.title)"
    />

    <div :class="$style.tabsWrapper">
      <Tabs
        v-model="activeTab"
        :list="data.tabs"
        :class="$style.tabs"
      />
    </div>

    <div :class="$style.grid">
      <ItemCard
        v-for="(product, index) in showedProducts"
        :key="index"
        :content="product"
      />
    </div>

    <SquareButton
      v-if="hasMoreProducts"
      text="Показать ещё товары"
      :class="$style.moreButton"
      @click="handleShowMore"
    />
  </div>
</template>

<style module>
.header {
  margin-bottom: 20px;

  @media (min-width: 768px) {
    margin-bottom: 30px;
  }
}

.tabsWrapper {
  display: flex;
  margin-bottom: 30px;
}

.tabs {
  width: fit-content;
}

.grid {
  display: grid;
  gap: 16px;
  grid-template-columns: repeat(2, 1fr);
  margin-bottom: 30px;

  @media (min-width: 768px) {
    grid-template-columns: repeat(3, 1fr);
  }

  @media (min-width: 1024px) {
    grid-template-columns: repeat(4, 1fr);
  }

  @media (min-width: 1440px) {
    grid-template-columns: repeat(5, 1fr);
  }
}

.moreButton {
  width: 100%;
}
</style>
