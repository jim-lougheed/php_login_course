<?php 

    // If no constant named __CONFIG__ is defined, do not load this file
    if (!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    // Our config is below
    
    // Include the DB.php file
    include_once "../php_login_course/inc/classes/DB.php";

    $con = DB::getConnection();
?>