<?php
// 10.25 인터페이스 - 다른 특성을 가진것들이 관계성을 가지기 위해 사용 소스코드 표준화
namespace PHP\oop;

require_once('./Swim.php');
require_once('./Pet.php');

use PHP\oop\Swim;
use PHP\oop\Pet;

class GoldFish implements Swim , Pet {
    private $name = '금붕어';

    public function swimming() {
        return '수영합니다.';
    }
    public function printPet() {
        return '펫입니다. 첨벙첨벙';
    }
}