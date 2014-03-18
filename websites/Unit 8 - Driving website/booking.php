<?php
	//connect to db
	$db = connect();

	//Get variables from front page
	$time = $_REQUEST['time'];
	$date = $_REQUEST['date'];
	$clientID = $_REQUEST['clientID'];
	$TeacherID = $_REQUEST['TeacherID'];
	$session = $_REQUEST['session'];

	//Check for valid session
	if (valid_sessionkey($session)){
		//Add booking to DB
		$db.query("insert into `bookings` (`time`,`date`,`clientID`,`TeacherID`) VALUES ('$time','$date','$clientID','$TeacherID');");
		//Email Teacher
		email(Teacher);
	}

?>
