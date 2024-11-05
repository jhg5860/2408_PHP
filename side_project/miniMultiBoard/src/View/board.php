<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="/View/css/myCommon.css">
    <title>자유게시판</title>    
</head>
<body>    
    <?php require_once('View/inc/header.php'); ?>

    <div class="mt-5 mb-5 text-center">
        <h1><?php echo $this->getBoardName();?></h1>
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
        </svg>
    </div>

    <main>
        <?php
            foreach($this->getArrBoardList() as $item) { ?>
            <div class="card">
                <img src="<?php echo $item['b_img'] ?>" class="card-img-top object-fit-cover" style="height: 300px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['b_title'] ?></h5>
                    <p class="card-text"><?php echo $item['b_content'] ?></p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal">상세</button>
                </div>
            </div>
        <?php } ?>
    </main>

    <!-- Footer -->
     <footer class="fixed-bottom bg-dark text-light text-center p-3">저작권</footer>
    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">개발자 입니다.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>살려주세요.</p>
                    <br>
                    <img src="./img/nondam.jpg" class="object-fit-cover" style="height: 300px;"alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<!-- 11.04 bootstrap(부트 스트랩)
Bootstrap은 한번에 하나의 모달을 지원합니다. 중첩된 모달은 지원되지 않습니다. 
-->