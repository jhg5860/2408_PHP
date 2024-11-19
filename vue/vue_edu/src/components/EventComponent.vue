<!-- vueInit : 자동 완성 -->


<template>
    <P>자식쪽 cnt :{{ props.cnt  }}</P>
    <button @click="$emit('eventAddCnt')">자식쪽증가</button>

    <!-- 파라미터가 필요한 경우 -->
    <button @click="$emit('eventAddCntParam' , 2)">자식쪽에서증가2</button>

    <button @click="$emit('eventResetCnt')">자식쪽 초기화</button>
</template>

<script setup>
import {defineProps} from 'vue';

const props = defineProps({
    'cnt' : Number
});

</script>

<style >
    
</style>

