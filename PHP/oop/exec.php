<?php

require_once('./FlyingSquirrel.php');
require_once('./Whale.php');
require_once('./GoldFish.php');

use PHP\oop\Whale;
use PHP\oop\FlyingSquirrel;
use PHP\ooP\GOldFish;
// 10.25

$whale = new Whale('고래', '바다');
// class 상속화
echo $whale->printInfo();
// 오버라이딩
$flyingSquirrel = new FlyingSquirrel('날다람쥐' ,'산');
echo $flyingSquirrel->printInfo(); // 원래라면 날다람쥐가 산에 삽니다.로 출력 되어야 하지만 오버라이딩으로 함수를 재 정의 해서 룰루랄라로 출력된다.  

$goldFish = new GoldFish();
echo $goldFish->printPet();
//  추상클래스와 인터페이스 

