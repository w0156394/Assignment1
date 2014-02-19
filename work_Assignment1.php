<?php		
	//Enter the name to the file(s)
	$nameToAdd = $_POST['lblHdmFirstL'];
	$aryCourses = array($_POST['lblHdmC1'], $_POST['lblHdmC2'], $_POST['lblHdmC3'], $_POST['lblHdmC4']); 

	foreach ($aryCourses as $b) { 
		$filename = "../../files/courses/$b";
		$myFile = @fopen($filename, "a+") or die ("failed to open student name file");
		@fwrite($myFile, $nameToAdd) or die ("failed to write student name to file");
		@fclose($myFile);
		echo " $nameToAdd added to $b";
	} 
	
	//it's ok to send, so build the email and send it
	$msg = "";
	$msg = $_POST['lblHdmMsg'];
	//$msg = "E-MAIL SENT FROM it.nscctruro.ca\n";
	//$msg .= "Sender's Name:    $_POST[sender_name]\n";
	//$msg .= "Sender's E-Mail:  $_POST[sender_email]\n";
	//$msg .= "Message:          $_POST[message]\n\n";
	//$msg .= "Time:          ";
	//$msg .= date("F j, Y, g:i a");       

	$to = "dlnmcnutt@gmail.com";
	$subject = "All-in-One Web Site Feedback";
	$mailheaders = "From:it.nscctruro.ca 
	<webmaster@nscctruro.ca>\n";
	//$mailheaders .= "Reply-To: $_POST['lblHdmEmail']\n";
	//$mailheaders .= "CC: $_POST['lblHdmEmail']";
	
	//send the mail
	mail($to, $subject, $msg, $mailheaders);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Student Course Tracker</title>
		<link rel='stylesheet' type='text/css' href='StyleSheet.css' />
	</head>
	<body>
		<h1>Student Course Tracker <?  ?></h1>
		<form method="POST" action="show_Assignment1.html"><!--  -->	  
			<fieldset>
				<legend>Student Info</legend>	
				<? echo "<p>Mail has been sent:</p>"; ?>
				<? echo $msg; ?>
			</fieldset>
			<p><input type="SUBMIT" name="rtrnSubmit" value="Return To Main Page"></p>
		</form>
	</body>
</html>
