<?php

namespace Controllers;

use Controllers\Controller;
use Models\Board;
use Models\BoardsCategory;

class BoardController extends Controller {
    private $arrBoardList = []; // 게시글 정보 리스트
    private $boardName = ''; // 게시판 이름
    protected $boardType =''; // 게시판 코드
   
    // getter
    public function getArrBoardList() {
       return $this->arrBoardList;
    }
    public function getBoardName() {
        return $this->boardName;
    }   

    // setter
    public function setArrBoardList($arrBoardList) {
        $this->arrBoardList = $arrBoardList;
    }
    public function setBoardName($boardName) {
        $this->boardName = $boardName;
        
    }

    public function index() {
        // 보드타입 획득
        $requestData =[
            'bc_type' => isset($_GET['bc_type']) ? $_GET['bc_type'] :'0'
        ];
        $this->boardType = $requestData['bc_type'];

        // 게시글 정보 획득
        $boardModel = new Board();
        $this->setArrBoardList($boardModel->getBoardList($requestData));

        // 보드이름 획득
        $boardCategoryModal = new BoardsCategory();
        $resultBoardCategory = $boardCategoryModal->getBoardName($requestData);
        $this->setBoardName($resultBoardCategory['bc_name']);
        
        return 'board.php';
    }

    // 상세 페이지
    public function show() {
        $requestData = [
            'b_id' => $_GET['b_id']
        ];

        // 게시글 정보 조회
        $boardModel = new Board();
        $resultBoard = $boardModel->getBoardDetail($requestData);

        // JSON 변환
        $responseData = json_encode($resultBoard);
        
        header('Content-type: application/json');
        echo $responseData;
        exit;
    }

    // 작성 페이지로 이동
    public function create() {
        return 'insert.php';
    }    

    // 작성 처리 
    public function store() {
        $requestData = [
            'b_title' => $_POST['b_title']
            ,'b_content' => $_POST['b_content']
            ,'b_img' => ''
        ];
        $requestData['b_img'] = $this->saveImg($_FILES['file']);


    }

    private function saveImg($file) {
        $type = explode('/', $file['type']); // ['IMAGE' , '확장자']
        $fileName =uniqid().'.'.$type[1]; // 3g46qg346g.확장자
        $filePath = _PATH_IMG.'/'.$fileName; // /view/img/3g46qg346.확장자
        move_uploaded_file($file['tmp_name'], _ROOT.$filePath); // 파일 복사

        return $filePath;
    }
}