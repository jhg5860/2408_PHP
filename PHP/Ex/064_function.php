<?php

// @param int $num1 숫자
// function my_sum ($num1, $num2) // 파라미터(인자) - (변수 , 변수) return -반환 return이 없는 함수두 있다.
// 두수를 전달해주면 합을 반환해주는 함수
// 함수 정의

/**
 * 두 수를 더해서 반환
 * 
 */
function my_sum($num1, $num2) {
    return $num1 +$num2;
}

my_sum(3, 5); // 함수 호출 함수(3 , 5 ) - 3,5 아규먼트(인수)

// 두수를 받아서 -,*,/,%의 결과를 리턴하는 함수를 만들어 주세요.

/**
 * 두수를 빼서 반환
 * 
 */
// function my_minus($num1 , $num2) {
//     return $num1 - $num2;
// }
// my_minus(10 ,2);


// /**
//  * 두수를 곱해서 반환
//  * 
//  */
// function my_multi($num1 , $num2) {
//     return $num1 * $num2;
// }
// my_multi(2 ,9);


// /**
//  * 두수를 나눠서 반환
//  * 
//  */
// function my_divide($num1 , $num2) {
//     return $num1 / $num2;
// }
// my_divide(10 ,2);


// /**
//  * 두수를 나눠서 나머지를  반환
//  * 
//  */
// function my_remain($num1 , $num2) {
//     return $num1 % $num2;
// }
// my_remain(8 ,8);

// echo my_minus(10 ,2);

// function my_sub($a, $b) {
//     return $a - $b;
// }
// echo my_sub(5,3);

// function my_multi($a, $b) {
//     return $a * $b;
// }
// echo my_multi(5,3);

// function my_div($a, $b) {
//     return $a / $b;
// }
// echo my_div(5,3);

// function my_remind($a, $b) {
//     return $a % $b;
// }
// echo my_remind(5,3);





// --------------------
// 가변 길이 아규먼트

// 전달되는 모든 숫자를 더해서 반환 
// ...을 이용하는 방법 (**주의 :php5.6 이상에서 사용가능)
// function my_sum_all(...$numbers) {
//     $sum = 0;

//     foreach($numbers as $val) {
//         $sum += $val;   
//     }

//     return $sum;
    
//     // return array_sum($numbers);
// // }

// echo my_sum_all(4,5);

// 5.5버전 이하일때 가변 길이 아규먼트 사용법
function my_sum_all() {
        $numbers = func_get_args();
        return array_sum($numbers);

        // $sum = 0;

        // foreach($numbers as $val) {
        //     $sum += $val;
        // }

        // return $sum;
    }

echo my_sum_all(4,5);

// 일반 파리미터와 가변 파리미터를 같이 쓸경우

function test($param_str, ...$arr_str) {
    $str = "";
    foreach ($arr_str as $val) {
        $str .= $val;
    }
    $str .= $param_str;
    echo $str;
}
test("젤뒤","a" ,"B" ,"c");

