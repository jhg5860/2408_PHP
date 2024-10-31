(()=> {

console.log(timer());

})();


function timer (){    
    clock();
    setInterval(clock , 1000);
}


function clock() {
const addlpadZero = (num , length) => {
    return String(num).padStart(length, 0);
}    
const CLOCK = document.querySelector('#clock');
const NOW = new Date();
const HOUR = addlpadZero(NOW.getHours(), 2);
const MINUTES = addlpadZero(NOW.getMinutes() , 2);
const SECONDS = addlpadZero(NOW.getSeconds() ,2);

CLOCK.innerHTML = ` ${HOUR}:${MINUTES}:${SECONDS}`;
}
