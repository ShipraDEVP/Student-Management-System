<!DOCTYPE html>
<head>
	<style type="text/css"> body {background-color:lightgrey}</style>
	<title>Student Registration</title>
</head>

<?php include 'commonHeader.php'; ?>

			</br><b><i> Fill the following fields(All compulsory)</i></b></br><br />		
<?php	include 'lock.php';  ?>			
			<form action="generateId.php" method="post">
			<b>First Name :</b> <input type="text" name="firstname"/></br>
			<b>Middle Name :</b> <input type="text" name="middlename"/></br>			
			<b>Last Name :</b> <input type=text" name="lastname"/></br>
			<b>Date Of Birth :</b> <input type="date" name="dob"/> <i> (yyyy-mm-dd) </i></br>
			<b>Choose Sex : </b>			
			<input type="radio" name="sex" value="Male">Male <input type="radio" name="sex" value="Female"/>Female</br>
			<b> Choose your category : </b>
			<input type="radio" name="category" value="Gen"/>GEN <input type="radio" name="category" value="OBC"/>OBC<input type="radio" name="category" value="SC/ST"/>SC/ST<input type="radio" name="category" value="Other"/>Other</br>
			<b>Contact Number :</b> +91<input type="tel" name="contactno" size="10"/><br>
			<b>Father's Name :</b> <input type="text" name="fathername"/></br>
			<b>Mother's Name :</b> <input type="text" name="mothername"/></br>
			<b>Father's Contact Number :</b> +91<input type="tel" name="fathercontactno" size="10"/></br>
			<b>Address :</b> <input type="text" name="address"/></br>
			<b>E-mail address :</b> <input type="email" name="emailid"/></br>
			</br>
			<b>Choose the domain : </b><select name="branch">
				<option value="nil">------NIL------</option>
				<option value="CS">Computer Science</option>
				<option value="IT">Information Technology</option>
				<option value="EE">Electrical and Electronics Engineering</option>
				<option value="ME">Mechanical Engineering</option>
			</select></br>
			<b>Year Of Addmission:</b> <input type="year" name="yoa" size="4"/></br></br></br></br>			
			<button type="submit" value="Submit">Submit</button>
			<button type="reset" value="Reset">Reset</button>
			<a href="mainMenu.php"><input type="button" name="cancel" value="Cancel"/></a>
<?php include 'commonFooter.php'; ?>

</html>

