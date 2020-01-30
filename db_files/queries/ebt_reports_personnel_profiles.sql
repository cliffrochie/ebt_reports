SELECT
-- personal information
ED.`code`,
ED.company,
ED.branch,
ED.`name`,
ED.u_employee_firstname AS "ed_firstname",
ED.u_employee_middlename AS "ed_middlename",
ED.u_employee_lastname AS "ed_lastname",
ED.u_employee_nameext AS "ed_extension",
ED.U_EMPLOYEE_GENEDER AS "ed_gender",
ED.U_EMPLOYEE_BIRTHDATE AS "ed_birthdate",
ED.U_EMPLOYEE_MARITAL_STATUS AS "ed_marital_status",
ED.U_EMPLOYEE_NATIONALITY AS "ed_nationality",
-- employment information
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_TITLE AS "ej_job_title",
EJ.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY AS "ej_job_category",
EJ.U_EMPLOYEE_EMPLOYMENT_STATUS AS "ej_employment_status",
EJ.U_DEPARTMENT AS "ej_department",
-- employee supervisor
ER.U_EMPLOYEE_SUPERVISOR AS "er_supervisor",
-- employee contact details
ECD.U_EMPLOYEE_CONTACT_MOBILE AS "ecd_mobile_number",
ECD.U_EMPLOYEE_CONTACT_TELEPHONE AS "ecd_telephone_number",
ECD.U_EMPLOYEE_CONTACT_STREET AS "ecd_street",
ECD.U_EMPLOYEE_CONTACT_CITY AS "ecd_city",
ECD.U_EMPLOYEE_CONTACT_STATE_PROVINCE AS "ecd_state_province",
ECD.U_EMPLOYEE_CONTACT_COUNTRY AS "ecd_country",
ECD.U_EMPLOYEE_CONTACT_ZIP AS "ecd_zip",
ECD.U_EMPLOYEE_CONTACT_EMAIL AS "ecd_email"
FROM 
u_employee_details AS ED
LEFT JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`
LEFT JOIN u_employee_reports_to AS ER ON ER.`code` = ED.`code`
LEFT JOIN u_employee_contact_details AS ECD ON ED.`CODE` = ECD.`CODE`
WHERE ED.`CODE` = "C-100001"