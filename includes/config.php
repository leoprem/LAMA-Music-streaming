<?php

    ob_start();
    session_start();
    
    $time_zone = date_default_timezone_set("Asia/Kolkata");

    define('ART_PATH', 'assets/images/artwork/');
    define('SONG_PATH', 'assets/music/');
    
    $con = mysqli_connect("localhost","root","","lama");
    
    if(mysqli_connect_errno())
    {
        echo "Failed to connect " + mysqli_connect_errno();
    }
?>