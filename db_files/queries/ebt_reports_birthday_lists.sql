SELECT
ED.`code`,
ED.company,
ED.branch,
ED.`name`,
DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%d') AS "birth_date",
DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%M') AS "birth_month",
DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%Y') AS "birth_year",
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_TITLE AS "job_title",
EJ.U_DEPARTMENT AS "department"
FROM 
u_employee_details AS ED
INNER JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`
