<?php
require_once './util.php';
require_once './include.php';

$genericErrorDesc = "This should have been caught in client-side
                        data validation. This means that either that validation failed,
                        or you're trying to access this API via a different means, in which case,
                        you've probably forgotten one of the fields.";

//check if all fields have been submitted
if (	array_key_exists( 'fname',		$_POST) &&
	array_key_exists( 'lname',		$_POST) &&
	array_key_exists( 'email',		$_POST) &&
	array_key_exists( 'password',		$_POST) &&
	array_key_exists( 'username',		$_POST) &&
	array_key_exists( 'confpassword',	$_POST)
	){
	//All of the data is valid. Add it to the database
	//connect to db
	$db = dbConnect();
	//grab all the page varibles and store them
	$fname			= sqlesc($_POST['fname'], $db);
	$lname			= sqlesc($_POST['lname'], $db);
	$email			= strtolower(sqlesc($_POST['email'], $db));
	$password		= sqlesc($_POST['password'], $db);
	$username		= sqlesc($_POST['username'], $db);
	$confpassword		= sqlesc($_POST['confpassword'], $db);
	// check if the password matches the confirm password
	if ($confpassword != $password){
		errorScreen('Password Mismatch',$genericErrorDesc);
	}
	//validate everything
	if (!preg_match('/^[(a-z|A-Z)-]{2,35}$/',$fname)){
		errorScreen('Invalid First Name', $genericErrorDesc);
	}
	if (!preg_match('/^[(a-z|A-Z)-]{2,35}$/',$lname)){
		errorScreen('Invalid Last Name', $genericErrorDesc);
	}
	$request = $db->query("SELECT `email` FROM `users` WHERE `email` = '$email'");
	if ($request->num_rows > 0){
		errorScreen('Email in Use', "This email address is already in use in the
		database. Please try another.");
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		errorScreen('Invalid Email', $genericErrorDesc);
	}
	if (!preg_match('/^.{2,60}$/', $password)){
		errorScreen('Invalid Password', $genericErrorDesc);
	}
	$request = $db->query("SELECT `username` FROM `users` WHERE `username` = '$username'");
	if ($request->num_rows > 0){
		errorScreen('Username in Use', "This username is already in use in the
		database. Please try another.");
	}
	if (!preg_match('/^[\w-]{2,20}$/', $username)){
		errorScreen('Invalid Username', $genericErrorDesc);
	}
	//Format query
	$query = "INSERT INTO `users` (
		`FirstName`,
		`LastName`,
		`Email`,
		`Password`,
		`Username`) VALUES (
		'$fname',
		'$lname',
		'$email',
		'".sha1($password)."',
		'$username');";
	//add data into database
	$db->query($query);
	//give user ID cookie
	setcookie("sessionCookie", sha1($username.sha1($password)));
	setcookie("userID", $username);
	//send to controlpanel, they should now be authed ~forever.
	header("Location: controlpanel.php");
	die();
}
else {
	errorScreen('Missing Fields',"All of the fields on the main page should have been
		validated on the client side. This means that either that validation failed,
		or you're trying to access this API via a different means, in which case,
		you've probably forgotten one of the fields.");
}
?>
