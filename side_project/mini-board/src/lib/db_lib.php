<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");

function my_db_conn() {
    $option= [
        PDO::ATTR_EMULATE_PREPARES      => false
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC
    ];

    return new PDO(MY_MARIADB_DSN, MY_MARIADB_USER, MY_MARIADB_PASSWORD , $option);
}

/** 09/24
 *  board select 페이지네이션
 */

function my_board_select_pagination(PDO $conn, array $arr_param) {

    // SQL
        $sql = 
        " SELECT "
        ." * "
        ." FROM "
        ."        board "
        ." WHERE "
        ."          deleted_at IS NULL "
        ." ORDER BY "
        ."       created_at DESC "
        ."       , id DESC "
        ." LIMIT :list_cnt OFFSET :offset "
    ;


    $stmt= $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);

    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt-> fetchAll();
}

/** 09/25
 *  board 테이블 유효 게시글 총 수 획득
 */
function my_board_total_count(PDO $conn) {
    $sql = 
            " SELECT "
            ."        COUNT(*) cnt "
            ." FROM "
            ."        board "
            ." WHERE"
            ."           deleted_at IS NULL "
    ;
    $stmt = $conn->query($sql);
    $result = $stmt->fetch(); // fetch :전체 데이터중에서 제일 위에꺼 하나 가져오고(1차원 배열) fetchall 검색한 데이터  다 가져옴(다차원 배열)

    return $result["cnt"];

}

function my_board_insert(PDO $conn, array $arr_param) {
    $sql = 
         "INSERT INTO board ("
         ."    title "
         ."    ,content "
         ." ) "
         . " VALUES ( "
         ."      :title "
         ."      ,:content "
         ." ) "
    ;
    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);
    
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }
    
    $result_cnt = $stmt->rowCount();

    if($result_cnt !== 1) {
        throw new Exception("Insert Count 이상");
    }

    return true;
}
/**
 * id로 게시글 조회
 */
function my_board_select_id(PDO $conn, array $arr_param) {
    $sql = 
        " SELECT "
        ."       * "
        ." FROM "
        ."      board "
        ."  WHERE " 
        ."      id= :id "
    ;

    $stmt = $conn->prepare($sql);
    $result_flg = $stmt->execute($arr_param);
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetch();
    
}

// 09.26 update 함수

function my_board_update(PDO $conn, array $arr_param) {
    $sql = 
            " UPDATE board "
            ." SET "
            ."      title = :title "
            ."      ,content = :content "
            ."       ,updated_at = NOW() "
            ." WHERE "
            ."       id = :id "
            ;

        $stmt = $conn->prepare($sql);
        $result_flg = $stmt->execute($arr_param);


        if(!$result_flg) {
            throw new Exception("쿼리 실행 실패");
        }

        if($stmt->rowCount() !== 1) {
            throw new Exception("Update Count 이상");
        }

        return true;
}


/**
 *  board 테이블 레코드 삭제
 */


function my_board_delete_id(PDO $conn, $arr_param) {
    $sql =
        " UPDATE board "
        ." SET "
        ."       updated_at =NOW() "
        ."       ,deleted_at = NOW() "
        ." WHERE  "
        ."       id= :id "
        ;

        $stmt =$conn->prepare($sql);
        $result_flg = $stmt->execute($arr_param);

        if(!$result_flg) {
            throw new Exception("쿼리 실행 실패");
        }
        if($stmt->rowCount() !== 1) {
            throw new Exception("Delete Count 이상");
        }
        return true;
    }