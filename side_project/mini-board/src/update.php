<!-- 9/25 -->
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn = null;

    try {
        if(strtoupper($_SERVER["REQUEST_METHOD"] === "GET")) {
            // GET 처리

            //  Id 획득
            $id = isset($_GET["id"]) ? (int)$_GET["id"] :0;

            // page 획득
            $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;


            if($id <1) {
                throw new Exception("파라미터 오류");
            }

            
            // PDO Instance
            $conn = my_db_conn();
                       
            // ----------------
            // 데이터 조회
            // ----------------
            $arr_prepare = [
                "id" => $id
            ];
            
            $result = my_board_select_id($conn, $arr_prepare);

        } else {
            //POST 처리
            
            // parameter 획득
            //  Id 획득
            $id = isset($_POST["id"]) ? (int)$_POST["id"] :0;

            // page 획득
            $page = isset($_POST["page"]) ? (int)$_POST["page"] : 1;
            
            //title 획득
            $title = isset($_POST["title"]) ? $_POST["title"] :"";

            //content 획득
            $content = isset($_POST["content"]) ? $_POST["content"] :"";

            // file 획득
            $file = $_FILES("file");

            if($id <1 || $title === "") {
                throw new Exception("파라미터 오류");
            }
            
            // PDO Instance
            $conn = my_db_conn();
            
            // Transaction Start
            $conn->beginTransaction();

            // 09.26 
            $arr_prepare = [
            "id" => $id
            ,"title" => $title
            ,"content" => $content
            ];

            // 10.07
            // file 저장 처리
            if($file["name"] !== "") {
            // 기존 파일 삭제
            $arr_preapare_select = [
                "id"=>$id
            ];
            $result = my_board_select_id($conn, $arr_preapare_select);
            if(!is_null($result["img"])){
                unlink(MY_PATH_ROOT.$result["img"]);    
            }    


            //

            $type = explode("/", $file["type"]);
            $extension = $type[1];
            $file_name = uniqid().".".$extension;
            $file_path = "/img/".$file_name;

            move_uploaded_file($file["tmp_name"], MY_PATH_ROOT.$file_path); // 파일 저장
           
            $arr_prepare["img"] = $file_path;
        
        }            
            // 리눅스 기반 권한
            // chmod($file_path , 0777);


            my_board_update($conn, $arr_prepare);

            // commit
            $conn-> commit();
            
            // detail page로 이동
            header("Location: /detail.php?id=".$id."&page=".$page);
            exit;

        }
    } catch(Throwable $th) {
        if(!is_null($conn) && $conn->inTransaction())
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
    <?php 
    require_once(MY_PATH_HEADER);
    ?>
    <main> 
        <form action="/update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value ="<?php echo $result["id"] ?>">            
            <input type="hidden" name="page" value="<?php echo $page?>">

            <div class="box title-box">  
                <div class="box-title">글 번호</div>
                <div class="box-content"><?php echo $result["id"]?></div>
            </div>       
            <div class="box title-box">  
                <div class="box-title">제목</div>
                <div class="box-content">
                    <input type="text" name="title" id="title" value="<?php echo $result["title"]?>" >
                </div>            
            </div>
            <div class="box content-box">  
                <div class="box-title">내용</div> 
                <div class="box-content">
                    <textarea name="content" id="content"><?php echo $result["content"]?></textarea>
                </div>             
            </div>
            <!-- 10.07 -->
            <div class="box">
                <div class="box-title">이미지</div>
                <div class="box-content">
                    <input type="file" name="file" id="file">
                </div>
            </div>        
            <div class="main-footer">
                <button type="submit" class="btn-small">완료</button>
                <a href="/detail.php?id=<?php echo $result["id"] ?>&page=<?php echo $page ?>"><button type="button" class="btn-small">취소</button></a>
            </div>
        </form>   
    </main>
</body>
</html>

