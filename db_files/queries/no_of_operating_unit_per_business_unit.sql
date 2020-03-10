SELECT DISTINCT
SU.CODE AS sub_unit_code,
SU.name AS business_unit,
(
	SELECT COUNT(u_setup_sub_unit.CODE)
	FROM u_setup_sub_unit
	WHERE u_setup_sub_unit.u_parent_id = sub_unit_code
) AS population
FROM 
u_setup_sub_unit AS SU
WHERE SU.u_parent_id = ""