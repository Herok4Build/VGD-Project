<?php

    session_start();
    
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: ./video_game_welcome.html.php");
        exit;
    }
    //Thomas Hilton Johnson III
    //Database and Intelligent Systems
    //Reference:https://www.php.net/manual/en/function.password-verify.php
    //Reference:https://stackoverflow.com/questions/16657968/php-get-username-from-session
    //Reference:https://getbootstrap.com/docs/4.0/components/navbar/
    //Reference: https://getbootstrap.com/docs/4.0/components/buttons/
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="./bootstrap_4/css/bootstrap.min.css">
    <script src="./bootstrap_4/css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./CSS/css_style_1.css">
</head>
<title> Homepage </title>
<body>
<div class="continer-fluid">
    <div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class = "col-md-6">
        <h1 class="text_center"> Logged In! </h1>
        <p class="text_center"> You are logged in, please feel free to use the inventory system to keep track of your games.</p>
        </div>
        <div class="col-md-3">
        <p>Username: <?php echo $_SESSION["username"]; ?></p>
        </div>
    </div>
    
    <nav class="navbar nav_border navbar-expand-lg navbar-light nav_background">
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
    </nav>
    
    <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
    <button class="btn btn-primary form_button_1 center_div"><a href="./view_game_catalogue.php"> View Your Game Catalogue.</a></button>
    <button class="btn btn-primary form_button_1 center_div"><a href="./view_Game_Genres.php"> View Game Genres.</a></button>
    <button class="btn btn-primary form_button_1 center_div"><a href="./view_Game_Systems.php"> View Game Systems.</a></button>
    </div>
    <div class="col-md-2">
    </div>
    </div>
        
        <h2 class="text_center">Search For Game In Game Database</h2>
        <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-11 partition_2">
            <form class="form_input_2" action = "./search_game_name.php" method = "post">
             Name of Game: <input class= "form_input_2" type="text" name="videogame_name" placeholder= "Enter Game Name...">
            <br>
            <br>
            <button class="btn btn-primary form_button_1 center_div" type="submit">Search Game Name</button>
            </form>
            </div>
            <div class="col-md-1">
            </div>
            <br>
            <div class= "center_div">
            <p> Form to add games to your catalogue (Recommend that you search the game first to see if it is in the system).</p>
            </div>
         </div>
         <br>
         
         <h2 class="text_center">Enter a New Game Into the Database</h2>
         <div class="row">
         <div class="col-md-1">
        </div>
        <div class="col-md-11 partition_2">
         <form class="form_input_2" action = "add_Game_Games_List.php" method = "post">
        Video Game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder="Enter a number for the video game id...">
        <br>
        Video Game Name:<input class= "form_input_1" type="text" name="videogame_name" placeholder="Input Video Game Name...">
        <br>
        Release Date:<input class= "form_input_1" type="text" name="release_date" placeholder="Enter release date...">
        <br>
        Description:<input class= "form_input_1" type="text" name="description" placeholder="Enter description for games...">
        <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>
         </div>
         <div class="col-md-1">
         </div>
         </div>
         
         <h2 class="text_center">Add a Game Into Personal Catalogue</h2>
         <div class="row">
         <div class="col-md-1">
         </div>
         <div class="col-md-11 partition_2">
         <form class="form_input_2" action = "add_game_to_catalogue_action.php" method = "post">
        Video game ID: <input class= "form_input_2" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        Date Added: <input class= "form_input_2" type="date" name="date_added" placeholder= "Enter Date...">
        <br>
        Notes: <input class= "form_input_2" type="text" name="user_notes" placeholder= "Enter Your Notes...">
        <br>
        Video Game Rating: <input class= "form_input_2" type="text" name="rating" placeholder= "Enter Your Rating for the Game...">
        <br>
        Game Conditon: <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Mint"> Mint <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Excellent"> Excellent <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Good"> Good <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Okay"> Okay <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Ragged"> Ragged <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Terrible"> Terrible <br>
                       <input class= "form_input_2" type="radio" name="videogame_condition" value = "Destroyed"> Destroyed <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>
         </div>
         <div class="col-md-1">
         </div>
         </div>
         <br>
         
         <h2 class="text_center">Delete Game from Catalogue</h2>
         <div class="row">
         <div class="col-md-1">
        </div>
        <div class="col-md-11 partition_2">
         <form class="form_input_2" action = "delete_game_from_catalogue_action.php" method = "post">
        Video game ID: <input class= "form_input_1" type="text" name="submitted_videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>
         </div>
         <div class="col-md-1">
         </div>
         </div>
         
         <h2 class="text_center">Add Your Contact Infromation</h2>
         <div class="row">
         <div class="col-md-1">
        </div>
        <div class="col-md-11 partition_2">
         <form class="form_input_2" action = "add_contact.php" method = "post">
        Username: <input class= "form_input_1" type="text" name="username" value=<?php echo $_SESSION["username"] ?>>
        <br>
        Email:<input class= "form_input_1" type="text" name="email" placeholder="Input your Email...">
        <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>
         </div>
         <div class="col-md-1">
         </div>
         </div>
         <br>
         
    </div>
    </div>
</body>
</html>