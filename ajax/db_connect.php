<?php 

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "mchoims_database";

// create connection
$con = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($con->connect_error) {
	die("connection failed123123123: " . $connect->connect_error);
} else {
	//echo "Successfully Connected";
}

?>