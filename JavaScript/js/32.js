// 10.29-----------------
// String 객체
// -----------------
let str = '문자열입니다.문자열입니다.';
let str2 = new String('문자열입니다.');

let str3 = '문자' + '테스트' + str + '이었다.';  // '문자테스트문자열입니다.문자열입니다.이었다.'
let str4 = `문자테스트${str}이었다.`; //'문자테스트문자열입니다.문자열입니다.이었다.' ` 백틱을 사용하여 +연결자 생략 가능 
 

// lenght : 문자열의 길이를 반환 
console.log(str.length); // 7

// charAt(idx) : 해당 인덱스의 문자를 반환
console.log(str.charAt(2)); // 열

// indexOf() : 문자열에서 해당 문자열을 찾아 최초의 인덱스를 반환
// 해당 문자열이 없으면 -1 리턴
console.log(str.indexOf('자열')); // 1
console.log(str.indexOf('자열', 5)); // 8

// includes() : 문자열에서 해당 문자열의 존재여부 체크 
console.log(str.includes('문자')); // true
console.log(str.includes('php')); // false

let test = 'i am ironman'; 
test.includes('ir'); // true

// replace() : 특정 문자열을 찾아서 지정한 문자열로 치환한 문자열을 반환 
str = '문자열입니다.문자열입니다.';
console.log(str.replace('문자열' , 'PHP')); // PHP입니다.문자열입니다. 원본 변경X

// replaceAll() : 특정 문자열을 찾아서 모두 지정한 문자열로 치환한 문자열을 반환
console.log(str.replaceAll('문자열' , 'PHP')); // PHP입니다.PHP입니다.
console.log(str.replaceAll('문자열' , '')); // '입니다.입니다.'

// substring(start , end ) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
// endIndex는 생략시 stratIndex부터 끝까지의 문자열 반환
// ** 주의 : 비슷한 기능으로 String.substr()이 있으나 비표준이므로 사용을 지양할 것 **
str = '문자열입니다.문자열입니다.';
console.log(str.substring(1,3)); // 자열

str = 'bearer: 34jkagodfsg8u23ujflkWAEF82';
console.log(str.substring(8)); // 34jkagodfsg8u23ujflkWAEF82 end를 안적어주면 시작위치부터 끝까지 

// split(separator , limit) : 문자열을 separator 기준으로 잘라서 배열을 만들어 반환
str = '짜장면,탕수육,라조기,짬봉,볶음밥';
let arrSplit = str.split(','); 
let arrSplit2 = str.split(',' ,2); // 배열의 길이를 2로 제한- limit 배열의 길이를 제한 하기 위해 사용 ['짜장면', '탕수육']
console.log(arrSplit); // ['짜장면', '탕수육', '라조기', '짬봉', '볶음밥']

// trim() : 좌우 공백 제거해서 반환 
str = '   아아아  배고프다.   ';
console.log(str.trim());  // 아아아  배고프다. 

// toUpperCase() , toLowerCase() : 알파벳을 대/소문자로 변환해서 반환
str = 'aBcDeFg' ;
console.log(str.toUpperCase()); // ABCDEFG
console.log(str.toLowerCase()); // abcdefg
