<?php 

    // If no constant named __CONFIG__ is defined, do not load this file
    if (!defined('__CONFIG__')) {
        exit('You do not have a config file');
    }

    // Sessions are always on
    if (!isset($_SESSION)) {
        session_start();
    }

    // Our config is below
    // Allow errors
    error_reporting(-1);
    ini_set('display_errors', 'On');
    
    // Include the DB.php file
    include_once "C:/xampp/htdocs/php_login_course/inc/classes/DB.php";
    include_once "C:/xampp/htdocs/php_login_course/inc/classes/Filter.php";
    include_once "C:/xampp/htdocs/php_login_course/inc/classes/User.php";
    include_once "C:/xampp/htdocs/php_login_course/inc/classes/Page.php";

    $con = DB::getConnection();
?>