SELECT 
DDC.COMPANY AS company,
DDC.BRANCH AS branch,
DDC.`CODE` AS `code`,
DDC.`name` AS `name`,
DDC.U_ACTION_TYPE AS type,
DDC.U_CREATE_BY AS created_by,
DDC.U_CREATED_ON AS created_on,
DDC.U_DUE_DATE AS due_date,
DDC.U_CASE_NAME AS case_name,
DDC.U_DESCRIPTION AS description,
DDC.U_STATUS AS `status`
FROM 
u_discipline_disciplinary_cases AS DDC
