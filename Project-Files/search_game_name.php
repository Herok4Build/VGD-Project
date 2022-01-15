<?php
//Thomas Johnson III
// 4-26-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//Dr. Lin Chen's notes
//Reference: https://stackoverflow.com/questions/4544051/sqlstate42000-syntax-error-or-access-violation-1064-you-have-an-error-in-you
//Reference: https://www.w3schools.com/html/tryit.asp?filename=tryhtml_input_range
    session_start();
    include("phpTemplate.php");//For PHP functions
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: ./video_game_welcome.html.php");
        exit;
    }
    include("phpconfiguration.php");// For accessing the database
    htmlHead("Search For Game");
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
	    $videogame_name = $_POST["videogame_name"];
	    echo $videogame_name;
		$stmt = $DBH->prepare('SELECT Game_ID, Game_Name, Release_Date, Description FROM Games_List WHERE Game_Name LIKE "%":videogame_name"%"');
		$stmt->bindParam(":videogame_name",$videogame_name, PDO::PARAM_STR);
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
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	$current_user = $_SESSION["username"];
	echo "<p> Add game? </p>";
	echo'
	<p>For date input in the format yyyy-mm-dd.</p>
	    <form class="form_input_1" action = "add_game_to_catalogue_action.php" method = "post">
        Username: <input class= "form_input_1" type="text" name="current_user" value ="'.$current_user.'">
        <br>
        Video game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        Date Added: <input class= "form_input_1" type="date" name="date_added" placeholder= "Enter Date...">
        <br>
        Notes: <input class= "form_input_1" type="text" name="user_notes" placeholder= "Enter Your Notes...">
        <br>
        Video Game Rating: <input class= "form_input_1" type="text" name="rating" placeholder= "Enter Your Rating for the Game...">
        <br>
        Game Conditon: <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Mint" value = "Mint"> Mint <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Excellent" value = "Excellent"> Excellent <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Good" value = "Good"> Good <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Okay" value = "Okay"> Okay <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Ragged" value = "Ragged"> Ragged <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Terrible" value = "Terrible"> Terrible <br>
                       <input class= "form_input_1" type="radio" name="videogame_condition" label= "Destroyed" value = "Destroyed"> Destroyed <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>
	';
	
	$DBH = NULL;
	pageBodyEnd();
	
?>