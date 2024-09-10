<?php
// IF로 만들어주세요.
// 성적
// 범위 :
//      100   : A+
//      90이상 100미만 : A
//      80이상 90미만 : B
//      70이상 80미만 : C
//      60이상 70미만 : D
//      60미만: F
// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
$score = 40;
$grade = "";
if($score === 100) {
    $grade = "A+";
} else if($score >= 90 ) {
    $grade = "A";
} else if($score >=80 ) {
    $grade= "B";
} else if($score >=80) {
    $grade= "C";
} else if($score >=60) {
    $grade ="D";
}
else {
    $grade= "F";
}
echo "당신의 점수는".$score."점 입니다. <".$grade.">";

// $score =50;
// if($score === 100) {
//     echo "당신의 점수는 A+점입니다.\n";
// } else if ($score >=90 &&$score <100) {
//     echo "당신의 점수는 A점입니다.\n";
// } else if ($score >=80 &&$score <90) {
//     echo "당신의 점수는 B점입니다.\n";
// } else if ($score >=70 &&$score <80) {
//     echo "당신의 점수는 C점입니다.\n";
// } else if ($score >=60 &&$score <70) {
//     echo "당신의 점수는 D점입니다.\n";
// } else if($score <60) {
//     echo "당신의 점수는 F점입니다.\n";
// }

// echo "\n";