<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>Student ID</title>
</head>

<?php include 'commonHeader.php'; ?>

<?php 
	include 'lock.php';
	$host = "localhost"; 
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
			$q2="create table if not exists student( regno int NOT NULL AUTO_INCREMENT PRIMARY KEY,stuid char(10),firstname varchar(15),middlename varchar(15),lastname varchar(15),dob date,sex varchar(6),category varchar(5),contactno long,fathername varchar(30),mothername varchar(30),fathercontactno long,address varchar(35),emailid varchar(30), branch varchar(30), yoa int)";
			execute_query($q2);
			$fname=$_POST['firstname'];
			$mname=$_POST['middlename'];
			$lname=$_POST['lastname'];
			$dob=$_POST['dob'];
			$sex=$_POST['sex'];
			$category=$_POST['category'];
			$phon=$_POST['contactno'];
			$paname=$_POST['fathername'];
			$maname=$_POST['mothername'];
			$pano=$_POST['fathercontactno'];
			$addr=$_POST['address'];
			$email=$_POST['emailid'];
			$domain=$_POST['branch'];
			$yoa=$_POST['yoa'];
			$q3="select * from student";
			$rs= mysql_query($q3);
			if (!$rs) {
				echo "\tCannot execute query.:\n".mysql_error();
				trigger_error(mysql_error());
			} 
			else {
				//echo "\tQuery executed.\n";
			}
			$count=0;
			while($row=mysql_fetch_assoc($rs)){
				if(($fname==$row['firstname'])&&($mname=$row['middlename'])&&($lname==$row['lastname'])&&($paname==$row['fathername'])&&($maname==$row['mothername'])){
					$count=1;
				}
			}
			if($count==1){
				echo "ERROR!!!....Record of this student already exists.";
			}
			else{
				$query="INSERT INTO student (firstname,middlename,lastname,dob,sex,category,contactno,fathername,mothername,fathercontactno, address, emailid, branch, yoa) VALUES( '$fname','$mname','$lname','$dob','$sex','$category','$phon','$paname','$maname','$pano','$addr','$email','$domain','$yoa')";
				execute_query($query);
				$q4= "select LAST_INSERT_ID() from student";
				$res= mysql_query($q4);
				$row= mysql_fetch_assoc($res);
				$regno= $row['LAST_INSERT_ID()'];
				$stuid=$yoa . $domain . (($regno/1000)%10) . (($regno/100)%10) . (($regno/10)%10) . ($regno%10);
				echo "Your id is: <b>" . $stuid . "</b>";
				$q4="update student set stuid= '$stuid' where regno='$regno'";
				execute_query($q4);
				$q5="create table if not exists stufeerecord (stuid char(10) NOT NULL PRIMARY KEY, sem1 int, sem2 int, sem3 int, sem4 int, sem5 int, sem6 int, sem7 int, sem8 int )";
				execute_query($q5);
				$q6="insert into stufeerecord (stuid) values ('$stuid')";
				execute_query($q6);
				
			}			
		}
	}
	mysql_close($r1);

?>  
		</br></br></br>
		<a href="register.php"><input type="button" name="back" value="Back"></a>
		</br>

<?php include 'commonFooter.php'; ?>

</html>

