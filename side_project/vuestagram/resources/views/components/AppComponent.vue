<template>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <a href=""><h1>Vuestagram</h1></a>
                </div>
                <img src="/logo.png" alt="" class="img-logo">
                <div class="btn-group">
                    <div v-if="!$store.state.user.authFlg">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>                    
                    <router-link to="/registration"><button class="btn btn-header btn-bg-white">회원가입</button></router-link>                        
                    </div>                
                <div v-else>
                    <button @click="$store.dispatch('user/logout')"class="btn btn-header btn-bg-black">로그아웃</button>
                </div>
                </div>
            </div>
        </div>    
    </header>

    <!-- Main -->
    <main>
        <!-- TODO: 나중에 버튼제거 -->
        <!-- <button @click="$store.dispatch('user/chkTokenAndContinueProcess', () => {console.log('테스트')})">토큰만료체크</button> -->
        <UserInfoComponent v-if="$store.state.user.authFlg"/>
        <div class="container">
            <router-view></router-view>
        </div>
    </main>
    <!-- Footer -->
     <footer>
        <p> ⓒ 2024. Meerkat All rights reserved.</p>
     </footer>
</template>

<script setup>
import UserInfoComponent from './user/UserInfoComponent.vue';


</script>
<style>
/* 외부파일 불러오기 */
@import url('../../css/common.css'); 
</style>