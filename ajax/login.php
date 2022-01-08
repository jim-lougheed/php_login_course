<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "C:/xampp/htdocs/php_login_course/inc/config.php"; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Always return JSON format
        // header('Content-Type: application/json');
    
        $return = [];
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user_found = findUser($con, $email, true);

        if ($user_found) {
            // User exists, try and sign them in
            $user_id = (int) $user_found['user_id'];
            $hash = (string) $user_found['password'];
            
            if (password_verify($password, $hash)) {
                // User is signed in
                $return['redirect'] = '/php_login_course/dashboard.php';
                $_SESSION['user_id'] = $user_id;
            } else {
                // Invalid user email/password combo
                $return['error'] = 'Invalid user email/password combination';
            }

        } else {
            // They need to create a new account
            $return['error'] = 'You do not have an account. <a href="/php_login_course/register.php">Create one now</a>';
        }

        // Make sure the user can be added AND is then added

        // Return the proper information back to JavaScript to redirect
        
        // $return['name'] = 'Jim Lougheed';
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        exit('test');
    }
    
    

    
?>