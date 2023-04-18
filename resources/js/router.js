import { createWebHistory, createRouter } from "vue-router";

import home from './pages/home.vue';

import human_types from './pages/human_types/index.vue';
import human_types_create from './pages/human_types/create.vue';
import human_types_edit from './pages/human_types/edit.vue';

import humans from './pages/humans/index.vue';
import humans_create from './pages/humans/create.vue';
import humans_edit from './pages/humans/edit.vue';

import offices from './pages/offices/index.vue';
import offices_create from './pages/offices/create.vue';
import offices_edit from './pages/offices/edit.vue';

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
    // HUMAN TYPES
    {
        path: '/human_types',
        name: 'HumanTypes',
        component: human_types
    },
    {
        path: '/human_types/create',
        name: 'HumanTypesCreate',
        component: human_types_create
    },
    {
        path: '/human_types/edit',
        name: 'HumanTypesEdit',
        component: human_types_edit
    },
    // HUMANS
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

    // OFFICES
    {
        path: '/offices',
        name: 'Offices',
        component: offices
    },
    {
        path: '/offices/create',
        name: 'OfficesCreate',
        component: offices_create
    },
    {
        path: '/offices/:id',
        name: 'OfficesEdit',
        component: offices_edit
    },

    // ADMIN
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