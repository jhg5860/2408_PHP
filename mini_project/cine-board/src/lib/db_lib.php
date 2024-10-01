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


//  board select 페이지네이션

function my_board_select_pagination(PDO $conn , array $arr_param) {

    // SQL 
    $sql =
        " SELECT "
        ." * "
        ." FROM "
        ."      board "
        ." WHERE "
        ."            deleted_at IS NULL "
        ." ORDER BY "
        ."          created_at DESC "
        ."          ,id DESC "
        ." LIMIT :list_cnt OFFSET :offset "
;
    // 쿼리 준비
    $stmt = $conn->prepare($sql);
    // 쿼리 실행
    $result_flg = $stmt->execute($arr_param);
    
    if(!$result_flg) {
        throw new Exception("쿼리 실행 실패");
    }

    return $stmt->fetchAll();
}


// board 테이블 유효 게시글 총 수 획득

function my_board_total_count(PDO $conn) {
    $sql = 
        " SELECT "
        ."       COUNT(*) cnt "
        ."    FROM "
        ."         board "
        ." WHERE "
        ."       deleted_at IS NULL "
        ;
        $stmt = $conn->query($sql);
        $result = $stmt->fetch();

        return $result["cnt"];
}

// board 테이블 게시글 추가 
function my_board_insert(PDO $conn , array $arr_param ) {
    $sql = " INSERT INTO board ( "
    ." title "
    ." ,content "
    ." ,img "
    ."  )  "
    ." VALUES ( "
    ."      :title "
    ."      ,:content "
    ."      ,:img "
    ." ) "
    ;
$stmt = $conn->prepare($sql);
$result_flg = $stmt->execute($arr_param);

if(!$result_flg) {
    throw new Exception("쿼리 실행 실패");
}

$result_cnt = $stmt->rowCount();

if(!$result_cnt !== 1) {
    throw new Exception("Insert Count 이상");
}

return true;

}