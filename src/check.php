<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>INSTITUTE</title>
</head>

<?php include 'commonHeader.php'; ?>

<?php
	$host = "localhost"; 
	$user = "shipra";
	$pass = "teamwork"; 
	$db= "my_db";
	$bd=mysql_connect($host,$user,$pass) or die("Something went wrong.");
	mysql_select_db($db,$bd) or die("Something went wrong.");
	//include("config.php");
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// username and password sent from Form 
		$myusername=addslashes($_POST['username']); 
		$mypassword=addslashes($_POST['password']); 
		$sql="SELECT id FROM users WHERE username='" . $myusername . "' and password='" . $mypassword . "'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$active=$row['active'];
		$count=mysql_num_rows($result);
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1){
			session_register("myusername");
			$_SESSION['login_user']=$myusername;
			header("location: mainMenu.php");
		}
		else {
			$error="Your Login Name or Password is invalid";
			echo $error;
		}
	}
?>

<?php include 'commonFooter.php'; ?>
</html>

