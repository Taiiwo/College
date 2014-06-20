<?php
require_once './util.php';
require_once './include.php';
//Check if login request is being made
if (array_key_exists('userID', $_COOKIES) && array_key_exists('sessionID',$_COOKIES)){
	$db = dbConnect();
	$username = sqlesc($_POST['username']);
	$password = sqlesc($_POST['password']);
	$query = "SELECT * FROM `users` WHERE `Username` = '$username';";
	$request = $db->query($query);
	$userData = $request->fetch_assoc();
	if (!sha1($username . sha1($password)) == sha1($userData['Username'] . $userData['Password'])){
		errorScreen('Invalid Cookie',"Please go back to the <a href=\"./index.html\">main page</a> and log in again");
	}
	//user is now authenticated.
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset=utf-8 />
	<title>Pass-IT - Control Panel</title>
	<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="navbar" class="boxShadow">
		<h2 class="inline">Pass-IT</h2>
		<h3 class="split flright">Logout</h3>
	</div>
</body>
</html>
