require('./bootstrap');

import { createApp } from 'vue';

import DashboardLayout from './Pages/Dashboard/DashboardLayout.vue';
import BalmUI from 'balm-ui';

createApp({
    components: {
        DashboardLayout,
        BalmUI,
    },
})
    .use(BalmUI)
    .mount('#app');
