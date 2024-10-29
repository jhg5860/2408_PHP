// 10.29 defer - 마지막에 실행
// ----------------
// 요소 선택 
// ----------------
// 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue'; // 글씨 색 blue

// 태그명으로 요소를 선택하는 방법 후속처리 반복적인거에 불편하므로 사용하지않는다
const H1 = document.getElementsByTagName('h1');
H1[1].style.color = 'green';

// 클래스명으로 요소를 선택 후속처리 반복적인거에 불편하므로 사용하지않는다
const CLASS_NONE_LI = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
const SICK = document.querySelector('#sick');
const NONE_LI = document.querySelector('.none-li'); // 첫번째만
const ALL_NONE_LI = document.querySelectorAll('.none-li'); // 전체

const LI= document.querySelectorAll('li');
LI.forEach((element , idx) => {
    if(idx % 2 === 0) {
        element.style.color ='red';
    } else {
        element.style.color= 'blue';
    }
});

// ------------------
// 요소 조작
// ------------------
// textContent: 컨텐츠를 획득 또는 변경, 순수한 텍스트 데이터를 전달
TITLE.textContent = '<a>링크</a>'; // a 태그가 들어가 있는 문자

// innerHTML: 컨텐츠를 획득 또는 변경, 태그는 태그로 인식해서 전달
TITLE.innerHTML = '<a>링크크크</a>'; // 링크 없는 a 태그
// TITLE.innerHTML = '<a href="https://www.naver.com">링크크크</a>'; // 네이버로 링크 연결

// setAttribute(속성명 , 값 ) : 해당 속성과 값을 요소에 추가  

const A_LINK = document.querySelector('#title > a');
A_LINK.setAttribute('href','https://www.naver.com');

// input 텍스트 박스 안에 텍스트 회색글자
const INPUT_PLACEHOLDER = document.querySelector('#input-1');
INPUT_PLACEHOLDER.setAttribute('placeholder' ,'하하하');

// const HAHAHA = document.querySelector('#input-1');
// HAHAHA.setAttribute('placeholder' ,'하하하');

// removeAttribute(속성명) : 해당 속성 제거
A_LINK.removeAttribute('href');

// ---------------
// 요소의 스타일링
// ---------------
// style : 인라인으로 스타일 추가
TITLE.style.color ='black';
// TITLE.removeAttribute('style');

// classList : 클래스로 스타일 추가 및 삭제
// classList.add() : 해당 클래스 추가 
TITLE.classList.add('class-1');
TITLE.classList.add('class-2', 'class-3', 'class-4');

// classList.remove() : 해당 클래스 제거
TITLE.classList.remove('class-3');

// classList.toggle() : 해당 클래스를 on/off
TITLE.classList.remove('toggle');

// setInterval(() =>
//     {TITLE.classList.toggle('toggle')} , 10 );

// -----------------------
// 새로운 요소 생성
// -----------------------
// createElement(태그명) : 새로운 요소 생성
const NEW_LI = document.createElement('li');
NEW_LI.textContent = '떡볶이';
// NEW_LI.style.color = 'red';

const FOODS = document.querySelector('#foods');

// appendChild(노드) : 해당 부모 노드의 마지막 자식으로 노드를 추가
FOODS.appendChild(NEW_LI);

// removeChild(노드) : 해당 부모 노드의 자식 노드를 삭제
// FOODS.removeChild(NEW_LI);

// document.body body는 body로 접근

// insertBefore(새로운노드, 기준노드) : 해당 부모 노드의 자식인 기준노드의 앞에 새로운 노드를 추가
FOODS.insertBefore(NEW_LI, SICK );

