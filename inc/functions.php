

<?php
// Force the user to be logged in or redirect
function forceLogin() {
    if(isset($_SESSION['user_id'])) {
        // The user is allowed here
        $user_id = $_SESSION['user_id'];
        echo "You are user id: $user_id";
    } else {
        // The user is not allowed here
        header('Location: /php_login_course/login.php'); exit;
    }
}

function forceDashboard() {
    if(isset($_SESSION['user_id'])) {
        // The user is already signed in, redirect to dashboard
        header('Location: /php_login_course/dashboard.php'); exit;
    } else {
        
    }
}

function findUser($con, $email, $return_assoc = false) {
    // Make sure the user does not exist
    $email = $email;
    $findUser = $con->prepare("SELECT user_id, password FROM login_course.users WHERE email = LOWER(:email) LIMIT 1");
    $findUser->bindParam(':email', $email, PDO::PARAM_STR);
    $findUser->execute();

    if ($return_assoc) {
        return $findUser->fetch(PDO::FETCH_ASSOC);
    }
    $user_found = (boolean) $findUser->rowCount();

    return $user_found;
}
?>
