<script setup lang="ts">
  import {useRoute} from "vue-router";
  import {computed} from "vue";
  import Breadcrumb from "@/components/Breadcrumb.vue";

  const route = useRoute();
  const breadcrumbs = computed(() => route.path.length > 1 ? route.path.split("/") : null);
  const translatedRoute = {
    catalog: 'Каталог',
    services: 'Услуги',
    service: 'Услуги',
    blog: 'Наш блог',
    delivery: 'Доставка и оплата',
    returns: 'Возврат и обмен',
    games: 'Где поиграть',
    shop: 'Наш магазин',
    contacts: "Контакты",
    about: "О компании",
    profile: "Личный кабинет",
    favorite: "Избранное",
    orders: "Заказы",
    reviews: "Мои отзывы",
    history: "История покупок",
    blades: "Какой-то каталог",
    product: 'Какой-то продукты'
  }

  const dropdownItems = [
  'Основания',
  'Мячи',
  'Аксессуары',
  'Ракетки готовые',
];

</script>

<template>
  <div v-if="breadcrumbs" class="breadcrumbs">
    <Breadcrumb
      v-for="(breadcrumb, index) in breadcrumbs"
      :key="breadcrumb"
      :path="breadcrumb"
      :text="index === 0 ? 'Главная' : translatedRoute[breadcrumb as keyof typeof translatedRoute]"
      :disabled="breadcrumbs.length - 1 !== index"
      :dropdown-items="index === breadcrumbs.length - 1 ? dropdownItems : []"
      class="breadcrumbs__item"
    >
      {{ breadcrumb }}
    </Breadcrumb>
  </div>
</template>

<style scoped>
  .breadcrumbs {
    display: flex;
    gap: 10px;
  }
  .breadcrumbs__item {
    position: relative;
  }
</style>