<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);
?>




<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/common.css">
    <title>리스트 페이지</title>
</head>
<body>
    <main>
        <?php 
         require_once(MY_PATH_ROOT."header.php");               
        ?>
     
            <div class="main-title">
            <span>번호</span>
            <span>제목</span>
            <span>작성일자</span>
            </div>
            <div class="list-content-box">
            <div class="list-content item">
                <div>30</div>
                <div><a href="./detail.html">게시글 제목30</div></a>
                <div>2024-01-01 10:53:20</div>
            </div>
            <div class="list-content item">
                <div>30</div>
                <div><a href="./detail.html">게시글 제목30</div></a>
                <div>2024-01-01 10:53:20</div>
            </div>
            <div class="list-content item">
                <div>30</div>
                <div><a href="./detail.html">게시글 제목30</div></a>
                <div>2024-01-01 10:53:20</div>
            </div>
      
            <div class="main-footer">
               <a href="./"><button class="button-small">이전</button></a>
               <a href="./"><button class="button-small">1</button></a>
               <a href="./"><button class="button-small">2</button></a>
               <a href="./"><button class="button-small">3</button></a>
               <a href="./"><button class="button-small">다음</button></a>
               <div class="footer-btn">
                <a href="./insert.html"><button class="button-middle">글쓰기</button></a>    
               </div>
            </div>
            </div>

     </main>      
</body>
</html>