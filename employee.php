<?php

require_once(dirname(__FILE__) .'/classes/Employee.php');

if(isset($_GET['code'])) {
    if($_GET['code'] == "none") {
        echo json_encode('{"status":"500",}');
    }
    else {
        // echo "<pre>";
        // print_r(Employee::find($_GET['code']));
        // echo "<pre>";

        echo json_encode(Employee::find($_GET['code']));
    }
}
