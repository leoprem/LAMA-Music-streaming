
<?php

//    session_destroy()
    include("includes/config.php");
    include("includes/classes/Artist.php");
    include("includes/classes/Album.php");
    include("includes/classes/Language.php");
    include("includes/classes/Genre.php");
    include("includes/classes/Song.php");
    include("includes/classes/User.php");
    

    if(isset($_SESSION['userLoggedIn']))
    {
      $userLoggedIn = new User($con,$_SESSION['userLoggedIn']);
      $username = $userLoggedIn->getUsername();
      echo "<script>userLoggedIn = '$username';</script>";
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
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
<!--    FAVICONS START-->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
<!--    FAVICONS END-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>
     <div id="mainContainer">
       
        <div id="topContainer">

<!--        NAVBAR code moved to includes to make index.php clean-->
       
        <!--        NAVIGATION BAR-->
         <?php include("includes/navBarContainer.php"); ?> 
           
        <div id="mainViewContainer">
           
            <div id="mainContent">