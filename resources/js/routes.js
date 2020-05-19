import Food from './Food.vue';
import App from  './App.vue';


export const routes = [
    {
        name: 'food',
        path: '/food',
        component: Food
    },
    {
        name: 'home',
        path: '/',
        component: App
    }
]