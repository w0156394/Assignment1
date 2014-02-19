<?php
//show all informaion and get confirmation

	$ftp_server = "php.nscctruro.ca";
	$ftp_username   = "w0156394";
	$ftp_password   =  "w0156394";
	$conn_id = ftp_connect($ftp_server) or die("could not connect to $ftp_server");
	//connected
	if(@ftp_login($conn_id, $ftp_username, $ftp_password)){
	
		if($_POST['txtFirstName']!="" && $_POST['txtLastName']!="" && $_POST['txtEmail']!="" && 
			$_POST['txtEmail']!="" &&  $_POST['selFirstCourses']!="null" &&  $_POST['selSecondCourses']!="null"
			&&  $_POST['selThirdCourses']!="null" &&  $_POST['selForthCourses']!="null") {
			
			if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $_POST['txtEmail'])) {   
				//use ftp_put to upload the image
				ftp_put($conn_id, "../../files/img/".$_FILES['img1']['name'], $_FILES['img1']['tmp_name'],FTP_ASCII);
					
				$ImageLocation = "../../files/img/" . $_FILES['img1']['name'];
				//echo $ImageLocation;
				
				//fill variables
				$firstName = $_POST['txtFirstName'];
				$lastName = $_POST['txtLastName'];
				$email = $_POST['txtEmail'];
				$dOB = $_POST['txtDOB'];
				$firstCourses = $_POST['selFirstCourses'];
				$secondCourses = $_POST['selSecondCourses'];
				$thirdCourses = $_POST['selThirdCourses'];
				$forthCourses = $_POST['selForthCourses'];
				
				//populate email message
				$conMsg = "<html>
						<head>
						<title>Student Course Tracker</title>
						<link rel='stylesheet' type='text/css' href='StyleSheet.css' />
						</head>
						<body>
						First Name: $firstName <br/>				
						Last Name: $lastName <br/>	
						Email: $email <br/>	
						Date Of Birth: $dOB <br/>	
						First Courses: $firstCourses <br/>	
						Second Courses: $secondCourses <br/>	
						Third Courses: $thirdCourses <br/>	
						Forth Courses: $forthCourses  <br/>	
						Image: <img src='http://php.nscctruro.ca/~w0156394/files/img/" . $_FILES['img1']['name'] . "'
						alt='Image Of Student' height='42' width='42'>
						</body>
						</html>";
				
				//format first name with last initial
				$lastNameExp = explode(" ", $lastName);
				$firstLetterOfLast = "";	
				//get first letter of last name
				foreach ($lastNameExp as $l) {
					$firstLetterOfLast = $l[0];
					if ($firstLetterOfLast != ""){break;}	  
				}		
				$nameToAdd = $firstName . " " . $firstLetterOfLast . "\n";
				//echo "name to add " . $nameToAdd ;
				//echo "$firstName, $lastName, $email, $dOB, $firstCourses,$secondCourses, $thirdCourses, $forthCourses";			
			} else {   
				echo "Invalid email address."; 
				$conMsg = "";
			}  
		} else {
			echo "You must fill in all the fields";
		}
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
		<form method="POST" action="work_Assignment1.php"  ENCTYPE="multipart/form-data">	  
			<fieldset>
				<legend>Student Info</legend>
				<? echo $conMsg ?>	
				<input name="lblHdmImage" type="hidden" value="<? echo $ImageLocation; ?>" />						
				<input name="lblHdmMsg" type="hidden" value="<? echo $conMsg; ?>" />
				<input name="lblHdmEmail" type="hidden" value="<? echo $email; ?>" />
				<input name="lblHdmFirstL" type="hidden" value="<? echo $nameToAdd; ?>" />
				<input name="lblHdmC1" type="hidden" value="<? echo $firstCourses; ?>" />
				<input name="lblHdmC2" type="hidden" value="<? echo $secondCourses; ?>" />
				<input name="lblHdmC3" type="hidden" value="<? echo $thirdCourses; ?>" />
				<input name="lblHdmC4" type="hidden" value="<? echo $forthCourses; ?>" />
			</fieldset>
			<p><input type="SUBMIT" name="wrkSubmit" value="Confirm"></p>
		</form>
	</body>
</html>