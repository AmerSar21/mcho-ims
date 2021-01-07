<?php
include("db_connect.php");
$brgy = $_GET['brgy'];
header("Content-type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=PER.csv");
$output = fopen("php://output","w");
fputcsv($output,array('Family Serial No.' , 'Lastname', 'Firstname', 'Middlename', 'Gender', 'Birthdate', 'Birthplace', 'Bloodtype', 'Civil Status', 'Spouse', 'Mother', 'Family Position', 'Home No.' , 'Street', 'Barangay', 'City', 'Province', 'Contact No.', 'Educational attainment', 'Employment status', 'Philhealth member', 'Philhealth No.', 'Member Category', 'Facility No', 'DSWD NHTS', 'Suffix','patient ID'));
$sql = "SELECT patient_enrollment.family_serial_no , name.lname, name.fname, name.mname, other_info.sex, other_info.b_date, other_info.b_place, other_info.bloodtype, other_info.civil_stat, related_info.spouse_name, related_info.mothers_name, related_info.fam_position,contact_info.home_no , contact_info.street , contact_info.barangay, contact_info.city, contact_info.province, contact_info.contact_no, educ_employ.educ_attainment, educ_employ.employ_status, phil_info.ph_member, phil_info.ph_no, phil_info.member_category, phil_info.facility_no, phil_info.dswdnhts, name.suffix,patient_enrollment.patient_id from patient_enrollment inner join name inner join other_info inner join related_info inner join educ_employ inner join phil_info inner join contact_info on other_info.oi_id = patient_enrollment.oi_id and related_info.ri_id = patient_enrollment.ri_id and educ_employ.ee_id = patient_enrollment.ee_id and phil_info.pi_id = patient_enrollment.pi_id and name.n_id = patient_enrollment.n_id and contact_info.barangay='$brgy' and contact_info.ci_id = patient_enrollment.ci_id and patient_enrollment.status='active'";
$result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($result))
{
	fputcsv($output, $row);
}
fclose($output);


?>