<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Throwable;

class UserController extends Controller
{
    /**
     * 로그인 페이지로 이동
     */
    public function  goLogin() {
        return view('login');
    }

    /**
     * 로그인 처리
     */
    public function login(Request $request) {
        Log::debug('리퀘스트 데이터 온리로 출력' , $request->only('u_email', 'u_password'));
        // 유효성 체크
        $validator = Validator::make(
            $request->only('u_email', 'u_password')
            ,[
                'u_email' => ['required','email', 'exists:users,u_email'] 
                ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-Z0-9!@]+$/']
            ]
        );

        if($validator->fails()) {
            return redirect()
                    ->route('goLogin')
                    ->withErrors($validator->errors());
        }

        // 회원 정보 획득
        $userInfo = User::where('u_email', '=', $request->u_email)->first();

        // 회원 정보 체크
        // $errorMsg = '';
        // if(is_null($userInfo)) {
        //     //비존재 회원
        //     $errorMsg ='존재하지 않는 회원입니다.';
        // }

        // 비밀번호 체크
        if(!(Hash::check($request->u_password, $userInfo->u_password))) {
            return redirect()->route('goLogin')->withErrors('비밀번호가 일치하지 않습니다.');
        }

        // 유저 인증 처리
        Auth::login($userInfo);
        // var_dump(Auth::id()); // 로그인한 유저의 pk
        // var_dump(Auth::user()); // 로그인한 유저의 정보 획득
        // var_dump(Auth::check()); // 로그인 여부 체크

        return redirect()->route('boards.index');           
    }

    /**
     * 로그아웃 처리
     */
    public function logout() {
        Auth::logout(); // 로그아웃처리

        Session::invalidate(); // 기존 세션의 모든데이터 제거 및 새로운 세션 ID 발급
        Session::regenerateToken(); // CSRF 토큰 재발급
        
        return redirect()->route('goLogin');
    }
// 내가한거
//     // 회원가입 페이지로 이동
//     public function goRegist() {
//         return view('regist');
//     }

//     // 유효성 체크
//     public function regist(Request $request) {
//         $validator = Validator::make(
//         $request->only('u_email','u_password','u_password_chk','u_name')
//          ,[
//             'u_email' => ['required','email', 'exists:users,u_email'] 
//             ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-z0-9]+$/']
//             ,'u_password_chk' => ['required', 'between:6,20', 'regex:/^[a-z0-9]+$/']
//             ,'u_name' => ['required', 'min:1','max:25','regex:/^[가-힣]{1,50}$/u' ]
//          ]          
//     );
   
//     if($validator->fails()) {
//         // return $validator->errors();
//         return redirect()
//                 ->route('goRegist')
//                 ->withErrors($validator->errors());
//     }
    
//   }

    /**
     * 회원가입 페이지로 이동
     */
    public function registration() {
        return view('registration');
    }

    /**
     * 회원가입 처리
     */
    public function storeRegistration(Request $request) {
        
        // 유효성 체크
        $validator = Validator::make(
            $request->only('u_email', 'u_password', 'u_password_chk', 'u_name')
            ,[
                'u_email' => ['required','email', 'unique:users,u_email'] 
                ,'u_password' => ['required', 'between:6,20', 'regex:/^[a-zA-Z0-9!@]+$/']
                ,'u_password_chk' => ['same:u_password']
                ,'u_name' => ['required', 'between:2,50', 'regex:/^[가-힣]+$/u']
            ]
        );

        if($validator->fails()) {
            return redirect()
                    ->route('get.registraration')
                    ->withErrors($validator->errors());
                 
        }

        // 회원 정보 삽입
        
        // $user= new User();
        // $user->u_email =$request->u_emil;
        // $user->u_password = Hash::make($request->u_password);
        // $user->u_name =$request->u_name;
        // $user->save();

        try {
            DB::beginTransaction();

            User::create([
                'u_email' => $request->u_email
                ,'u_password' => Hash::make($request->u_password)
                ,'u_name' => $request->u_name
            ]);
            // $user->save();
            DB::commit();
        } catch(Throwable $th) {
            DB::rollBack();
        }

        return redirect()->route('goLogin');
    }

    
  
}
