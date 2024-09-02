-- INSERT문:신규데이터를 저장

-- 기본구조
-- INSERT INTO 테이블명 (컬럼1, 컬럼2...)
-- VALUES (값1, 값2 ...dbsample);

INSERT INTO employees (
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
VALUES (
	'정한결'
	,'1992-07-04'
	,'M'
	,'2024-09-02'
	,NULL
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;

-- select insert 주의할점 INSERT INTO 랑 SELECT 컬럼명이 같아야하고 WHERE문을 넣어야함
INSERT INTO employees (
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
)
SELECT 
	NAME
	,birth
	,gender
	,hire_at
	,fire_at
	,sup_id
	,created_at
	,updated_at
	,deleted_at
FROM employees
WHERE emp_id = 100002
;

-- 자신의 직급정보 삽입
-- 자신의 급여 정보 삽입
-- 자신의 소속부서 삽입

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
	100002
	,'T001'
	,'2024-09-02'
 	,NULL
 	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
; 	
SELECT * FROM title_emps WHERE emp_id=100002;

INSERT INTO salaries (
	emp_id
	,salary
	,start_at
	,end_at
	,created_at
 	,updated_at
 	,deleted_at
)
VALUES (
	100002
	,25000015
	,'2024-09-02'
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;

INSERT INTO department_emps (
	emp_id
	,dept_code
	,start_at
	,end_at
	,created_at
	,updated_at
 	,deleted_at
)
VALUES (
	100002
	,'D002'
	,'2024-09-02'
	,NULL
	,'2024-09-02 00:00:00'
	,'2024-09-02 00:00:00'
	,NULL
)
;
-- 새로 기입한걸 찾기 위해서는 추가한 컬럼명이랑 값으로만 찾기가 가능
SELECT * FROM department_emps WHERE emp_id =100002;


