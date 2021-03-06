SELECT
ELC.U_EMPLOYEE_LICENSE_NUMBER,
ELC.U_EMPLOYEE_LICENSE_TYPE,
ELC.U_EMPLOYEE_LICENSE_DATE_ISSUED,
ELC.U_EMPLOYEE_LICENSE_EXPIRY_DATE
FROM
u_employee_details AS ED
LEFT JOIN u_employee_license AS ELC ON ED.`CODE` = ELC.`CODE`
WHERE ED.`CODE` = "C-100002"
AND ED.`CODE` <> "" 