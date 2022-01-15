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
htmlHead("Game Catalogue");
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
      <li class="nav-item">
        <a class="nav-link nav_text" href="./home.php">Home <span class="sr-only">(current)</span></a>
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
    
    echo "<div class=\"row\">
    <div class=\"col-md-12 partition_3 center_div\">
    <h1 class=\"text_center\">Presenting Your Gaming Catalogue</h1>
    </div>
    </div>";
    try{
	    $current_user = $_SESSION["username"];
		$stmt = $DBH->prepare('SELECT Username, Games.Game_ID, Game_Name, Date_Added, Notes, Rating, Game_Condition FROM Games, Games_List WHERE Username = :current_user AND Games.Game_ID = Games_List.Game_ID');
		$stmt->bindParam(":current_user",$current_user, PDO::PARAM_STR);
		$stmt->execute();
		//echo "<p class=\"text_center\"> The operation has been ran.</p>";
		echo "<br>";
		echo '<table style="margin-right:auto;margin-left:auto;" bgcolor="#F8F8F8" cellpadding="5px">';
		echo "<tr><th>Game ID</th><th>Game Name</th><th>Date Added</th><th>Notes</th><th>Rating</th><th>Game Condition</th></tr>";
		while($row = $stmt->fetch())
		{
		echo "<tr><td>".$row['Game_ID']."</td> <td>".$row['Game_Name']."</td> <td>".$row['Date_Added']."</td> <td>".$row['Notes']."</td><td>".$row['Rating']."</td><td>".$row['Game_Condition']."</td></tr>";
		}
		echo "</table>";
		$DBH = NULL;
		}
		catch(PDOException $e)
		{
		     echo $e->getMessage();
	    }
	    echo "<br>";
	    echo "<p class=\"text_center\">Add Genre.</p>";
	    echo "<div class=\"row partition_3\">";
	    echo"
	    <div class=\"col-md-1\">
	    </div>
	    <div class=\"col-md-10\">
	    ";
	    addGenreForm();
	    echo "
	    </div>
	    <div class=\"col-md-1\">
	    </div>";
	    echo "</div>";
	    echo "<br>";
	    echo "<h2 class=\"text_center\">Add Systems</h2>";
	    echo "<div class=\"row partition_3\">";
	    addSystemForm();
	    echo "</div>";
	    echo "<br>";
	    echo "<h2 class=\"text_center\">Add Single Player entry</h2>";
	    echo "<div class=\"row partition_3\">";
	    addSinglePlayer();
	    echo "</div>";
	    echo "<br>";
	    echo "<h2 class=\"text_center\">Add Multiplayer entry</h2>";
	    echo "<div class=\"row partition_3\">";
	    addMultiplayer();
	    echo "</div>";
	    echo "<br>";
	    //echo "<button class=\"btn btn-primary form_button_1 center_div\" type=\"submit\">";
	    returnToHome();
	    //echo "</button>";
	    pageBodyEnd();
	    
?>