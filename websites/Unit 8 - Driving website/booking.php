<?php
	//connect to db
	//$db = connect();

	$idre = '.*';
	$sessionre = '.*';

	$error = 0;
	//Get variables from front page
	$date = mysql_real_escape_string($_REQUEST['datetime']);
	if (preg_match('^[0-31]:[0-12]:[0000-2014]/[00-12]:[00-60]$',$date)) {
		$error = 1;
		echo "Bad Date";
	}
	$clientID = mysql_real_escape_string($_REQUEST['clientID']);
	if ( preg_match($idre,$clientID)){
		$error = 1
		echo "Bad ID";
	}
	$TeacherID = mysql_real_escape_string($_REQUEST['TeacherID']);
	if (preg_match($idre,$TeacherID)){
		$error = 1;
		echo "Bad Teacher ID";
	}
	$session = mysql_real_escape_string($_REQUEST['session']);
	if (preg_match($sessionre,$session)){
		$error = 1;
		echo "Bad session key.";

	//Check for valid session
	if (valid_sessionkey($session) && $error == 0){
		//Add booking to DB
		$db.query("insert into `bookings` (`time`,`date`,`clientID`,`TeacherID`) VALUES ('$time','$date','$clientID','$TeacherID');");
		//Email Teacher
		email(Teacher);
	}

?>
