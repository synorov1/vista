<template>
  <div class="categories">
    <div class="category-cards" ref="categoryCards">
      <CategoryCard
        v-for="(category, index) in categories"
        :key="index"
        :imageSrc="category.imageSrc"
        :title="category.title"
        :count="category.count"
        :description="category.description"
        v-show="showCards || index < visibleCardsCount"
      />
    </div>
    <SquareButton v-if="showButton" class="filter-btn" :text="buttonText" @click="toggleCards" />
  </div>
</template>

<script setup lang="ts">
import { ref, computed, onMounted, onUnmounted } from 'vue';
import SquareButton from '~/components/common/buttons/SquareButton.vue';
import CategoryCard from './CategoryCard.vue';

const props = defineProps({
  categories: {
    type: Array,
    required: true
  }
});

const showCards = ref(false);
const categoryCards = ref(null);
const showButton = ref(true);

const visibleCardsCount = ref(1); // Инициализируем с одной карточкой

const buttonText = computed(() => {
  return showCards.value ? 'Скрыть' : 'Показать все категории';
});

const toggleCards = () => {
  showCards.value = !showCards.value;
  if (!showCards.value && categoryCards.value) {
    categoryCards.value.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }
};

const updateVisibleCardsCount = () => {
  if (window.innerWidth >= 1440) {
    visibleCardsCount.value = props.categories.length;
    showButton.value = false;
  } else if (window.innerWidth >= 1024) {
    visibleCardsCount.value = props.categories.length;
    showButton.value = false;
  } else if (window.innerWidth >= 768) {
    visibleCardsCount.value = 4;
    showButton.value = true;
  } else {
    visibleCardsCount.value = 1;
    showButton.value = true;
  }
};

onMounted(() => {
  if (categoryCards.value) {
    categoryCards.value.scrollIntoView({ behavior: 'smooth', block: 'start' });
  }

  updateVisibleCardsCount(); // Инициализируем количество видимых карточек при монтировании
  window.addEventListener('resize', updateVisibleCardsCount);
});

onUnmounted(() => {
  window.removeEventListener('resize', updateVisibleCardsCount);
});
</script>

<style scoped>
.categories {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}

.filter-btn {
  width: 100%;
  display: block;
}

.category-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(288px, 1fr));
  gap: 20px;
  justify-content: center;
}

@media (max-width: 320px) {
  .category-cards {
    grid-template-columns: 1fr;
  }
}

@media (min-width: 768px) {
  .category-cards {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (min-width: 1440px) {
  .category-cards {
    grid-template-columns: repeat(3, 1fr);
  }
}
</style>
