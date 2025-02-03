<template>
  <CardContainer>
    <template #buttons>
      <ButtonGroup :buttons="buttonTexts" />
    </template>
    <template #radio-buttons>
      <DropdownRadioGroup :options="radioOptions" />
    </template>
    <template #filters>
      <FilterComponent />
    </template>
    <template #cards>
      <ItemCard v-for="product in products" :key="product.href" :content="product" />
    </template>
  </CardContainer>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import CardContainer from '@/components/layouts/CardContainer.vue';
import ItemCard from '@/components/cards/ItemCard.vue';
import ButtonGroup from '@/components/common/buttons/ButtonGroup.vue';
import FilterComponent from '@/components/filter/FilterComponent.vue';
import DropdownRadioGroup from '@/components/DropdownRadioGroup.vue';

const products = ref([]);

const buttonTexts = [
  'Andro',
  'Butterfly',
  'DHS',
  'Donic',
  'Dr. Neubauer',
  'Gewo',
  '729',
  'Friendship',
  'Gewo',
  'Joola',
  'Materialspezialist',
  'Nittaku',
  'Spinlord',
  'Stiga',
  'Tibhar',
  'Victas',
  'Xiom',
  'Yasaka',
  'Yinhe'
];

const radioOptions = [
  'Новинки',
  'Популярные',
  'Дешевые',
  'Дорогие',
  'Скидки',
  'Высокий рейтинг'
];

onMounted(async () => {
  try {
    const response = await fetch('/src/assets/data/products.json');
    const data = await response.json();
    products.value = data;
  } catch (error) {
    console.error('Error fetching products:', error);
  }
});
</script>

<style scoped>
.blades-page {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}
</style>
