SELECT DISTINCT
ED.U_EMPLOYEE_GENDER AS gender,
(
	SELECT COUNT(u_employee_details.`CODE`) 
	FROM u_employee_details 
	WHERE u_employee_details.U_EMPLOYEE_GENDER = gender
) AS gender_population
FROM u_employee_details AS ED	
WHERE ED.U_EMPLOYEE_GENDER = "Male" OR ED.U_EMPLOYEE_GENDER = "Female"