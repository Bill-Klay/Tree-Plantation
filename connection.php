<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trees";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
	die("Connection failed");
}

//echo "Connected!";

?>
