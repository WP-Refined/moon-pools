import { createApp } from 'vue/dist/vue.esm-bundler';

import Dashboard from './pages/Dashboard.vue';
import BalmUI from 'balm-ui';

import './../scss/main.scss';

createApp(Dashboard)
  .use(BalmUI)
  .mount('#app');
