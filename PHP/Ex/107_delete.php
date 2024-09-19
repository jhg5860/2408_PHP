<?php

require_once("./my_db.php");

$conn = null;

try {
    // PDO 획득
    $conn = my_db_conn();
    
    // 트랜잭션 시작
    $conn->beginTransaction();

    //  sql
    $sql = 
        " DELETE FROM employees "
        ." WHERE "
        ."       emp_id = :emp_id1"
        ."   OR  emp_id = :emp_id2"
        ."   OR  emp_id = :emp_id3"
    ;

    $arr_prepare= [
        "emp_id1" => 100001
        ,"emp_id2" => 100002
        ,"emp_id3" => 100003
    ];

    $stmt = $conn->prepare($sql); // 쿼리 준비
    $result_flg = $stmt->execute($arr_prepare); // 쿼리 준비
    $result_cnt = $stmt->rowCount(); // 영향받은 레코드의 수 획득

    if(!$result_flg) {
        throw new Exception("쿼리 실행 예외 발생");
    }
    
    if($result_cnt >1) {
        throw new Exception("삭제 레코드 수 이상");
    
    }
    //  commit 처리 
        $conn->commit();

} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollback();
    }

    echo $th->getMessage();
}