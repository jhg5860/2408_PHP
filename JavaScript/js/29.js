// 10.29--------------------------
// Math 객체
// --------------------------
// 올림 , 버림 , 반올림
Math.ceil(0.1); // 1 올림
Math.round(0.5); // 1 반올림
Math.floor(0.9) // 0  버림

// 랜덤값
Math.random(); // 0 ~ 1 사이의 랜덤한 값을 획득
Math.floor(Math.random() *10) +1; // 1~ 10 랜덤숫자

// 최대값
Math.max(1, 2, 3, 4 ); // 4
let arr = [1, 2, 3, 4, 5]; 
Math.max(...arr); // 5

// 최소값
Math.min(3, 5, 2, 1, 0); // 0
Math.min(...arr); // 1

// 절대값 날짜 계산에 많이 사용 작은돈에서 큰돈을 빼줄때 사용 
Math.abs(-1); // 1 
Math.abs(1); // 1 

// console.log('start');
// for(let i =0; i < 1000000; i++) {
//     let test = Math.ceil(Math.random() *10) +1;
//     if(test === 0) {
//         console.log('0나옴');
//     }
// }
// console.log('end');    