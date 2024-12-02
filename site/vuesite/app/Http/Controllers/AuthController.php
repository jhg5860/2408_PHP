<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request) {
        // 유저 정보
        $userInfo = User::where('account', $request->account)->first();
        
        // 비밀번호 체크
        if(!(Hash::check($request->password, $userInfo->password))) {
           throw new AuthenticationException('E01');
        }

        // 토큰 발행
       list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

       $responseData = [
        'succes' =>true
        ,'msg' => '로그인 성공'
        ,'accessToken' => $accessToken
        ,'refresehToken' => $refreshToken
        ,'data' => $userInfo->toArray()
        ];

        return response()->json($responseData, 200);
    }
}
