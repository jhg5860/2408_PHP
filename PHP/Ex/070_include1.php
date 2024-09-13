<?php
// -----------------
// 다른 파일의 소스코드를 사용하기 위해 불러오는 방법
// -----------------

// include 위치에 따라서 먼저실행할지 나중에할지 정할수 있다. 해당 파일을 불러온다 .(중복 작성할 경우 여러번 불러온다.)
// include("./070_include2.php");  //echo "include 2222\n";
// include_once : 해당 파일을 불러온다. (중복 작성할 경우 딱 한번만 불러온다.)
// 공통점 : 오류 발생 시 프로그램을 정지하지 않고 처리 진행
// include_once("./070_include2.php"); 
// include_once("./070_include2.php"); 


// require : 해당 파일을 불러온다 .(중복 작성할 경우 여러번 불러온다.)
// require_once : 해당 파일을 불러온다. (중복 작성할 경우 딱 한번만 불러온다.) // 최상단에 위치
// 공통점 : 오류 발생 시 프로그램을 정지

// require("./070_include2.php");
// require("./070_include2.php");

require_once("./070_include2.php");
require_once("./070_include2.php");

echo "include 1111\n";