<?php 
	
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
	header("Content-Type: application/json; charset=utf-8");

	define('DB_NAME', '6gENJc3N8G');
	define('DB_USER', '6gENJc3N8G');
	define('DB_PASSWORD', '0S5cFmCgSp');
	define('DB_HOST', 'remotemysql.com');

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	if(!$mysqli){
		echo "Failed";
	}else{
		echo "True";
	}

	$postdata = json_decode(file_get_contents('php://input'),true);	

	if(isset($postdata['perlist'])){
		$data = $postdata['perlist'];
		if(!empty($data)){

			foreach ($data as $item) {
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