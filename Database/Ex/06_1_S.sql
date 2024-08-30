/*
	SELECT문
	데이터를 조회하기 위해 사용하는 쿼리
*/
/* 테이블에서 특정 컬럼만 조회하는 방법 
SELECT 컬럼명, 컴럼명
FROM employees; 마지막에 ;필수*/
SELECT emp_id , name
FROM employees
;

-- 테이블의 모든컬럼의 데이터 조회
-- *(Asterisk)
SELECT *
FROM employees
;

-- 직급  테이블의 모든 데이터를 조회해주세요.
SELECT *
FROM titles
;

-- 모든사원의 직급과 사변을 조회해주세요.
SELECT
		title_code
		,emp_id
FROM title_emps
;

/* 
	WHERE 절:특정조건의 데이터를 조회할 때 사용
*/
-- 사변이 10000번인사원의 모든정보를 조회해주세요.
SELECT *
FROM employees
WHERE 
	emp_id= 10000
;

-- 이름이 원성현'인 사원을 조회해주세요.
SELECT *
FROM employees
WHERE
	NAME= '원성현'
;

-- 비교연산자 :>, <, =, >= , <=, !=
-- 사번이 6이상인 사원의 정보를 조회해주세요.
SELECT *
FROM employees
WHERE emp_id >= 6;

-- 생일이 1990-01-01 이후인 사원을 조회해주세요.
SELECT *
FROM employees
WHERE 
	birth >= '1990-01-01'
;

-- AND(두조건이 충족), OR(두 조건중 한개만 충족) : 복수의 조건을 적용시키는 키워드
-- 생일이 1990-01-01 이후이고, 남자사원을 조회해주세요.
SELECT *
FROM employees
WHERE
	 	birth >= '1990-01-01'
  AND gender ='M'
;
-- 이름이 원성현이거나반승현인 사원을 조회해주세요.
SELECT *
FROM employees
WHERE
	NAME='원성현'
 	OR NAME='반승현'
;
 	
-- 이름이 원성현 또는 반승현이고,
-- 생일이 1990-01-01 이후인 사원을 조회해주세요.
SELECT *
FROM employees
WHERE
	(
		NAME='원성현'
		OR NAME='반승현'
	)
	AND birth >= '1990-01-01'
;
-- 이름이 원성현이고 생일이 1990-01-01 이후 이거나
-- 이름이 반승현인 사원 조회
SELECT *
FROM employees
WHERE
	(
		NAME='원성현'
		AND birth>= '1990-01-01'
	)
	OR name >= '반승현'
;


-- 직급코드가T001 또는 T002이고,
-- 직급시작일자가 2000-01-01이후인
-- 사원의 사변과 직급코드를 조회해 주세요.

SELECT 
	 emp_id
	,title_code
FROM title_emps
WHERE 
	(
	 title_code='T001' 
	 OR title_code='T002'
	)
	AND start_at >= '2000-01-01'
;

-- 생일이 2000-01-01~ 2001 -01-01인 사원 정보를 조회해주세요.	
SELECT 
*
FROM employees
WHERE 
  	birth >='2000-01-01'
  	AND birth <='2001-01-1'
 ;
 
-- in 연산자 :지정한 값과 일치한 데이터 조회
-- 이름이 염문창, 지도연, 안소정인 사원정보 조회해주세요.
SELECT *
FROM employees
WHERE
	NAME IN(
		'염문창'
		,'지도연'
		,'안소정'
	)
;

-- BETWEEN 연산자 : 지정한 범위의 데이터를 조회
-- 생일이 2000-01-01~ 2001-01-01인 사원 정보를 조회해주세요.
SELECT *
FROM employees
WHERE
	birth BETWEEN '2000-01-01' AND '2001-01-01'
;

-- LIKE 연산자 : 문자열의 내용을 조회할 때 사용(대소문자 구분 X)
-- %: 글자수 상관없이 조회
-- 염씨인 사원 정보 획득
SELECT *
FROM employees
WHERE
 	NAME LIKE '염%'
;
-- _ : 언더바의 개수만큼 글자개수를 제한해서 조회
SELECT *
FROM employees
WHERE
 	NAME LIKE '염_'
;

/*
	ORDER BY 절: 데이터를 정렬
	ASC : 오름차순 정렬
	DESC : 내림차순 정렬
*/
-- 모든사원을 이름 오름차순으로 정렬
SELECT *
FROM employees
ORDER BY NAME ASC 
;

-- 여자사원을 이름 오름차순으로 정렬
SELECT *
FROM employees
WHERE gender='F'
ORDER BY NAME ASC
;

-- 여자사원을 이름, 생일 오름차순으로 정렬
SELECT *
FROM employees
WHERE gender='F'
ORDER BY NAME ASC, birth ASC
;

-- DISTINCT 키워드 : 검색 결과에서 중복되는 레코드를 제거
-- 직급테이블에서 사원번호 조회
SELECT DISTINCT emp_id , title_code
FROM title_emps
;

/*
 	GROUP BY 절 : 그룹으로 묶어서 조회
 	HAVING 절 : GROUP BY 절의 조건절
 	
 	집계함수
 		MAX() :최대값
 		MIN() :최소값
 		COUNT() :개수
 		AVG() :평균
 		SUM() :합계
*/ 
-- 사원별 최고  연봉 조회	
SELECT
	emp_id
	,MAX(salary)
FROM salaries
GROUP BY emp_id
;

-- 최고 연봉이 5000만원 이상인 사원 조회
SELECT 
	emp_id
	,MAX(salary)
FROM salaries
GROUP BY emp_id 
	HAVING MAX(salary) >=50000000
;

/*
	값이 NULL인 데이터 검색
		[컬럼명 IS NULL]
	값이 NULL이 아닌 데이터 검색
		[컬럼명 IS NOT NULL]
*/		

-- 사원의 현재 소속 부서코드 조회하기
SELECT *
FROM department_emps
WHERE 
	end_at IS NULL
;
/*
	AS: 컬럼또는 테이블에 별칭을 부여
*/
-- 부서별 소속 사원의 수를 구해주세요.
SELECT
	dept_code
	,COUNT(*) AS cnt
FROM department_emps
WHERE 
	end_at IS NULL
GROUP BY dept_code
;

	