<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use MyToken;

class AuthController extends Controller
{
    public function login(UserRequest $request) {
        // 유저 정보
        $userInfo = User::where('account', $request->account)
                    ->withCount('boards')
                    ->first();
        
        // 비밀번호 체크
        if(!(Hash::check($request->password, $userInfo->password))) {
           throw new AuthenticationException('비밀번호 체크 오류');
        }

        // 토큰 발행
       list($accessToken, $refreshToken) = MyToken::createTokens($userInfo);

       // 리프래시 토큰 저장
       MyToken::updateRefreshToken($userInfo, $refreshToken);

       $responseData = [
        'succes' =>true
        ,'msg' => '로그인 성공'
        ,'accessToken' => $accessToken
        ,'refreshToken' => $refreshToken
        ,'data' => $userInfo->toArray()
        ];

        return response()->json($responseData, 200);
    }

    /**
     * 로그아웃
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return response JSON
     */
    public function logout(Request $requeset) {
        return $requeset->bearerToken();
    }
}
