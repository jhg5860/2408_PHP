// 원본은 보존하면서 오름차순 정렬 해주세요.
// const ARR1 = [6 , 3, 5, 8 ,92, 3, 7 ,5, 100,80 ,40];
// const COPY_ARR1 = [...ARR1];
// let copyArr1=[...ARR1];
// let resultSort = copyArr1.sort((a,b) =>a -b );
// console.log(ARR1);
// console.log(resultSort);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
// const ARR2 = [5, 7, 3, 4, 5, 1 ,2 ];
// let resultFilter = ARR2.filter(num => num %2 === 0);
// console.log(resultFilter);
// let reusltFilter2 = ARR2.filter(num => num %2 === 1);
// console.log(reusltFilter2);
// 원본은 보존하면서 중복 숫자 없이 오름차순 정렬 해주세요.


// 선생님 코드

// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6,3,5,8,92,3,7.5,100,80,40];
let copyArr1 = [...ARR1];
copyArr1.sort((a,b) => a -b );


// 1. foreach(), includes() 이용 중복제거
let duplicationArr = [];
copyArr1.forEach(val => {
    if(!duplicationArr.includes(val)) {
        duplicationArr.push(val);
    }
});
// 2. filter() , indexOf() 이용 중복 제거 indexOf는 제일 첫번째를 가져옴
// [3, 3, 5, 6, 7, 5, 8, 40, 80, 92, 100]
let duplicationArr2 = copyArr1.filter((val, idx) => {
    return copyArr1.indexOf(val) === idx;
});
// 3. Set 객체 중복제거 
let duplicationArr3 = Array.from(new Set(copyArr1));
// 다른 데이터 타입을 배열로 바꿀때 Array.from 
// Set 중복되는 값이 있을때 사용 / 중복된 값을 허용 되지않는

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 =[ 5, 7 ,3 ,4, 5, 1, 2];

const ODD = ARR2.filter(num => num %2 !== 0); // 홀수
const EVEN = ARR2.filter(num => num %2 === 0); // 짝수

const ODD2 = [];
const EVEN2 =[];

ARR2.forEach(val => {
    let shallowCopy = null;
        if(val % 2 === 0 ) {
            if(!EVEN2.includes(val)) {
                EVEN2.push(val);
            }
        } else {
            if(!ODD2.includes(val)) {
              ODD2.push(val);
            }
        }
});
