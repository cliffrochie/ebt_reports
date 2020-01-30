<?php
include(dirname(__FILE__) .'/../db/db.php');



class EmploymentDetails {
    // Employee Details
    public $code;
    public $company;
    public $branch;
    public $job_title;
    public $job_category;
    public $employment_status;
    public $department;
    public $supervisor;
}



class EducationBackground {
    // Education Details
    public $code;
    public $background_level;
    public $school_name;
    public $degree;
    public $date_start;
    public $date_end;
    public $year_graudated;
    public $honors;
}


class WorkExperience {
    public $company;
    public $position;
    public $appointment_status;
    public $date_from;
    public $date_to;
}


class EmergencyContactPerson {
    public $code;
    public $contact_name;
    public $relationship;
    public $mobile;
    public $work_telephone;
    public $home_telephone;
}


class Employee {

    public $status;
    public $message;

    // Basic Information
    public $name;
    public $firstname;
    public $middlename;
    public $lastname;
    public $extension;

    public $gender;
    public $birthdate;
    public $marital_status;
    public $nationality;

    // Contact Details
    public $email;
    public $mobile_number;
    public $telephone_number;

    // Address Details
    public $street;
    public $city;
    public $state_province;
    public $country;
    public $zip;

    // Employment Details
    public $employment_details;

    // Education Background
    public $education_background;

    // Work Experience
    public $work_experience;

    // Emergency Contact Person
    public $emergency_person;

    // Methods
    public static function all() {
        return DB::getEmployees();
    }

    public static function find($id) {
        return DB::getEmployeeDetails($id);
    }

    public static function test($id) {
        return DB::getEmergencyContactPerson($id);
    }
}




