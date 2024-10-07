<?php 
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

    $conn= null;

if(strtoupper($_SERVER["REQUEST_METHOD"]) === "POST") {

    try {
        // $_FILES 에 어떤 데이터값이 담겨있는지 나타내는 방법
        // var_dump($_FILES);
            // C:\Apache24\htdocs\insert.php:11:
            // array (size=1)
            // 'file' => 
            //   array (size=6)
            //     'name' => string 'avengers_end.jpg' (length=16)
            //     'full_path' => string 'avengers_end.jpg' (length=16)
            //     'type' => string 'image/jpeg' (length=10)
            //     'tmp_name' => string 'C:\Windows\Temp\php5F41.tmp' (length=27)
            //     'error' => int 0
            //     'size' => int 203896

        // $file 변수에 $_FILES 글로벌변수 배열에 있는 ["file]라는 키값을 저장하는방법
        $file = $_FILES["file"];

        // explode() 함수는 문자열을 특정 구분자를 기준으로 나누어 배열로 변환하는 함수입니다.

        // $type 변수에 "/"를 기준으로 구분하여 $file변수의 type라는키의 배열로 변환해서 저장하는 방법
        // 파일 타입 및 확장자
        $type = explode("/", $file["type"]);
        // $extension (확장자)
        // 파일 확장자를 변수 extension에 대입
        $extension = $type[1];
        //  uniqid :php 에서 지원하는 함수로 유니크한 ID를 생성해준다. 
        // file_name(파일 이름)이라는 변수는  uniqid 함수랑 "." 문자열에 변수 extension을 대입한 변수이다.
        $file_name = uniqid().".".$extension;
        // file파일 경로라는 변수는 img 폴더안에 이미지파일을 저장하는 경로 
        $file_path = "img/".$file_name;
        // 변수 file_name이 어떤식 데이터 값이 담겨있는지 보여주는방법
        // var_dump($file_name);

        move_uploaded_file($file["tmp_name"], MY_PATH_ROOT.$file_path);

        $conn = my_db_conn();

        $arr_prepare =[
            "title" => $_POST["title"]
            ,"content" => $_POST["content"]
            ,"img" => "/".$file_path
        ];

        $conn->beginTransaction();
        my_board_insert($conn, $arr_prepare);
        
        $conn->commit();

        header("Location: /");
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
  
        <form action="/insert.php" method="post" enctype="multipart/form-data">
            <div class="title-box">
                <input type="text" id="title" name="title" >
            </div>        
            <!-- 이미지 -->
            <div class="img-select-box">
                <input type="file" id="file" name="file">
            </div>
            <div class="content-box">
                <textarea name="content" id="content"></textarea>
            </div>
            
            <div class="main-footer">
                <a href="/"><button class="button-small">작성</button></a>
                <a href="/"><button class="button-small">취소</button></a>
            </div>           
        </form>
        
     </main>      
</body>
</html>