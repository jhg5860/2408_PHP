//  10.25 // OOP 객체 지향 설명 notion에 정리 > PHP 에는 오버로딩이 없음. 고수준 모듈 : 전체 / 저수준 모듈 : 고수준 모듈중에서 하나 하나의모듈 
             

// ------------------
// 배열
// ------------------

const ARR1= [1,2,3,4,5];

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


