<?php
//show all informaion and get confirmation
	echo $_FILES['img1']['name'];
	echo $_FILES['img1']['size'];
	echo $_FILES['img1']['type'];
	if ($_FILES['img1'] != ""){
		@copy($_FILES['img1']['tmp_name'], "../../files/img/".$_FILES['img1']['name'] ) or die ("could not copy the file");
		
	} else {
		die ("no input file specified");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Course Tracker</title>
		<link rel='stylesheet' type='text/css' href='StyleSheet.css' />
	</head>
	<body>
		<h1>Student Course Tracker <?  ?></h1>
		<form method="POST" action="work_Assignment1.php">	  
			<fieldset>
				<legend>Student Info</legend>				
				
			</fieldset>
			<p><input type="SUBMIT" name="wrkSubmit" value="Confirm"></p>
		</form>
	</body>
</html>

