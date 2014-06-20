<?php
require_once './include.php';
function sqlesc($string, $db){// shorten mysql_real_escape_string because god damn
        return mysqli_real_escape_string($db, $string);
}
function errorScreen($error,$desc){
	echo "<html><head><title>ERROR</title></head><body>";
	echo "<h1>$error</h1>";
	echo "<p>$desc</p>";
	echo "</body></html>";
	die();
}
function dbConnect(){
	return mysqli_connect($GLOBALS["mysql_host"],$GLOBALS["mysql_user"],$GLOBALS["mysql_passwd"],$GLOBALS["mysql_db"]);
}
?>
