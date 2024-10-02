CREATE DATABASE IF NOT EXISTS cine_board;

USE cine_board;

DROP TABLE cine_board;

CREATE TABLE board (
 		id BIGINT(20) UNSIGNED PRIMARY KEY  AUTO_INCREMENT
		,title 			VARCHAR(50) NOT NULL
		,content       VARCHAR(1000)   NOT NULL
		,img 				BLOB 		NOT NULL	
		,created_at  	TIMESTAMP NOT NULL 	DEFAcine_boardcine_boardULT	(CURRENT_TIMESTAMP)
		,updated_at  	TIMESTAMP NOT NULL 	DEFAULT (CURRENT_TIMESTAMP)
		,deleted_at
);