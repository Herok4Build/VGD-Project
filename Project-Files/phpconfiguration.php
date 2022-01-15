<?php
//Thomas Johnson III
// 4-26-2019
// Database and Intelligent Systems
// Dr. Lin Chen
//Reference: https://www.tutorialspoint.com/php/php_mysql_login.htm
//Dr. Lin Chen's notes
     try
     {
         $hostname = 'localhost';
	     $dbname = 'Video_Game_Inventory';
	     $username = 'root';//change to username of user
	     $password = 'LockOwt445!';//Change to password of user
	     $DBH = new PDO("mysql:host=$hostname; dbname=$dbname; charset=utf8mb4", $username, $password);
	     $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	     $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
	 catch(PDOException $e)
	 {
	     echo $e->getMessage();
	 }
	 
?>