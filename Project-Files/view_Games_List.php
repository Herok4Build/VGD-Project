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
htmlHead("View Game Genres");
session_start();
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: ./video_game_welcome.html.php");
        exit;
    }
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
        <a class="nav-link nav_text active" href="./view_Games_List.php">View All games</a>
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
		$stmt = $DBH->prepare('SELECT Game_ID, Game_Name, Release_Date, Description FROM Games_List');
		$stmt->execute();
		//echo "<p style = \"text-align: center;\">Query...</p>";
		echo "<br>";
		echo '<table style="margin-right:auto;margin-left:auto;" border = "2" bgcolor="#F8F8F8" cellpadding="5px">';
		echo "<tr><th>Game ID</th><th>Game Name</th><th>Release Date</th><th>Description</th></tr>";
		while($row = $stmt->fetch())
		{
		echo "<tr><td>".$row['Game_ID']."</td> <td>".$row['Game_Name']."</td> <td>".$row['Release_Date']."</td> <td>".$row['Description']."</td></tr>";
		}
		echo "</table>";
		$DBH = NULL;
		}
	catch(PDOException $e)
		{
		     echo $e->getMessage();
	    }
	    echo '<br>';
	addToCatalogue();
	echo "<h2 class=\"text_center\">Add Genre</h2>";
	echo "<div class=\"row partition_3\">";
	addGenreForm();
	echo "</div>";
	echo "<br>";
	echo "<h2 class=\"text_center\">Add System</h2>";
	echo "<div class=\"row partition_3\">";
	addSystemForm();
	echo "</div>";
	echo "<br>";
	pageBodyEnd();
?>