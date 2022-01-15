<?php
//Thomas Johnson III
// 4-27-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//Reference:https://www.w3schools.com/php/php_mysql_delete.asp
//Dr. Lin Chen's notes
include("phpTemplate.php");//For PHP functions
htmlHead("Add User");
session_start();
    
    //if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    //{
      //  header("location: ./video_game_welcome.html.php");
      //  exit;
    //}
    include("phpconfiguration.php");// For accessing the database
    pageBodyStart();
    
    echo '<nav class="navbar nav_border navbar-expand-lg navbar-light nav_background">
  <a class="navbar-brand" href="./view_game_catalogue.php">Your Catalogue</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="./home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav_text" href="./view_Games_List.php">View All games</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav_text" href="./view_Game_Genres.php">View Game Genres</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav_text" href="./view_Game_Systems.php">View Game Systems</a>
      </li>
      <li class="nav-item">
      <a class="nav-link nav_text" href="./view_Contact_Info.php">Contact Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="video_game_welcome.html">Sign In</a>
      </li>
      <li class="nav-item">
      <a class="nav-link nav_text" href="./logout_action.php">Logout</a>
      </li>
    </ul>
  </div>
    </nav>';
    
    try{
	    $signup_username = $_POST["username"];
	    $user_password = $_POST["password"];
	    $start_date = $_POST["date_joined"];
		$stmt = $DBH->prepare('INSERT INTO Video_Game_Inventory.User (Username, Password,Start_Date) VALUES (:username,:password,:date_joined)');
		$stmt->bindParam(":username",$signup_username, PDO::PARAM_STR);
		$stmt->bindParam(":password",$user_password, PDO::PARAM_STR);
		$stmt->bindParam(":date_joined",$start_date, PDO::PARAM_STR);
		$stmt->execute();
		$DBH = NULL;
		}
	catch(PDOException $e)
		{
		     echo $e->getMessage();
	    }
	pageBodyEnd();
	header("location: ./video_game_welcome.html");
?>