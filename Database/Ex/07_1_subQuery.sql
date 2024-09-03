

-- WHERE 절 사용하는 subQuery

-- 단일행 subQuery

-- D001 부서장의 사번과 이름을 출력
SELECT 
	employees.emp_id
	,employees.name
FROM employees 
WHERE 
	employees.emp_id = (
		SELECT  department_managers.emp_id
		FROM department_managers
		WHERE 
		 		department_managers.end_at IS NULL
			AND department_managers.dept_code='D001'
	)		
;

-- 다중행 subQuery

-- 전체 부서장의 사번과 이름 출력
SELECT 
	employees.emp_id
	,employees.name
FROM employees 
WHERE 
	 	employees.emp_id IN (
			SELECT  department_managers.emp_id
			FROM department_managers
			WHERE 
			 		department_managers.end_at IS NULL
		)		
;

-- 현재 직책이 T006인 사원의 사번과 이름, 생일을 출력해주세요.
SELECT
	employees.emp_id 
	,employees.name
	,employees.birth
FROM employees
WHERE
		employees.emp_id IN(
		SELECT title_emps.emp_id
		FROM title_emps
		WHERE 
			  title_emps.end_at IS NULL
		 AND title_emps.title_code='T006'
	)
; 	

--다중열 subQuery

-- 현재 D002의 부서장이 해당 부서에 소속된 날짜 출력
SELECT 
		department_emps. *
FROM department_emps
WHERE
	(department_emps.emp_id,department_emps.dept_code) IN (
	SELECT 
		department_emps.emp_id
		,department_managers.dept_code
	FROM department_managers
	WHERE 
		department_managers.end_at IS NULL
	AND department_managers.dept_code= 'D002'
)
;

-- 연관subQuery

SELECT
	employees.*
FROM employees
WHERE
	employees.emp_id IN(
		SELECT department_managers.emp_id
		FROM	department_managers
		WHERE
			department_managers.emp_id = employees.emp_id
	
	)
;	

-- ---------
-- SELECT절에서 사용되는 subQuery
-- 사원별 평균 연봉과 사변, 이름을 출력
SELECT
 	employees.emp_id
 	,employees.name
 	,(
		SELECT AVG(salaries.salary)
		FROM salaries
		WHERE
			employees.emp_id=salaries.emp_id 
	) AS avg_sal
FROM employees
;

-- ---------
-- FROM절에서 사용되는 subQuery
-- ---------
-- 사원테이블안에 사번과이름만 있는 tmp 테이블의 모든것을 출력
SELECT
	tmp.*
FROM (
	SELECT
		employees.emp_id
		,employees.name
	FROM employees
) AS tmp
;

-- insert문에서 subQuery 사용
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
	(SELECT emp.NAME FROM employees emp WHERE emp.emp_id = 1000)
	,'2000-01-01'
	,'M'
	,DATE(NOW())
	,NULL
	,NULL 
	,NOW()
	,NOW()
	,NULL 
)
;

-- ---------
-- update문에서 subQuery 사용
-- ---------
UPDATE employees
SET 
	employees.gender = (
		SELECT emp.gender
		FROM employees emp
		WHERE emp.emp_id= 100000
	)
WHERE 
	employees.emp_id = (
		SELECT MAX(emp2.emp_id)
		FROM employees emp2
	)
;