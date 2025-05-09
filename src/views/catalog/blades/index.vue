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
      <ItemCard
        v-for="product in products"
        :key="product.href"
        :content="product"
      />
    </template>
  </CardContainer>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import CardContainer from '@/components/layouts/CardContainer.vue';
import ItemCard from '@/components/cards/ItemCard.vue';
import ButtonGroup from '@/components/common/Buttons/ButtonGroup.vue';
import FilterComponent from '@/components/filter/FilterComponent.vue';
import DropdownRadioGroup from '@/components/DropdownRadioGroup.vue';

interface Product {
  href: string
  title: string
  price: number
  img: string
}

const products = ref<Product[]>([]);

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

<style module>

</style>
