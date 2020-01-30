DELIMITER $$
CREATE PROCEDURE urpts_employee_birth15(birth_month VARCHAR(20), birth_year VARCHAR(20))
BEGIN
	-- month and year is not empty
	IF birth_month IS NOT NULL AND birth_year IS NOT NULL THEN
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
		WHERE DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%M') = birth_month
		AND DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%Y') = birth_year;
	-- month is empty
	ELSEIF birth_month IS NULL AND birth_year IS NOT NULL THEN
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
		AND DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%Y') = birth_year;
	-- year is empty
	ELSEIF birth_month IS NOT NULL AND birth_year IS NULL OR birth_month = "" AND birth_year = "" THEN
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
		AND DATE_FORMAT(ED.U_EMPLOYEE_BIRTHDATE,'%M') = birth_month;
	-- if both is empty
	ELSE
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
		INNER JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`;
	END IF;
END $$

DELIMITER ;