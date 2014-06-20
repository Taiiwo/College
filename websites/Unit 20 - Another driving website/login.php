<?php require_once './util.php'; require_once './include.php';

$genericErrorDesc = "This should have been caught in client-side
                        data validation. This means that either that validation failed,
                        or you're trying to access this API via a different means, in which case,
                        you've probably forgotten one of the fields.";
if (    array_key_exists( 'email',	$_POST) &&
        array_key_exists( 'password',	$_POST){
	//connect to DB
	$db = dbConnect();
	//store values from main page
	$username =	sqlesc($_POST['username']);
	$password =	sqlesc($_POST['password']);
	//validate username
	if (!preg_match('/^[\w-]{2,20}$/', $username)){
		errorScreen('Invalid Username', $genericErrorDesc);
	}
	//validate password
	if (!preg_match('/^.{6,60}$/', $password)){
		errorScreen('Invalid Password', $genericErrorDesc);
	}
	//format select query
	$query = "SELECT `Password` FROM `users` WHERE `Username` = '$username';";
	$request = $db->query($query);
	$assoc = $results->fetch_assoc();
	if ($assoc['password'] == sha1($password)){
		//give session cookies
		setcookie("sessionCookie", sha1($username.sha1($password)));
		setcookie("userID", $username);
		//send to controlpanel, they should now be authed ~forever.
		header("Location: controlpanel.php");
		die();
	}
	else {
		errorScreen('Invalid Password', "The password you supplied did not match the
			password we have in the database.");
}

	}
}
else {
	errorScreen('Missing fields', $genericErrorDesc);
}
?>
