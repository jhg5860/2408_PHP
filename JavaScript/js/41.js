//  타이머 함수
//  10.31------------------
// dom ajax timer함수 addEvent : 비동기 다른거는 동기처리
// setTimeout(callback ,ms) : 일정 시간이 흐른 후에 콜백 함수를 실행 한번만 실행
// setTimeout(() => {
//     console.log('시간초과');
// }, 5000);

// // 동기 처리 와 비동기 처리로 나눠진다.  이전 처리를 기다리지 않고 처리하는것을 비동기 처리라고 한다. 비동기 처리는 Web API에 맡겨서 시간이 지나면 
// // setTimeout (() => {
// //     console.log('A');
// // }, 1000);

// // A-B-C
// setTimeout(() => console.log('A') ,1000);
// setTimeout(() => console.log('B') ,2000);
// setTimeout(() => console.log('C') ,3000);

// // C > B > A 순으로 출력 , 총 3초 소요
// setTimeout(() => console.log('A') ,3000);
// setTimeout(() => console.log('B') ,2000);
// setTimeout(() => console.log('C') ,1000);

// // A > B > C 순으로 출력, 총 6초 소요 콜백 지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// // }, 3000);

// // clearTimeout(타이머ID) : 해당 타이머ID의 처리를 제거
// const TIMER_ID = setTimeout(() => console.log('타이머') ,10000); // 1 < SET TIMERID 고유 ID
// console.log(TIMER_ID);
// clearTimeout(TIMER_ID);

// // SetInterval(callback , ms) : 일정 시간 마다 콜백함수를 실행
// const INTERVAL_ID = setInterval(() =>{
//     console.log('인터벌');
// }, 1000);

// // clearInterval(id) : 해당 id의 인터벌 제거
// // clearInterval(INTERVAL_ID);
// setTimeout(()=> clearInterval(INTERVAL_ID), 10000);

// html 건들지 않고 두둥등장 1초단위로 빨파색상변경
// const H1 = document.createElement('h1');
// H1.textContent = '두둥등장';
// const BODY = document.querySelector('body');
// BODY.appendChild(H1);
// H1.classList.add('red');
// H1.classList.add('blue');


//  선생님 코드 html 건들지 않고 두둥등장 1초단위로 빨파색상변경
(() => {
    const H1 = document.createElement('h1');
    H1.textContent= '두둥등장';
    // 최초 색상을 파란색
    H1.classList.add('blue');
    // 스타일로 폰트사이즈 5rem
    H1.style.fontSize = '5rem';
    // BODY 는 최상위 개체여서 document.querySelector 할 필요가 없다.
    document.body.appendChild(H1);
})();

setInterval ( () =>{
    // H1 요소에 접근
    const H1 =document.querySelector('h1');
    // 토글
    H1.classList.toggle('blue');
    H1.classList.toggle('red');
} , 200);


//  KAMOKI 특수문자 이모티콘 
const KAMOKI1 = '(’ω’)<span style="color :yellow;"></span>';
const KAMOKI2 = '(✌’ω’)✌<span style="color :yellow;">✧</span>';

(() => {
    const P =document.createElement('P');
    P.innerHTML = KAMOKI1;
    P.style.fontSize = '5rem';
    document.body.appendChild(P);
})();

setInterval(()=> {
    const P =document.querySelector('P');
    if(P.innerHTML === KAMOKI1) {
        P.innerHTML = KAMOKI2;
           
    } else {
        P.innerHTML = KAMOKI1;
       
    }
}, 500);