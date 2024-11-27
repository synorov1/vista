import './assets/main.css';

import { createApp } from 'vue';
import App from './App.vue';
import 'vue3-carousel/dist/carousel.css';
import 'bootstrap/dist/js/bootstrap.bundle.js';
import router from './router';

const app = createApp(App);

app.use(router);

app.mount('#app');
