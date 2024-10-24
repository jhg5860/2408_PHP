// -------------
// 함수 선언식
// 호이스팅에 영향받는다.
// 재할당 가능하므로 함수명 중복 안되게 조심해야 함
// -------------
console.log(mySum(4, 5));

function mySum(a, b) {
     return a + b ;
}
//  함수 중복이 되며 기존에 정의한 함수 값이 사라지고 다른 함수 값으로 덮여 진다.
// function mySum( a, b, c ) {
//     return a + b + c ;
// }

// -----------------
// 함수 표현식
// 호이스팅에 영향을 받지 않는다.
// 재할당을 방지
// -----------------

// console.log(myPlus(4, 5));

const myPlus = function(a, b) { // function (a, b ) => 익명 함수
    return a + b ;
}

// ------------ 
// 화살표 함수 :작성을 길게 적기 싫어서 짧게 적는 표현식이다
// ------------
// 파라미터가 2개 이상일 경우 (소괄호 생략 불가)
const arrowFnc = (a, b) => a + b;
function test1(a , b) {
    return a + b ;
}

// 파라미터가 1개일 경우 (소괄호 생략 가능)
const arrowFnc2 = a => a; 

function test2(a) {
    return a;
}

// 파라미터가 없는 경우 
const arrowFnc3 = () => 'test';

function test3() {
    return 'test';
}

// 처리가 여러줄일 경우 
const arrowFnc4 = (a, b ) => {
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼'
    }
}
function test4(a ,b) {
    function test6() {
        console.log(1);
    }
    test6();                                                                   
    if(a < b) {
        return 'b가 더 큼';
    } else {
        return 'a가 더 큼'
    }
}
