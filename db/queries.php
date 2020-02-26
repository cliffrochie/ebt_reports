<?php
require_once(dirname(__FILE__) .'/connection.php');


function escape($data) {

    if(floatval(phpversion()) < 6) {
        return mysql_escape_string($data);
    }
    return mysqli_real_escape_string($data);
}

class Query {
    
    public static function getEmployees() {
        $sql = '
            SELECT
            ED.`CODE` AS code,
            ED.NAME AS name
            FROM
            u_employee_details AS ED
            ORDER BY ED.CODE, ED.NAME
        ';

        return $sql;
    }


    public static function getBasicInformation($id) {
    
        $sql = '
            SELECT
            ED.`code`,
            ED.company,
            ED.branch,
            ED.`name`,
            ED.u_employee_firstname AS ed_firstname,
            ED.u_employee_middlename AS ed_middlename,
            ED.u_employee_lastname AS ed_lastname,
            ED.u_employee_nameext AS ed_extension,
            ED.U_EMPLOYEE_GENDER AS ed_gender,
            ED.U_EMPLOYEE_BIRTHDATE AS ed_birthdate,
            ED.U_EMPLOYEE_MARITAL_STATUS AS ed_marital_status,
            ED.U_EMPLOYEE_NATIONALITY AS ed_nationality,
            
            ECD.U_EMPLOYEE_CONTACT_MOBILE AS ecd_mobile_number,
            ECD.U_EMPLOYEE_CONTACT_TELEPHONE AS ecd_telephone_number,
            ECD.U_EMPLOYEE_CONTACT_STREET AS ecd_street,
            ECD.U_EMPLOYEE_CONTACT_CITY AS ecd_city,
            ECD.U_EMPLOYEE_CONTACT_STATE_PROVINCE AS ecd_state_province,
            ECD.U_EMPLOYEE_CONTACT_COUNTRY AS ecd_country,
            ECD.U_EMPLOYEE_CONTACT_ZIP AS ecd_zip,
            ECD.U_EMPLOYEE_CONTACT_EMAIL AS ecd_email
            FROM 
            u_employee_details AS ED
            LEFT JOIN u_employee_contact_details AS ECD ON ED.`CODE` = ECD.`CODE`
            WHERE ED.`CODE` = "'. $id .'"
        ';
    
        return $sql;
    }

    public static function getEmploymentDetails($id) {

        $sql = '
        SELECT
        -- personal information
        ED.`code`,
        EJ.U_EMPLOYEE_EMPLOYMENT_JOB_TITLE AS "ej_job_title",
        EJ.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY AS "ej_job_category",
        EJ.U_EMPLOYEE_EMPLOYMENT_STATUS AS "ej_employment_status",
        EJ.U_DEPARTMENT AS "ej_department",
        -- employee supervisor
        ER.U_EMPLOYEE_SUPERVISOR AS "er_supervisor"
        FROM 
        u_employee_details AS ED
        LEFT JOIN u_employee_job AS EJ ON ED.`CODE` = EJ.`CODE`
        LEFT JOIN u_employee_reports_to AS ER ON ER.`code` = EJ.`code`
        WHERE ED.`CODE` = "'. $id .'"
        ';
    
        return $sql;
    }

    public static function getEducationBackground($id) {
       
        $sql = '
        SELECT
        EEB.`CODE` AS "code",
        EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_LEVEL AS "background_level",
        EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_SCHOOL_NAME AS "school",
        EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_DEGREE_COURSE AS "program",
        CAST(YEAR(EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_START_DATE) AS char) AS "date_start",
        CAST(YEAR(EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_END_DATE) AS char) AS "date_end",
        EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_ACAD_HONORS AS "honors",
        EEB.U_EMPLOYEE_EDUCATIONAL_BACKGROUND_YEAR_GRADUATED AS "year_graduated"
        FROM
        U_EMPLOYEE_DETAILS AS ED
        LEFT JOIN u_employee_educational_background AS EEB ON ED.`CODE` = EEB.`CODE`
        WHERE ED.`CODE` = "'. $id .'"
        ';

        return $sql;
    }

    public static function getWorkExperience($id) {

        $sql = '
            SELECT 
            EWE.`CODE` AS "code",
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_COMPANY AS "ewe_company",
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_POSITION AS "ewe_position",
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_APPOINTMENT_STATUS AS "ewe_appointment_status",
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_DATE_FROM AS "ewe_date_from",
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_DATE_TO AS "ewe_date_to"
            FROM u_employee_details AS ED
            LEFT JOIN u_employee_work_experience AS EWE ON ED.`CODE` = EWE.`CODE`
            WHERE 
            EWE.U_EMPLOYEE_WORK_EXPERIENCE_COMPANY <> ""
            AND ED.`CODE` = "'. $id .'"
        ';

        return $sql;
    }


    public static function getEmergencyContactPerson($id) {
        
        $sql = '
            SELECT
            EEC.`CODE` AS "code",
            UPPER(EEC.U_EMPLOYEE_EMERGENCY_CONTACT_NAME) AS "eec_contact_name",
            EEC.U_EMPLOYEE_EMERGENCY_CONTACT_RELATIONSHIP AS "eec_relationship",
            EEC.U_EMPLOYEE_EMERGENCY_CONTACT_MOBILE AS "eec_mobile",
            EEC.U_EMPLOYEE_EMERGENCY_CONTACT_WORK_TELEPHONE AS "eec_work_telephone",
            EEC.U_EMPLOYEE_EMERGENCY_CONTACT_HOME_TELEPHONE AS "eec_home_telephone"
            FROM 
            u_employee_details AS ED
            LEFT JOIN u_employee_emergency_contacts AS EEC ON ED.`CODE` = EEC.`CODE`
            WHERE ED.`code` = "'. $id .'"
        ';

        return $sql;
    }

    public static function getEmployeeCountPerDepartment() {

        $sql = '
            SELECT DISTINCT 
            COALESCE(NULLIF(ED.U_EMPLOYEE_DEPARTMENT, ""), "No Department") as department,
            (
                SELECT COUNT(u_employee_details.`code`) 
                FROM u_employee_details 
                WHERE u_employee_details.U_EMPLOYEE_DEPARTMENT = ED.U_EMPLOYEE_DEPARTMENT
            ) AS department_population
            FROM 
            U_EMPLOYEE_DETAILS AS ED
        ';

        return $sql;
    }

    public static function getEmployeeCountPerCategory() {

        $sql = '
            SELECT DISTINCT
            EJ.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY AS job_category,
            (
                SELECT COUNT(U_EMPLOYEE_JOB.`CODE`) 
                FROM U_EMPLOYEE_JOB 
                WHERE U_EMPLOYEE_JOB.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY = job_category
            ) AS job_population
            FROM 
            U_EMPLOYEE_JOB AS EJ
            WHERE EJ.U_EMPLOYEE_EMPLOYMENT_JOB_CATEGORY <> ""
        ';

        return $sql;
    }

    public static function getJobVacancy() {

        $sql = '
            SELECT
            jv.u_job_title AS job_title,
            jv.u_jt_num_of_position AS total_vacancies
            FROM
            u_hr_job_vacancies AS jv
            WHERE jv.U_JT_VACANCY_STATUS = "Active"
        '

        return $sql;
    }
}

