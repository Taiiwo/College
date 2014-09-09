<?php
$debug = true;
function is_pgp($my_string) {

	$begin =  strpos($my_string, "BEGIN PGP");
	if ($begin == FALSE) {
		return false;
	}
	$blank = strpos($my_string, "\r\n\r\n");
	if ($blank == FALSE) {
		return false;
	}
	$end = strpos($my_string, "----END");
	if ($end == FALSE) {
		return false;
	}
	if ($end < $begin) {
		return false;
	}
	$pub = strpos($my_string, "BEGIN PGP PUBLIC");
	$mes = strpos($my_string, "BEGIN PGP MESSAGE");
	if ($pub != FALSE) {
		return 'PUBLIC';
	}
	elseif ($mes != false) {
		return 'MESSAGE';
	}
}
//validate
$validation = true;
$message = mysql_escape_string($_GET['message']);
$tokey = mysql_escape_string($_GET['tokey']);
$fromkey = mysql_escape_string($_GET['fromkey']);
if ($fromkey == '') {
	$fromkey = 'ANONYMOUS';
}
if ($debug == true) {
	echo is_pgp($message) . is_pgp($tokey) . is_pgp($fromkey);
}
if (is_pgp($message) == 'MESSAGE' and is_pgp($tokey) == 'PUBLIC') {//Check if valid PGP
	if ($fromkey == 'ANONYMOUS' or is_pgp($fromkey) == 'PUBLIC') {
		$validation = true;
	}
	else {
		$validation = false;
	}
}
else {
	$validation = 'debug';
}
//connect to MySQL
if ($validation == true) {
	$db = mysql_connect("localhost",'330479','cadbury123','330479');
}
$query = 'INSERT INTO `messages` (`tokey`,`fromkey`, `message`,`time`) VALUES("' .
	$tokey . ',' .
	$fromkey . ',' .
	$message . ',' .
	'CURDATE() ");';
$results = mysql_query($query);
if ($validation == true) {
	echo $results;
}
else{
	echo 'Data validation failed. Nothing was added to the database';
}
if ($debug == true){
	echo $validation . $message . $tokey . $fromkey;
}
?>
