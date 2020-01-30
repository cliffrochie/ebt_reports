SELECT
EL.U_EMPLOYEE_LANGUAGE_NAME AS el_language,
EL.U_EMPLOYEE_LANGUAGE_LEVEL AS el_level
FROM 
u_employee_details AS ED
LEFT JOIN u_employee_languages AS EL ON ED.`code` = EL.`code`
WHERE ED.`CODE` = "C-100002"