<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>Student's details</title>
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
			$q2="select * from student";
			$rs= mysql_query($q2);
			if (!$rs) {
				echo "\tCannot execute query.:\n".mysql_error();
				trigger_error(mysql_error());
			} 
			else {
				//echo "\tQuery executed.\n";
			}
			$count=0;
			$regid=$_POST['regid'];
			while($row=mysql_fetch_assoc($rs)){
				if($regid==$row['stuid']){
					$count=1;
					echo "<b>Student ID:</b> " . $regid . "<P><b>Name:</b> " . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname'] . "<P><b>Date of birth:</b> " . $row['dob'] . "  (yyyy-mm-dd)" . "<P><b> Sex:</b> " . $row['sex'] . "<P><b> Contact No.:</b>  +91" . $row['contactno'] . "<P><b> Category:</b> " . $row['category'] . "<P><b> Father Name:</b> " . $row['fathername'] . "<P><b> Mother Name:</b> " . $row['mothername'] . "<P><b> Father's Contact no.:</b>  +91" . $row['fathercontactno'] . "<P><b> Address:</b> " . $row['address'] . "<P><b> Email ID:</b> " . $row['emailid'] . "<P><b> Branch:</b> " . $row['branch'] . "<P>";
				}
			}
			if($count==0){
				echo "\n SORRY!!!!!!...There exists no such Record.";
			}
		}			
	}
	mysql_close($r1);

?>  
		</br></br></br>
		<a href="searchToShow.php"><input type="button" name="back" value="Back"></a>
		</br>
		
<?php include 'commonFooter.php'; ?>

</html>

