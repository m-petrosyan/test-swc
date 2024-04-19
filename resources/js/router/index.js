import {createRouter, createWebHistory} from 'vue-router'
import AuthLayouth from '@/layouts/AuthLayouth.vue';
import SignUpPage from '@/views/auth/SignUpPage.vue';
import SignInPage from "@/views/auth/SignInPage.vue";
import DashboardPage from "@/views/dashboard/DashboardPage.vue";
import DashboardLayouth from "@/layouts/DashboardLayouth.vue";
import EventCreatePage from "@/views/dashboard/events/EventCreatePage.vue";
import EventPage from "../views/dashboard/events/EventPage.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: AuthLayouth,
            children: [
                {
                    path: '',
                    name: 'sign-in',
                    component: SignInPage
                },
                {
                    path: 'sign-up',
                    name: 'sign-up',
                    component: SignUpPage
                },
            ],

        },
        {
            path: '/dashboard',
            component: DashboardLayouth,
            meta: {requiresAuth: true},
            children: [
                {
                    path: '',
                    name: 'dashboard',
                    component: DashboardPage
                },
                {
                    path: 'event-create',
                    name: 'event-create',
                    component: EventCreatePage
                },
                {
                    path: 'event-page/:id',
                    name: 'event-page',
                    component: EventPage
                },
            ],

        },
    ],
    scrollBehavior() {
        return {top: 0}
    },
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta?.requiresAuth);
    if (requiresAuth && !sessionStorage.getItem('token')) {
        next({
            name: 'sign-in',
            query: {redirect: to.fullPath}
        });
    } else {
        next();
    }
})

export default router;
