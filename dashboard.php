<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "inc/config.php";     
    
    forceLogin();
    
    $user_id = $_SESSION['user_id'];
    $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
    $getUserInfo->bindParam('user_id', $user_id, PDO::PARAM_INT);
    $getUserInfo->execute();

    if ($getUserInfo->rowCount() == 1) {
        // User is found
        $User = $getUserInfo->fetch(PDO::FETCH_ASSOC);

    } else {
        // User is not signed in
        header('Location: /php_login_course/logout.php'); exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow">
    <title>Dashboard</title>
    <base href='/' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css' />
</head>
<body>

    <div class='uk-section uk-container'>
        <h2>Dashboard</h2>
        <p>Hello, <?php echo $User['email']; ?> This is your dashbord. You are signed in as user <?php echo $user_id?>. You registered at <?php echo $User['reg_time'];?>!
        <p><a href='/php_login_course/logout.php'>Logout</a></p>
    </div>
    
</body>
</html>