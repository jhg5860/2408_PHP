<?php

// 세션 시작 : 세션 시작 전에 출력처리 (echo vardump)가 있으면 안된다. 
session_start(); 

session_destroy(); // 세션 파기