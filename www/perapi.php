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

	$postdata = file_get_contents("php://input");

	if(isset($postdata)){
		$request = json_decode($postdata,true);
		$data = array();

		if(!empty($request)){
			foreach ($request as $item) {
				$sqltemp_per = mysqli_query($mysqli, "INSERT INTO temp_per(family_serial_no,lname,fname,mname,sex,b_date,b_place,bloodtype,civil_stat,spouse_name,mothers_name,fam_position,home_no,barangay,street,city,province,contact_no,educ_attainment,employ_status,ph_member,ph_no,member_category,facility_no,dswdnhts,suffix,added_by,submitted_by,patient_id,date_submitted) VALUES ('".$item['family_serial_no']."','".$item['lname']."','".$item['fname']."','".$item['mname']."','".$item['sex']."','".$item['b_date']."','".$item['b_place']."','".$item['bloodtype']."','".$item['civil_stat']."','".$item['spouse_name']."','".$item['mothers_name']."','".$item['fam_position']."','".$item['home_no']."','".$item['barangay']."','".$item['street']."','".$item['city']."','".$item['province']."','".$item['contact_no']."','".$item['educ_attainment']."','".$item['employ_status']."','".$item['ph_member']."','".$item['ph_no']."','".$item['member_category']."','".$item['facility_no']."','".$item['dswdnhts']."','".$item['suffix']."','".$item['added_by']."','".$item['submitted_by']."','".$item['patient_id']."','".$item['date_submitted']."')");
			}
		}

		if(!$sqltemp_per){

			echo "Record Failed to Upload";

		}else{

			echo "Upload Successful";

		}

	}
	
?>