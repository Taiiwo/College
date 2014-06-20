<?php
#include_once 'include.php';

//Check if login request is being made
if (array_key_exists('username', $_POST) && array_key_exists('password',$_POST)){
	$username = sqlesc($_POST['username']);
	$password = sqlesc($_POST['password']);

}
?>
