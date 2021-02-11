<?php 

$localhost = "";
$username = "";
$password = "";
$dbname = "";

// create connection
$con = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($con->connect_error) {
	die("connection failed: " . $connect->connect_error);
} else {
	//echo "Successfully Connected";
}

?>