<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{   
    // 11.08
    public function index() {
        // return '테스트 인덱스';
        $result ='홍길동';

        return view('test')
        ->with('name', $result);
    }
}
