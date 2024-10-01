<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);


$conn =null;

try {
    $id= isset($_GET["id"]) ? (int)$_GET["id"] : 0;
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;



    if($id <1) {
        throw new Exception("파라미터 이상");
    }

    $conn = my_db_conn();

    $arr_prepare=[
        "id" => $id
    ];

    $result = my_board_select_id($conn, $arr_prepare);


} catch(Throwable $th) {
    require_once(MY_PATH_ERROR);
    exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/detail.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>상세 페이지</title>
</head>
<body>
    <main>
        <header>
            <h1>영화 게시판</h1>
        </header>          
        
        <div class="title-box">
            <div class="box">
            <div>30</div>
            </div>
            <div class="box">
                <div>어벤져스: 엔드 게임</div>
            </div>
            <div class="box">
                <div>2024-01-01</div>
            </div>
        </div>        
        <!-- 이미지 -->
               <div class="img-select-box">
                <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="img">
                </form>                
               </div>
        <div class="content-box">
            <p>
               인피니티 워 이후 많은 사람이 죽고 또 많은 것을 잃게 된 지구는 더 이상 희망이 남지 않아 절망 속에 살아간다.<br>
               전쟁 후 남아 있던 어벤저스는 그런 그들의 모습을 보게 된다.<br>
               마지막으로 지구를 살리려 모든 것을 건 타노스와 최후의 전쟁을 치른다.
            </p>
        </div>        

        <div class="main-footer">
               <a href="./update.html"><button class="button-small">수정</button></a>
               <a href="./index.html"><button class="button-small">취소</button></a>
               <a href="./delete.html"><button class="button-small">삭제</button></a>
        </div>
           

     </main>      
</body>
</html>