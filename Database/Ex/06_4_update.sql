-- UPDATE문 : 기존 데이터를 수정

-- 기본구조
-- UPDATE 테이블명
-- SET [컬럼1= 값1, 컬럼2=값2 ...]
-- WHERE 조건 (WHERE을 기입안하면 해당하는 모든테이블이 업데이트되서 WHERE 기입 필수)
UPDATE employees
SET
	gender= 'M'
	,updated_at =NOW()
WHERE emp_id =100002
;

-- 나의 직급을 'T005'로 변경해주세요

SELECT * FROM title_emps
WHERE emp_id=100002 AND end_at IS NULL;

UPDATE title_emps
SET 
		title_code='T005'
WHERE emp_id=100002 AND end_at IS NULL
;

SELECT * FROM title_emps WHERE emp_id=100002 AND end_at IS NULL;

-- 현재 급여가 26,000,000만원 이하인 직원의 급여를 
-- 50,000,000만원으로 수정해주세요.

SELECT *FROM salaries
WHERE end_at IS NULL AND salary <=26000000;

UPDATE salaries
SET
		 salary = 50000000 
		,updated_at=NOW()
WHERE end_at is NULL AND salary <=26000000
;

SELECT *FROM salaries
WHERE end_at IS NULL AND salary =50000000;



