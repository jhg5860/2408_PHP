<?php

define("MY_MARIADB_HOST", "localhost");
define("MY_MARIADB_PORT" , "3306");
define("MY_MARIADB_USER", "root");
define("MY_MARIADB_PASSWORD", "php504");
define("MY_MARIADB_NAME", "cine_board");
define("MY_MARIADB_CHARSET", "utf8mb4");
define("MY_MARIADB_DSN", "mysql:host=".MY_MARIADB_HOST.";Port=".MY_MARIADB_PORT.";dbname=".MY_MARIADB_NAME.";charst=".MY_MARIADB_CHARSET);

define("MY_PATH_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("MY_PATH_DB_LIB" ,MY_PATH_ROOT."lib/db_lib.php");
