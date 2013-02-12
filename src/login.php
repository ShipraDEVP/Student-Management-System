<!DOCTYPE html>


<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>LOGIN</title>
</head>

<?php include 'commonHeader.php'; ?>

		<form method="POST" action="check.php">
		</br><h3> LOGIN </h3></br>
		Username:	<input type="text" name="username" />
		<br /> <br/>
		Password:	<input type="password" name="password" />
		<br /><br />
		<input type="submit" id="subbut" value="Submit" />
		</form>


<?php include 'commonFooter.php'; ?>

</html>

