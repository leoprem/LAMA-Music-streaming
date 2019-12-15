
<?php

//    session_destroy()
    include("includes/config.php");

    if(isset($_SESSION['userLoggedIn']))
    {
        $userLoggedIn = $_SESSION['userLoggedIn'];
    }
    else
    {
        header("Location:register.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LAMA-music</title>
</head>
<body>
   hello <?php echo $userLoggedIn; ?>
    
</body>
</html>