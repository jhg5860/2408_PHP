<?php
// 로또 번호 생성기
// 1. 1~ 45 번호가 있다.
// 2. 랜덤한 번호 6개를 출력한다.
//  2-1 단, 번호는 중복되지 않는다.

// $arr =[]; // 1~45수를 가지는 배열
// $get_numbers =[]; // 뽑은 숫자 저장용 배열

// // 1~45의 값을 가지는 배열 생성 
// for($i = 1; $i<=45; $i++) {
//     $arr[$i-1]= $i;    
// }

// // 숫자 6개 뽑는 처리
// for($i=0; $i <6; $i++) {
//     $random_num =random_int(0,44);
//     $random_pick = $arr[$random_num];

//     //이미 뽑은 숫자인지 체크 처리
//     $is_set_flg=false;
    
//     foreach 


//     //분기용 플래그 체크
//     if(!$is_set_flg) {
//         $get_numbers[] = $random_pick;
//     }
//     else
// }

// // 출력 처리
// foreach($get_numbers as )

$arr=range(1,45); // 1~45의 수를 가지는 배열 // 범위를 포함하는 배열 생성 <range>
$get_numbers =[]; // 뽑은 숫자 저장용 배열

$random_key =array_rand($arr,6);  // 배열에서 랜덤한 키 (6개) 획득 
// array_rand(range(1,45) , 숫자) - 1,배열의 숫자를 받습니다 무작위로 뽑히기 원하는 숫자 2. 몇개의 숫자를 뽑을지 정해서 리턴해서 출력

// 랜덤한 키를 루프
foreach($random_key as $val) {
    $get_numbers[]= $arr[$val]; // 키를 이용해서 값 삽입
}

echo implode(" ", $get_numbers); // 공백을 구분자로 배열을 스트링으로 출력
