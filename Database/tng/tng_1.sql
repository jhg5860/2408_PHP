-- 1. 직급테이블의 모든 정보를 조회해주세요.
SELECT *
FROM titles
;
-- 2. 급여가 60,000,000 이하인 사원의 사번을 조회해 주세요.
SELECT DISTINCT 
	  emp_id	
FROM salaries
WHERE 
	salary <=60000000 
;
-- 3. 급여가 60,000,000에서 70,000,000인 사원의 사번을 조회해 주세요.
SELECT 
	emp_id	
FROM salaries
WHERE
	 salary >= 60000000
  AND salary <= 70000000 
;
SELECT 
	emp_id	
FROM salaries
WHERE
 	salary BETWEEN 60000000
	  AND 700000000 
;
-- 4. 사원번호가 10001, 10005인 사원의 사원테이블의 모든 정보를 조회해 주세요.
SELECT * 		
FROM employees
WHERE 
		emp_id=10001
 OR	emp_id=10005
;
SELECT * 		
FROM employees
WHERE 
	emp_id IN (10001,10005)
;
-- 5. 직급명에 '사'가 포함된 사원의 직급코드와 직급명을 조회해 주세요.
SELECT 
	 title
	,title_code
FROM 	titles
WHERE 
	title LIKE '%사%'
;
-- 6. 사원 이름 오름차순으로 정렬해서 조회해 주세요.
-- 테이블명이 한개라 기재안해두 되지만 두개이상일경우는 명확하게 하기위한 테이블명 기재
SELECT name
FROM employees
ORDER BY name ASC 
;

-- 7. 사원별 전체 급여의 평균을 조회해 주세요.
SELECT 
	 emp_id
	 ,AVG(salary)
FROM salaries
GROUP BY emp_id
;
-- group by 주의할점은 group by 컬럼과 select 컬럼이랑 같아야한다

-- 8. 사원별 전체 급여의 평균이 30,000,000 ~ 50,000,000인, 사원번호와 평균급여를 조회해 주세요.

-- 집계함수 사용할떄 
SELECT 
	 emp_id
	 ,AVG(salary) avg_sal
FROM salaries
GROUP BY emp_id
	HAVING avg_sal BETWEEN 30000000 AND 50000000
;


-- 9. 사원별 전체 급여 평균이 70,000,000이상인, 사원의 사번, 이름, 성별을 조회해 주세요.
SELECT 
	 employees.emp_id
	,employees.name
	,employees.gender
FROM employees
WHERE 
	employees.emp_id IN (
		SELECT
			  salaries.emp_id
		FROM salaries
		GROUP BY salaries.emp_id
			HAVING AVG(salary) >= 70000000
	)
;


-- 10. 현재 직책이 'T005'인, 사원의 사원번호와 이름을 조회해 주세요.
SELECT 
	 employees.emp_id
	,employees.name
FROM employees
WHERE
	employees.emp_id IN (
		SELECT
			title_emps.emp_id
		FROM title_emps
		WHERE 
			title_code='T005' 
		AND  end_at IS NULL	
	)
;

SELECT 
		employees.emp_id
	  ,employees.name
FROM employees	  
WHERE 
		employees.emp_id IN(
 	SELECT
		title_emps.emp_id
	FROM title_emps
	WHERE 
		title_code='T005' 
		AND  end_at IS NULL
	) 
ORDER BY employees.emp_id ASC 	
;
	   











