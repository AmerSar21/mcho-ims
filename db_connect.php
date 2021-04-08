<?php 

$localhost = "remotemysql.com";
$username = "6gENJc3N8G";
$password = "0S5cFmCgSp";
$dbname = "6gENJc3N8G";

// create connection
$con = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($con->connect_error) {
	die("connection failed : " . $connect->connect_error);
} else {
	//echo "Successfully Connected";
}
?>		