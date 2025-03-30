import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import 'vue3-carousel/dist/carousel.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import VueDragScroller from 'vue-drag-scroller';
import router from './router';

const app = createApp(App);

app.use(router).use(VueDragScroller);

app.mount('#app');
