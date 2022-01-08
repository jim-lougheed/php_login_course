<?php 

    // Allow the config
    define('__CONFIG__', true);
    // Require the config
    require_once "inc/config.php"; 

    
    
    forceLogin();
    
    
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
        This is your dashbord. You are signed in as user <?php echo $_SESSION['user_id']?>!
    </div>
    
</body>
</html>