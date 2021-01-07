<?php 
	
	if(isset($_SERVER['HTTP_ORIGIN'])) {
		header("Access-Contol-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
		header('Access-Contol-Allow-Credentials: true');
		header('Access-Contol-Max-Age: 86400');
	}

	if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Contol-Allow-Methods: GET, POST, OPTIONS");
		if(isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Contol-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		exit(0);
	}

	define('DB_NAME', 'No0gC5dY8q');
	define('DB_USER', 'No0gC5dY8q');
	define('DB_PASSWORD', 'U7ukpHfCbw');
	define('DB_HOST', 'sql12.remotemysql.com');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$postdata = file_get_contents("php://input");

	if(isset($postdata)){
		$request = json_decode($postdata,true);

		foreach ($request as $item) {

			$sqltemp_itr = mysqli_query($mysqli, "INSERT INTO temp_itr(family_serial_no,age,mode_transaction,date_consultation,time_consultation,blood_pressure,temperature,height,weight,name_of_attending,nature_of_visit,chief_complaints,diagnosis,medication,lab_findings,name_health_careprovider,performed_lab_test,referred_from,referred_to,reason_of_referral,referred_by,added_by,submitted_by,patient_id,date_submitted) VALUES ('".$item[family_serial_no]."','".$item[age]."','".$item[mode_transaction]."','".$item[date_consultation]."','".$item[time_consultation]."','".$item[blood_pressure]."','".$item[temperature]."','".$item[height]."','".$item[weight]."','".$item[name_of_attending]."','".$item[nature_of_visit]."','".$item[chief_complaints]."','".$item[diagnosis]."','".$item[medication]."','".$item[lab_findings]."','".$item[name_health_careprovider]."','".$item[performed_lab_test]."','".$item[referred_from]."','".$item[referred_to]."','".$item[reason_of_referral]."','".$item[referred_by]."','".$item[added_by]."','".$item[submitted_by]."','".$item[patient_id]."','".$item[date_submitted]."')");
		}

		if(!$sqltemp_itr){

			echo "Record Failed to Upload";

		}else{

			echo "Upload Successful";

		}

	}
	
?>