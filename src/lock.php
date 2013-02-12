<?php
	$host = "localhost"; 
	$user = "shipra";
	$pass = "teamwork"; 
	$db= "my_db";
	$bd=mysql_connect($host,$user,$pass) or die("Something went wrong.");
	mysql_select_db($db,$bd) or die("Something went wrong.");
	//include('config.php');
	session_start();
	$user_check=$_SESSION['login_user'];
	$ses_sql=mysql_query("select username from users where username='". $user_check . "' ");
	$row=mysql_fetch_array($ses_sql);
	$login_session=$row['username'];
	//echo $login_session;
	if(!isset($login_session)){
		header("Location: login.php");
	}
?>