<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- ㅁㄴㅇㅁㄴㅇㅁㅇㅁ -->
    <h1>이거는 보입니다.</h1>
    {{-- <h1>이거는 안보입니다.</h1> --}}
    {{-- html 주석은 개발자 모드에서 보이지만 라라벨을 사용할꺼면 블레이드 템플릿 주석을 이용 --}}
    {{-- {{ $data['name'][0] }} --}}
    {{-- <p>{{ $data['name'] }}</p> --}}
    {{-- <p>{{ $data['content'] }}</p> --}}
    <p><?php echo htmlspecialchars($data['content']); ?></p>
</body>
</html>