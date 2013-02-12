<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>Enter Registration No.</title>
</head>

<?php include 'commonHeader.php'; ?>

		</br></br></br></br>
<?php	include 'lock.php';  ?>
		<form action="payAmount.php" method="post">
		<b>Enter Registration No.:</b> <input type="text" name="regid"/></br></br></br>
		<button type="submit" value="submit">Submit</button>
		<a href="mainMenu.php"><input type="button" name="cancel" value="Cancel"/></a>

<?php include 'commonFooter.php'; ?>

</html>

