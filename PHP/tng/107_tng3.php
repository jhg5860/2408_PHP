<?php

    require_once("../Ex/my_db.php");

    // 3명의 신규 사원 정보를 employees에 추가해야한다.
    // 성공한건 삽입되고, 실패한 것만 안들어가게

    $data = [
        ["name" => "둘리", "birth" => "1986-01-01", "gender" => "M"]
        ,["name" => "희동이", "birth" => "ㅁㄴㅇㅁ", "gender" => "M"]
        ,["name" => "고길동", "birth" => "1968-01-01", "gender" => "M"]
    ];

    $conn =null;

    try {
        $conn = my_db_conn();

        foreach($data as $item) {
            try {
                // transation Start
                $conn->beginTransaction();

                // --------------------
                // 새로운 사원 정보 삽입
                $sql =
                    " INSERT INTO employees ( "
                    ."        name "
                    ."        ,birth"
                    ."        ,gender"
                    ."        ,hire_at"
                    ." ) "
                    ." VALUES ( "
                    ."        :name "
                    ."        ,:birth"
                    ."        ,:gender"
                    ."        ,DATE(NOW())"
                    ." ) "
                ;
                $arr_prepare =[
                "name" => $item["name"]
                ,"birth" => $item["birth"]
                ,"gender" => $item["gender"]
                ];

                $stmt = $conn->prepare($sql);
                $result_flg = $stmt->execute($arr_prepare);
                $result_cnt= $stmt->rowCount();

                if(!$result_flg) {
                    throw new Exception("Update exec Error: employees");
                }

                if($stmt->rowCount() !==1) {
                    throw new Exception("Update Row Count Error : employees");
                }

        // commit
        $conn->commit();

        } catch(Throwable $th) {
            if(!is_null($conn)) {
                $conn->rollback();
            }
            echo "안쪽 try문: ".$th->getMessage();
        }
    }
 
    } catch(Throwable $th) {
        echo "바깥쪽 try문: ".$th->getMessage();
    }
