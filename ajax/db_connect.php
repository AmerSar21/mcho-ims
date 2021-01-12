<?php 

$localhost = "remotemysql.com";
$username = "No0gC5dY8q";
$password = "U7ukpHfCbw";
$dbname = "No0gC5dY8q";

// create connection
$con = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($con->connect_error) {
	die("connection failed: " . $connect->connect_error);
} else {
	//echo "Successfully Connected";
}

?>