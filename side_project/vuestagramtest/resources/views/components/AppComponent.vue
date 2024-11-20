<template>
   <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <a href=""><h1>Vuestagramtest</h1></a>
                </div>
                <img src="/logo.png" alt="" class="img-logo">
                <div class="btn-group">
                    <a href=""><button class="btn btn-header btn-bg-black">로그인</button></a>
                    <a href=""><button class="btn btn-header btn-bg-white">회원가입</button></a>
                </div>
            </div>
        </div>
    </header>
    <!-- Main -->
     <main>
        <div class="container">
            <router-view></router-view>
        </div>
     </main>
     <!-- footer -->
      <footer>
        <p>ⓒ 2024.Meerkat All rights reserved.</p>
      </footer>
</template>
<script setup>

</script>
<style>
@import url('../../css/common.css');
</style>