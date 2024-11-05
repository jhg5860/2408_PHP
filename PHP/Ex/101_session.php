<?php

// 세션 시작 : 세션 시작 전에 출력처리 (echo vardump)가 있으면 안된다. 
session_start(); 

// 세션 저장
$_SESSION['test_session'] = '세션';
