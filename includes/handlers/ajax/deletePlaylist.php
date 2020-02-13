<?php 
    include("../../config.php");
    if(isset($_POST['playlistId']))
    {
        $playlistId = $_POST['playlistId'];
        
        $playlistQuery = mysqli_query($con,"DELETE FROM playlists WHERE id=$playlistId ");
        $playlistSongsQuery = mysqli_query($con,"DELETE FROM playlistsongs WHERE playlistid=$playlistId ");
        
        $error = mysqli_error($con);
        echo "$error";
    }
    else
    {
        echo "PLAYLIST NOT DELETED";
    }
?>