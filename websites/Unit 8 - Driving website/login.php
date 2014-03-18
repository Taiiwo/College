<?php
	$db = connect();
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['password'];
	$res = $db.query("Select `Password` from `users` where `email`='$email';")
	if (md5($password) == $res) {
		echo "Welcome!";
	}
?>
