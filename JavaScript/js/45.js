/** 11.1 
     Promise 객체 ?
        -비동기 프로그래밍의 근간이 되는 기법
        - 비동기 작업의 최종완료 또는 실패
        -비동기 작업이 끝날 때까지 결과를 기다리는것이 아니라 결과를 제공하겠다는 약속을 반환한다는 의미에서 Promise로 명명

    promise 만들 때 무조건 필요한 콜백함수에는 resolve , rejsect가 있다.
    resole : 작업이 성공했을 때 성공임을 알려주는 객체
    reject : 작업이 실패했을 때 실패임을 알려주는 객체
 **/

// Promise 객체
// -------------

function iAmSleep(flg) {
    return new Promise((resolve , reject) =>{
        if(flg) {
            resolve('성공');
        } else {
            reject('실패');
        }
    });
}
iAmSleep(false)
.then(data => console.log(data))
.catch(error => console.log(error))
.finally(() => console.log('파이널리'))
;

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
// //  A > B > C 순으로 출력
iAmSleepy('A', 3000)
.then(() => iAmSleepy('B', 2000))
.then(() => iAmSleepy('C', 1000));

// // A > C > B 순으로 출력
iAmSleepy('A', 3000)
.then(() => { 
    iAmSleepy('B', 2000)
    iAmSleepy('C', 2000)
});
