<?php
include("db_connect.php");
$output = '';

	$sql = "SELECT patient_enrollment.family_serial_no, name.lname, name.fname, name.mname, name.suffix, contact_info.home_no, contact_info.street, contact_info.barangay, for_chu_rhu.mode_transaction, for_chu_rhu.date_consultation, for_chu_rhu.time_consultation, for_chu_rhu.blood_pressure, for_chu_rhu.temperature, for_chu_rhu.height, for_chu_rhu.weight, for_chu_rhu.name_of_attending, for_chu_rhu.age, referral_transaction.referred_from, referral_transaction.referred_to, referral_transaction.reason_of_referral, referral_transaction.referred_by, treatment.nature_of_visit, treatment.chief_complaints, treatment.diagnosis, treatment.medication, treatment.lab_findings, treatment.name_health_careprovider, treatment.performed_lab_test, treatment.chronic_disease from indiv_treat_rec join patient_enrollment join name join contact_info join treatment join referral_transaction join for_chu_rhu on referral_transaction.ref_tran_id=indiv_treat_rec.ref_tran_id and treatment.treatment_id=indiv_treat_rec.treatment_id and for_chu_rhu.fcr_id=indiv_treat_rec.fcr_id and contact_info.ci_id=patient_enrollment.ci_id and name.n_id=patient_enrollment.n_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id;";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$output .= '
			<table class="table" bordered="1">
				<tr>
					<th>Family Serial No.</th>
                                        <th>Lastname</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Suffix</th>
                                        <th>Address</th>
                                        <th>Mode of Transaction</th>
                                        <th>Date of Consultation</th>
                                        <th>Consultation Time</th>
                                        <th>Blood Pressure</th>
                                        <th>Temperature</th>
                                        <th>Height</th>                                  
                                        <th>Weight</th>
                                        <th>Name of attending Officer</th>
                                        <th>Age</th>
                                        <th>Referred From</th>
                                        <th>Referred To</th>
                                        <th>Reason of Referral</th>
                                        <th>Referred By</th>
                                        <th>Nature of Visit</th>
                                        <th>Chief Complaints</th>
                                        <th>Diagnosis</th>
                                        <th>Medication</th>
                                        <th>Laboratory Findings</th>
                                        <th>Name of Healthcare provider</th>
                                        <th>Performed Laboratory Test</th>
                                        <th>Chronic/Non-communicable Disease</th>
				</tr>';
		while($row=mysqli_fetch_array($result))
		{
			$output .='
				<tr>
					<td>'.$row['family_serial_no'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['mname'].'</td>
					<td>'.$row['suffix'].'</td>
					<td>'.$row['home_no'].' '.$row['street'].' '.$row['barangay'].'</td>
					<td>'.$row['mode_transaction'].'</td>
					<td>'.$row['date_consultation'].'</td>
					<td>'.$row['time_consultation'].'</td>
					<td>'.$row['blood_pressure'].'</td>
					<td>'.$row['temperature'].'</td>
					<td>'.$row['height'].'</td>
					<td>'.$row['weight'].'</td>
					<td>'.$row['name_of_attending'].'</td>
					<td>'.$row['age'].'</td>
					<td>'.$row['referred_from'].'</td>
					<td>'.$row['referred_to'].'</td>
					<td>'.$row['reason_of_referral'].'</td>
					<td>'.$row['referred_by'].'</td>
					<td>'.$row['nature_of_visit'].'</td>
					<td>'.$row['chief_complaints'].'</td>
					<td>'.$row['diagnosis'].'</td>
					<td>'.$row['medication'].'</td>
					<td>'.$row['lab_findings'].'</td>
					<td>'.$row['name_health_careprovider'].'</td>
					<td>'.$row['performed_lab_test'].'</td>
					<td>'.$row['chronic_disease'].'</td>

				</tr>
			';
		}
		$output .='</table>';
		
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $output;
	}


?>