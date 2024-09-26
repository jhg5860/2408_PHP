<!-- 9/25 -->
<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/config.php");
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
    <title>에러 페이지</title>
</head>
<body>
    <?php 
    require_once(MY_PATH_ROOT."header.php");
    ?>
    <main>
        <p>에러가 발생 했습니다</p>
        <p>메인페이지로 되돌아가서 다시 실행해 주세요.</p>
        <p><?php echo $th->getMessage(); ?></p>
        <a href="/"><button type="button" class="btn-middle">메인페이지</button></a>
    </main>
</body>
</html>