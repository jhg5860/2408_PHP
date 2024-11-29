import { createWebHistory, createRouter } from 'vue-router';
import LoginComponet from '../views/components/auth/LoginComponent.vue';

const routes = [
        {
            path: '/login',
            component: LoginComponet,
        },
];

const router = createRouter ({
    history : createWebHistory(),
    routes,
});

export default router;