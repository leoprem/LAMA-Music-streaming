<?php
    include("../../config.php");
    
    if(isset($_POST['songId']))
    {
        $songId = $_POST['songId'];
        $query = mysqli_query($con,"SELECT * FROM songs WHERE id = '$songId' ");
        
        $result = mysqli_fetch_assoc($query);
        
        echo json_encode($result);
    }

?>