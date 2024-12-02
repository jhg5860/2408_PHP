<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request) {
        $userInfo = User::where('account', $request->account)->first();
    

        // 토큰 발행
       list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

        return 'test';
    }
}
