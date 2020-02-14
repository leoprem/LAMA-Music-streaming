<?php
     include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['songId']))
    {
        $playlistId = $_POST['playlistId'];
        $songId = $_POST['songId'];
    
//        $orderIdQuery = mysqli_query($con,"SELECT MAX(playlistOrder) + 1 as 'playlistOrder' FROM playlistsongs WHERE playlistid = '$playlistId'");
//        $row = mysqli_fetch_assoc($orderIdQuery);
//        $order = $row['playlistOrder'];
    
    /*cannot return order. Taking id for arranging songs 
    in playlist, change playlist->getSongIds()
    if error is resolved */
    
        $order = 1; //default value since error returning order
        $query = mysqli_query($con,"INSERT INTO playlistsongs VALUES (null,'$songId','$playlistId',$order)");
        $error = mysqli_error($con);
        echo $error;
    }
    else
    {
        echo "PLAYLIST OR SONG ID NOT PASSED";
    }
?>