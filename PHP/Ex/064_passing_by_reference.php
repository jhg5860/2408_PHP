<?php
값복사(Value of Copy)
$num1 = 100;
$num2 = $num1; //&$num1참조 $num1복사

$num2 -= 50;

echo $num1, $num2; // num1= 100 , num2= 50

// 참조전달 (Passing By Reference)
$num3 = 100;
$num4 = $num3; //&$num1참조 $num1복사

$num4 -= 50;

echo $num3, $num4; // num3= 50, num4= 50

echo "\n\n";
function my_test(&$num) {
    $num--;
}

// $num5= 5;
// my_test($num5);
// echo $num5;
 // 4 

// function my_test($num) {
//     $num--;
//     echo "my_test() : ".$num."\n";
// }

// $num5= 5;
// my_test($num5);
// echo $num5;

// my_test() : 4
// 5

// function my_test(&$num) {
//     $num--;
//     echo "my_test() : ".$num."\n";
// }

// $num5= 5;
// my_test($num5);
// echo $num5;

// my_test() : 4
// 4

// 값을 복사하는게 아니고 참조해서 사용

// -----------------------------------
// 스코프 : 변수나 함수의 유효 범위
// -----------------------------------

// 전역 스코프 : <?php 아래부터
// $str = "전역 스코프";


// function my_scope1() { 
//     global $str; // 전역스코프 사용을 위해 선언
//     echo $str;
// }

// my_scope1();

// 지역 스코프 {}기준
function my_scope2() {
    $str2 ="my_scope2 영역";
    echo $str2;
}
// echo $str2;
// my_scope2();

for ($si =1; $i<6; $i++) {
    $str3 = "포문";
}
echo $str3;

