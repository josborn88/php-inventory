import Vue from 'vue';
import VueRouter from 'vue-router';

import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
import App from '../views/App';
import Food from '../views/Food';
import Home from '../views/Home';
import Tools from '../views/Tools';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/food',
            name: 'food',
            component: Food
        },
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/tools',
            name: 'tools',
            component: Tools
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});



//require('./bootstrap');