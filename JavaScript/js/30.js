// 10. 29-----------------
// Date 객체 
// -----------------
const dateToKorean = (day) => {
    const ARR_DAY = ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'];
    return ARR_DAY[day];
    // switch (day) {
    //     case 0:
    //         return '일요일';            
    //     case 1:
    //         return '월요일';
    //     case 2:
    //         return '화요일';            
    //     case 3:
    //         return '수요일';
    //     case 4:
    //         return '목요일';            
    //     case 5:
    //         return '금요일';
    //     default:
    //         return '토요일';
    // }
}

const addlpadZero = (num , length) => {
    return String(num).padStart(length, 0);
}

// 현재 날짜 및 시간 획득
const NOW = new Date(); // Tue Oct 29 2024 11:35:12 GMT+0900 (한국 표준시)
// const TEST = new Date('1990-01-01 00:00:00');

// getFullYear() : 연도만 가져오는 메소드(yyyy)
const YEAR = NOW.getFullYear(); // 2024
// const YEAR2 = TEST.getFullYear(); // 1990

// getMonth() : 월을 가져오는 메소드, 0 ~ 11 반환
// const MONTH = String(NOW.getMonth() + 1).padStart(2, '0'); 
const MONTH = addlpadZero(NOW.getMonth() + 1 , 2) 

// getDate() : 일을 가져오는 메소드 
const DATE = addlpadZero(NOW.getDate() ,2);

// getHours() : 시를 가져오는 메소드
const HOUR = addlpadZero(NOW.getHours(), 2);

// getMinutes() : 분을 가져오는 메소드
const MINUTES = addlpadZero(NOW.getMinutes() , 2);

// getSeconds() : 초을 가져오는 메소드
const SECONDS = addlpadZero(NOW.getSeconds() ,2);

// getMilliseconds() :미리초를 가져오는 메소드
const MILLISECONDS = addlpadZero(NOW.getMilliseconds(), 3);

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토) 리턴
const DAY = NOW.getDay();

const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTES}:${SECONDS}.${MILLISECONDS}, ${dateToKorean(DAY)}`; //'2024-10-29 12:20:53.871'

// getTime() : UNIX Timestamp 를 반환 (미리초 단위)
console.log(NOW.getTime());

// 두 날짜의 차를 구하는 방법
const TAGET_DATE = new Date('2025-03-13 18:10:00');
const DIFF_DATE = Math.floor(Math.abs(NOW - TAGET_DATE) / 86400000); // 남은 일수 135일 
// 1000 * 60 * 60 * 24 = 8640000 // (일 단위) 

// 2024-01-01 13:00:00 과 2025-05-30 00:00:00은 몇개월후 입니까?
// 1000 * 60 * 60 * 24 * 30 = 259200000 한달에 30일 기준
// const NOW2 = new Date('2024-01-01 13:00:00');
//  const TAGET_DATE2= new Date('2025-05-30 00:00:00');
// const DIFF_DATE2 = Math.floor(Math.abs(NOW2 - TAGET_DATE2) / 259200000);

const TAGET_DATE2 = new Date('2024-01-01 13:00:00');
const TAGET_DATE3 = new Date('2025-05-30 00:00:00');
const DIFF_DATE2 = Math.floor(Math.abs(TAGET_DATE2 - TAGET_DATE3) / (1000 * 60 * 60 * 24 * 30));