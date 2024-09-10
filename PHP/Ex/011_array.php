<?php   

// // 5.3버전 이하에서의 배열선언
// $arr2 = array(1, 2, ,3 ,4);
// -------------------------
// 배열(Array) : 하나의 변수에 여러개의 값을 담을 수 있는 데이터 타입
// -------------------------
// 배열 선언
$arr = [4, 3, 6, 1]; // [0 1 2 3] 방 번호

// 배열에서 특정 요소 접근
echo $arr[1];

// 배열에서 특정 요소 변경
$arr[2] = 100;
$arr[0] = "안녕하세요";

var_dump($arr);

// --------------
// 연관배열 : 사용자가 할당한 키를 사용하는 배열
$arr2 = [
    "key1" => 5000
    ,"key2" => "안녕하세요."
];

echo $arr2["key2"];

$arr2["key3"] = "미어캣";
var_dump($arr2);

// 연관배열 사용 예
$result= [
    "id" =>1
    ,"name" => "미어캣"
    ,"age" => 20
];

//-----------------------------
// 다차원 배열 : 요소로 하나 이상의 배열을 포함하는 배열
// ----------------------------
$arr3 = [
    [1, 2, 3 ] // 0 [0 , 1 ,2]
    ,[4 ,5, 6] // 1 [0 , 1 ,2] 
    ,[7, 8, 9] // 2 [0 , 1 ,2]
];
echo $arr3[0][0]; //  1
// echo $arr3[2][1]; //  8

// 다차원 배열의 예
$result2 = [
    [
        "id" => 10001
        ,"name" => "홍길동"  // 0 ["id" , "name"]
    ]
    ,[
        "id" => 10002
        ,"name" => "갑순이" // 1 ["id" , "name"]
    ],
    [
        "id" => 10003
        ,"name" => "갑돌이" // 2 ["id" , "name"]
    ]
];

echo $result2[0]["name"]; // 홍길동
echo $result2[1]["id"]; // 10002
echo $result2[2]["name"]; // 갑돌이

// ------------------------
// 배열에서 자주 사용하는 함수
// ------------------------
// count() : 배열의 요소의 개수를 반환하는 함수
$arr4 =[5, 67, 2, 3, 3, 4, 6, 8];
echo count($arr4); // 8개


// unset() :해당 키의 요소를 삭제
unset($arr4[1]); // [67] 요소를 삭제

var_dump($arr4);

// 배열의 정렬 함수
asort($arr4); // 값을 기준으로 오름차순 정렬
var_dump($arr4);

arsort($arr4); // 값을 기준으로 내림차순 정렬
var_dump($arr4);

$arr5 =[
    "d" => "1"
    ,"a" => "2"
    ,"c" => "3"
    ,"b" => "4"
];

ksort($arr5); // key 기준으로 오름차순 정렬 
var_dump($arr5);

krsort($arr5); // key 기준으로 내림차순 정렬 
var_dump($arr5);

