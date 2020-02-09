
<?php

//    session_destroy()
    include("includes/config.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");

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
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
     <div id="mainContainer">
       
        <div id="topContainer">

<!--        NAVBAR code moved to includes to make index.php clean-->
       
        <!--        NAVIGATION BAR-->
         <?php include("includes/navBarContainer.php"); ?> 
           
        <div id="mainViewContainer">
           
            <div id="mainContent">