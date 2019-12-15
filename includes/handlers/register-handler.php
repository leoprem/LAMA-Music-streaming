<?php

function sanitizeFormUserNames($inputText)
{ //Remove html tags and spaces from usernames
    
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","",$inputText);
    
    return $inputText;
    
}

function sanitizeFormString($inputText)
{ //Remove html tags and spaces from string input
    
    $inputText = strip_tags($inputText);
    $inputText = str_replace(" ","",$inputText);
    $inputText = ucfirst(strtolower($inputText)); 
    return $inputText;
    
}

function sanitizeFormPassword($inputText)
{ //Remove html tags and spaces from string input
    
    $inputText = strip_tags($inputText);
    return $inputText;
    
}

if(isset($_POST['regButton']))
{ //regButton pressed
    
    $username        = sanitizeFormUserNames($_POST['username']);
    $firstName       = sanitizeFormString($_POST['firstname']);
    $lastName        = sanitizeFormString($_POST['lastname']);
    $email           = sanitizeFormString($_POST['email']);
    $confirmEmail    = sanitizeFormString($_POST['confirmEmail']);
    $password        = sanitizeFormPassword($_POST['password']);
    $confirmPassword = sanitizeFormPassword($_POST['confirmPassword']);
    
    //register(..) returns true if succesful or false if unsuccesful
    $wasSuccesful = $account->register($username,$firstName,$lastName,$email,$confirmEmail,$password,$confirmPassword);
    
    if($wasSuccesful)
    {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}
?>