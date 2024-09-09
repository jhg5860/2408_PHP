1. 사원 정보테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
		NAME
		,birth
		,gender
		,hire_at		
)
VALUES (
		'정한결'
		,'1992-07-04'
		,'M'
		,DATE(NOW())		
);	
2. 월급, 직급, 소속부서 테이블에 자신의 정보를 적절하게 넣어주세요.
INSERT INTO title_emps (	
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	10001
	,'T001'
	,'2024-09-02'
	,NULL
	,'2024-09-09 09:51:00'
	,'2024-09-09 09:51:00'
	,NULL
);
INSERT INTO salaries (
	emp_id
	,salary
	,start_at	
)
VALUES (
	100001
	,25000000
	,DATE(NOW())	
)
;
INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	
)
VALUES (
	100001
	,'D001'
	,DATE(NOW())
	,NULL 
)
;
3. 짝궁의 것도 넣어주세요.
INSERT INTO employees (
		NAME
		,birth
		,gender
		,hire_at		
)
VALUES (
		'이하연'
		,'2000-00-00'
		,'F'
		,DATE(NOW())		
)
;
INSERT INTO title_emps (	
	emp_id
	,title_code
	,start_at
	,end_at
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	10002
	,'T001'
	,'2024-09-02'
	,NULL
	,'2024-09-09 09:51:00'
	,'2024-09-09 09:51:00'
	,NULL
);
INSERT INTO salaries (
	emp_id
	,salary
	,start_at	
)
VALUES (
	100002
	,25000000
	,DATE(NOW())	
)
;
INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	
)
VALUES (
	100002
	,'D001'
	,DATE(NOW())
	,NULL 
)
;
4. 나와 짝궁의 소속 부서를 D009로 변경해 주세요.
UPDATE department_emps
SET 
		end_at=DATE(NOW())
		,updated_at= NOW()
WHERE emp_id IN(100001)
		AND end_at IS NULL 
;
INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at	
)
VALUES (
	100001
	,'D009'
	,DATE(NOW())
	,NULL 
)
;
5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM salaries WHERE emp_id= 100002;
DELETE FROM department_emps WHERE emp_id= 100002;
DELETE FROM title_emps WHERE emp_id= 100002;
DELETE FROM employees WHERE emp_id= 100002; 
6. 'D009'부서의 관리자를 나로 변경해 주세요.
UPDATE department_managers
SET 
	end_at =DATE(NOW())
	,updated_at = NOW()
WHERE dept_code ='D009'
	AND end_at IS NULL 
;
INSERT INTO department_managers (
	emp_id
	,dept_code
	,start_at
)
VALUES (
	100001
	,'D009'
	,DATE(NOW())	
)
;
	
7. 오늘 날짜부로 나의 직책을 '대리'로 변경해 주세요.
UPDATE titles
SET 
	 updated_at = NOW()
	 ,deleted_at= NOW()
WHERE title ='대리'
;
INSERT INTO titles (
	
)
VALUES (
	100001
	,'D009'
	,DATE(NOW())	
)
;
8. 최저 연봉 사원의 사번과 이름, 연봉을 출력해 주세요.
SELECT 
		employees.emp_id
		,employees.Name
		,salaries.salary
FROM employees
JOIN salaries
	ON employees.emp_id = salaries.emp_id
	AND salaries.end_at IS NULL
	AND salaries.salary = (
		SELECT 
			MIN(salary)
		FROM salaries
		WHERE
			end_at IS NULL 	
	)
;
9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT 	
		AVG(salaries.salary)		
FROM salaries
WHERE end_at IS NULL 
;
10. 사번이 54321인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT
		AVG(salaries.salary)		
FROM salaries
WHERE 
	emp_id =54321
GROUP BY salaries.emp_id
;
1.아래 구조의 테이블을 작성하는 SQL을 작성해 주세요.
CREATE TABLE users (
	userid INT PRIMARY key  AUTO_INCREMENT 
	,username VARCHAR(30) NOT NULL
	,authflg CHAR(1) DEFAULT 0
	,birthday DATE NOT NULL 
	,created_at DATETIME CURRENT_TIME 
);
2.[01]에서 만든 테이블에 아래 데이터를 입력해 주세요.
INSERT INTO (
	username
	,AuthFlg
	,birthday
	,created_At
)	
VALUES (
	'그린'
	,'0'
	,'2024-01-26'
	,NOW()
);	
3.[02]에서 만든 레코드를 아래 데이터로 갱신해 주세요.
UPDATE users
SET userid = '테스터'
	 AuthFlg = '1'
	 birthday = '2007-03-01'
; 
4.[02]에서 만든 레코드를 삭제해 주세요.
DELETE FROM users
WHERE userid ='테스터'
		,AuthFlg ='1'
		,birthday ='2007-03-01'
;
5.[01]에서 만든 테이블에 아래 COLUMN 추가해 주세요.
ALTER TABLE users
MODIFY COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';
6.[01]에서 만든 테이블을 삭제해 주세요.
DROP TABLE users;
7.아래 테이블에서 유저명, 생일, 랭크명을 출력해 주세요.
SELECT 
	users.username
	,users.birthday
	,rankmanagement.rankname	
FROM users
JOIN rankmanagement
	ON users.userid = rankmanagement.userid
;