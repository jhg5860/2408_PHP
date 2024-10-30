// 10.30
function inlineEventBtn() {
    alert('무한루프');
}

// inlineEvent
// querySelector :# . <tag>

// function inlineEventBtn2() {
// const H1= document.querySelector("h1");
// H1.style.color = 'green';

// }

// 선생님 코드
// function changeTitle() {
//     const TITLE = document.querySelector('h1');
//     TITLE.style.color = 'red';
// }

// function changeTitle() {
//     const TITLE = document.querySelector('h1');
//     TITLE.classList.add('title-click');
// }

// addEventListener(event, 콜백 함수) 동일한 이벤트를 여러번 등록 할수 있다.
const BTN_LISTENER = document.querySelector('#btn1');
BTN_LISTENER.addEventListener('click',callAlert);

function callAlert() { 
    alert('이벤트 리스너 실행');
}
// const BTN_TOGGLE = document.querySelector('#btn_toggle');
// BTN_TOGGLE.addEventListener('click' ,() => {
//     setInterval() => {
//         {}
//     }
// })

// 선생님 코드 클릭 토글
const BTN_TOGGLE = document.querySelector('#btn_toggle');
BTN_TOGGLE.addEventListener('click', () => {
    const TITLE = document.querySelector('h1');
    TITLE.classList.toggle('title-click');
});

// removeEventListener()
BTN_LISTENER.removeEventListener('click',callAlert);

// const TITLE2 =document.querySelector('h2')
// TITLE2.addEventListener('click' ,() => {
//     alert('테스트용');
// })

//선생님 코드 1회성 이벤트 코드
const H2 = document.querySelector('h2');
H2.addEventListener('click' ,testyong);

function testyong() {
    alert('테스트용');
    // H2.removeEventListener('click', testyong);
}

//  테스트용 클릭시 이벤트가 계속 실행되다가 타이틀에 마우스가 진입(mouseenter)하면 테스트용 이벤트가 멈춤
// const TITLE = document.querySelector('h1');
// TITLE.addEventListener('mouseenter', () => {
//     H2.removeEventListener('click', testyong);
// });

const TITLE = document.querySelector('h1');
TITLE.addEventListener(
    'mouseenter'
    , () => {
        H2.removeEventListener('click', testyong);
        console.log('tt');
    }
    ,{once: true} // option : once가 true일 경우 한번만 실행
);


// function testyo2() {
//     H2.removeEventListener('click', testyong);
// }
// const TITLE = document.querySelector('h1');
// TITLE.addEventListener('mouseenter', testyong);

// 이벤트 객체
const H3 = document.querySelector('h3');
H3.addEventListener('mouseup', (e) => {
    // console.log(e);
    e.target.style.color = 'red';
});
H3.addEventListener('mousedown', (e) => {
    e.target.style.color = 'green';
});
H3.addEventListener('mouseenter', (e) => {
    e.target.style.color = 'blue';
});
H3.addEventListener('mouseleave', (e) => {
    e.target.style.color = 'orange';
});

// 모달
const BTN_MODAL = document.querySelector('#btn_modal');
BTN_MODAL.addEventListener('click', ()=> {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.remove('display-none');
});

const MODAL_CLOSE = document.querySelector('#modal_close');
MODAL_CLOSE.addEventListener('click', ()=> {
    const MODAL = document.querySelector('.modal-container');
    MODAL.classList.add('display-none');
})

// 팝업
const NAVER = document.querySelector('#naver');
NAVER.addEventListener('click', ()=> {
    // open('https://www.naver.com', '', 'width=500 height=500'); // windows.open windows 생략 가능
    open('https://www.naver.com', '_blank', 'top=0 left=50 width=500 height=500'); // windows.open windows 생략 가능
    open('https://www.daum.net',  '_blank', 'top=200 left=100 width=500 height=500'); // windows.open windows 생략 가능
    open('https://www.google.com','_blank', 'top=300 left=500 width=500 height=500'); // windows.open windows 생략 가능
})