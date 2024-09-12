<?php
// PHP 내장함수

// -----------
// trim(문자열) : 문자열 좌우 공백을 제거해서 반환
$str = "    미어캣   " ;
echo trim($str);
echo "\n";

// -----------
// strtoupper (문자열), strtolower(문자열) : 문자열을 대/소문자로 변환해서 반환
$str2 = "AbcDe";
echo strtoupper($str2);
echo strtolower($str2);

echo "\n";
// -----------
// strlen(문자열) : 문자열의 길이를 반환 , 멀티바이트 문자열에 대응 못함
// mb_strlen(문자열) : 문자열의 길이를 반환 , 멀티바이트 문자열에 대응 공백두포함
$str3= "미어캣";
echo strlen($str3); // 1byte로 인식 한글같은거 인식 못함
echo mb_strlen($str3); 

echo "\n";
// -----------
// str_replace(치환할 문자열, 치환될 문자열 ,대상 문자열) : 특정 문자를 치환해서 반환
$str4 = "key: 34kjfjf02ks9d91jsjo";
echo str_replace("key: ", "", $str4);

echo "\n";
// -----------
// mb_substr(대상문자열, 자를 개수, 출력할 계수[생략가능]) : 문자열을 잘라서 반환
$str5 = "PHP입니다.";
echo mb_substr($str5, 3, 1)."\n"; // 좌측부터 잘린다.
echo mb_substr($str5, -3, 3); // 우측부터 잘린다.

echo "\n";
// -----------
// mb_strpos(대상문자열, 검색할 문자열) : 검색할 문자열의 특정 위치를 반환
$str6 = "점심 뭐먹지?";
echo mb_strpos($str6, "뭐")."\n";
// "뭐" 부터 3글자를 잘라오기
echo mb_substr($str6 , mb_strpos($str6, "뭐"), 3);

echo "\n";
// -----------
// %d =음수 %u =양수 $s=문자열 %f =실수 %.숫자f = 소숫점 자리수
// sprintf(포멧문자열, 대입문자열1 , 대입문자열2 ....) : 포멧 문자열에 대입문자열들을 순서대로 대입해서 반환
// $str_format= "당신의 점수는 %d점입니다. <%s>"; 
// $str_format= "당신의 점수는 %f점입니다. <%s>"; 
$str_format= "당신의 점수는 %.1f점입니다. <%s>"; 
// echo sprintf($str_format , 90, "A");
echo sprintf($str_format , 1.2, "A");

echo "\n";
// -----------
// isset(변수) : 변수가 설정되어 있는지 확인하여 true/false로 반환
$str7 ="";
$str8 =null;
var_dump(isset($str7));
var_dump(isset($str8));
var_dump(isset($no)); // 변수가 설정되어있지않으면 false

echo "\n";
// -----------
// empty(변수) : 변수의 값이 비어있는지 확인해서 true/false로 반환
$empty1 ="abc";
$empty2 ="";
$empty3 = 0;
$empty4 =[];
$empty5 =null;

var_dump(empty($empty1));
var_dump(empty($empty2));
var_dump(empty($empty3));
var_dump(empty($empty4));
var_dump(empty($empty5));

// -----------
// is_null(변수) : 변수가 null인지 아닌지 확인하여 true/falsef를 반환
$chk_null = null;
var_dump(is_null($chk_null));

echo "\n";
// -----------
// gettype(변수) : 변수의 데이터 타입을 문자열로 반환
$type1 = "abc";
$type2 = 0;
$type3 =1.2;
$type4 = [];
$type5 =true;
$type6 =null;
$type7 = new DateTime();
echo gettype($type1)."\n";
echo gettype($type2)."\n";
echo gettype($type3)."\n";
echo gettype($type4)."\n";
echo gettype($type5)."\n";
echo gettype($type6)."\n";
echo gettype($type7)."\n";

// 타입 체크 예)
if(gettype($type2) === "integer") {
    echo "숫자임";
}

echo "\n";
// -----------
// settype(변수, 데이터타입) : 변수의 데이터 타입을 변환
$type8 = "1";
// var_dump((int)$type8); // 원본은 변경하지 않고, 캐스팅
settype($type8, "int");  // 원본의 데이터 타입을 변환
var_dump($type8);

echo "\n";
// -----------
// time() : 현재시간을 반환(타임스탬프 초단위)
echo time();

echo "\n";
// -----------
// date(시간포맷, 타임스탬프값) : 시간 포맷형식으로 문자열을 반환
echo date("Y-m-d H:i:s", time());

echo "\n";
// -----------
// ceil(변수) ,round(변수) , floor(변수) : 각 올림, 반올림, 버림하여 반환
echo ceil(1.2)."\n";
echo round(1.2)."\n";
echo floor(1.2)."\n";

// -----------
// random_int(시작값, 끝값) : 시작값부터 끝값까지의 랜덤한 숫자를 반환
echo random_int(1, 10);