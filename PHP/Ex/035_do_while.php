<?php
// do while : 무조건 한번은 실행하고 조건을 체크하는 반복문

$cnt= 1;

while($cnt <1) {    
    echo "와일문";
}

do {
    echo "두 와일문";
} while($cnt <1);


/**while 문과 do while문 차이점은 while는 조건을 확인하고 
실행하고 do while는 무조건 실행하고 조건을 체크 */