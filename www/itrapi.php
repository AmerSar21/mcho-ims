<?php 
	
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header("Content-Type: application/json; charset=utf-8");

	define('DB_NAME', 'No0gC5dY8q');
	define('DB_USER', 'No0gC5dY8q');
	define('DB_PASSWORD', 'U7ukpHfCbw');
	define('DB_HOST', 'remotemysql.com');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	if(!$mysqli){
		echo "Failed";
	}else{
		echo "True";
	}

	$postdata = json_decode(file_get_contents('php://input'),true);	

	if(isset($postdata['itrlist'])){
		$data = $postdata['itrlist'];
		if(!empty($data)){

			foreach ($data as $item) {
				$sqltemp_itr = mysqli_query($mysqli, "INSERT INTO temp_itr(family_serial_no,age,mode_transaction,date_consultation,time_consultation,
			blood_pressure,temperature,height,weight,name_of_attending,nature_of_visit,chief_complaints,diagnosis,medication,lab_findings,name_health_careprovider,performed_lab_test,chronic_disease,referred_from,referred_to,reason_of_referral,referred_by,added_by,submitted_by,patient_id,date_submitted) VALUES ('".$item['family_serial_no']."','".$item['age']."','".$item['mode_transaction']."','".$item['date_consultation']."','".$item['time_consultation']."','".$item['blood_pressure']."','".$item['temperature']."','".$item['height']."','".$item['weight']."','".$item['name_of_attending']."','".$item['nature_of_visit']."','".$item['chief_complaints']."','".$item['diagnosis']."','".$item['medication']."','".$item['lab_findings']."','".$item['name_health_careprovider']."','".$item['performed_lab_test']."','".$item['chronic_disease']."','".$item['referred_from']."','".$item['referred_to']."','".$item['reason_of_referral']."','".$item['referred_by']."','".$item['added_by']."','".$item['submitted_by']."','".$item['patient_id']."','".$item['date_submitted']."','".$item['name_health_careprovider']."')");
			}
		}

		if(!$sqltemp_itr){

			echo "Record Failed to Upload";

		}else{

			echo "Upload Successful";

		}

	}
	
?>