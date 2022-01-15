<?php
//Thomas Johnson III
// 4-26-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//Dr. Lin Chen's notes
//Reference: https://stackoverflow.com/questions/4544051/sqlstate42000-syntax-error-or-access-violation-1064-you-have-an-error-in-you
//Reference: https://www.taniarascia.com/overview-of-sql-commands-and-pdo-operations/
//Reference:https://www.w3schools.com/php/php_mysql_insert.asp
//Reference: https://www.sitepoint.com/community/t/why-do-i-keep-getting-this-sqlstate-42000-error/6626/3
    session_start();
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: ./video_game_welcome.html.php");
        exit;
    }
    include("phpconfiguration.php");// For accessing the database
    include("phpTemplate.php");//For PHP functions
    htmlHead("Add a Game to Games List");
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
    
    try{
	    $videogame_id = $_POST["videogame_id"];
	    $videogame_name = $_POST["videogame_name"];
	    $release_date = $_POST["release_date"];
	    $description = $_POST["description"];
		$stmt = $DBH->prepare('INSERT INTO Video_Game_Inventory.Games_List (Game_ID,Game_Name,Release_Date,Description) VALUES (:videogame_id, :videogame_name, :release_date, :description)');
		$stmt->bindParam(":videogame_id",$videogame_id, PDO::PARAM_INT);
		$stmt->bindParam(":videogame_name",$videogame_name, PDO::PARAM_STR);
		$stmt->bindParam(":release_date",$release_date, PDO::PARAM_STR);
		$stmt->bindParam(":description",$description, PDO::PARAM_STR);
		$stmt->execute();
		$stmt_2 = $DBH->prepare('SELECT * FROM Games_List');
		echo "<p> The operation has been ran.</p>";
		echo "<p style = \"text-align: center;\">Query...</p>";
		echo "<br>";
		echo '<table style="margin-right:auto;margin-left:auto;" border = "2" bgcolor="#F8F8F8" cellpadding="5px">';
		echo "<tr><th>game ID</th><th>Game Name</th><th>Release Date</th><th>Description</th></tr>";
		$stmt_2->execute();
		while($row = $stmt_2->fetch())
		{
		    echo "<tr><td>".$row['Game_ID']."</td> <td>".$row['Game_Name']."</td> <td>".$row['Release_Date']."</td> <td>".$row['Description']."</td></tr>";
		}
		echo "</table>";
		$DBH = NULL;
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	returnToHome();
	pageBodyEnd();
?>