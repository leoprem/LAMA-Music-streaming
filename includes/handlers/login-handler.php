<?php

if(isset($_POST['loginButton']))
{ //loginButton pressed
    
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    
    $result = $account->login($username,$password);
    
    if($result)
    {
        $_SESSION['userLoggedIn'] = $username;
        header("Location:index.php");
    }
    
}

?>