SELECT
ED.`code`,
ED.company,
ED.branch,
ED.`name`,
ED.u_employee_firstname AS "firstname",
ED.u_employee_middlename AS "middlename",
ED.u_employee_lastname AS "lastname",
ED.u_employee_nameext AS "extension",
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_TITLE AS "job_title",
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY AS "job_category",
EJ.U_EMPLOYEE_EMPLOYMENT_STATUS AS "employment_status",
EJ.U_DEPARTMENT AS "department",
ER.U_EMPLOYEE_SUPERVISOR AS "supervisor"
FROM 
u_employee_details AS ED
LEFT JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`
LEFT JOIN u_employee_reports_to AS ER ON ER.`code` = ED.`code`
