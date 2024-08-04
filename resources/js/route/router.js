import { createWebHistory, createRouter } from "vue-router";
import store from "../store";

/*Auth Pages*/
import AuthLayout    from '../components/layouts/AuthLayout.vue'
import Login         from '../components/auth/Login.vue'
import Register      from '../components/auth/Register.vue'

/* App Pages */
import AppLayout    from '../components/layouts/AppLayout.vue'
import Home         from '../components/app/Home.vue'

/*All Chats Component*/
import Chats         from '../components/app/chats/Index.vue'

import NotFound      from '../components/NotFound.vue';

const routes = [
    {
        path: "/auth",
        component: AuthLayout,
        children: [
            { path: "login", name: "Login", component: Login , meta: {title: 'Login'}},
            { path: "register", name: "Register", component: Register, meta: {title: 'Register'}},
        ],
    },
    {
        path: "/",
        component: AppLayout,
        children: [
            { path: "/", name: "Home", component: Home , meta: {title: 'Home'}},
            { path: "/chats", name: "Chats", component: Chats , meta: {title: 'Chats'}},
        ],
        meta: {requiresAuth: true}
    },

    {
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: NotFound,
        meta: {title: '404 Not Found'}
    }

];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior() {
        document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
    },
});

router.beforeEach((toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta && toRoute.meta.title ? "ChatApp | " + toRoute.meta.title : 'Login';
    if (toRoute.matched.some(record => record.meta.requiresAuth)) {
        if (store.getters.isLoggedIn === false) {
            next({
                path: `/auth/login`,
            })
        } else {
            next()
        }
    } else {
        next()
    }
});

export default router;
