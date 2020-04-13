<?php

$servername = "localhost";
$username = "bilal";
$password = "let me in";
$dbname = "trees";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed");
}

//echo "Connected!";

?>
