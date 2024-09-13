<?php
require_once("./Whale.php");




// //인스턴스화
// $whale = new Whale();

// // Class의 메소드 사용
// $whale ->breath();

// // 프로퍼티 접근
// echo $whale ->name; // public이므로 접근 가능
// // echo $whale ->age; // private 이므로 접근이 불가
// echo $whale->info();

// 스태틱 멤버에 접근
// Whale::myStatic();

require_once("./Shark.php");
// 상어 클래스
$shark = new Shark("상어");
echo $shark->name;

