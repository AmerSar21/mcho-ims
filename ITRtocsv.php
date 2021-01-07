<?php
include("db_connect.php");
$brgy = $_GET['brgy'];
header("Content-type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename=ITR.csv");
$output = fopen("php://output","w");
fputcsv($output,array('Family Serial No.', 'Age', 'Mode of Transaction', 'Date of consultation', 'consultation time', 'Blood Pressure', 'Temperature', 'Height', 'Weight', 'Attending officer', 'Nature of Visit' , 'Chief Complaints', 'Diagnosis', 'Medication', 'Laboratory Findings', 'Healthcare Provider', 'Performed Laboratory Test', 'Referred From', 'Referred to', 'Reason of referral', 'Referrred by', 'Patient ID'));
$sql = "SELECT patient_enrollment.family_serial_no, for_chu_rhu.age,for_chu_rhu.mode_transaction, for_chu_rhu.date_consultation, for_chu_rhu.time_consultation, for_chu_rhu.blood_pressure, for_chu_rhu.temperature, for_chu_rhu.height, for_chu_rhu.weight, for_chu_rhu.name_of_attending, treatment.nature_of_visit, treatment.chief_complaints, treatment.diagnosis, treatment.medication, treatment.lab_findings, treatment.name_health_careprovider, treatment.performed_lab_test, referral_transaction.referred_from, referral_transaction.referred_to, referral_transaction.reason_of_referral, referral_transaction.referred_by, patient_enrollment.patient_id from indiv_treat_rec join patient_enrollment join name join contact_info join treatment join referral_transaction join for_chu_rhu on referral_transaction.ref_tran_id=indiv_treat_rec.ref_tran_id and treatment.treatment_id=indiv_treat_rec.treatment_id and for_chu_rhu.fcr_id=indiv_treat_rec.fcr_id and contact_info.ci_id=patient_enrollment.ci_id and contact_info.barangay='$brgy' and name.n_id=patient_enrollment.n_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active';";
$result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($result))
{
	fputcsv($output, $row);
}
fclose($output);


?>