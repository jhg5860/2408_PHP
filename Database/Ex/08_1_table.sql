-- DB 생성
-- CREATE DATABASE shop; -- Mariadb는 소문자 Oracle 대문자--

-- DB 선택
-- USE shop;

-- DB 삭제
-- DROP DATABASE shop;

-- -------------
-- 테이블 생성
-- -------------
-- auto_increment 자동으로 숫자 1씩 증가
-- 컬럼명 데이터타입 제약조건
CREATE TABLE users (
	id BIGINT(20) PRIMARY KEY AUTO_INCREMENT
	,NAME VARCHAR(50) NOT NULL
	,addr VARCHAR(150) NOT NULL
	,gender CHAR(1) NOT NULL COMMENT 'M = 남자, F = 여자'
	,tel VARCHAR(20) NOT NULL COMMENT '- 제외 숫자'
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP  
);
CREATE TABLE orders (
	id BIGINT(20) PRIMARY KEY AUTO_INCREMENT 
	,user_id BIGINT(20) NOT NULL
	,order_id VARCHAR(50) NOT NULL 
	,total_price BIGINT(20) NOT NULL 
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,upadted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP 
);
CREATE TABLE products (
	id BIGINT(20) PRIMARY KEY AUTO_INCREMENT 
	,produce_name VARCHAR(100) NOT NULL 
	,price BIGINT(20) NOT NULL 
	,created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,upadted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at TIMESTAMP
);

-- --------
-- 테이블 제거
-- --------
-- DROP TABLE orders;
-- DROP table users, products;
-- 

-- -------
-- TRUNCATE: 테이블 비우기
-- -------
-- TRUNCATE users;

-- -------
-- ALTER : 테이블의 구조를 수정하는 문
-- -------

-- FK 추가 방법
-- ALTER TABLE [테이블명] -- orders
-- ADD CONSTRAINT [Constraint명] -- fk_orders_user_id  -- 제약조건 테이블명 
-- FOREIGN KEY (Constraint 부여 컬럼명)
-- REFERENCES 참조테이블명(참조테이블 컬럼명)
-- [ON DELETE 동작 / ON UPDATE 동작]; -- CASCADE

ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id);

-- ------
-- 컬럼 수정
-- ------
-- alter table 컬럼 modify column

ALTER TABLE users
MODIFY COLUMN addr VARCHAR(100) NOT NULL
;

-- -------
-- 컬럼 추가
-- -------
ALTER TABLE users
ADD COLUMN birth DATE NOT NULL 
;

-- --------
-- 컬럼제거
-- --------
ALTER TABLE users
DROP COLUMN birth
;

-- pk 부호 없음(데이터타입) 추가
ALTER TABLE orders 
DROP CONSTRAINT fk_orders_user_id
;
-- order 테이블에서 외래키 제거

ALTER TABLE users
MODIFY COLUMN id BIGINT(20) UNSIGNED  AUTO_INCREMENT
;
-- users 테이블에서 id 컬럼을 bigint(20) unsigned auto_increment로 수정
ALTER TABLE orders
MODIFY COLUMN user_id BIGINT(20) UNSIGNED NOT NULL
;
-- orders 테이블에서 user_id 컬럼을 bigint(20) unsigned auto_increment로 수정
ALTER TABLE orders
ADD CONSTRAINT fk_orders_user_id
FOREIGN KEY (user_id)
REFERENCES users(id)
;

ALTER TABLE orders 
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT 
;

ALTER TABLE products
MODIFY COLUMN id BIGINT(20) UNSIGNED AUTO_INCREMENT 
;