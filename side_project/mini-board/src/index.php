<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
    require_once(MY_PATH_DB_LIB);

$conn = null;
// $list_cnt = MY_LIST_COUNT;
// --------- 9/25 
$max_board_cnt =0;
$max_page =0;


// 총게시글수 나누기 1p표지수 = 최대page


try {
    // PDO Instance
    $conn = my_db_conn();
    
    // -------------------------- 09/24
    // pagination설정 처리
    $page = isset($_GET["page"]) ?(int)$_GET["page"] : 1; // 현재 페이지 획득
    $offset = ($page - 1) * MY_LIST_COUNT; // 오프셋 설정
    
    // ----------------------- 09/25
    // max page 획득 처리
    //------------------------
    $max_board_cnt = my_board_total_count($conn); // 게시글 총 수 획득
    $max_page = (int)ceil($max_board_cnt / MY_LIST_COUNT); // max page 획득
    
    //  09/25
    $start_page_button_number = (int)(floor(($page-1)/ MY_PAGE_BUTTON_COUNT) * MY_PAGE_BUTTON_COUNT ) +1 ; //  화면 표시 페이지 버튼 시작 값
    $end_page_button_number = $start_page_button_number + (MY_PAGE_BUTTON_COUNT-1); // 화면 표시 페이지 버튼 마지막 값
    // max page 초과시 페이지 버튼 마지막 값 조절
    $end_page_button_number = $end_page_button_number > $max_page ? $max_page : $end_page_button_number;
    $prev_page_button_number = $page -1 < 1 ? 1: $page -1 ; // 이전 버튼 
    $next_page_button_number = $page + 1 > $max_page ? $max_page : $page +1; // 다음버튼
    
    

    // -------------------------
    // pagination select 처리
    // -------------------------
    $arr_prepare = [ 
    "list_cnt"  => MY_LIST_COUNT
    ,"offset"   => $offset
    ];

    $result = my_board_select_pagination($conn ,$arr_prepare);   
}   catch(Throwable $th) {
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
    <link rel="stylesheet" href="./css/index.css">
    <title>리스트 페이지</title>
</head>
<body>
    <?php 
    require_once(MY_PATH_HEADER);
    ?>

    <main>
        <div class="main-top">
        <a href="/insert.php"><button class="btn-middle">글 작성</button></a>        
        </div>
        <div class="main-list">
            <div class="item list-head">
                <div>게시글 번호</div>
                <div>게시글 제목</div>
                <div>작성일자</div>
        </div>
            <!-- 09/24 -->
            <?php foreach($result as $item) { ?>
            <div class="item list-content">
                <div><?php echo $item["id"] ?></div>
                <!-- 09/25 -->
                <div><a href="./detail.php?id=<?php echo $item["id"] ?>&page=<?php echo $page?>"><?php echo $item["title"] ?></div></a>
                <div><?php echo $item["created_at"] ?></div>
            </div> 
            <?php } ?>                                   
        </div>    
        <div class="main-footer">
            <!-- 09/25 -->
            <?php if($page !== 1) { ?>
            <a href="/index.php?page=<?php echo $prev_page_button_number?>"><button class="btn-small">이전</button></a>
            <?php } ?>
            <?php for($i =$start_page_button_number; $i <= $end_page_button_number; $i++) { ?>
                <a href="/index.php?page=<?php echo $i?>"><button class="btn-small <?php echo $page === $i? "btn-selected" : ""?>"><?php echo $i?></button></a>
            <?php } ?>
            <?php if($page !== $max_page) { ?>
            <a href="/index.php?page=<?php echo $next_page_button_number?>"><button class="btn-small">다음</button></a>
            <?php  } ?>
        </div> 
    </main>
</body>
</html>
