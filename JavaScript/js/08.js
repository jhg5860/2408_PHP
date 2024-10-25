// 10.24
//if문
let num =1;

if(num === 1) {
    console.log('1등');
} else if (num === 2) {
    console.log('2등');
} else if(num === 3) {
    console.log('3등');
} else {
    console.log('등수외');
}
//  swich문 
switch(num) {
    case 1: 
        console.log('1등');
        break;
    case 2:
        console.log('2등');
        break;
    default : 
        console.log('순위외');
        break;
}

// for문
// 구구단 2~ 9단
// 예시
// ** 2단 **
//  2x1 = 2
//  2x2 = 4
// ...
// ** 3단 **
//  3x1 = 3
//  3x2 = 6
// ...
//  9x8 = 72
//  9x9 =81

// let dan =2;
// for(let i =1; i <=9; i++) {
//     console.log(i);
//     for(let i=d; i<=d; d++) {
//         console.log(d).x.i = (d*i);
//     }
// }

// 구구단
// for(let dan =2; dan <=9; dan++) {
//         console.log(dan +'단');
//     for(let gu =1; gu <=9; gu++) {
//         console.log(dan + 'x' + gu +'=' +(dan*gu));
//     }   
// }
// 별 삼각형
// let str ='';
// for(let i=0; i<5; i++) {
//     for(let z=5; z>0; z--) {
//         if(z -i>1) {
//             str += '';
//         }
//          else {
//             str += '*';
//         }
//     }
//     str += '\n';
// }
// console.log(str);

// for.... in: 모든 객체를 반복하는 방법 , key에  접근
const OBJ2 = {
    key1: 'val1'
    ,key2: 'val2'
}

for(let key in OBJ2) {
    console.log(OBJ2[key]);
}

// 이터러블 - 순서가 정해져 있는
// for... of : 이터러블(iterable) 객체를 반복하는 문법
// length로 구별
const STR1 = '안녕하세요';

for(let val of STR1) {
    console.log(val);
}

const ARR1 = [1,2,3];
