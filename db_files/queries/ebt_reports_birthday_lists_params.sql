SELECT
ED.`code`,
ED.company,
ED.branch,
ED.`name`,
DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%M %d,%Y') AS "birthdate",
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_TITLE AS "job_title",
EJ.U_DEPARTMENT AS "department"
FROM 
u_employee_details AS ED
INNER JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`
