<?php

// -------------
// PDO Class : DB 엑세스 방법 중 하나


// DB 접속 정보 
// $my_host = "localhost"; //  DB Host : 서버의 아이피 주소  localhost or 127.0.0.1
// $my_user = "root";  // DB 계정
// $my_port ="3306"; // port
// $my_password = "php504"; // DB 계정 비밀번호
// $my_db_name= "dbsample"; // 접속할 DB명
// $my_charset = "utf8mb4"; // DB Charset
// $my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset; //DSN 

// // PDO 옵션 설정
// $my_otp= [
//     // Prepared Statement로 쿼리를 준비할 때 PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
//     PDO::ATTR_EMULATE_PREPARES       => false // DB에서 에뮬레이션 하도록 설정
//     // PDO에서 예외를 처리하는 방식을 지정
//     ,PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION  
//     // DB의 결과를 fetch하는 방식을 지정
//     ,PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC // 연관배열로 fetch하도록 설정
// ];

// // // DB 접속
// $conn = new PDO($my_dsn, $my_user, $my_password, $my_otp);

// // select
// $sql = " SELECT "
//             ."    * "
//             ." FROM employees "
//             ." ORDER BY emp_id ASC "
//             ." LIMIT 5 ";

// $stmt = $conn ->query($sql); // PDO::query() : 쿼리 준비+ 실행
// $result = $stmt ->fetchall(); // 질의 결과를 패치

// // 사번과 이름만 출력
// foreach($result as $item) {
//     echo $item["emp_id"]." ".$item["name"]."\n";
// }

// DB 정보
$my_host = "localhost"; // Host
$my_port ="3306"; // port
$my_user = "root"; // user
$my_password = "php504"; // password
$my_db_name = "dbsample"; // DB name
$my_charset = "utf8mb4"; // charset 컴퓨터가 어떻게 인식할꺼인지 설정

// DSN
$my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset;


// PDO option
$my_option = [
    // Prepared Statement의 애뮬레이션 설정
    PDO:: ATTR_EMULATE_PREPARES   => false
    // 예외 발생시, 예외 처리 방법 설정
    ,PDO:: ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION
    // Fecth할 때 데이터 타입 설정
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

// PDO Class 인스턴스
$conn =new PDO($my_dsn, $my_user, $my_password, $my_option);

// select 
// $sql = " SELECT "
//       ." * "
//       ." FROM "
//       ."       employees "
//       ." LIMIT 3 "
//       ;

// // $stmt = $conn->query($sql); // 쿼리 실행
// $result = $stmt->fetchAll(); // 결과 Fetch

// print_r($result);

// select예제
$sql = 
    " SELECT "
    ."  *  "
    ." FROM "
    ."       employees "
    ." WHERE "
    ."       emp_id = :emp_id1 "
    ."  OR  emp_id = :emp_id2 "
;
$prepare = [ 
    "emp_id1"  => 10001
    ,"emp_id2" => 10002
];

$stmt = $conn->prepare($sql); // 쿼리 준비
$stmt->execute($prepare); // 쿼리 실행
$result =$stmt->fetchAll(); // 결과 fetch

print_r($result);