<?php

require("connection.php");
require_once('session.php');

$info = $_POST["info"];
$xcoord = $info[0];
$ycoord = $info[1];
$username = $info[2];
$email = $info[3];
$type = $info[4];
$userid = $_SESSION['id'];

$sql = "INSERT INTO tree_location (type, xcoord, ycoord, userid) VALUES('$type', $xcoord, $ycoord, '$userid')";
if(filter_var($email,FILTER_VALIDATE_EMAIL))
{
	if(mysqli_query($conn, $sql)){
		echo "<p class='success'> Congratulations! You have planted a tree. :) </p>";
		$message = "Congratulations, $username!\nYou have planted a $type tree.\nPlease provide your full name, residential addreess, tree named after and bank details (bank name and account number) in reply to this email.\n\nThanks!";
		mail($email,'Tree Plantation', $message, 'From: ned.trees@gmail.com');
	}
	else
		echo "<p class='fail'> Tree not planted </p>";
}
else
	echo "<p class='fail'> Please Enter Valid Email address </p>";

?>
