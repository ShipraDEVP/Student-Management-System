<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>INSTITUTE</title>
</head>

<?php include 'commonHeader.php'; ?>

<?php
	include 'lock.php';
	$host="localhost";
	$user = "shipra";
	$pass = "teamwork"; 
	$db= "my_db";
	
	function execute_query($query) {
		$r = mysql_query($query);
		if (!$r) {
			echo "\tCannot execute query.:\n".mysql_error();
			trigger_error(mysql_error());
		} 
		else {
			//echo "\tQuery executed.\n";
		}
	}
	$r1 = mysql_connect($host, $user, $pass);
	if(!$r1){
		echo "\tCould not connect to server.\n";
		trigger_error(mysql_error(), E_USER_ERROR);
	}
	
	else {
		//echo "\tConnection established.\n"; 
		$r2= mysql_select_db($db);
		if (!$r2){
			echo "\tCannot select databse.\n";
			trigger_error(mysql_error(),E_USER_ERROR);
		}
		else{
			//echo "\tDatabase selected.\n";
			/*$q1="drop table student";
			execute_query($q1);*/	
			$q2="create table if not exists feemode(tid bigint auto_increment not null PRIMARY KEY, mode varchar(12), chequeno varchar(10), ddno varchar(10), dateofdeposit date, amount long, tobedeposited long)";
			execute_query($q2);
			$max=60000;//maximum fees	
			$sem=$_GET['semester'];
			$year=$_GET['year'];
			$regid=$_GET['val'];
			$pos=$_GET['pos'];
			if($pos== 1){
				$amt=$_GET['amount'];
				$q4="insert into feemode(amount) values ('$amt')";
				execute_query($q4);
				echo "<p><h3> Fee submitted.</h3></p>";
			}
			else if($pos == 2){
				$dd=$_GET['ddno'];
				$dt=$_GET['dateofdepo'];
				$q4="insert into feemode(ddno,dateofdeposit) values ('$dd','$dt')";
				execute_query($q4);
				echo "<p><h3> Fee submitted.</h3></p>";
			}
			else{
				$chq=$_GET['chequeno'];
				$dt=$_GET['dateofdepo'];
				$q3="insert into feemode(chequeno,dateofdeposit) values ('$chq','$dt')";
				execute_query($q3);
				echo "<p><h3> Fee submitted.</h3></p>";
			}
			$q5= "select LAST_INSERT_ID() from feemode";
			$res= mysql_query($q5);
			$row= mysql_fetch_assoc($res);
			$tid= $row['LAST_INSERT_ID()'];

		}
	}
	
?>
		</br></br></br>
		<a href="searchToPay.php"><input type="button" name="back" value="Back"></a>
		</br>
	
<?php include 'commonFooter.php'; ?>

</html>

