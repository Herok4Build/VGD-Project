<?php
//Thomas Johnson III
// 4-26-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//Reference: https://www.php.net/manual/en/function.password-verify.php
//Dr. Lin Chen's notes
    
    session_start();
    try
    {
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)// Make sure the user is not already logged in
        {
            header('location: ./home.php');
            exit;
        }
        include("phpconfiguration.php");// For accessing the database
        //Set the variables to an empty string.
        $loginusername = "";
        $loginpassword = "";
        $loginusername_error = "";
        $loginpassword_error = "";
        
        
        
        if($_SERVER["REQUEST_METHOD"] == "POST")//Post method from HTML Server
        {
            $loginusername = trim($_POST["username"]);
            $loginpassword = trim($_POST["password"]);
            
            
            if(empty($loginusername_error) && empty($loginpassword_error))//Make sure that the credentials are not empty
            {
		        $stmt = $DBH->prepare('SELECT Username, Password From User WHERE Username = :loginusername');
		        $stmt->bindParam(":loginusername",$loginusername, PDO::PARAM_STR);
		        
		        if($stmt->execute())
		        {
		        echo "Here1";
		            if($stmt->rowCount() == 1)
		            {
		            echo "Here";
		                if($row = $stmt ->fetch())
		                {
		                    
		                    $loginusername = $row["Username"];
		                    $loginpassword_check = $row["Password"];
		                    echo "2Here \n";
		                    echo $loginpassword." ".$loginpassword_check;
		                    if($loginpassword ==$loginpassword_check)
		                    {
		                        echo "Here";
		                        session_start();
		                        
		                        $_SESSION["loggedin"] = true;
                                $_SESSION["username"] = $loginusername;
                                
                                header("location: ./home.php");
		                    }
		                }
		                else
		                {
		                    $loginpassword_error = "The password was incorrect.";
		                }
		                
		            }
		            else 
		            {
		                 $loginusername_error = "The username submitted has not been located";
		                 echo $loginusername_error;
		            }
		        }
		        else
		        {
		            echo "Error!";
		        }
		        unset($stmt);
		    }
		    $DBH = NULL;
		}
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>