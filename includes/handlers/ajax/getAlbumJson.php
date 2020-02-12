<?php
     include("../../config.php");
        
    if(isset($_POST['albumId']))
    {
        $albumId = $_POST['albumId'];
        $query = mysqli_query($con,"SELECT * FROM album WHERE id = '$albumId' ");
        
        $result = mysqli_fetch_assoc($query);
        $result['artworkPath'] = ART_PATH.$result['artworkPath'];
        echo json_encode($result);
    }

?>