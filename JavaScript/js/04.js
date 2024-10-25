// 10.24
console.log('외부파일');

//  -------- 변수 ------- 

// var : 중복 선언 가능((개발자들이 실수할수 있음) , 재할당 가능 , 함수레벨 스코프 //  (프로젝트 때 사용 x 버그가 발생했을때 어디서 버그가 난지 구별이 잘안됨)
var num1 = 1; // 최초 선언
var num1 = 2;  // 중복 선언
num1 =3; // 재할당 //num - 기본값(Defalt)이 var여서 작동하는데 문제가 없음

// let  : 중복 선언 불가능, 재할당 가능 ,블록레벨 스코프 (ecma 6 나온지 얼마안됨)
let num2 = 2; // 최초 선언
// let num2 =3; // (중복 선언 , 불가능)선언자체가 불가능하므로 빨간색으로 표시된다
num2 = 4; // 재할당 

//const : 중복 선언 불가능 , 재할당 불가능 , 블록레벨 스코프(상수)
const NUM3 = 3;
// NUM3 = 4; // 재할당 , 불가능

// js 에러가 뜨면 밑에 실행되야하는 부분이 실행 안됨.


// -------------
// 스코프
// -------------
// 변수나 함수가 유효한 범위
// 전역, 지역 , 블록 3가지의 스코프

// 전역 레벨 스코프 
let globalScope = '전역이다';

function myPrint() {
    console.log(globalScope);
}

// 지역 레벨 스코프  // 함수 내에서만 사용 가능 함수 범위 밖에서 접근 불가  
function myLocalPrint() {
    let localScope = "마이로컬프린트 지역";
    console.log(localScope);
}

// 블록 레벨 스코프 {}단위로 나눔

function myBlock() {
    if(true) {
        var test1 = 'var';
        let test2 = 'let';
        const TEST3 = 'const';
    }
    console.log(test1);
    console.log(test2);
    console.log(TEST3);
}

//  인터프리터 : 프로그래밍 언어의 소스 코드를 바로 실행하는 컴퓨터 프로그램 또는 환경

// -------------
// 호이스팅 : 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당하는 것 var는 호이스팅 문제점을 알려주지 못하고 let는 문제점을 알려준다.
// -------------
// let test = 'aaa';

// console.log(test);
// test = 'aaa';
// console.log(test);
// let test; 

// -------------
// 데이터 타입 typeof : 데이터 타입 확인 :null 체크시 object로 표시 
// -------------
// number : 숫자
let num = 1;

// string : 문자열
let str = 'test';

// bollean : 논리
let bool = true;

// NULL : 존재하지 않는 값
let letNull = null;

//  undefined : 값이 할당 되지 않은 상태
let letUndefined;

// symbol : 고유하고 변경이 불가능한 값
let symbol1 = Symbol('aaa');
let symbol2 = Symbol('aaa');
// symbol1 === symbol2 > false


// object : 객체, 키-값 쌍으로 이루어진 복합 데이터 타입 obj.key1
let obj = {
     key1: 'val1'
    ,key2: 'va12'    
}

