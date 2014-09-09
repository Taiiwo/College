<?php
	//connect to db
	//$db = connect();

	//This has to be here as we're not actually
	//connecting to a database.
	function mysql_real_escape_string1($s){
		return $s;
	}
	//This is put in place because session keys
	//have not been implemented yet.
	function valid_sessionkey(){
		return true;
	}

	$idre = '".*"';
	$sessionre = '".*"';

	$error = 0;
	//Get variables from front page
	$date = mysql_real_escape_string1($_REQUEST['datetime']);
	if (!preg_match('"^([0-2]\d|3[0-1])/(0\d|1[0-2])/20(1[4-9]|[2-9][0-9])-(0\d|1[0-2]):([0-5]\d|60)$"',$date)) {
		$error = 1;
		echo "[E] Bad Date<br />";
	}
	$fname = mysql_real_escape_string1($_REQUEST['fname']);
	if (!preg_match('"^[A-z]{2,15}$"',$fname)){
		$error = 1;
		echo "[E] Bad first name<br />";
	}
	$lname = mysql_real_escape_string1($_REQUEST['lname']);
	if (!preg_match('"^[A-z]{2,15}$"',$lname)){
		$error = 1;
		echo "[E] Bad last name<br />";
	}
	$puloc = mysql_real_escape_string1($_REQUEST['puloc']);
	if (!preg_match('"^[A-z]{1,2}\d\d?\s?\d[A-z]{2}$"',$puloc)){
		$error = 1;
		echo "[E] Invalid pickup location<br />";
	}
	$doloc = mysql_real_escape_string1($_REQUEST['doloc']);
	if (!preg_match('"^[A-z]{1,2}\d\d?\s?\d[A-z]{2}$"',$doloc)){
		$error = 1;
		echo "[E] Invalid dropoff location<br />";
	}
	//$clientID = mysql_real_escape_string1($_REQUEST['clientID']);
	//if ( preg_match($idre,$clientID)){
	//	$error = 1;
	//	echo "Bad client ID";
	//}
	$TeacherID = mysql_real_escape_string1($_REQUEST['TeacherID']);
	if (!preg_match($idre,$TeacherID)){
		$error = 1;
		echo "[E] Bad Teacher ID<br />";
	}
	//$session = mysql_real_escape_string1($_REQUEST['session']);
	$session = "";
	if (!preg_match($sessionre,$session)){
		$error = 1;
		echo "[E] Bad session key<br />";
	}
	//Check for valid session
	if (valid_sessionkey($session) && $error == 0){
		//Add booking to DB
		//$db.query("insert into `bookings` (`time`,`date`,`clientID`,`TeacherID`) VALUES ('$time','$date','$clientID','$TeacherID');");
		//Email Teacher
		//email(Teacher);
		echo "[-]complete<br />";
	}

?>
