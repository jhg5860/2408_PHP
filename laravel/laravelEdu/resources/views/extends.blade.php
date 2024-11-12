{{-- 상속 / 자손--}}
@extends('layout.layout')

{{-- @section : 부모템플릿에 해당하는 yield에 삽입 --}}
@section('title', '자식자식')

{{-- @section ~ @endsection: 처리해야할 코드가 많을경우 범위를 지정해서 삽입 --}}
@section('main')
<main>
    <h2>자신의 메인 영역</h2>
</main>
@endsection

@section('show', '자식자식 show')

<hr>
{{-- @if: 조건문 --}}
@if($data[0]['gender'] === 'F')
    <span>여자</span>
@elseif($data[0]['gender'] === 'M')
    <span>남자</span>
@else
    <span>알수없음</span>
@endif
<hr>

{{-- 반복문 --}}
{{-- @for~ @endfor : for 반복문  b:for --}}
@for($i= 0; $i<5; $i++)
    <span>{{ $i }}</span>
@endfor

{{-- @for ($i=2; $i<10; $i++)
    <h3>{{$i.'단'}}</h3>
    @for ($z=1; $z<10; $z++)
        <span>{{$i."x".$z."=".($i*$z)}}</span>
        <br>
    @endfor
@endfor
 --}}

 {{-- @foreach ~@endforeach : foreach 반복문 --}}
{{-- @foreach($data as $item)
    @if($loop->odd) 
        <div style="color: red;">
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender']}}</span>            
            <span>남은 루프 횟수: {{ $loop->remaining }}</span>
        </div>
    @else     
        <div>
            <span>{{ $item['name'] }}</span>
            <span>{{ $item['gender']}}</span>
            <span>남은 루프 횟수: {{ $loop->remaining }}</span>
        <div>
    @endif
@endforeach --}}

@foreach($data as $item)
    <div style="{{ $loop->odd ?'color: blue;' : ''}}">
        <span>{{ $item['name'] }}</span>
        <span>{{ $item['gender']}}</span>            
        {{-- <span>남은 루프 횟수: {{ $loop->remaining }}</span> --}}
    </div> 
@endforeach

{{-- @forelse~ @empty ~ @endforelse:
    루프를 할 데이터가 길이가 1이상이면 @forelse의 처리,
    배열의 길이가 0이면 @empty의 처리를 합니다.
--}}

@forelse($data2 as $item)
    <div>{{ $item['name'] }}</div>
@empty
    <span>데이터가 없음</span>
@endforelse