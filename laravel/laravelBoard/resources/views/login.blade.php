@extends('layout.layout')

@section('title', '로그인 페이지')
    
@section('bodyClassVh', 'vh-100')

@section('main')
    <main class="d-flex justify-content-center align-items-center h-75">
        <form style="width: 300px;" action="{{ route('login')}}" method="post">
          @csrf
           {{-- 에러메세지 출력  --}}
           @if($errors->any()) 
           {{-- 에러메시지가 있으면 true 없으면 false 반환 --}}
            <div id="errorMsg" class="form-tex text-danger">
              @foreach($errors->all() as $errorMsg)
              <span>{{ $errorMsg }}</span>
              <br>
              @endforeach
            </div>  
           @endif
             
            <div class="mb-3">
              <label for="u_email" class="form-label">아이디</label>
              <input type="email" class="form-control" id="u_email" name="u_email">
            </div>
            <div class="mb-3">
              <label for="u_password" class="form-label">비밀번호</label>
              <input type="password" class="form-control" id="u_password" name="u_password">
            </div>
            <button type="submit" class="btn btn-dark w-100 mb-3">로그인</button>            
            <a href="./regist.html" class="btn btn-secondary w-100">회원가입</a>
        </form>
    </main>
@endsection
    
   

<!-- 11.04 bootstrap 로그인
    class가 길어져서 지저분해진다. 버전이 바뀌며 기능이 바뀔수있어서 주의해야한다.
-->