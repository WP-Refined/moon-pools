import { createApp } from 'vue/dist/vue.esm-bundler';

import Dashboard from './pages/Dashboard.vue';
import BalmUI from 'balm-ui';

import './../scss/main.scss';

const app = createApp(Dashboard);

app.use(BalmUI);

app.mount('#app');
