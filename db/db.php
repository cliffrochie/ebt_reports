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


    // For employees
    // ------------------------------------------------------------------------------
    
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
                    $employee->code                 = self::checkValue($data['code']);
                    $employee->name                 = self::checkValue($data['name']);
                    $employee->firstname            = self::checkValue($data['ed_firstname']);
                    $employee->middlename           = self::checkValue($data['ed_middlename']);
                    $employee->lastname             = self::checkValue($data['ed_lastname']);
                    $employee->extension            = self::checkValue($data['ed_extension']);
                    $employee->gender               = self::checkValue($data['ed_gender']);
                    $employee->birthdate            = self::checkValue($data['ed_birthdate']);
                    $employee->marital_status       = self::checkValue($data['ed_marital_status']);
                    $employee->nationality          = self::checkValue($data['ed_nationality']);
    
                    // Contact Details
                    $employee->email                = self::checkValue($data['ecd_email']);
                    $employee->mobile_number        = self::checkValue($data['ecd_mobile_number']);
                    $employee->telephone_number     = self::checkValue($data['ecd_telephone_number']);
                    
                    // Address Details
                    $employee->street               = self::checkValue($data['ecd_street'] );
                    $employee->city                 = self::checkValue($data['ecd_city']);
                    $employee->state_province       = self::checkValue($data['ecd_state_province']);
                    $employee->country              = self::checkValue($data['ecd_country']);
                    $employee->zip                  = self::checkValue($data['ecd_zip']);

                    $employee->employment_details   = self::getEmploymentDetails($id);
                    $employee->education_background = self::getEducationBackground($id);
                    $employee->work_experience      = self::getWorkExperience($id);
                    $employee->emergency_person     = self::getEmergencyContactPerson($id);
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

                    $details                    = new EmploymentDetails();
                    $details->code              = self::checkValue($data['code']);
                    $details->job_title         = self::checkValue($data['ej_job_title']);
                    $details->job_category      = self::checkValue($data['ej_job_category']);
                    $details->employment_status = self::checkValue($data['ej_employment_status']);
                    $details->operating_unit    = self::checkValue($data['su_operating_unit']);
                    $details->business_unit     = self::checkValue($data['su_business_unit']);
                    $details->supervisor        = self::checkValue($data['es_supervisor']);

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
                    $info->code             = self::checkValue($data['code']);
                    $info->background_level = self::checkValue($data['background_level']);
                    $info->school_name      = self::checkValue($data['school']);
                    $info->degree           = self::checkValue($data['program']);
                    $info->date_start       = self::checkValue($data['date_start']);
                    $info->date_end         = self::checkValue($data['date_end']);
                    $info->year_graduated   = self::checkValue($data['year_graduated']);
                    $info->honors           = self::checkValue($data['honors']);

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
                    
                    $work                       = new WorkExperience();
                    $work->company              = self::checkValue($data['ewe_company']);
                    $work->position             = self::checkValue($data['ewe_position']);
                    $work->appointment_status   = self::checkValue($data['ewe_appointment_status']);
                    $work->date_from            = self::checkValue($data['ewe_date_from']);
                    $work->date_to              = self::checkValue($data['ewe_date_to']);

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
                    
                    $person                     = new EmergencyContactPerson();
                    $person->code               = self::checkValue($data['code']);
                    $person->contact_name       = self::checkValue($data['eec_contact_name']);
                    $person->relationship       = self::checkValue($data['eec_relationship']);
                    $person->mobile             = self::checkValue($data['eec_mobile']);
                    $person->work_telephone     = self::checkValue( $data['eec_work_telephone']);
                    $person->home_telephone     = self::checkValue($data['eec_home_telephone']);

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


    // For demographics
    // ------------------------------------------------------------------------------

    public static function getEmployeeCountPerDepartment() {

        $db = connect();

        try {

            $result = $db->query(Query::getEmployeeCountPerDepartment());

            if($result->num_rows > 0) {

                $department_population = [];

                while($data = $result->fetch_assoc()) {
                    $dept               = new Demographics();
                    $dept->name         = $data[0];
                    $dept->population   = $data[1];
                    
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
                    $category               = new Demographics();
                    $category->name         = $data['job_category'];
                    $category->population   = $data['job_population'];

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
                    $gender                 = new Demographics();
                    $gender->name           = $data['gender'];
                    $gender->population     = $data['gender_population'];

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
                    $vacancy                = new Demographics();
                    $vacancy->name          = $data['job_title'];
                    $vacancy->population    = $data['total_vacancies'];

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

