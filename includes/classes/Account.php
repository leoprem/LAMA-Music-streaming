<?php
    class Account
    {
        private $errorArray;
        private $con;
        
        public function __construct($con)
        {
            $this->con = $con;
            $this->errorArray = array();   
        } 
        
        public function login($un,$pw)
        {
            $query = mysqli_query($this->con,"SELECT password FROM users WHERE username = '$un'");
            
            $hashPw = mysqli_fetch_assoc($query);  
            
            if(mysqli_error($this->con)) 
            {
                echo mysqli_error($this->con);
            }
            if(password_verify($pw,$hashPw['password']))
            {
                return true;
            }
            else
            {
                array_push($this->errorArray,Constants::$loginFailed);
                return false;
            }
        }
        
        public function register($un,$fn,$ln,$em,$em2,$pw,$pw2)
        {
             $this->validateUsername($un);
             $this->validateFirstName($fn);
             $this->validateLastName($ln);
             $this->validateEmails($em,$em2);
             $this->validatePasswords($pw,$pw2);
            
            if(empty($this->errorArray)) //Checks if any errors were raised during validation
            {
                //Insert values
                return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
            }
            else
            {
                return false;
            }

        }
        
        public function getError($error)
        {
            if(!in_array($error,$this->errorArray))
            {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }
        
        private function insertUserDetails($un,$fn,$ln,$em,$pw)
        {
            $hashedPw = password_hash($pw,PASSWORD_DEFAULT);
            $profilePic = "assets/images/profile-pic/default.jpg";
            $date = date("Y-m-d");
            $status = 'user';
            
            $result = mysqli_query($this->con,"INSERT INTO users VALUES(NULL,'$un','$fn','$ln','$em','$hashedPw','$date','$status','$profilePic')");
            
            if(mysqli_error($this->con))
            {
                echo mysqli_error($this->con);
            }
            
            return $result;
            
        }
        
        private function validateUsername($un)
        {
            if( strlen($un) > 25 || strlen($un) < 5 ) //Check length of username
            { 
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }
            
            $checkUserNameQuery = mysqli_query($this->con,"SELECT username FROM users where username = '$un'");
            if(mysqli_num_rows($checkUserNameQuery) != 0)
            {
                array_push($this->errorArray,Constants::$usernameTaken);
                return;
            }
            
    
        }

        private function validateFirstName($fn)
        {
            if( strlen($fn) > 25 || strlen($fn) < 2 ) //Check length of username
            { 
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }

        }

        private function validateLastName($ln)
        {
            if( strlen($ln) > 25 || strlen($ln) < 2 ) //Check length of username
            { 
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }

        }

        private function validateEmails($em,$em2)
        {
            if($em != $em2) //checks both emails are identical
            {
                array_push($this->errorArray, Constants::$emailsDoNotMatch);
                return;
            }
            if(!filter_var($em,FILTER_VALIDATE_EMAIL))
            {
                array_push($this->errorArray, Constants::$emailNotValid);
                return;
            }
            $checkEmailQuery = mysqli_query($this->con,"SELECT email FROM users where email = '$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0)
            {
                array_push($this->errorArray,Constants::$emailTaken);
                return;
            }
            

        }

        private function validatePasswords($pw,$pw2)
        {
             if($pw != $pw2) //checks both passwords are identical
            {
                array_push($this->errorArray, Constants::$passwordsDoNotMatch);
                return;
            }
            
            if( strlen($pw) > 30 || strlen($pw) < 5 ) //Check length of password
            { 
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }

        }

        
    }

?>