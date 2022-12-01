<?php
//database_connection.php

	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "plant";
	
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	// $connect = new PDO('
	// 	mysql:host=localhost;dbname=visionquest', 'root', '');
	// session_start();
?>