<?php

// -----------------------
// if문 : 조건에 따라서 서로 다른 처리를 할 때 사용하는 문법
// -----------------------
$num =100;
if($num === 10) {
    echo "10입니다!\n";
} else if($num === 5) {
    echo "5입니다!\n";
} else if($num === 7) {
    echo "럭키\n";
}else {
    echo "숫자입니다.\n";
}

// 1이면 1등 , 2면 2등 , 3이면 3등 , 나머지는 순위 외 ,5번만 특별상을 출력
$rank = 5;
if ($rank === 1) { //rank가 1이면 1등으로 출력
    echo "1등\n";
} else if ($rank === 2) { //rank 2이면 2등으로 출력
    echo "2등\n";
} else if ($rank === 3) { //rank 3이면 3등으로 출력
    echo "3등\n";
} else if ($rank === 5) { //rank 5이면 특별상으로 출력 5번이라고해서 문자열이 아닌 숫자5로 넣어줘야함
    echo "특별상\n";
} else {
    echo "순위 외";
}

// 1번문제의 정답은 2, 2번문제의 정답은 5
// 1번문제와 2번문제 모두 정답이면 100점,
// 둘중 하나만 정답이면 50점
// 모두 오답이면 0점을 출력
$answer1 = 2;
$answer2 = 5;

if ($answer1 === 2 && $answer2 === 5) {
    echo "100점\n";
} else if ($answer1 === 2 || $answer2 === 5) {
    echo "50점\n";
} else {
    echo "0점";
}