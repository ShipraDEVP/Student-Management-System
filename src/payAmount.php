<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>Fee Submmission</title>
</head>

<?php include 'commonHeader.php'; ?>

		<form action="submitAmount.php" method="get">
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
			/*$q3="select * from stufeerecord";
			$rs1= mysql_query($q3);
			if (!$rs1) {
				echo "\tCannot execute query.:\n".mysql_error();
				trigger_error(mysql_error());
			} 
			else {
				//echo "\tQuery executed.\n";
			}*/
			
			$regid=$_POST['regid'];
			while($row=mysql_fetch_assoc($rs)){
			//	$row1=mysql_fetch_assoc($rs1);	
			//	echo $row1['sem1'];			
				if(($regid==$row['stuid'])){
					$count=1;
					echo "<b>Name:</b> " . $row['firstname'] . " " . $row['middlename'] . " " . $row['lastname']   . "<P><b>Father's Name:</b> " . $row['fathername'] . "<P><b>Mother's Name:</b> " . $row['mothername'] . "<P><b>Branch:</b> " . $row['branch'];
					
					echo '<p><b>Choose the year : </b><select name="year">
					<option value="nil">------NIL------</option>
					<option value="first">I</option>
					<option value="second">II</option>
					<option value="third">III</option>
					<option value="fourth">IV</option>
					</select></br>';
					echo '<p><b>Choose the Semester : </b><select name="semester">
					<option value="nil">------NIL------</option>
					<option value="first">I</option>
					<option value="second">II</option>
					<option value="third">III</option>
					<option value="fourth">IV</option>
					<option value="fifth">V</option>
					<option value="sixth">VI</option>
					<option value="seventh">VII</option>
					<option value="eight">VIII</option>
					</select></br>';
					
?>
					
					<p> <b> Select the mode of transfer: </b></p></br>
				    <button type="button" onclick="cash()"> Cash</button>  <button type="button" onclick="dd()"> DD</button>  <button type="button" onclick="cheque()"> Cheque</button> 
					<p id="txt"></p>

					<script type="text/javascript">
					function cash(){
						var reg= '<?php echo $regid; ?>';
						var pos= 1;
						var newhtml1="<b>Enter amount:</b> <input type='text' name='amount'></input><input type='hidden' name='val' value='";
						var newhtml2="'></input><input type='hidden' name='pos' value='";
						var newhtml3="'></input></br></br><input type='submit' value='Submit'></input></br>";
						document.getElementById("txt").innerHTML=newhtml1+reg+newhtml2+pos+newhtml3;
					}
					function dd(){
						var reg= '<?php echo $regid; ?>';
						var pos= 2;
						var newhtml1="<b>Enter DD No.:</b> <input type='text' name='ddno'></input>";
						var newhtml2="<b>Enter Date:</b> <input type='date' name='dateofdepo'></input><input type='hidden' name='val' value='";
						var newhtml3="'></input><input type='hidden' name='pos' value='";
						var newhtml4="'></input></br></br><button type='submit' value='Submit'>Submit</button></br>";
						document.getElementById("txt").innerHTML=newhtml1+newhtml2+reg+newhtml3+pos+newhtml4;
					}
					function cheque(){
						var reg= '<?php echo $regid; ?>';
						var pos=3;
						var newhtml1="<b>Enter Cheque No.:</b> <input type='text' name='chequeno'></input>";
						var newhtml2="<b>Enter Date:</b> <input type='date' name='dateofdepo'></input><input type='hidden' name='val' value='";
						var newhtml3="'></input><input type='hidden' name='pos' value='";
						var newhtml4="'></input></br></br><button type='submit' value='Submit'>Submit</button></br>";
						document.getElementById("txt").innerHTML=newhtml1+newhtml2+reg+newhtml3+pos+newhtml4;
					}

					</script>
					
<?php
				}	
					
			}

				
			if($count==0){
				echo "<p><h2>There's no such record in the Database...!!!!</h2></p>";
			}
				
		}
	}
?>
		</br></br></br>
		<a href="searchToPay.php"><input type="button" name="cancel" value="Cancel"></a>
		</br>


<?php include 'commonFooter.php'; ?>

</html>

