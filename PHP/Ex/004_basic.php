<?php 

// 변수 (Variable)
$dan = 5;

echo "$dan x 1 = 2\n";  // \n :개행 사용할때 무조건 ""
echo "$dan x 2 = 4\n";
echo "$dan x 3 = 6\n";
echo "$dan x 4 = 8\n";
echo "$dan x 5 = 10\n";

// 변수 선언 
$num;

// 변수 초기화 - 변수를  선언하고 초기화후 값을 지정
$num = 1;

// 변수 선언 및 초기화
$str ="가나다" ;

// # 변수 명명 규칙

// - 변수명은 영문 대소문자,숫자 ,언더바(*) 사용 가능 (’_’이외의 특수기호 사용 불가능/ 한글은 사용가능하나 지양)*
// - 변수명은 숫자로 시작이 불가능
// - 변수명은 공백이 포함 불가
// - 변수명은 미리 지정되어 있는 예약어를 사용 불가
// - 변수명은 미리 지정되어 있는 예약어를 사용불가  
//     ex)$this , $_POST 등등    
// - 변수명은 대소문자를 구분    
//     ex) $Num; 과 $num;은 서로 다른 변수로 인식



// ---------------
// 네이밍 기법
// 스네이크 기법 - 단어와 단어사이에 _로 연결
$user_name;

// 카멜 기법 - 단어와 단어사이에 대문자로 연결
$userName;

// --------------
$name = "미어캣";
echo $name;
$name = "고양이";
echo $name;
// --------------
// 상수 (constants) :절대 변하지 않는 값
define("AGE", 20);
echo AGE;
// define("AGE", 30);  // 이미 선언된 상수이므로 warning이 일어나고 값이 바뀌지 않는다.



// underscore 표기법 - 
$num = 10_000_000;
echo $num;


// 아래처럼 변수 값을 담아서 출력해 주세요.
// 점심메뉴
// 탕수육 8,000
// 짜장면 6,000
// 짬봉 6,000
$menu = "점심메뉴\n";
$tang = "탕수육 8,000\n";
$zza = "짜장면 6,000\n";
$zzam = "짬봉 6,000\n";

echo $menu , $tang , $zza, $zzam;

// ----------
// 두 변수의 스왑
$num1 = 200;
$num2 = 10;
$tmp;

$tmp = $num1; 
$num1 = $num2; 
$num2 = $tmp;
echo $num1 ,$num2;


// ---------------
// 데이터 타입 var_dump()
// ---------------
// int: 정수
$num= 1;
var_dump($num);

// float, double : 실수 -- float랑 double 차이는 저장 할수 있는 소수점 자릿수  
$double= 3.141592;
var_dump($double);

// string : 문자열 -- 숫자는 영어는 1바이트 한글은 한글자당 3바이트
$str = "abc가나다";
var_dump($str);

// boolean: 논리값
$boo =true;
var_dump($boo);

// NULL : 널
$null = null;
var_dump($null);

// array : 배열
$arr = [1,2,3];
var_dump($arr);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환 () 변환할떄 가능한지 아닌지 생각해서 사용?
$casting =(string)$num;
var_dump($casting);

