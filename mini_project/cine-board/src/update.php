<?php

require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);

$conn = null;

try {
    if(strtoupper($_SERVER["REQUEST_METHOD"] === "GET")) {
        $id= isset($_GET["id"]) ? (int)$_GET["id"] :0;
        $page =isset($_GET["page"]) ? (int)$_GET["page"] :1;

        if($id <1) {
            throw new Exception("파라미터 오류");            
        }

        $conn =my_db_conn();

        $arr_prepare = [
            "id" => $id
        ];

        $result= my_board_select_id($conn ,$arr_prepare);

        } else {
        $id = isset($_POST["id"]) ? (int)$_POST["id"] :0;

        $page = isset($_POST["page"]) ? (int)$_POST["page"] :1;

        $title = isset($_POST["title"]) ? $_POST["title"] :"";
   
        $content = isset($_POST["content"]) ?$_POST["content"] :"";

        

        if($id<1 || $title === "") {
            throw new Exception("파라미터 오류");
        }
        $conn =my_db_conn();

        $conn->beginTransaction();

        $arr_prepare =[
            "id" =>$id
            ,"title"=>$title
            ,"content"=>$content
            
           
          
            
        ];
            my_board_update($conn , $arr_prepare);

            $conn->commit();

            header("Location: /detail.php?id=".$id."&page=".$page);
            exit;
        }




} catch(Throwable $th) {
   if(!is_null($conn) && $conn->inTransaction());
      $conn->rollBack();


    require_once(MY_PATH_ERROR);
    exit;
}
?>




<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/update.css">
    <title>수정 페이지</title>
</head>
<body>
    <main>
         <?php 
        require_once(MY_PATH_ROOT."header.php");
        ?>        
        <form action="/update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $result["id"]?>">
        <input type="hidden" name="page" value="<?php echo $page?>">
        <div class="title-box">         
            <input type="text" id="title" name="title" value=<?php echo $result["title"]?>>
        </div>
        </div>        
        <!-- 이미지 -->
        <div class="img-select-box">
            <img src="<?php echo $result["img"]?>" alt="">
            <input type="file" id="file" name="file">   
        </div>
        <div class="content-box">
            <textarea name="content" id="content">
            <?php echo $result["content"]?>
            </textarea>          
        </div>        
        <div class="main-footer">
            <button type="submit" class="button-small">완료</button>
            <a href="/detail.php?id=<?php echo $result["id"]?>&page=<?php echo $page?>"><button type="button" class="button-small">취소</button></a>
        </div>           
        </form>     

     </main>      
</body>
</html>