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
        <?php 
        require_once(MY_PATH_ROOT."header.php");
        ?>  
        
        <div class="title-box">
            <div class="box">
                <div><?php echo $result["id"]; ?></div>
            </div>
            <div class="box">
                <div><?php echo $result["title"]?></div>
            </div>
            <div class="box">
                <div><?php echo $result["created_at"]?></div>
            </div>
        </div>        
        <!-- 이미지 -->
        <div class="img-select-box">
            <img src=<?php echo $result["img"] ?> alt="">       
        </div>
        <div class="content-box">
            <?php echo $result["content"]?> 
        </div>  
        <div class="main-footer">
               <a href="/update.php?id=<?php echo $result["id"]?>&page=<?php echo $page?>"><button class="button-small">수정</button></a>
               <a href="/index.php?page=<?php echo $page ?>"><button class="button-small">취소</button></a>
               <a href="/delete.php?id=<?php echo $result["id"] ?>&page=<?php echo $page?>"><button class="button-small">삭제</button></a>
        </div>        

     </main>      
</body>
</html>