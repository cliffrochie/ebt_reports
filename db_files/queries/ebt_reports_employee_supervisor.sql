SELECT 
ED.`NAME` AS "employee_name",
(
	SELECT u_employee_details.`NAME`
	FROM u_employee_details
	INNER JOIN u_employee_supervisor ON u_employee_supervisor.U_EMPLOYEE_SUPERVISOR_CODE = u_employee_details.`CODE`
	WHERE u_employee_supervisor.`CODE` = ED.`CODE` ORDER BY u_employee_details.DATECREATED DESC LIMIT 1
) AS "es_supervisor"
FROM
u_employee_details AS ED
WHERE
ED.`CODE` = "C-100002"
