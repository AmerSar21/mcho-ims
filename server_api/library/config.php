<?php 

	//000webhost.com server - mchoims
	// define('DB_NAME', 'id16200133_mchoims');
	// define('DB_USER', 'id16200133_mchoims2021');
	// define('DB_PASSWORD', '?-Qyyc]2w2}_Ggdj');
	// define('DB_HOST', 'localhost');

	//000webhost.com server - mappcho
	// define('DB_NAME', 'id16200133_mappcho');
	// define('DB_USER', 'id16200133_mappcho2021');
	// define('DB_PASSWORD', 'B{Kb+\sqqj?2E*Ky');
	// define('DB_HOST', 'localhost');

	//inifinityfree.net server - mappcho
	// define('DB_NAME', 'epiz_29168450_mappcho');
	// define('DB_USER', 'epiz_29168450');
	// define('DB_PASSWORD', 'R4FqqLF7KZ');
	// define('DB_HOST', 'sql204.epizy.com');
	
	//000webhost account;
	//username: mapp-cho;
	//pass: cmQx*Z$qQa%ob)FQtDxL;
	
	// remotemysql.com server
	define('DB_NAME', 'qOK07O7HjJ');
	define('DB_USER', 'qOK07O7HjJ');
	define('DB_PASSWORD', 'QLEyhT5DK8');
	define('DB_HOST', 'remotemysql.com');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if($mysqli->connect_error){
		die("Connection Failed " . $mysqli->connect_error);
	}else{
		echo "Connected Successfuly";
	}

?>
