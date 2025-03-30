import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/index.vue';
import Components from '@/views/components/index.vue';
import Catalog from '@/views/catalog/index.vue'
import Blades from '@/views/catalog/blades/index.vue';
import Product from '@/views/catalog/blades/product/index.vue';
import ProductReviews from '@/views/catalog/blades/product/reviews/index.vue';
import NotFound from '@/views/notFound/index.vue';
import Returns from '@/views/returns/index.vue';
import Delivery from "@/views/delivery/index.vue";
import Services from '@/views/services/index.vue';
import Service from '@/views/service/index.vue';
import Brands from '@/views/brands/index.vue';
import Blog from '@/views/blog/index.vue';
import Post from '@/views/post/index.vue';
import Shop from '@/views/shop/index.vue';
import Contacts from '@/views/contacts/index.vue';
import Games from '@/views/games/index.vue';
import About from '@/views/about/index.vue';
import Otzivy from '@/views/otzivy/index.vue';
import Cart from '@/views/cart/index.vue';

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
      path: '/catalog/blades/product',
      name: 'Product',
      component: Product,
    },
    {
      path: '/catalog/blades/product/reviews',
      name: 'ProductReviews',
      component: ProductReviews,
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
    },
    {
      path: '/otzivy',
      name: 'otzivy',
      component: Otzivy,
    },
    {
      path: '/brands',
      name: 'brands',
      component: Brands,
    },
    {
      path: '/blog',
      name: 'blog',
      component: Blog,
    },
    {
      path: '/post',
      name: 'post',
      component: Post,
    },
    {
      path: '/shop',
      name: 'shop',
      component: Shop,
    },
    {
      path: '/contacts',
      name: 'contacts',
      component: Contacts,
    },
    {
      path: '/games',
      name: 'games',
      component: Games,
    },
    {
      path: '/about',
      name: 'about',
      component: About,
    },
    {
      path: '/cart',
      name: 'cart',
      component: Cart,
    },
    {
      component: () => import('@/components/layouts/ProfileLayout.vue'),
      path: '/profile',
      children: [
        {
          name: 'profile',
          path: '',
          component: () => import('@/views/profile/index.vue'),
        },
        {
          name: 'favorite',
          path: 'favorite',
          component: () => import('@/views/profile/favorite/index.vue'),
        },
        {
          name: 'orders',
          path: 'orders',
          component: () => import('@/views/profile/orders/index.vue'),
        },
        {
          name: 'reviews',
          path: 'reviews',
          component: () => import('@/views/profile/reviews/index.vue'),
        },
        {
          name: 'history',
          path: 'history',
          component: () => import('@/views/profile/history/index.vue'),
        },
      ]
    }
  ],
});

export default router;
