<?php
function my_db_conn() {

    //  DB 접속 정보 
    $my_host = "localhost"; //  DB Host : 서버의 아이피 주소  localhost or 127.0.0.1
    $my_user = "root";  // DB 계정
    $my_port ="3306"; // port
    $my_password = "php504"; // DB 계정 비밀번호
    $my_db_name= "dbsample"; // 접속할 DB명
    $my_charset = "utf8mb4"; // DB Charset
    $my_dsn = "mysql:host=".$my_host.";port=".$my_port.";dbname=".$my_db_name.";charset=".$my_charset; //DSN 
    
    // PDO 옵션 설정
    $my_otp= [
        // Prepared Statement로 쿼리를 준비할 때 PHP와 DB 어디에서 에뮬레이션 할지 여부를 결정
        PDO::ATTR_EMULATE_PREPARES       => false // DB에서 에뮬레이션 하도록 설정
        // PDO에서 예외를 처리하는 방식을 지정
        ,PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION  
        // DB의 결과를 fetch하는 방식을 지정
        ,PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC // 연관배열로 fetch하도록 설정
    ];
    
    // DB 접속
    return new PDO($my_dsn, $my_user, $my_password, $my_otp);
}

