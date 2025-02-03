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
  }
</script>

<template>
  <div v-if="breadcrumbs" class="breadcrumbs">
    <Breadcrumb
        v-for="(breadcrumb, index) in breadcrumbs"
        :key="breadcrumb"
        :path="breadcrumb"
        :text="index === 0 ? 'Главная' : translatedRoute[breadcrumb]"
        :disabled="breadcrumbs.length - 1 !== index"
        class="breadcrumbs__item">
      {{ breadcrumb }}
    </Breadcrumb>
  </div>
</template>

<style scoped>
  .breadcrumbs {
    display: flex;
    gap: 10px;
  }
</style>