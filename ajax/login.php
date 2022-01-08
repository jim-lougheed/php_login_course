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
        // Make sure the user does not exist
        $findUser = $con->prepare("SELECT user_id, password FROM login_course.users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if ($findUser->rowCount() == 1) {
            // User exists, try and sign them in
            $User = $findUser->fetch(PDO::FETCH_ASSOC);
            
            $user_id = (int) $User['user_id'];
            $hash = (string) $User['password'];
            
            if (password_verify($password, $hash)) {
                // User is signed in
                $return['redirect'] = '/php_login_course/dashboard.php';
                $_SESSION['user_id'] = $user_id;
            } else {
                // Invalid user email/password combo
                $return['error'] = 'Invalid user email/password combination';
            }

            $return['error'] = 'You already have an account';
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