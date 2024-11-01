// 11.01
// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);

// 프로미스 객체 생성 비동기처리는 함수로 감싸두 비동기처리가 동기로 바뀌는게 아니다.
function iAmSleepy(str ,ms) {
    return new Promise((resolve) =>{
        setTimeout(()=> {
            console.log(str);
            resolve();
        }, ms);
    });
}

iAmSleepy('A', 3000)
.then(() => iAmSleepy('B', 2000))
.then(() => iAmSleepy('C', 1000))
.catch(() => console.log('error'))
.finally(()=> console.log('finally'));

async function test() {
    try {
        await iAmSleepy('A', 3000);
        await iAmSleepy('B', 2000);
        await iAmSleepy('C', 1000);

    } catch(error) {
        console.log('error');
    } finally {
        console.log('finally');
    } 
}
test()

// dom ? 자바스크립트 객체? 요소를 선택 
// 특정 행위가 실행 됐을때  