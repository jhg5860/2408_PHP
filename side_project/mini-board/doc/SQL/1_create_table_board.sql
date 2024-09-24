CREATE DATABASE IF NOT EXISTS mini_board;

USE mini_board;

-- board 테이블이 있으면 삭제해라
DROP TABLE IF EXISTS board;

-- 테이블 만들기
CREATE TABLE board (
		id   BIGINT(20)   UNSIGNED PRIMARY KEY AUTO_INCREMENT
		,title VARCHAR(50) NOT NULL
		,content VARCHAR(1000) NOT NULL
		,created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
		,updated_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP)
		,deleted_at TIMESTAMP 
);
