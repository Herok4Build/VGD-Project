<?php
//Thomas Johnson III
// 4-26-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Reference: https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php
//Dr. Lin Chen's notes

session_start();//Starting session
$_SESSION["loggedin"] = false;
$_SESSION = array();//Clears all session variables
session_destroy();//Eliminate the session
header("location: ./video_game_welcome.html");
exit;

?>