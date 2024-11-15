<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('goLogin');
});


Route::get('/login', [UserController::class, 'goLogin'])->name('goLogin');



//로그인 관련
Route::middleware('guest')->get('/login', [UserController::class, 'goLogin'])->name('goLogin');
Route::middleware('guest')->post('/login',[UserController::class, 'login'])->name('login');
Route::get('/logout',[UserController::class, 'logout'])->name('logout');


// 게시판 관련
Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);

//11.14
/**
 * 로그인이 아닌 상태에서 로그인 페이지로 이동
 * Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);
 * kernel.php에 laravel이 'auth' => \App\Http\Middleware\Authenticate::class로 등록되있어서 파라미터 auth만 추가하면 사용할수 있다.
 */

// 내가한거
// Route::get('/regist',[UserController::class, 'goRegist'])->name('goRegist');
// Route::post('/regist',[UserController::class, 'regist'])->name('regist');

//회원가입
Route::middleware('guest')->get('/registration', [UserController::class , 'registration'])->name('get.registraration');
Route::middleware('guest')->post('/registration', [UserController::class, 'storeRegistration'])->name('post.registration');

// // insert


// Route::get('/insert', [BoardController::class, 'insert'])->name('insert');
