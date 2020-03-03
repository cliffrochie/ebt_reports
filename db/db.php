<?php

require_once(dirname(__FILE__) .'/connection.php');
require_once(dirname(__FILE__) .'/queries.php');

include_once(dirname(__FILE__) .'/../classes/Employee.php');
include_once(dirname(__FILE__) .'/../classes/Demographics.php');

class DB {

    public static function checkValue($data) {
        $result = '';
        if($data != null) {
            $result = $data;
        }
        return $result;
    }

    public static function getEmployees() {
        $db = connect();

        try {
            $result = $db->query(Query::getEmployees());

            $employees = [];

            if($result->num_rows > 0) {
                while($data = $result->fetch_assoc()) {
                    array_push($employees, array('code' => $data['code'], 'name' => $data['name']));
                }

                return $employees;
            }

            return null;
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getEmployeeDetails($id) {
        $db = connect();

        try {
            $result = $db->query(Query::getBasicInformation($id));
            if($result->num_rows > 0) {
                while($data = $result->fetch_assoc()) {
                    $employee = new Employee();

                    $employee->status = "300";
                    $employee->message = "Fetch data success!";

                    // Basic Details
                    $employee->code = self::checkValue($data['code']);
                    $employee->name = $data['name'] != '' || $data['name'] != null ? $data['name'] : '';
                    $employee->firstname = $data['ed_firstname'] != '' || $data['ed_firstname'] != null ? $data['ed_firstname'] : '';
                    $employee->middlename = $data['ed_middlename'] != '' || $data['ed_middlename'] != null ? $data['ed_middlename'] : '';
                    $employee->lastname = $data['ed_lastname'] != '' || $data['ed_lastname'] != null ? $data['ed_lastname'] : '';
                    $employee->extension = $data['ed_extension'] != '' || $data['ed_extension'] != null ? $data['ed_extension'] : '';
                    $employee->gender = $data['ed_gender'] != '' || $data['ed_gender'] != null ? $data['ed_gender'] : '';
                    $employee->birthdate = $data['ed_birthdate'] != '' || $data['ed_birthdate'] != null ? $data['ed_birthdate'] : '';
                    $employee->marital_status = $data['ed_marital_status'] != '' || $data['ed_marital_status'] != null ? $data['ed_marital_status'] : '';
                    $employee->nationality = $data['ed_nationality'] != '' || $data['ed_nationality'] != null ? $data['ed_nationality'] : '';
    
                    // Contact Details
                    $employee->email = $data['ecd_email'] != '' || $data['ecd_email'] != null ? $data['ecd_email'] : '';
                    $employee->mobile_number = $data['ecd_mobile_number'] != '' || $data['ecd_mobile_number'] != null ? $data['ecd_mobile_number'] : '';
                    $employee->telephone_number = $data['ecd_telephone_number'] != '' || $data['ecd_telephone_number'] != null ? $data['ecd_telephone_number'] : '';
                    
                    // Address Details
                    $employee->street = $data['ecd_street'] != '' || $data['ecd_street'] != null ? $data['ecd_street'] : '';
                    $employee->city = $data['ecd_city'] != '' || $data['ecd_city'] != null ? $data['ecd_city'] : '';
                    $employee->state_province = $data['ecd_state_province'] != '' || $data['ecd_state_province'] != null ? $data['ecd_state_province'] : '';
                    $employee->country = $data['ecd_country'] != '' || $data['ecd_country'] != null ? $data['ecd_country'] : '';
                    $employee->zip = $data['ecd_zip'] != '' || $data['ecd_zip'] != null ? $data['ecd_zip'] : '';

                    $employee->employment_details = self::getEmploymentDetails($id);
                    $employee->education_background = self::getEducationBackground($id);
                    $employee->work_experience = self::getWorkExperience($id);
                    $employee->emergency_person = self::getEmergencyContactPerson($id);
                }
                return $employee;
            }
            else {
                // trigger_error('Invalid query: '. $db->error);
                $error;
                $error['status'] = "500";
                $error['message'] = "Code not found!";
                return $error;
            }

            return null;

        }
        catch(Exception $e) {
            // echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }  

    public static function getEmploymentDetails($id) {
        $db = connect();

        try {
            $result = $db->query(Query::getEmploymentDetails($id));
            if($result->num_rows > 0) {

                $employment_details = [];

                while($data = $result->fetch_assoc()) {

                    $details = new EmploymentDetails();
                    $details->code = $data['code'] != '' || $data['code'] != null ? $data['code'] : '';
                    $details->job_title = $data['ej_job_title'] != '' || $data['ej_job_title'] != null ? $data['ej_job_title'] : '';
                    $details->job_category = $data['ej_job_category'] != '' || $data['ej_job_category'] != null ? $data['ej_job_category'] : '';
                    $details->employment_status = $data['ej_employment_status'] != '' || $data['ej_employment_status'] != null ? $data['ej_employment_status'] : '';
                    $details->department = $data['ej_department'] != '' || $data['ej_department'] != null ? $data['ej_department'] : '';
                    $details->supervisor = $data['er_supervisor'] != '' || $data['er_supervisor'] != null ? $data['er_supervisor'] : '';

                    array_push($employment_details, $details);
                }

                return $employment_details;
            }

            return null;
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getEducationBackground($id) {
        $db = connect();

        try {
            $result = $db->query(Query::getEducationBackground($id));
            if($result->num_rows > 0) {
                
                $education_background = [];
                
                while($data = $result->fetch_assoc()) {
                   
                    $info = new EducationBackground();
                    $info->code = $data['code'] != '' || $data['code'] != null ? $data['code'] : '';
                    $info->background_level = $data['background_level'] != '' || $data['background_level'] != null ? $data['background_level'] : '';
                    $info->school_name = $data['school'] != '' || $data['school'] != null ? $data['school'] : '';
                    $info->degree = $data['program'] != '' || $data['program'] != null ? $data['program'] : '';
                    $info->date_start = $data['date_start'] != '' || $data['date_start'] != null ? $data['date_start'] : '';
                    $info->date_end = $data['date_end'] != '' || $data['date_end'] != null ? $data['date_end'] : '';
                    $info->year_graduated = $data['year_graduated'] != '' || $data['year_graduated'] != null ? $data['year_graduated'] : '';
                    $info->honors = $data['honors'] != '' || $data['honors'] != null ? $data['honors'] : '';

                    array_push($education_background, $info);
                }
                return $education_background;
            }
            
            return null;
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getWorkExperience($id) {
        $db = connect();

        try {
            $result = $db->query(Query::getWorkExperience($id));
            if($result->num_rows > 0) {

                $work_experience = [];

                while($data = $result->fetch_assoc()) {
                    
                    $work = new WorkExperience();
                    $work->company = $data['ewe_company'] != '' || $data['ewe_company'] != null ? $data['ewe_company'] : '';
                    $work->position = $data['ewe_position'] != '' || $data['ewe_position'] != null ? $data['ewe_position'] : '';
                    $work->appointment_status = $data['ewe_appointment_status'] != '' || $data['ewe_appointment_status'] != null ? $data['ewe_appointment_status'] : '';
                    $work->date_from = $data['ewe_date_from'] != '' || $data['ewe_date_from'] != null ? $data['ewe_date_from'] : '';
                    $work->date_to = $data['ewe_date_to'] != '' || $data['ewe_date_to'] != null ? $data['ewe_date_to'] : '';

                    array_push($work_experience, $work);
                }
                
                return $work_experience;
            }
            
            return null;
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getEmergencyContactPerson($id) {
        $db = connect();

        try {
            $result = $db->query(Query::getEmergencyContactPerson($id));

            if($result->num_rows > 0) {
                while($data = $result->fetch_assoc()) {
                    $person = new EmergencyContactPerson();
                    $person->code = $data['code'] != '' || $data['code'] != null ? $data['code'] : '';
                    $person->contact_name = $data['eec_contact_name'] != '' || $data['eec_contact_name'] != null ? $data['eec_contact_name'] : '';
                    $person->relationship = $data['eec_relationship'] != '' || $data['eec_relationship'] != null ? $data['eec_relationship'] : '';
                    $person->mobile = $data['eec_mobile'] != '' || $data['eec_mobile'] != null ? $data['eec_mobile'] : '';
                    $person->work_telephone = $data['eec_work_telephone'] != '' || $data['eec_work_telephone'] != null ? $data['eec_work_telephone'] : '';
                    $person->home_telephone = $data['eec_home_telephone'] != '' || $data['eec_home_telephone'] != null ? $data['eec_home_telephone'] : '';

                    return $person;
                }
            }
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    // ------------------------------------------------------------------------------

    public static function getEmployeeCountPerDepartment() {

        $db = connect();

        try {

            $result = $db->query(Query::getEmployeeCountPerDepartment());

            if($result->num_rows > 0) {

                $department_population = [];

                while($data = $result->fetch_assoc()) {
                    $dept = new Demographics();
                    $dept->name = $data[0];
                    $dept->population = $data[1];
                    
                    array_push($department_population, $dept);
                }

                return $department_population;
            }
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getEmployeeCountPerCategory() {
       
        $db = connect();

        try {

            $result = $db->query(Query::getEmployeeCountPerCategory());

            if($result->num_rows > 0) {

                $category_population = [];

                while($data = $result->fetch_assoc()) {
                    $category = new Demographics();
                    $category->name = $data['job_category'];
                    $category->population = $data['job_population'];

                    array_push($category_population, $category);
                }

                return $category_population;
            }
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getEmployeeCountPerGender() {
        
        $db = connect();

        try {

            $records = [];

            $result = $db->query(Query::getEmployeeCountPerGender());

            if($result->num_rows > 0) {

                $gender_population = [];

                while($data = $result->fetch_assoc()) {
                    $gender = new Demographics();
                    $gender->name = $data['gender'];
                    $gender->population = $data['gender_population'];

                    array_push($gender_population, $gender);
                }

                return $gender_population;
            }
        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }

    public static function getJobVacancy() {

        $db = connect();

        try {

            $records = [];

            $result = $db->query(Query::getJobVacancy());
            
            if($result->num_rows > 0) {

                $job_vacancies = [];

                while($data = $result->fetch_assoc()) {
                    $vacancy = new Demographics();
                    $vacancy->name = $data['job_title'];
                    $vacancy->population = $data['total_vacancies'];

                    array_push($job_vacancies, $vacancy);
                }

                return $job_vacancies;
            }

        }
        catch(Exception $e) {
            echo "--> Uncaught exception: ". $e->getMessage() ."<br/>";
        }
        finally {
            $db->close();
        }
    }
}
