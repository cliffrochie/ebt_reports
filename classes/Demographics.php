<?php 
include_once(dirname(__FILE__) .'/../db/db.php');

class Demographics {

    public $name;
    public $population;
    
    public static function all($type) {
        switch($type) {
            case 'operating_unit':
                return DB::getEmployeeCountPerOperatingUnit();
            break;
            case 'business_unit':
                return DB::getOperatingUnitCountPerBusinessUnit();
            break;
            case 'category':
                return DB::getEmployeeCountPerCategory();
            break;
            case 'gender':
                return DB::getEmployeeCountPerGender();
            break;
            case 'vacancy':
                return DB::getJobVacancy();
            break;
            
            default:
                return false;
            break;
        }
    }
}

