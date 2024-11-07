<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
    <h1>HOME</h1>

    <form action="/home" method="post">
        @csrf
        <button type="submit">POST</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('PUT')
        <button type="submit">PUT</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        {{-- 11. 07 DELETE 파란색인 이유는 vscode가 쿼리문으로 인식하기 때문이다. --}}
        @method('DELETE') 
        <button type="submit">DELETE</button>
    </form>
    <hr>
    <form action="/home" method="post">
        @csrf
        @method('PATCH')
        <button type="submit">PATCH</button>
    </form>
</body>
</html>