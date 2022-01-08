<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "C:/xampp/htdocs/php_login_course/inc/config.php"; 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Always return JSON format
        // header('Content-Type: application/json');
    
        $return = [];
        // $array = ['test', 'test2', 'test3', array('firstName' => 'Jim', 'lastName' => 'Lougheed')];
        $email = Filter::String($_POST['email']);
        // Make sure the user does not exist
        $findUser = $con->prepare("SELECT user_id FROM login_course.users WHERE email = LOWER(:email) LIMIT 1");
        $findUser->bindParam(':email', $email, PDO::PARAM_STR);
        $findUser->execute();

        if ($findUser->rowCount() == 1) {
            // User exists
            $return['error'] = 'You already have an account';
            $return['is_logged_in'] = false;
        } else {
            // User does not exist. Add them now
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $addUser = $con->prepare("INSERT INTO login_course.users(email, password) VALUES(LOWER(:email), :password)");
            $addUser->bindParam(':email', $email, PDO::PARAM_STR);
            $addUser->bindParam(':password', $password, PDO::PARAM_STR);
            $addUser->execute();

            $user_id = $con->lastInsertId();

            $_SESSION['user_id'] = (int) $user_id;
            
            $return['redirect'] = '/php_login_course/dashboard.php?message=welcome';
            $return['is_logged_in'] = true;
        }

        // Make sure the user can be added AND is then added

        // Return the proper information back to JavaScript to redirect
        
        // $return['name'] = 'Jim Lougheed';
        echo json_encode($return, JSON_PRETTY_PRINT); exit;
    } else {
        exit('test');
    }
    
    

    
?>