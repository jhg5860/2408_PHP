// 1. 버튼클릭시 아래문구 알러트로 출력
// 안녕하세요
// 숨어있는 div를 찾아주세요.
// 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
// 두근두근
// 3.숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력
//  및 나타나기 들켰다
// 3-1 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다.
// 4.나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기
// -숨는다
// 5.다시 숨은 div에 마우스 진입하면 아래 문구 알러트 출력 -두근두근

// -- 보너스 문제 -- 
// 다시 숨을 때 랜덤한 위치로 이동


// 1. 버튼클릭시 아래문구 알러트로 출력
// 안녕하세요
const BTN_CLICK = document.querySelector('#btn_click');
BTN_CLICK.addEventListener('click',() => {
    alert('안녕하세요' +'\n' +'숨어있는 div를 찾아주세요.')
});
// 2. 숨어있는 div에 마우스가 진입하면 아래 문구 알러트 출력
// 두근두근

function dgdg() {
    alert('두근두근');
}
const HIDDEN_DIV = document.querySelector('.hidden_div');
HIDDEN_DIV.addEventListener('mouseenter',dgdg);
// 3.숨어있는 div를 마우스로 클릭하면 아래 문구 알러트 출력
//  및 나타나기 들켰다
// 3-1 들킨 div에는 마우스가 진입해도 두근두근이 뜨지 않습니다.

function find() {
    alert('들켰다');
    const BG_TRANSPARENT = document.querySelector('.show_div');
    BG_TRANSPARENT.classList.remove('bg_transparent');
    HIDDEN_DIV.removeEventListener('mouseenter', dgdg)    
}
const SHOW_DIV = document.querySelector('.show_div');
SHOW_DIV.addEventListener('click' ,find);


// 4.나타난 div를 다시 클릭하면 아래 문구 알러트 출력 및 사라지기
// -숨는다
// const HIDE_DIV = document.querySelector('.show_div');
// HIDE_DIV.addEventListener('click' , ()=>{
//     alert('숨는다');    
//     HIDE_DIV.classList.add('bg_transparent');   
// });
// 5.다시 숨은 div에 마우스 진입하면 아래 문구 알러트 출력 -두근두근
