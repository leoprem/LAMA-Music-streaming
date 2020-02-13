<?php
include("../../config.php");
if(isset($_POST['playlistId']) && isset($_POST['songId']))
    {
        $playlistId = $_POST['playlistId'];
        $songId = $_POST['songId'];
        
        $query = mysqli_query($con,"DELETE FROM playlistsongs WHERE playlistid ='$playlistId' AND songid = '$songId'");
        
        $error = mysqli_error($con);
        echo "$error";
    }
    else
    {
        echo "PLAYLIST NOT REMOVED NOT PASSED ID AJAX REMOVED";
    }
?>