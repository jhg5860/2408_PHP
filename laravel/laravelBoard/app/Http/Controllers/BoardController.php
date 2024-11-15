<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Throwable;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //게시글 타입 획득
       $bcType ='0';
       if($request->has('bc_type')) {
           $bcType =$request->bc_type;
       }
       //리스트 데이터 획득
       $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                    ->where('bc_type', $bcType)
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('b_id', 'DESC')
                    ->get();
       // 게시판 이름 획득
       $boardInfo = BoardsCategory::where('bc_type', $bcType)->first();
       
       return view('boardList')
                ->with('data', $result)
                ->with('boardInfo', $boardInfo);
    }
       // 리스트 페이지 여러개의 데이터를 표시하는곳으로 이동

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       return view('boardInsert')->with('bcType' ,$request->bc_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 실제로 작성 처리
        //  유효성 체크
        $request->validate([
                'b_title' => ['required', 'between:1,50']
                ,'b_content' => ['required', 'between:1,200']
                ,'file' => ['required', 'image']
                ,'bc_type' =>['required', 'exists:boards_category,bc_type']
        ]);
            

        // $validator = Validator::make(
        //     $request->only('b_title', 'b_content', 'file', 'bc_type')
        //     ,[
        //         'b_title' => ['required', 'between:1,50']
        //         ,'b_content' => ['required', 'between:1,200']
        //         ,'file' => ['required', 'image']
        //         ,'bc_type' =>['required', 'exists:boards_category,bc_type']
        //     ]
        // );

        // if($validator->fails()) {
        //     return redirect()->route('boards.create',['bc_type' =>$request->bc_type])->withErrors($validator);
        // }

        $filePath ='';   
        try {
            // 파일저장
            $filePath = $request->file('file')->store('img');

            DB::beginTransaction();    
            // 글 작성 처리
            $insertData = $request->only('b_title', 'b_content', 'bc_type');
            $insertData['b_img'] = '/'.$filePath;
            $insertData['u_id'] = Auth::id();
            Board::create($insertData);
            DB::commit();
        } catch(Throwable $th) {
            DB::rollBack();
            if(Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }
            
            return redirect()->route('boards.index',['bc_type' =>$request->bc_type]);
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 상세 데이터를 만들어서 전달
        // Log::debug('****** boards.show Start ******');
        // Log::debug('request id: '.$id);

        $result = Board::find($id);

        $responseData = $result->toArray();
        $responseData['delete_flg'] = $result->u_id === Auth::id();
        // $responseData['delete_flg'] = false;

        // if($result->u_id === Auth::id()) {
        //     $responseData['delete_flg'] = true;

        // }

        // Log::debug('획득 상세 데이터', $result->toArray());  // toArray :eloquent model 를 배열로 변환

        return response()->json($responseData); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 해당 게시글에 수정 페이지로 이동
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 실제로 수정 처리
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Board::destroy($id);

        $responseData =[
            'success' => $result === 1 ? true : false
        ];

        return response()->json($responseData);
    }
}
