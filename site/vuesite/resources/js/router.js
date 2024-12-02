import { createWebHistory, createRouter } from 'vue-router';
import LoginComponet from '../views/components/auth/LoginComponent.vue';
import BoardListComponent from '../views/components/board/BoardListComponent.vue';
import BoardCreateComponet from '../views/components/board/BoardCreateComponet.vue';
import UserRegistration from '../views/components/user/UserRegistration.vue';

const routes = [
        {
            path: '/',
            redirect: 'login',
        },
        {
            path: '/login',
            component: LoginComponet,
        },
        {
            path: '/board',
            component: BoardListComponent,
        },
        {
            path: '/board/create',
            component: BoardCreateComponet,
        },
        {
            path: '/registration',
            component :UserRegistration,
        },
];

const router = createRouter ({
    history : createWebHistory(),
    routes,
});

export default router;

