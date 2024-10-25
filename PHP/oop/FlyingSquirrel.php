<?php
namespace PHP\oop;
require_once('./Mammal.php');
require_once('./Pet.php');
// 10.25
use PHP\oop\Mammal;
use PHP\oop\Pet;
// 추상화 작업한것을 호출할때 extends Mammal

class FlyingSquirrel extends Mammal implements Pet {
    // private $name;
    // private $residence;
    
    //  // 생성자 
    //  public function __construct($name , $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    
    // // 정보 출력
    // public function printInfo() {
    //     return $this->name.'가'.$this->residence.'에 삽니다.';
    // }

    // 비행 메소드
    public function flying() {
        return '날아갑니다.';

    }

    // 오버라이딩 : 부모요소에 이미있는것을 재 정의하는거
    public function printInfo() {
        return ' 룰루랄라'; // 룰루랄라로 출력 
        // return parent ::printInfo()."룰루랄라"; // 날다람쥐가 산에 삽니다.룰루랄라로 출력
    }

    public function printPet() {
        return '펫입니다 찍찍';
    }

}