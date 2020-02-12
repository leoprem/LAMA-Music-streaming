<?php
        $target_dir = "../assets/music/";
        $target_file = $target_dir . basename($_FILES["path"]["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $file_error = false;
        if (file_exists($target_file)) 
        {
            $_SESSION['failure']= "Song already exists.";
            $file_error = true;
            header('Location: songs.php');
            exit();
        }   
        // Check file size
        if ($_FILES["path"]["size"] > 10000000) {
            $_SESSION['failure']="Sorry, your file is too large.";
            $file_error = true;
            header('Location: songs.php');
                exit();
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "mp3" && $imageFileType != "wav" ) {
            $_SESSION['failure']= "Sorry, only MP3 & WAV files are allowed.";
            $file_error = true;
            header('Location: songs.php');
                exit();
        }
?>