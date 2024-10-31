(()=> {
    let start;
const BTN_STOP = document.querySelector('#btn_stop');
const BTN_RESTART = document.querySelector('#btn_restart');
const CLOCK = document.querySelector('#clock');
BTN_STOP.addEventListener('click',()=> {
    clearInterval(start);    
})
BTN_RESTART.addEventListener('click', ()=> {
   // 즉시 시간 업데이트 
    clock(); 
    // 타이머 시작
    start = setInterval(clock, 1000);     
})
console.log(timer());
function timer (){    
    clock();
    start =setInterval(clock , 1000);
   
}
})();

function clock() {
const addlpadZero = (num , length) => {
    return String(num).padStart(length, 0);
}    
const CLOCK = document.querySelector('#clock');
const NOW = new Date();
const HOUR = addlpadZero(NOW.getHours(), 2);
const MINUTES = addlpadZero(NOW.getMinutes() , 2);
const SECONDS = addlpadZero(NOW.getSeconds() ,2);

// 오전 오후 표시
    let ampm;
    if (HOUR < 12) {
        ampm = '오전';
    } else {
        ampm = '오후';
    }  
    
// 24시간 
    let half_hour;
    if(HOUR === 0 ) {
        half_hour =12;    
    } else if (HOUR >12) {
        half_hour =HOUR -12;
    } else {
        half_hour =HOUR;
    }
    CLOCK.innerHTML = `현재 시간 ${ampm} ${addlpadZero(half_hour ,2)}:${MINUTES}:${SECONDS}`;
}

