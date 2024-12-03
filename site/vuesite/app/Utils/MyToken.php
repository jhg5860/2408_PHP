<?php

namespace APP\Utils;

use App\Exceptions\MyAuthException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MyEncrypt;
use PDOException;

class MyToken {

    /**
     * 엑세스 토큰과 리프래시 토큰 생성
     * 
     * @param App\Models\User $user
     * @return Array [$accessToken, $refreshToken]
     */
    public function createTokens(User $user) {
        $accessToken = $this->createToken($user, env('TOKEN_EXP_ACCESS'));
        $refreshToken = $this->createToken($user, env('TOKEN_EXP_REFRESH'), false);

        return [$accessToken, $refreshToken];
    }
    /**
     * 리프래시 토큰 업데이트
     * 
     * @param App\Model\User $userInfo 유저 정보
     * @param string $refreshToken
     * 
     * @return bool true 
     */
    public function updateRefreshToken(User $userInfo, string $refreshToken) {
        // 유저 모델에 리프래시 토큰 변경
        $userInfo->refresh_token = $refreshToken;
        
        DB::beginTransaction();

        if(!($userInfo->save())) {
            DB::rollBack();
            throw new PDOException('Error updateRefreshToken()');
        }
        DB::commit();

        return true;
    }
    /**
     * 토큰 유효성 체크
     * 
     * @param string |null $token 베어럴토큰
     * 
     * @return bool true
     */
    public function chkToken(string |null $token) {
        Log::debug("**********chkToken start************");
        // 토큰 존재 유무 체크
        if(empty($token)) {
            throw new MyAuthException('E20');
        }
        // 토큰 위조 검사
        list($header, $payload, $signature) =$this->explodeToken($token);
        if($this->createSignature($header, $payload) !== $signature) {

        }
        Log::debug("**********chkToken end************");

        return true;
    }

    //------ private 
    /**
     * JWT 생성
     * 
     * @param App\Models\User $user
     * @param int $ttl time to limit
     * @param bool $accessFlg = true
     * 
     * @return string JWT
     */
    private function createToken(User $user, int $ttl, bool $accessFlg =true) {
        $header = $this->createHeader();
        $payload = $this->createPayload($user,$ttl, $accessFlg);
        $signature= $this->createSignature($header, $payload);

        return $header.'.'.$payload.'.'.$signature;
    }

    /**
     * JWT Header 생성
     * 
     * @return string base64UrlEncode
     */
    private function createHeader() {
        $header = [
            'alg' => env('TOKEN_ALG')
            ,'typ' => env('TOKEN_TYPE')
        ];

        return MyEncrypt::base64UrlEncode(json_encode($header));
    }

    /**
     * JWT 페이로드 작성
     * 
     * @param App\Models\User $user
     * @param int $ttl time to limit
     * @param bool $accessFlg = true
     * 
     * @return string base64Payload
     */

     private function createPayload(User $user, int $ttl, bool $accessFlg=true) {
        $now = time(); // 현재 시간

    // 페이로드 기본 데이터 생성
        $payload = [
            'idt'=> $user->user_id
            ,'iat'=>$now
            ,'exp' =>$now +$ttl
            ,'ttl'=>$ttl
        ];

    // 액세스 토큰일 경우 아래 데이터 추가
        if($accessFlg) {
            $payload['acc'] = $user->account;
        }
        

        return MyEncrypt::base64UrlEncode(json_encode($payload));
     }

    /**
     * JWT 시그니쳐 작성
     * 
     * @param string $header
     * @param string $payload
     * 
     * @return string base64Signature
     */

    private function createSignature(string $header, string $payload) {
        return MyEncrypt::hashWithSalt(
        env('TOKEN_ALG')
        ,$header.env('TOKEN_SECRET_KEY').$payload
        ,MyEncrypt::makeSalt(env('TOKEN_SALT_LENGTH')));
    }

    /**
     * 토큰 분리
     * 
     * @param string $token
     * 
     * @return array $header, $payload, $signature 
     * 
     */
    private function explodeToken($token) {
        $arrToken = explode('.', $token);

        // 토큰 분리 오류 체크
        if(count($arrToken) !== 3) {
            throw new MyAuthException('E23');
        }

        return $arrToken;
    }
}