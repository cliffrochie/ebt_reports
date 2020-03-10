SELECT DISTINCT
SU.`CODE` AS operating_unit_code,
SU.`NAME` AS operating_unit,
(
	SELECT COUNT(u_employee_details.`CODE`)
	FROM u_employee_details
	WHERE u_employee_details.U_EMPLOYEE_OPERATING_UNIT = operating_unit_code
) AS population
FROM 
	u_setup_sub_unit AS SU
WHERE
	SU.U_PARENT_ID <> ""