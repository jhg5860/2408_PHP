<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
require_once(MY_PATH_DB_LIB);


$conn =null;

try {

    //  PDO 인스턴스화
    $conn = my_db_conn();

    // pagination설정 처리
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
    $offset = ($page-1)*MY_LIST_COUNT;
    
    // 최대 페이지 = 총 페이지수 / 1페이지수
    
    // 게시글 총 갯수      
    $max_board_count = my_board_total_count($conn);
    // 최대 페이지 수
    $max_page = (int)ceil($max_board_count/MY_LIST_COUNT);

     //  화면 표시 페이지 버튼 시작 값
     $start_page_button_number = (int)(floor(($page-1)/ MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT ) +1 ; 
     // 화면 표시 페이지 버튼 마지막 값
     $end_page_button_number = $start_page_button_number + (MY_PAGE_BUTTON_COUNT-1); 
     // max page 초과시 페이지 버튼 마지막 값 조절
     $end_page_button_number = $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
     // 이전 버튼 
     $prev_page_button_number = $page -1 < 1 ? 1: $page -1 ; 
     // 다음버튼
     $next_page_button_number = $page + 1 > $max_page ? $max_page : $page +1; 
     
    // pagination select 처리
    $arr_preapre = [
        "list_cnt" => MY_LIST_COUNT
        ,"offset"  => $offset
        
    ];    

    $result =my_board_select_pagination($conn , $arr_preapre);
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
            <?php foreach($result as $item) { ?>
                <div class="list-content item">
                    <div><?php echo $item["id"] ?></div>
                    <div><a href="/detail.php?id=<?php echo $item["id"] ?>&page=<?php echo $page?>"><?php echo $item["title"]?></div></a>
                    <div><?php echo $item["created_at"]?></div>
                </div>               
            <?php  } ?>           
      
            <div class="main-footer">
               <?php if($page !== 1) { ?> 
               <a href="./index.php?page=<?php echo $prev_page_button_number?>"><button class="button-small">이전</button></a>
               <?php } ?> 
               <?php for($i =$start_page_button_number; $i <= $end_page_button_number; $i++) { ?>
               <a href="./index.php?page=<?php echo $i?>"><button class="button-small <?php echo $page === $i? "btn-selected" : ""?>"><?php echo $i?></button></a>
               <?php } ?>  
               <?php if($page !== $max_page) { ?>
               <a href="./index.php?page=<?php echo $next_page_button_number?>"><button class="button-small">다음</button></a>
               <?php } ?>
               <div class="footer-btn">
                <a href="./insert.php"><button class="button-middle">글쓰기</button></a>    
               </div>
            </div>
            
     </main>      
</body>
</html>