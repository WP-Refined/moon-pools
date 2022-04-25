import { createApp } from 'vue/dist/vue.esm-bundler';

import Dashboard from './pages/Dashboard.vue';
import BalmUI from 'balm-ui';
import vCopy from 'balm-ui/directives/copy';

import './../scss/main.scss';

const app = createApp(Dashboard);

app.use(BalmUI);
app.directive(vCopy.name, vCopy);

app.mount('#app');
