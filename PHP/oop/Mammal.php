<?php
namespace PHP\oop;
//  추상 클래스 :자신의 기능을 자식들에게 확장하기 위해서 사용
abstract class Mammal {
    private $name;
    private $residence;
    
    // 생성자 
    public function __construct($name , $residence) {
        $this->name = $name;
        $this->residence = $residence;
    }

    // 추상 메소드
    abstract public function printInfo() ;
}



// // 10.25
// // class 추상화 작업

// // namespace


// class Mammal {
//     private $name;
//     private $residence;

//     // 생성자 
//     public function __construct($name , $residence) {
//         $this->name = $name;
//         $this->residence = $residence;
//     }
    
//     // 정보 출력
//      public function printInfo() { // 오버라이딩 막는법 : 제일앞에 final 붙이면됨 final public function printInfo() {}
//         return $this->name.'가 '.$this->residence.'에 삽니다.';
//     }
// }