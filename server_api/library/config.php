<?php 
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header("Content-Type: application/json; charset=utf-8");

	define('DB_NAME', 'id16200133_mappcho');
	define('DB_USER', 'id16200133_mappcho2021');
	define('DB_PASSWORD', 'B{Kb+\sqqj?2E*Ky');
	define('DB_HOST', '000webhost.com');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if($mysqli->connect_error){
		die("Connection Failed " . $mysqli->connect_error);
	}else{
		//echo "Connected."
	}

?>

