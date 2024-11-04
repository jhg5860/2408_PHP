<?php
// Route\Route =$path
spl_autoload_register(function($path) {
    require_once(str_replace('\\', '/', $path).'.php'); // Route/Route.php 예외처리 - 파일경로 대소문자 파일있는지 없는지 
});