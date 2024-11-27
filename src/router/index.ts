import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/index.vue';
import Components from '@/views/components/index.vue';
import Catalog from '@/views/catalog/index.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/components',
      name: 'components',
      component: Components,
    },
    {
      path: '/catalog',
      name: 'catalog',
      component: Catalog,
    }
  ],
});

export default router;
