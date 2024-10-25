<?php
namespace PHP\oop;
require_once('./Mammal.php');
require_once('./Swim.php');
// 10.25

use PHP\oop\Mammal;

class Whale extends Mammal implements Swim {
    // private $name;
    // private $residence;

    // // 생성자 
    // public function __construct($name , $residence) {
    //     $this->name = $name;
    //     $this->residence = $residence;
    // }
    
    // // 정보 출력
    // public function printInfo() {
    //     return $this->name.'가'.$this->residence.'에 삽니다.';
    // }
    
    // 수영 메서드
    public function swimming() {
        return "수영합니다.";
    }
    public function printInfo() {
        return "고래고래고래";
    }
}




























// --------------------------------------------------------------------------------------------------------------------------------------------------------------------

// //  class 명이랑 파일명은 동일 해야한다. 개발자간의 약속 규칙 class 안에는 프로퍼티 또다른거는 메소드/ 프로퍼티 :  필드(class ?{})에 정의된 (변수)- // 클래스 내에 선언된 변수

// class Whale {
//     // 프로퍼티 -> $name
//     public $name = "고래"; 
//     private $age = 20; // 접근 제어 지시자중 private가 캡슐화 기능

//     // 생성자 메소드 : 접근 제어 지시자는 public이고 무조건 최초 1회 실행되는 연산 / 아무것두 작성하지않으면 Defalut (기본)값으로 비어잇는거를 실행 / 쓰는이유 :초기데이터를 세팅하기 위해서
//     public function __construct($name, $age) {
//         $this->name =$name;
//         $this->age = $age;
//     }

//     // (메소드) -> public function breath() {} : 필드 안에 함수 - //  클래스 내에 선언된 함수
//     public function breath() {
//         return "숨을 쉽니다";
//     }

//     public function printInfo() {
//         return $this->name."는".$this->age."살 입니다"; // $this : 클래스 내부의 요소에 접근 할때 사용
//     }

//     // getter / setter 메소드 getter : 해당 메소드를 가지고 옴 / setter 해당 메소드를 변경
//     public function getAge() {
//         return $this->age;
//     }
//     public function setAge($age) {
//         $this->age = $age;
//     }

//     // static 메소드 : 인스턴스화를 하지않고 사용할수 있다. 등록이 기본 사용하지 않아두 메모리에 저장되있어서 용량이 부하되서 속도가 느려지고 서버 과부하 될수 있다.
//     public static function dance() {
//         return '고래가 춤을 춥니다';
//     }
// }

// echo Whale::dance();

// Whale Instance(인스턴스화) // 메모리 상에 올리겟다.(새로운 객체를 생성)
// $whale = new Whale("핑크고래",40); // () : 함수나 메소드를 실행
// echo $whale->printInfo();
// (다른 객체를 생성)
// $whale2 = new Whale(); 

// echo $whale->printInfo();

// echo  $whale->getAge();
// $whale->setAge(30);
// echo $whale2->getAge();

