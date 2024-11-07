<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 11.07 laravel start
// -----------------
// 라우트 정의
// -----------------
Route::get('/hi', function() {
    return '안녕하세요.';
});

Route::get('/hello', function() {
    return 'hello';
});

Route::get('/myview' ,function() {
    return view('myView');
});

// ------------------
// httpMethood에 대응하는 라우터 
// ------------------
Route::get('/home', function() {
    return view('home');
});

Route::post('/home', function() {
    return 'HOME POST';
});

Route::put('/home', function() {
    return 'HOME PUT';
});

Route::delete('/home', function() {
    return 'HOME DELETE';
});

Route::patch('/home' , function() {
    return 'HOME PATCH';
});

// -----------------------
//  파라미터 제어
// -----------------------
Route::get('/param', function(Request $request) {
    return 'ID : ' .$request->id.' NAME : ' .$request->name;
});
// http://localhost:8000/param?id=0&name=1

// 세그먼트 파라미터
// http://localhost:8000/param/1
Route::get('/param/{id}/{name}', function($id, $name) {
    return $id.' : '.$name;
});

Route::get('/param/{id}', function(Request $request) {
    return $request->id;
});

Route::get('/param2/{id}', function(Request $request, $id){
    return $request->id."   ".$id;
});

// 세그먼트 파라미터의 디폴트 설정, 중복된 경로의 라우트가 설정되지 않도록 주의 
// Route::get('/param3', function() {
//     return '파람3이다.';
// });
Route::get('/param3/{id?}', function($id =0){ 
    return $id;
});

// ------------------
// 라우트명 지정
// ------------------
Route::get('/name', function() { 
    return view('name');
});

Route::get('/home/na/hon/php', function() {
    return '좀 긴 패스';
})->name('long');

// ------------------
// 뷰에 데이터 전달
// ------------------
Route::get('/send', function() {
    $result = [
        ['id' =>1, 'name' => '홍길동']
        ,['id' =>2, 'name' => '갑순이']
    ];

    // return view('send')
    //         ->with('gender', '무성')
    //         ->with('data', $result);

    return view('send')
    ->with([
        'gender' => '무성'
        ,'data' => $result
    ]);

});

// ------------------
// 대체 라우트
// ------------------
Route::fallback(function() {
    return '이상한 URL 입니다.';
});

// ------------------
// 라우트 그룹
// ------------------
// Route::get('/users', function() {
//     return 'GET : /users';
// });

// Route::post('/users', function() {
//     return 'POST : /users';
// });

// Route::put('/users', function() {
//     return 'PUT : /users';
// });

// Route::delete('/users', function() {
//     return 'DELETE : /users';
// });
// prefix 라우터 경로 공통된것 group 공통된것을 묶은것
Route::prefix('/users')->group(function (){
    Route::get('/', function() {
        return 'GET : /users';
    });
    Route::post('/', function() {
        return 'POST : /users';
    });
    
    Route::put('/{id}', function() {
        return 'PUT : /users';
    });
    
    Route::delete('/{id}', function() {
        return 'DELETE : /users';
    });
});