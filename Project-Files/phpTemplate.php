<?php
//Thomas Johnson III
// 4-27-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_functions.htm
//Reference: https://medium.com/@ray.gomez/boostrap4-difference-between-container-and-container-fluid-17a48d7e0eb
    function returnToHome()
    {
        echo "<button class=\"btn btn-primary form_button_1 center_div\" type=\"submit\"><a href=\"./home.php\">Return to Home.</a></button>";
    }
    
    function htmlHead($title)
    {
        echo'<!DOCTYPE html>
             <head>
             <link rel="stylesheet" href="./bootstrap_4/css/bootstrap.min.css">
             <script src="./bootstrap_4/css/bootstrap.min.js"></script>
             <link rel="stylesheet" href="./CSS/css_style_1.css">
             </head>
             <title>'.$title.'</title>
             ';
    }
    
    function addToCatalogue()
    {
        echo '
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
         <br>';
    }
    
    function viewAllGenres()
    {
        echo "<button class=\"btn btn-primary form_button_1 center_div\" type=\"submit\"><a href=\"./view_Game_Genres.php\">View Genres of All Games.</a></button>";
    }
    
    function viewAllGames()
    {
        echo "<button class=\"btn btn-primary form_button_1 center_div\" type=\"submit\"><a href=\"./view_Games_List.php\">View All Games.</a></button>";
    }
    
    function pageBodyStart()
    {
        echo'
        <body>
        <div class="continer-fluid">
        <div class="container">
        ';
    }
    
    function pageBodyEnd()
    {
        echo'
        <br><br>
        </div>
        </div>
        </body>
        </html>';
    }
    
    function addGenreForm()
    {
        echo '
        <form class="form_input_2" action = "add_Genre.php" method = "post">
        Video game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        Genre to Add: <input class= "form_input_1" type="text" name="videogame_genre" placeholder= "Enter Genre...">
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>';
    }
    
    function addSystemForm()
    {
        echo '
        <form class="form_input_2" action = "add_System.php" method = "post">
        Video game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        System to Add: <input class= "form_input_1" type="text" name="videogame_system" placeholder= "Enter System...">
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>';
    }
    
    function addSinglePlayer()
    {
        echo '
        <form class="form_input_2" action = "add_Single_Player.php" method = "post">
        Video game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        Game Conditon: <br>
                       <input class= "form_input_1" type="radio" name="single_player" value = "Yes"> Yes <br>
                       <input class= "form_input_1" type="radio" name="single_player" value = "No"> No <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>';
    }
    
    function addMultiplayer()
    {
        echo '
        <form class="form_input_2" action = "add_Multiplayer.php" method = "post">
        Video game ID: <input class= "form_input_1" type="text" name="videogame_id" placeholder= "Enter Video Game ID...">
        <br>
        Game Conditon: <br>
                       <input class= "form_input_1" type="radio" name="multiplayer" value = "Yes"> Yes <br>
                       <input class= "form_input_1" type="radio" name="multiplayer" value = "No"> No <br>
        <br>
        <button class="btn btn-primary form_button_1 center_div" type="submit">Submit Entry</button>
         </form>';
    }
    
    function logoutButton()
    {
        echo "<button class=\"btn btn-primary form_button_1 center_div\"><a href=\"./logout_action.php\">Logout</a></button>";
    }
    
?>