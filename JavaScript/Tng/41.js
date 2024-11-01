// (()=> {
//     clock();
//     let start =null;
//     start = setInterval(clock, 500);
// const BTN_STOP = document.querySelector('#btn_stop');
// const BTN_RESTART = document.querySelector('#btn_restart');

// BTN_STOP.addEventListener('click',()=> {
//     clearInterval(start);    
//     start=null;
// })
// BTN_RESTART.addEventListener('click', ()=> {
//     if(start === null){
//         // 즉시 시간 업데이트 
//         clock(); 
//         // 타이머 시작
//         start = setInterval(clock, 500);     
//     }
// })
// console.log(timer());
// })();
// function timer (){    
//     clock();
//     start = setInterval(clock , 500);
   
// }

// function clock() {
// const addlpadZero = (num , length) => {
//     return String(num).padStart(length, 0);
// }    
// const CLOCK = document.querySelector('#clock');
// const NOW = new Date();
// const HOUR = addlpadZero(NOW.getHours(), 2);
// const MINUTES = addlpadZero(NOW.getMinutes() , 2);
// const SECONDS = addlpadZero(NOW.getSeconds() ,2);

// // 오전 오후 표시
//     let ampm;
//     if (HOUR < 12) {
//         ampm = '오전';
//     } else {
//         ampm = '오후';
//     }  
    
// // 24시간 
//     let half_hour;
//     if(HOUR === 0 ) {
//         half_hour =12;    
//     } else if (HOUR >12) {
//         half_hour =HOUR -12;
//     } else {
//         half_hour =HOUR;
//     }
//     CLOCK.innerHTML = `현재 시간 ${ampm} ${addlpadZero(half_hour ,2)}:${MINUTES}:${SECONDS}`;
// }

// 11.01 선생님 코드 
function leftPadZero(target , length) {
    return String(target).padStart(length, 0);
}

function getDate() {
    const NOW = new Date();
    let hour = NOW.getHours(); // 시간획득(24시 포멧)
    let minute = NOW.getMinutes(); // 분 획득
    let second = NOW.getSeconds(); // 초 획득
    let ampm = hour < 12 ? '오전' : '오후' ; // 오전 , 오후
    let hour12 = hour <13 ? hour : hour-12 ; // 시간(12시 포멧)
    
    let timeFormat = 
        `${ampm} ${leftPadZero(hour12, 2)}:${leftPadZero(minute, 2)}:${leftPadZero(second, 2)}`;
    document.querySelector('#time').textContent = timeFormat;
}

(() => {
    getDate();
    let intervalId = null;
    intervalId = setInterval(getDate, 500); // const로 주면 재할당이 안되서

    // 멈춰 버튼
    document.querySelector('#btn-stop').addEventListener('click', ()=> {
        clearInterval(intervalId);
        intervalId = null;
    });

    // 재시작 버튼 
    document.querySelector('#btn-restart').addEventListener ('click', ()=> {
        if(intervalId === null){
        getDate();
        intervalId = setInterval(getDate, 500);
        }    
    });
})();