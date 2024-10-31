// // 1. 버튼클릭시 아래문구 알러트로 출력
// // 안녕하세요
// // 숨어있는 div를 찾아주세요.
// // 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
// // 두근두근
// // 3.숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력
// //  및 나타나기 들켰다
// // 3-1 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다.
// // 4.나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기
// // -숨는다
// // 5.다시 숨은 div에 마우스 진입하면 아래 문구 알러트 출력 -두근두근

// // -- 보너스 문제 -- 
// // 다시 숨을 때 랜덤한 위치로 이동


// // 1. 버튼클릭시 아래문구 알러트로 출력
// // 안녕하세요
// const BTN_CLICK = document.querySelector('#btn_click');
// BTN_CLICK.addEventListener('click',() => {
//     alert('안녕하세요' +'\n' +'숨어있는 div를 찾아주세요.')
// });
// // 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
// // 두근두근

// function dgdg() {
//     alert('두근두근');
// }
// const HIDDEN_DIV = document.querySelector('.hidden_div');
// HIDDEN_DIV.addEventListener('mouseenter',dgdg);
// // 3.숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력
// //  및 나타나기 들켰다
// // 3-1 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다.

// function find() {
//     alert('들켰다');
//     const BG_TRANSPARENT = document.querySelector('.show_div');
//     BG_TRANSPARENT.classList.remove('bg_transparent');
//     HIDDEN_DIV.removeEventListener('mouseenter', dgdg)    
// }
// const SHOW_DIV = document.querySelector('.show_div');
// SHOW_DIV.addEventListener('click' ,find);


// // 4.나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기
// // -숨는다
// // const HIDE_DIV = document.querySelector('.show_div');
// // HIDE_DIV.addEventListener('click' , ()=>{
// //     alert('숨는다');    
// //     HIDE_DIV.classList.add('bg_transparent');   
// // });
// // 5.다시 숨은 div에 마우스 진입하면 아래 문구 알러트 출력 -두근두근

// 10.31 선생님 코드 
//  즉시 실행함수 - 최초 javascript 실행할 때 딱 한번만 실행

// 1. 버튼클릭시 아래문구 알러트로 출력 클릭E btn 
    // -안녕하세요
    // 숨어있는 div를 찾아주세요.
(()=> {
    const BTN_INFO = document.querySelector('#btn-info');
    BTN_INFO.addEventListener('click' , ()=> {
        alert(`안녕하세요.\n 숨어있는 div를 찾아주세요.`);
    });
    // 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력 진입E container
    // -두근두근 
    const CONTAINER = document.querySelector('.container');
    CONTAINER.addEventListener('mouseenter', dokidoki );
    // 3.숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력 클릭E box 1
    //  및 나타나기 -들켰다
    const BOX = document.querySelector('.box');
    BOX.addEventListener('click' , busted); 
})();

// 두근두근 함수
function dokidoki() {
    alert('두근두근');
}

//들켰다 함수
function busted() {
    alert('들켰다');
    const CONTAINER = document.querySelector('.container');
    const BOX = document.querySelector('.box');
    
    BOX.removeEventListener('click', busted); // 기본 들켰다 이벤트 제거
    BOX.addEventListener('click' ,hide) ; // 들켰다 이벤트 추가
    BOX.classList.add('busted'); // 배경색 부여
    
    
    // 4 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다. 진입E container
    CONTAINER.removeEventListener('mouseenter' , dokidoki); // 기존 두근두근 이벤트 삭제
    
}

// 숨는다 함수 
function hide() {
    alert('숨는다.');
    const CONTAINER = document.querySelector('.container');
    const BOX = document.querySelector('.box');
    
    BOX.classList.remove('busted'); // 들켰다 배경색 제거
    BOX.addEventListener('click' ,busted); // 들켰다 이벤트 추가
    // 5.나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기 클릭E box 2
    // -숨는다
    BOX.removeEventListener('click' , hide); // 숨는다 이벤트 제거
    
    // 6.다시 숨은 div에 마우스 진입하면 아래 문구 알러트 출력 -두근두근 진입E container
    CONTAINER.addEventListener('mouseenter', dokidoki); // 두근두근 이벤트 추가    
    
    // -- 보너스 문제 -- 
    // 다시 숨을 때 랜덤한 위치로 이동 y-100px x-100px
    const RAMDOM_X = Math.round(Math.random() * (window.innerWidth - CONTAINER.offsetWidth));
    const RAMDOM_Y = Math.round(Math.random() * (window.innerHeight - CONTAINER.offsetHeight));
    CONTAINER.style.top = RAMDOM_Y +'px';
    CONTAINER.style.lef = RAMDOM_X + 'px';
    console.log(RAMDOM_X , RAMDOM_Y);    
}