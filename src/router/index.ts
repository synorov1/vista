import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/index.vue';
import Components from '@/views/components/index.vue';
import Catalog from '@/views/catalog/index.vue'
import Blades from '@/views/catalog/blades/index.vue';
import NotFound from '@/views/notFound/index.vue';
import Returns from '@/views/returns/index.vue';
import Delivery from "@/views/delivery/index.vue";
import Services from '@/views/services/index.vue';
import Service from '@/views/service/index.vue';

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
    },
    {
      path: '/catalog/blades',
      name: 'Blades',
      component: Blades,
    },
    {
      path: '/services',
      name: 'services',
      component: Services,
    },
    {
      path: '/service',
      name: 'service',
      component: Service,
      props: true,
    },
    {
      path: '/404',
      name: 'Not Found',
      component: NotFound,
    },
    {
      path: '/returns',
      name: 'returns',
      component: Returns,
    },
    {
      path: '/delivery',
      name: 'delivery',
      component: Delivery,
    }
  ],
});

export default router;
