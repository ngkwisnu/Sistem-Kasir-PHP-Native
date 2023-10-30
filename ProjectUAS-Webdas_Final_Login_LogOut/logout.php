<?php 
	
	include 'database.php';
	session_start();
	session_destroy();
	header("location:../ProjectUAS-Webdas_Final_Login_LogOut/login.php");
 ?>