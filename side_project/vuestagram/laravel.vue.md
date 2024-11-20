laravel +vue

composer create-project laravel/laravel="9" vuestagram  라라벨 설치
composer remove laravel/sanctum sanctum파일 제거
node.modules .파일 생성 - npm install
npm run dev - 개발모드로 빌드 
npm install --save-dev vue 개발버전에만 vue를 추가하겠다. 
: package.json에 devdependencies부분에 vue가 추가 되있으면 잘 설치 됨
resources - views 안에 components 폴더 생성 
new file해서 AppComponent.vue 파일 생성
-----------------------------------------------------------
vueInit 해서 틀잡기
-----------------------------------------------------------
resources - js에서 추가
import { createApp } from 'vue';
import AppComponent from '../views/components/AppComponent.vue';
createApp({
    components : {
        AppComponent,
    }
})
.mount('#app');
#app에 올리겟다는 의미
---------------------------------------------------------------------------
webpack.mix.js : laravel vue 파일 연결해주는 파일
 .vue({
        version: 3,
    }) 추가 
------------------------------------------------------------------------

npm install --``save-dev vue-loader : laravel에서 vue를 불러오는 커맨드
npm run dev - 개발모드로 빌드 하는이유는 전체과정에서하면 어디서부터 
	       잘못됏는지 몰라서 한다.

---------------------------------------------------------------------------
선생님github에 올려줄예정


welcome.blade.php asset-
---------------------------
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>VueStagram</title>
</head>
<body>
    <div id="app">
        <App-Component></App-Component>
    </div>
</body>
</html>
--------------------------------
npm run dev

AppComponet.vue
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
                    <a href=""><button class="btn btn-header btn-bg-black">로그인</button></a>                    
                    <a href=""><button class="btn btn-header btn-bg-white">회원가입</button></a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main
    <main>
        <div class="container">
            
        </div>
    </main>
    <!-- Footer -->
     <footer>
        <p> ⓒ 2024. Meerkat All rights reserved.</p>
     </footer> -->
</template>

<script setup>

</script>
<style>
/* 외부파일 불러오기 */
@import url('../../css/common.css'); 
</style>

LoginComponent.vue
<template>
    <div class="form-box">
        <p class="form-title">로그인</p>
        <input type="text" name="account" placeholder="아이디">
        <input type="password" name="password" placeholder="비밀번호">
        <button class="btn btn-sumbit btn-bg-black">로그인</button>
    </div>
        
    
</template>
<script setup>
</script>
<style>
    
</style>


vuestagram 에접근해서 php artisan serv 커맨드 입력
 <!-- npm install vue-router@4 --> - route 설치
 <!-- npm install vuex@next  --> - vuex 설치
 
app.js
 require('./bootstrap');

import { createApp } from 'vue';
import router from './router';
import AppComponent from '../views/components/AppComponent.vue';

createApp({
    components : {
        AppComponent,
    }
})
.use(router)
.mount('#app');

web.php
Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');

{any} 어떤경로가들어오든 view로 돌린다.


@click="$router.back()" 이전 링크로 이동

php artisan key:generate - app_key 설치