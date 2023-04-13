import { createWebHistory, createRouter } from "vue-router";

import home from './pages/home.vue';

import humans from './pages/humans/index.vue';
import humans_create from './pages/humans/create.vue';
import humans_edit from './pages/humans/edit.vue';

import login from './pages/login.vue';
import register from './pages/register.vue';
import dashboard from './pages/dashboard.vue';

import About from '@/pages/About.vue';
import PageNotFound from '@/pages/PageNotFound.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: home
    },
    {
        path: '/humans',
        name: 'Humans',
        component: humans
    },
    {
        path: '/humans/create',
        name: 'HumansCreate',
        component: humans_create
    },
    {
        path: '/humans/:id',
        name: 'HumansEdit',
        component: humans_edit
    },
    {
        path: '/login',
        name: 'Login',
        component: login,
        meta:{
            requiresAuth: false
        }
    },
    {
        path: '/register',
        name: 'Register',
        component: register,
        meta:{
            requiresAuth: false
        }
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: dashboard,
        meta:{
            requiresAuth: true
        }
    },
    {
        path: '/about',
        name: "About",
        component: About,
    },
    {
        path: '/:catchAll(.*)*',
        name: 'PageNotFound',
        component: PageNotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to,from) =>{
    if( to.meta.requiresAuth && !localStorage.getItem('token') ){
        return {name: 'Login'};
    }
    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return {name: 'Dashboard'};
    }
    /*
    if(to.meta.requiresAuth && store.getters.getToken == 0){
        return { name : 'Login'}
    }

    if(to.meta.requiresAuth == false && store.getters.getToken != 0){
        return { name : 'Dashboard'}
    }
    */
})

export default router;