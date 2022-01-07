<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "C:/xampp/htdocs/php_login_course/inc/config.php"; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Always return JSON format
        header('Content-Type: application/json');
    
        $return = [];
        $array = ['test', 'test2', 'test3', array('firstName' => 'Jim', 'lastName' => 'Lougheed')];
        // Make sure the user does not exist

        // Make sure the user can be added AND is then added

        // Return the proper information back to JavaScript to redirect
        // $return['redirect'] = '/php_login_course/dashboard.php';
        $return['name'] = 'Jim Lougheed';
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        exit('test');
    }
    
    

    
?>