<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //리스트 데이터 획득
       $result = Board::select('b_id', 'b_title', 'b_content', 'b_img')
                    ->orderBy('created_at', 'DESC')
                    ->orderBy('b_id', 'DESC')
                    ->get();
       
       return view('boardList')->with('data', $result);
    }
       // 리스트 페이지 여러개의 데이터를 표시하는곳으로 이동

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 작성 페이지로 이동
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
        Log::debug('****** boards.show Start ******');
        Log::debug('request id: '.$id);

        $result = Board::find($id);

        Log::debug('획득 상세 데이터', $result->toArray());  // toArray :eloquent model 를 배열로 변환

        return response()->json($result->toArray()); 
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
        // 데이터 삭제
    }
}
