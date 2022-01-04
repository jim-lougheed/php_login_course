<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "inc/config.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="follow">
    <title>Document</title>
    <base href='/' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css' />
</head>
<body>

<?php 

    echo "Hello world! Today is: ";
    echo date("Y m d"); 
?>

<p>
    <a href="./php_login_course/login.php">Login</a>
    <a href="./php_login_course/register.php">Register</a>
</p>

<?php require_once "inc/footer.php"; ?>

    
</body>
</html>