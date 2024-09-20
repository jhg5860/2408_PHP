<?php
// 구구단
// **** 2단 ****
// 2x1 = 2
// ...

// $dan =9;

// for ($i=2; $i<=$dan; $i++) {
//     echo "**** ".$i."단 ****\n";
//     for($z=1; $z <=$dan; $z++) {
//         echo $i. " X ".$z. " = ".($i*$z)."\n";
//     }
// }

// ------------------------------------
// function 함수 : 특정기능을 단위로 묶어서 모듈화 시킨후에 여러곳에서 쓰는거

// 두수를 더해서 반환하는 함수
// 함수에서 저장하는 값을 파라미터 $num1,$num2 / int =타입힌트 () :int 리턴타입 // float -실수 파라미터 기본값 세팅 방법 변수 = 값 
// function my_sum(int $num1, int $num2 = 10): int { 
//   return $num1+ $num2; 
// }

// echo my_sum(1, "a");  // 함수에서 호출해주는것을 아규먼트 1,2

// time();

// -------------------
// 예외처리 
// try {
//     // 처리하고자 하는 로직
//     5/0 ;
// } catch(Throwable $th) {
//     //예외 발생시 할 처리
//     echo $th->getMessage();
// } finally {
//     // 예외의 발생여부와 상관없이 항상 실행 할 처리 
//     echo "파이널리";
// }

// echo "처리끝";

//------ 
// 이중 예외처리
// -----

// try {
//     echo "바깥쪽 try\n";
        
//     try {
//         5 / 0;
//         echo "안쪽 try\n";
//     } catch(Throwable $th) {  // catch 쪽에는 에러날 코드 안적기
//         echo "안쪽 catch\n";
//         5 / 0;
//     }
// } catch(Throwable $th) {
//     echo "바깥쪽 catch\n";
// }

// ------------------
// 강제 예외 발생
try {
    throw new Exception("강제예외 발생");

    echo "try";
} catch(Throwable $th) {
    echo $th->getMessage();
}

// --------------
// 형변환 (캐스팅)  - 1회성
$num = 1;
Var_dump((string)$num);