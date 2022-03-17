import './bootstrap';

import { createApp } from 'vue';

import Dashboard from './pages/Dashboard.vue';
import BalmUI from 'balm-ui';

createApp({
    components: {
        Dashboard,
        BalmUI,
    },
})
    .use(BalmUI)
    .mount('#app');
