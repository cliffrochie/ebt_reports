<?php

function connect() {

    $SERVER = "192.168.1.23";
    $USERNAME = "hrms";
    $PASSWORD = "12345";
    $DB = "hrms";
    
    // $SERVER = "localhost";
    // $USERNAME = "root";
    // $PASSWORD = "";
    // $DB = "hrms";

    try {
        $conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $DB);

        if($conn->connect_error) {
            die("Connection failed: ". $conn->connect_error);
        }

        return $conn;
    }
    catch(Exception $e) {

    }
    
} 

