<template>
  <div class="profile-layout">
    <div class="profile-layout__tabs">
      <router-link
        v-for="page in pagesList"
        :key="page.id"
        v-slot="{ navigate, isExactActive }"
        :to="{ name: page.id }"
        custom
      >
        <Tab
          :is-active="isExactActive"
          @click="navigate"
        >
          {{ page.title }}
        </Tab>
      </router-link>
    </div>

    <Select
      :model-value="currentSelect"
      class="profile-layout__select"
      :options="pagesList"
      @update:model-value="router.push({ name: $event })"
    />

    <router-view />
  </div>
</template>
    
<script setup lang="ts"> 
import Tab from '@/components/Tab.vue';
import Select from "@/components/Select.vue";
import { useRoute, useRouter } from 'vue-router';
import { computed } from 'vue';

const route = useRoute();
const router = useRouter();

const pagesList =  [
  {
    id: 'profile',
    title: 'Личный кабинет',
  },
  {
    id: 'favorite',
    title: 'Избранное',
  },
  {
    id: 'orders',
    title: 'Заказы',
  },
  {
    id: 'reviews',
    title: 'Мои отзывы',
  },
  {
    id: 'history',
    title: 'История покупок',
  },
];

const currentSelect = computed(() => pagesList.find(v => v.id === route.name)?.id || pagesList[0].id);
</script>

<style scoped>
.profile-layout__tabs {

  display: none;
}

.profile-layout__select {
  margin-bottom: 20px;
}

@media (min-width: 768px) {
  .profile-layout__select {
    display: none;
  }

  .profile-layout__tabs {
    display: flex;
    border: 1px solid var(--gray-400-color);
    border-radius: 6px;
    overflow: hidden;
    justify-self: flex-start;
    margin-bottom: 30px;
  }
}
</style>
