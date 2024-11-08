<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>보드</title>
</head>
<body>
    {{-- header.blade.php 파일 불러오기 --}}
    @include('layout.header')

    <main>
        <p>메인메인</p>
    </main>

     {{-- footer.blade.php 파일 불러오기 , 전달할 값이 있는경우 배열로 사용해서 보낼수 있다. --}}
    @include('layout.footer', ['key1' => '홍길동'] )    
</body>
</html>
