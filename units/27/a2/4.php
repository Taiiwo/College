<?php
$username = "a2";
$password = "iwasnottaughtthis";
$hostname = "localhost";

//connection to the database
$db = mysqli_connect($hostname, $username, $password)
  or die("Unable to connect to MySQL");
$db->query("USE college;");
$result = $db->query("SELECT * FROM cms;");
while ($row = $result->fetch_assoc()) {
  echo '<img src="' . $row["imageUrl"] . '"></a>';
}
?>
