<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <h1>{{ count }}</h1> -->
  <!-- state의 값을 변경할려면 mutations를 통해서 변경해야한다. -->
   <!-- store.commit(모듈명,함수?) -->
  <!-- <button @click="store.commit('board/addCount')">증가</button> -->
   <!-- <div v-for="item in products" :key="item">
      <h2>{{ item.productName }}</h2>
      <p>{{ item.productPrice }}</p>
      <span>{{ item.productContent }}</span>  
   </div> -->

  <BoardListComponent />

</template>

<script setup>
import BoardListComponent from './components/BoardList.component.vue';
// import { computed } from 'vue';
// import { useStore } from 'vuex';

// const store = useStore();

// // 반응형 데이터로 다루기 위해 computed(양방향 데이터바인딩) 이용
// // store state 에 있는 board 모듈에있는 프로퍼티 count를 사용
// // const count = computed(() => store.state.board.count);
// const products = computed(() => store.state.board.products);
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
