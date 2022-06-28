require('./bootstrap');

// require('alpinejs');

import { createApp } from 'vue';
import router from './router';
import Login from './components/Login'
import Dashboard from './components/Dashboard'

createApp({
    components: {
        Login,
        Dashboard
    }
}).use(router).mount('#app')
