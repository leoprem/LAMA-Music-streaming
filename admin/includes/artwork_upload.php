<?php
        $target_dir = "../assets/images/artwork/";
        $target_file = $target_dir . basename($_FILES["artworkPath"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $file_error = false;
        if (file_exists($target_file)) 
        {
            $_SESSION['failure']= "Sorry, file already exists.";
            $file_error = true;
            header('Location: albums.php');
            exit();
        }   
        // Check file size
        if ($_FILES["artworkPath"]["size"] > 500000) {
            $_SESSION['failure']="Sorry, your file is too large.";
            $file_error = true;
            header('Location: albums.php');
                exit();
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $_SESSION['failure']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $file_error = true;
            header('Location: albums.php');
                exit();
        }
?>