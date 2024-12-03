<template>
    <div class="board-list-box">
        <div class="item">
            <img @click="openModal" src="/img/item0.png">
        </div>
        <div class="item">
            <img @click="openModal" src="/img/item1.png">
        </div>
        <div class="item">
            <img @click="openModal" src="/img/item2.png">
        </div>
        <div class="item">
            <img @click="openModal" src="/img/item3.png">
        </div>
        <div class="item">
            <img @click="openModal" src="/img/item4.png">
        </div>      
    </div>

    <!-- 상세 모달 -->
     <div v-show="modalFlg" class="board-detail-box">
        <div class="item">
            <img src="/img/item0.png" >
            <hr>
             <p>내용내용</p>
             <hr>
             <div class="etc-box">
               <span>작성자 : 홍길동 </span>
               <button @click="closeModal">닫기</button>
            </div>
        </div>        
     </div>
</template>
<script setup>
// 모달 관련
import {ref} from 'vue';
   const modalFlg = ref(false);
   const openModal = () => {
    modalFlg.value = true;
   }
   const closeModal = () =>{
    modalFlg.value = false;
   }
// --------
</script>


<style>
    @import url(../../../css/boardList.css);
</style>