<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);


$conn =null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"]) === "GET") {
        $id =isset($_GET["id"]) ? (int)$_GET["id"] :0;
        $page =isset($_GET["page"]) ? (int)$_GET["page"] :1;

        if($id <1) {
            throw new Exception("파라미터 이상");
        }
        
        $conn =my_db_conn();

        $arr_prepare = [
            "id" => $id
        ];
        $result = my_board_select_id($conn, $arr_prepare);
        
    } else {
        $id =isset($_POST["id"]) ? (int)$_POST["id"] :0;
        if($id <1) {
            throw new Exception("파라미터 이상");
        }


        $conn = my_db_conn();

        $conn->beginTransaction();

        $arr_prepare = [
            "id" =>$id
        ];

        my_board_delete_id($conn, $arr_prepare) ;

        $conn->commit();

        header("Location: /");
        exit;
    }





} catch(Throwable $th) {
    if(!is_null($conn) && $conn->inTransaction()) {
        $conn->rollBack();
    }

    require_once(MY_PATH_ERROR);
    exit;
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/delete.css">
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
            <img src=<?php ?> alt="">       

        </div>
        <div class="content-box">
            <?php echo $result["content"]?> 
        </div> 
         
        <div class="main-delete">
            <p>
                삭제하면 영구적으로 복구할 수 없습니다.<br><br>
                정말로 삭제 하시겠습니까?
            </p>
        </div>

        <div class="main-footer">
            <form action="/delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $result["id"]?>">
                <button type="submit"class="button-small">삭제</button>
                <a href="/detail.php?id<?php echo $result["id"];?>&page=<?php echo $page;?>"><button class="button-small">취소</button></a>
            </form>
        </div>
     </main>      
</body>
</html>