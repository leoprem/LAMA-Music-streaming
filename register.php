<?php
include("includes/config.php");

include("includes/classes/Account.php");
include("includes/classes/Constants.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function getInputValue($name)
{
    if(isset($_POST[$name]))
    {
        echo $_POST[$name];
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to LAMA music</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Abel|Gloria+Hallelujah&display=swap" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/register.js" type="text/javascript"></script>
    
    <?php
        if(isset($_POST['regButton']))
        {
            echo '<script>
                    $(document).ready(function()
                    { 
                       $("#loginForm").hide();
                       $("#registerForm").show();
                    });
                </script>';
        }
    else
    {
        echo '<script>
                    $(document).ready(function()
                    { 
                       $("#loginForm").show();
                       $("#registerForm").hide();
                    });
                </script>';
        
    }
    ?>
</head>
<body>  
      <div id="background">         
          <div id="loginContainer">
   
         <!--
               ##################################### LOGIN SECTION ########################   
        -->  
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="post" >
                    <h2>Login to your account</h2>
                    <p>
                       <?php echo $account->getError(Constants::$loginFailed) ?>
                       <label for="loginUsername">Username:</label>
                        <input type="text" id="loginUsername" name="loginUsername" placeholder="Enter Username" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password:</label>
                        <input type="password" id="loginPassword" name="loginPassword" placeholder="Enter password" required>
                    </p>
                    <button type="submit" name="loginButton">Log in</button>
                    
                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have an account? Signup here.</span>
                    </div>
                </form>

         <!--

              ############################# REGISTRATION SECTION ###################################### 

        -->
                <form id="registerForm" action="register.php" method="post">
                    <h2>Register your free account</h2>
                    <p>
                       <?php echo $account->getError(Constants::$usernameCharacters) ?>
                       <?php echo $account->getError(Constants::$usernameTaken) ?>
                       <label for="username">Username:</label>
                        <input type="text" id="username" name="username" placeholder="Enter username" value="<?php getInputValue('username') ?>" required>
                    </p>
                    <p>
                       <?php echo $account->getError(Constants::$firstNameCharacters) ?>
                       <label for="firstname">Firstname:</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Enter your firstname" value="<?php getInputValue('firstname') ?>" required>
                    </p>
                    <p>
                      <?php echo $account->getError(Constants::$lastNameCharacters) ?>
                       <label for="lastname">Lastname:</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Enter your lastname" value="<?php getInputValue('lastname') ?>" required>
                    </p>
                    <p>
                      <?php echo $account->getError(Constants::$emailNotValid) ?>
                      <?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
                      <?php echo $account->getError(Constants::$emailTaken) ?>
                       <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php getInputValue('email') ?>" required>
                    </p>
                    <p>

                       <label for="confirmEmail">Confirm Email:</label>
                        <input type="email" id="confirmEmail" name="confirmEmail" placeholder="Enter your email again" value="<?php getInputValue('confirmEmail') ?>" required>
                    </p>

                    <p>
                       <?php echo $account->getError(Constants::$passwordCharacters) ?>
                       <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
                        <label for="regPassword">Password:</label>
                        <input type="password" id="password" name="password" placeholder = "Enter password" required>
                    </p>
                    <p>

                        <label for="regPassword">Confirm password:</label>
                        <input type="password" id="confirmPassword" name="confirmPassword"  placeholder = "Enter password again" required>
                    </p>
                    <button type="submit" name="regButton">Register</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Login here.</span>
                    </div>
                </form>
            </div>
            <div id="loginText">
                 <h1>LAMA Music</h1>
                 <p>Listen to new music for free</p>
            </div>
             
        </div>
    </div>
</body>
</html>