<?php

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Course Tracker</title>
		<link rel='stylesheet' type='text/css' href='StyleSheet.css' />
	</head>
	<body>
		<h1>Student Course Tracker <?  ?></h1>
		<form method="POST" action="do_Assignment1.php">	  
			<fieldset>
				<legend>Student Info</legend>				
				<p><strong>First Name</strong>
				<input type="text" name="txtFirstName" size=35 maxlength=50 value="First Name"></p>
				<p><strong>Last Name</strong>
				<input type="text" name="txtLastName" size=35 maxlength=50 value="Last Name"></p>
				<p><strong>Email</strong>
				<input type="text" name="txtEmail" size=35 maxlength=100 value="Email"></p>
				<p><strong>Date of Birth</strong>
				<input type="text" name="txtDOB" size=35 maxlength=10 value="12/21/82"></p>
				</p>				
			</fieldset>
			<br>
			<fieldset>
				<legend>Course Selection</legend>
				<p><strong>First Course</strong>
				<br>
				<p><strong>Second Course</strong>
				<br>
				<p><strong>Third Course</strong>
				<br>
				<p><strong>Forth Course</strong>
				<br>					
			</fieldset>
			<br>
			<fieldset>
				<legend>Student Photo</legend>
					<p><strong>Upload Photo</strong>					
						<input TYPE="file" NAME="img1" SIZE="30"></p>
			</fieldset>
			<p><input type="SUBMIT" name="submit" value="Submit"></p>
		</form>
	</body>
</html>
