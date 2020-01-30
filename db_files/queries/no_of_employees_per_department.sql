SELECT DISTINCT 
COALESCE(NULLIF(ED.U_EMPLOYEE_DEPARTMENT, ''), 'No Department') as department,
(
	SELECT COUNT(u_employee_details.`code`) 
	FROM u_employee_details 
	WHERE u_employee_details.U_EMPLOYEE_DEPARTMENT = ED.U_EMPLOYEE_DEPARTMENT) AS department_population
FROM 
U_EMPLOYEE_DETAILS AS ED