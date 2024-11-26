import { createWebHistory, createRouter} from 'vue-router';
import LoginComponent from '../views/components/auth/LoginComponent.vue';
import BoardListComponent from '../views/components/board/BoardListComponent.vue';
import BoardCreateComponent from '../views/components/board/BoardCreateComponent.vue';
import UserRegistrationComponent from '../views/components/user/UserRegistrationComponent.vue';
import {useStore} from 'vuex';
import NotFoundComponent from '../views/components/NotFoundComponent.vue';
const chkAuth = (to, from, next) => { // to : 이동할 경로 객체 정보 // from : 오기전에 경로 객체 정보 next : 내가 끝내고나서 후속할 경로 객체 정보 
    const store = useStore();
    const authFlg = store.state.user.authFlg; // 로그인 여부 플래그 
    const noAuthPassFlg = (to.path === '/' || to.path === '/login' || to.path === '/registration'); // 비로그인시 접근 가능 페이지 플래그

    if(authFlg && noAuthPassFlg) {
        // 인증 된 유저가 비인증으로 이동할 수 있는 페이지에 접근할 경우 board로 이동
        next('/boards');
    } else if(!authFlg && !noAuthPassFlg) { 
        // 인증이 안된 유저가 비인증으로 접근할 수 없는 페이지에 접근할 경우 login으로 이동
        next('/login');
    } else {
        // 그외는 접근 허용
        next();
    }
 }

const routes= [
    {
        path : '/',
        redirect: 'login',
        beforeEnter: chkAuth,
        
    },
    {
        path: '/login',
        component : LoginComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards',
        component : BoardListComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/boards/create',
        component :BoardCreateComponent,
        beforeEnter: chkAuth,
    },
    {
        path : '/registration',
        component: UserRegistrationComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/:catchAll(.*)',
        component: NotFoundComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;