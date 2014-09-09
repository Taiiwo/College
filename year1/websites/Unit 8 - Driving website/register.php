<h1>Hello</h1>
<?php

//Debug mode:
error_reporting(E_ALL);
function connect(){

        $connection = mysql_connect("localhost", "mysql", "hello123");
	$db = mysql_select_db(registration,$connection);

}
connect();

$fname = 	mysql_real_escape_string($_POST['fname']);
$lname = 	mysql_real_escape_string($_POST['lname']);
$password = 	mysql_real_escape_string($_POST['password']);
$hnum = 	mysql_real_escape_string($_POST['hnum']);
$post = 	mysql_real_escape_string($_POST['post']);
$email = 	mysql_real_escape_string($_POST['email']);
$phone = 	mysql_real_escape_string($_POST['phone']);
$dob = 		mysql_real_escape_string($_POST['dob']);
$password= md5($password);
$query = "INSERT INTO `users` (`FirstName`,`LastName`,`Password`,`Email`,`PhoneNumber`,`HouseName`,`DOB`,`PostCode`) VALUES ('$fname', '$lname', '$password', '$email', '$phone', '$hnum', '$dob','$post')";
mysql_query($query);
echo "done";



?>
