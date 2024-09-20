<?php

// require_once("../Ex/my_db.php");

// $conn =null;


// try {
//     $conn  = my_db_conn(); 
    
//     $conn->beginTransaction();
    
//     // 나의 급여를 2500만원으로 변경해주세요.
//     $sql =
//     " UPDATE  salaries"
//     . " SET "
//     ."      emp_id= :emp_id "
//     ."      ,end_at = NOW() "
//     ."      updated_at =DATE(NOW()) "
//     ;
//     $arr_prepare = [
//         "emp_id" =>100017        
//     ];
     
//     $stmt = $conn->prepare($sql);
//     $result_flg =$stmt->execute($arr_prepare);
//     $result_cnt =$stmt->rowCount();

//     if(!$result_flg) {
//         throw new Exception("Insert Query Error :salaries");
//     }

//     if($result_cnt !==1) {
//         throw new Exception("Insert Count Error :salaries");
//     }

    
//     $sql =
//     " INSERT INTO  salaries ( "
//     ."      salary= :salary "    
//     ."      ,updated_at = DATE(NOW()) "
//     ."  WHERE emp_id= :emp_id "
//     ." ) "
//     ." VALUES ( "
//     ."      salary= :salary "    
//     ."      ,updated_at = DATE(NOW()) "
//     ."  WHERE emp_id= :emp_id "
//     ." ) "
//     ;
//     $arr_prepare = [
//         "emp_id" =>100017
//         ,"salary" =>25000000        
//     ];
    
//     $stmt = $conn->prepare($sql);
//     $result_flg =$stmt->execute($arr_prepare);
//     $result_cnt =$stmt->rowCount();
    
//     if(!$result_flg) {
//         throw new Exception("Insert Query Error :salaries");
//     }
    
//     if($result_cnt !==1) {
//         throw new Exception("Insert Count Error :salaries");
//     }
    
//     $conn->commit();
    
// } catch(Throwable $th) {
//     if(!is_null($conn)) {
//         $conn->rollback();
//     }
//     echo $th->getMessage();
// }


// Teacher
require_once("../Ex/my_db.php");

$conn= null;

try {
    $conn = my_db_conn();

    // transaction 시작
    $conn->beginTransaction();

    // ----------
    // 기존 급여 수정
    $sql = 
        " UPDATE salaries "
        ." SET "
        ."      end_at = DATE(NOW()) "
        ."     ,updated_at = NOW() "
        . "  WHERE " 
        ."         emp_id = :emp_id " // :emp_id  : > prepare statment 인식
        ."  AND end_at IS NUll "
    ;
    $arr_prepare = [
        "emp_id"=> 100017
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt= $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("Update exec Error: salaries");
    }

    if($stmt->rowCount() !==1) {
        throw new Exception("Update Row Count Error : salaries");
    }

    // --------------
    // 새로운 급여 이력 추가

    $sql = 
        " INSERT INTO salaries( "
        ."      emp_id  "
        ."      ,salary  "
        ."      ,start at "
        ." ) "
        ." values ("
        ."      :emp_id  "
        ."      ,:salary  "
        ."      ,DATE(NOW()) "
        ." )"
    ;
    $arr_prepare = [
        "emp_id" => 100017
        ,"salary"=> 25000000
    ];

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_prepare);
    $result_cnt= $stmt->rowCount();

    if(!$result_flg) {
        throw new Exception("Update exec Error: salaries");
    }

    if($stmt->rowCount() !==1) {
        throw new Exception("Update Row Count Error : salaries");
    }
    // commit

    $conn-> commit();

} catch(Throwable $th) {
    if(!is_null($conn)) {
        $conn->rollback();
    }
    echo $th->getMessage();
}