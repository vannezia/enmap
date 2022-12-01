
<?php
	include('config.php');
	session_start();

	$user_check = $_SESSION['login_user'];
	$ses_sql = mysqli_query($db, "SELECT username,user_id,picture,usertype FROM user WHERE username = '$user_check'");
	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
	$login_session = $row['username'];
	$userpic = $row['picture'];
    $user_id = $row['user_id'];
    $usertype = $row['usertype'];
  
	

	if(!isset($_SESSION['login_user'])){
		header("location:login.php");
		die();
	}
?>