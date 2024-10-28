//  10.25 // OOP 객체 지향 설명 notion에 정리 > PHP 에는 오버로딩이 없음. 고수준 모듈 : 전체 / 저수준 모듈 : 고수준 모듈중에서 하나 하나의모듈 
             

// ------------------
// 배열
// ------------------

const ARR1= [1,2,3,4,5];
// 10.28 위에 식은 아래식 축소형
// const ARR2 = new Array [1,2,3,4,5];

// 원본 배열의 마지막요소를 추가 , 리턴은 변경된 length, 원본변경

// 배열에서 새로운 요소 추가 
// push는 리턴값으로 변경된 length를 보내온다.
ARR1.push(10); 

// length
// 베열의 길이 획득
console.log(ARR1.length);  // 프로퍼티라 괄호 생략

// isArray()
// 배열인지 아닌지 체크
console.log(Array.isArray(ARR1)); // 배열이여서 true
console.log(Array.isArray(1)); // 배열이 아니여서 false

// 10.28 indexOf()
//  배열에서 특정 요소를 검색하고, 해당 인덱스를 반환
// 해당 요소가 없으면 -1 반환
// let i = ARR1.indexOf(4); // 3 반환
let i = ARR1.indexOf(20); // -1 반환
console.log(i); 

// includes()
// 배열의 특정 요소의 존재여부를 체크, boolean 리턴 
let arr1 = ['홍길동', '갑순이' , '갑돌이'];
let boo = arr1.includes('갑순이');
console.log(boo);

// push()
// 원본 배열의 마지막요소를 추가, 리턴은 변경된 lenght ,원본변경 성능이슈가 생길수 있는 메소드(속도 저하)
ARR1.push(10);
ARR1.push(20,30,50);
// 성능이슈 발생시 lenght를 이용해서 직접 요소를 추가할 것
ARR1[ARR1.lenght] = 100;

// 배열 복사 
// 기존에 있는값에 참조하여 사용  얕은복사(shallow copy) 깊은복사(deep copy)-원본보호
// 객체는 기본적으로 얕은복사가 되므로 딥카피를 하기 위해서는 Spread Operator를 이용
// 얕은 복사 원본 주소를 참조해서 추가하기 떄문에 원본이 변경된다.
const COPY_ARR1 = ARR1;
COPY_ARR1.push(9999);
// 깊은 복사 원본 값을 참조해서 추가하기 떄문에 원본이 변경되지 않는다.
const COPY_ARR2 = [...ARR1];
COPY_ARR2.push(8888);

// ARR_POP.length= 4;  
// pop() - 프로그래밍에서 POP이라는 단어는 꺼내서 쓰다라고 많이 쓰임.
// 원본 배열의 마지막 요소를 제거, 제거된 요소를 반환, 원본변경 
// 제거할 요소가 없으면 undefined를 반환 null이 될수 없는이유는 빈배열로 남아있기 떄문이다.
const ARR_POP = [1,2,3,4,5];
let result_pop = ARR_POP.pop();
console.log(result_pop);

// unshift() 
// 원본 배열의 첫번째 요소를 추가 , 변경된 lenght 반환, 원본 변경
const ARR_UNSIFT =[1,2,3];
let resultUnshift =ARR_UNSIFT.unshift(100);
console.log(resultUnshift);
ARR_UNSIFT.unshift(200, 333, 444); // 여러개도 추가 가능

// shift()
// 원본 배열의 첫번째 요소를 제거, 제거된 요소를 반환 , 원본 변경
// 제거할 요소가 없으면 undefined를 반환
const ARR_SHIFT= [1,2,3,4];
let resultShift = ARR_SHIFT.shift();
console.log(resultShift);

// splice()
// 요소를 잘라서 자른 배열을 반환, 원본 변경
let arrSplice = [1,2,3,4,5];
let resultSplice = arrSplice.splice(2);
console.log(resultSplice); // [3,4,5] 인덱스 번호
console.log(arrSplice);   // [1,2]
// 시작을 음수로 할 경우 우측에서부터 잘라서 나머지를 반환
arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(-2); 
console.log(resultSplice);  // [4,5]
console.log(arrSplice);  // [1,2,3]

// start , count를 모두 셋팅할 경우
arrSplice = [1,2,3,4,5];
resultSplice =arrSplice.splice(1,2);
console.log(resultSplice); // [2.3]
console.log(arrSplice);  // [1,4,5]
// 배열의 특정 위치에 새로운 요소를 추가 
// splice 파리미터 첫번째는 start 두번째는 deleteConter 세번째는 추가

arrSplice = [1,2,3,4,5];
resultSplice = arrSplice.splice(2, 0, 999, 888);
console.log(resultSplice); // []
console.log(arrSplice);  // [1,2,999,888,4,5]

// 배열에서 특정요소를 새로운 요소로 변경 함수라는거는 정해져있어서 정해진 값에 대한거바게 못씀
arrSplice = [1,2,3,4,5]; 
resultSplice = arrSplice.splice(2, 1, 999);
console.log(resultSplice); // [3]
console.log(arrSplice); // [1,2,999,4,5]

// join()
// 배열의 요소들을 특정 구분자로 연결한 문자열을 반환
let arrJoin = [1,2,3,4];
let resultJoin =arrJoin.join('.');
console.log(resultJoin); // 1.2.3.4 배열에서 string 으로 반환 
console.log(arrJoin); // [1,2,3,4]

// sort() 원본 변경
// 배열의 요소를 오름차순 정렬
// 파라미터를 전달하지 않을 경우에, 문자열로 변환 후에 정렬 데이터 타입이 바뀌지는 않는다.
let arrSort=[5, 6, 7 , 3, 2, 20];
// let resultSort =arrSort.sort();
// console.log(resultSort); // [2,20,3,5,6,7]
// console.log(arrSort);   // [2,20,3,5,6,7]
let resultSort = arrSort.sort((a,b) => a - b); //  오름차순 음수일때는 위치변경x 양수일때만 위치변경
// let resultSort = arrSort.sort((a,b) => b -a); //  내림차순 음수일때는 위치변경x 양수일때만 위치변경
console.log(resultSort); 
console.log(arrSort);

// map()
// 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후 , 그 결과를 새로운 배열로 반환
let arrMap = [1,2,3,4,5,6,7,8,9,10]; 
let resultMap = arrMap.map(num => {
    if(num %3 === 0) {
        return '짝';
    } else {
        return num;
    }
});
console.log(resultMap); // [1, 2, '짝', 4, 5, '짝', 7, 8, '짝', 10]
console.log(arrMap);// [1,2,3,4,5,6,7,8,9,10]]

function myCallback() {
    return 'myCallback';
}
function myCallback2() {
    return 'myCallback2'
}
// 콜백 함수
function test(callback ,flg) {
    if(flg) {
        console.log(callback());
    } else {
        console.log('콜백 실행 안됨')
    }
}

// test(myCallback, true); myCallback
// test(myCallback2, true); myCallback2

// map이 어캐생겻는지 구조 콜백 로직
const TEST = {
    entity : [1,2,3,4,5,6,7,8,9,10]
    ,length : 10
    ,map: function (callback) {
        let resultArr = [];

        for(let i=0; i<this.entity.length; i++) {
            resultArr[resultArr.length] = callback(this.entity[i]);
            // resultArr.push(callback(this.entity[i]));
        }
        return resultArr;
    }
}

// let resultTest = TEST.map(num => {
//     if(num %3 ===0) {
//         return '짝';
//     } else {
//         return num;
//     }
// });

let resultTest = TEST.map(testCallback);

function testCallback(num) {
    if(num %3 === 0) {
        return '짝';
    } else {
        return num;
    }
}

// filter() boolean
// 배열의 모든요소에 대해 콜백 함수를 반복 실행하고, 조건에 만족한 요소만 배열로 반환 
let arrFilter = [1,2,3,4,5,6,7,8,9,10];
let resultFilter = arrFilter.filter(num => num %3 === 0);
console.log(resultFilter); // [3,6,9]

// 3의배수와 4의 배수를 동시에 반환
let resultFilter2 = arrFilter.filter(num => {
    if( num%3 === 0 || num %4 ===0) {
        return true;
    } else {
        return false;
    }
});

console.log(resultFilter2); // [3,4,6,8,9]

// some()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고 ,
//  조건에 만족하는 결과가 하나라도 있으면 true
//  만족하는 결과가 하나도 없으면 false를 리턴
let arrSome = [1,2,3,4,5];
let resultSome = arrSome.some(num => num === 5);
console.log(resultSome); // true

function someTest(num) {
    return num === 6  // false
}


// let resultSome = arrSome.some(num => num === 6);
// console.log(resultSome); // false

// let resultSome = arrSome.some(someTest(num));
// function someTest(num) {
//     return num ===6 
// }

// every()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행하고,
// 조건에 모든 결과가 만족하면 true,
// 하나라도 만족하지 않으면 false

let arrEvery = [1,2,3,4,5];
resultEvery =arrEvery.every(num => num === 5); // false
// resultEvery =arrEvery.every(num => num <= 5); // true 
console.log(resultEvery); 

// foreach()
// 배열의 모든 요소에 대해 콜백 함수를 반복 실행
let arrForeach = [1,2,3,4,5];
arrForeach.forEach((val , idx) => {
    // console.log(idx + ' : ' + val);
    console.log(`${idx} : ${val}`);
});

