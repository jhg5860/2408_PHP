<template>
    <!-- 부모쪽에서 만든 그대로를 단순 출력할때 slot으로 사용할수 있다. -->
    <slot></slot>
    <h1>자식 컴포넌트</h1>
    <div v-for="item in props.data" :key="item">
        <span>{{ item.name }}</span>
    </div>
    <p>{{ props.count }}</p>
    
</template>

<script setup>
import { defineProps } from 'vue';


const props = defineProps({
    'data' : Array
    ,'count' : Number
});

</script>


<style>

</style>


