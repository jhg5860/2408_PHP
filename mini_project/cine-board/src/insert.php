<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn= null;

if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {

    try {
     $conn = my_db_conn();

    $arr_prepare =[
        "title" =>["title"]
        ,"content" =>["content"]
        ,"img" =>["img"]
    ];

    $conn->beginTransaction();
    my_board_insert($conn, $arr_prepare);
    
    $conn->commit();

    header("Location :/");
    exit;

    } catch(Throwable $th) {
      if(!is_null($conn)) {
        $conn->rollback();
      }
      require_once(MY_PATH_ERROR);
      exit;
    }


}



?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/insert.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>작성 페이지</title>
</head>
<body>
    <main>
        <?php 
        require_once(MY_PATH_ROOT."header.php");
        ?>
  
        <form action="/" method="post">
        <div class="title-box">
            <input type="text" id="title" name="title">
        </div>        
        <!-- 이미지 -->
               <div class="img-select-box">
                <form action="./" method="post" enctype="multipart/form-data">
                    <input type="file" id="file" name="file">
                    <button type="submit">전송</button>
                </form>
               </div>
        <div class="content-box">
            <textarea name="content" id="content"></textarea>
        </div>

        <div class="main-footer">
               <a href="./"><button class="button-small">작성</button></a>
               <a href="./"><button class="button-small">취소</button></a>
        </div>           
        </form>
     </main>      
</body>
</html>