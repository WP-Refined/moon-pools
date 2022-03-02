require('./bootstrap');

import { createApp } from 'vue';
import DashboardLayout from './Pages/Dashboard/DashboardLayout';

import BalmUI from 'balm-ui'; // Official Google Material Components
import BalmUIPlus from 'balm-ui-plus'; // BalmJS Team Material Components

import 'balm-ui-css';

createApp({
    components: {
        DashboardLayout,
        BalmUI,
        BalmUIPlus,
    },
})
    .use(BalmUI)
    .use(BalmUIPlus)
    .mount('#app');
