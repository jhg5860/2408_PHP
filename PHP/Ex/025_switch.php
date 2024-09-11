<?php
// switch 문

$food = "떡볶이";

// if($food === "떡볶이") {
//     echo  "한식";
// } else if($food === "짜장면") {
//     echo "중식";
// } else if($food === "햄버거") {
//     echo "양식";
// }

// switch 문 // 일치하는 상황에서 사용 일치하는지 안한지 할때 사용
// switch($food) {
//     case "떡볶이":
//         echo "한식";
//         break;  //break생략시 다음 처리도 계속 이어간다.
//     case "짜장면":
//         echo "중식";
//         break;
//     case "햄버거":
//         echo "양식";
//         break;
//     default :   // else랑 같음 
//         echo "맛있음";
//         break;
// }

// switch를 이용하여 작성
// 1등이면 금상, 2등이면 은상, 3등이면 동상, 4등이면 장려상, 그 외는 노력상
// 을 출력해 주세요.
$rank ="1등";

switch($rank) {
    case "1등":
        echo "금상";
        break;
    case "2등":
        echo "은상";
        break;
    case "3등":
        echo "동상";
        break;
    case "4등" :
        echo "장려상";
        break;
    default :
        echo "노력상";
        break;
}

// switch("true"){
//     case "true":
//         switch($rank) {
//             case 1:
//                 echo "금상";
//                 break;
//             case 2:
//                 echo "은상";
//                 break; 
//             case 3:
//                 echo "동상";
//                 break;
//             case 4:
//                 echo "장려상";
//                 break;
//             default :
//                 echo "노력상";
//                 break;           
//         }
// }


// $rank =1;
// switch($rank) {
//     case 1:
//         echo "금상";
//         break;
//     case 2:
//         echo "은상";
//         break; 
//     case 3:
//         echo "동상";
//         break;
//     case 4:
//         echo "장려상";
//         break;
//     default :
//         echo "노력상";
//         break;           
// }