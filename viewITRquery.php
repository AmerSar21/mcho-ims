<?php
include("db_connect.php");
session_start();

if(isset($_POST['itrID']))
{
	$output = "";
    $sqlselect = "SELECT * from indiv_treat_rec where itr_id = '".$_POST['itrID']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);

    $patientenrollid = $row['pe_id'];
    $forCHURHUid = $row['fcr_id'];
    $refertransactid = $row['ref_tran_id'];
    $treatmentid = $row['treatment_id'];

    $sqlselectpatientinfo = "SELECT patient_enrollment.family_serial_no, name.lname, name.fname, name.mname, name.suffix, contact_info.home_no, contact_info.street,contact_info.barangay, contact_info.city, indiv_treat_rec.itr_id  from indiv_treat_rec inner join patient_enrollment inner join name inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and name.n_id=patient_enrollment.n_id and patient_enrollment.pe_id='$patientenrollid' ";
    $resultselectpatientinfo = mysqli_query($con,$sqlselectpatientinfo);
    
    
	$sqlselectforCHURHU = "SELECT * from for_CHU_RHU WHERE fcr_id = '$forCHURHUid' ";
    $resultselectforCHURHU = mysqli_query($con,$sqlselectforCHURHU);

    $sqlselectrefertransact = "SELECT * from referral_transaction WHERE ref_tran_id = '$refertransactid' ";
    $resultselectrefertransact = mysqli_query($con,$sqlselectrefertransact);

    $sqlselecttreatment = "SELECT * from treatment WHERE treatment_id = '$treatmentid' ";
    $resultselecttreatment = mysqli_query($con,$sqlselecttreatment);

    

    $output .= '
    <div class="table-responsive">
    	<table class="table table-bordered">';
    while($rownpatientinfo = mysqli_fetch_array($resultselectpatientinfo) AND $rowforCHURHU = mysqli_fetch_array($resultselectforCHURHU) AND $rowrefertransact = mysqli_fetch_array($resultselectrefertransact) AND $rowtreatment = mysqli_fetch_array($resultselecttreatment))
    {
    	$output .= "
    		<div class='form-group'>
                <label>Family Serial Number</label>
                <input class='form-control' value = '".$rownpatientinfo['family_serial_no']."' readonly>
            </div>
            <div class='form-group'>
				<label>Lastname</label>
				<input class='form-control' value='".$rownpatientinfo['lname']."' readonly>
				<label>Firstname</label>
				<input class='form-control' value='".$rownpatientinfo['fname']."' readonly>
				<label>Middlename</label>
				<input class='form-control' value='".$rownpatientinfo['mname']."' readonly>
				<label>Suffix</label>
				<input class='form-control' value='".$rownpatientinfo['suffix']."' readonly>
			</div>
			<div class='form-group'>
				<label>Age</label>
				<input class='form-control' value='".$rowforCHURHU['age']."' readonly>
			</div>
			<div class='form-group'>
				<label>Residential Address</label>
				<input class='form-control' value='".$rownpatientinfo['home_no']." ".$rownpatientinfo['street']." ".$rownpatientinfo['barangay']." ".$rownpatientinfo['city']."' readonly>
			</div>                                                
			<div>
				<label> For CHU/RHU Personnel only</label>
			</div>
			<div class='form-group'>
				<label>Mode of Transaction</label>
				<input class='form-control' value='".$rowforCHURHU['mode_transaction']."' readonly>                   
			</div>
			<div class='form-group'>
				<label>Date of Consultation</label>
				<input class='form-control' value='".$rowforCHURHU['date_consultation']."' readonly>
			</div>
			<div class='form-group'>
				<label>Consultation time</label>
				<input class='form-control' value='".$rowforCHURHU['time_consultation']."' readonly>
			</div>
			<div class='form-group'>
				<label>Blood Pressure</label>
				<input class='form-control' value='".$rowforCHURHU['blood_pressure']."' readonly>
			</div>
			<div class='form-group'>
				<label>Height</label>
				<input class='form-control' value='".$rowforCHURHU['height']."' readonly>
			</div>
			<div class='form-group'>
				<label>Temperature</label>
				<input class='form-control' value='".$rowforCHURHU['temperature']."' readonly>
			</div>
			<div class='form-group'>
				<label>Weight</label>
				<input class='form-control' value='".$rowforCHURHU['weight']."' readonly>
			</div>
			<div class='form-group'>
				<label>Name of attending Officer</label>
				<input class='form-control' value='".$rowforCHURHU['name_of_attending']."' readonly>
			</div>
			<div class='form-group'>
				<label>Nature of Visit</label>
				<input class='form-control' value='".$rowtreatment['nature_of_visit']."' readonly>
			</div>

			<div>
				<label> For Referral Transaction Only</label>
			</div>
			<div class='form-group'>
				<label>Referred from</label>
				<input class='form-control' value='".$rowrefertransact['referred_from']."' readonly>
			</div>
			<div class='form-group'>
				<label>Referred to</label>
				<input class='form-control' value='".$rowrefertransact['referred_to']."' readonly>
			</div>
			<div class='form-group'>
				<label>Reason for referral</label>
				<textarea class='form-control' rows='3'  readonly>".$rowrefertransact['reason_of_referral']."</textarea>
			</div>
			<div class='form-group'>
				<label>Referred by</label>
				<input class='form-control' value='".$rowrefertransact['referred_by']."' readonly>
			</div>
			<div class='form-group'>
				<label>Chief Complaints</label>
				<textarea class='form-control' rows='5' readonly> ".$rowtreatment['chief_complaints']."</textarea>
			</div>
			<div class='form-group'>
				<label>Name of Health Care Provider</label>
				<textarea class='form-control' rows='3' readonly>".$rowtreatment['name_health_careprovider']."</textarea>
			</div>
			<div class='form-group'>
				<label>Performed Laboratory Test</label>
				<textarea class='form-control' rows='3' readonly>".$rowtreatment['performed_lab_test']."</textarea>
			</div>
			<div class='form-group'>
				<label>Diagnosis</label>
				<textarea class='form-control' rows='5' readonly> ".$rowtreatment['diagnosis']."</textarea>
			</div>
			<div class='form-group'>
				<label>Medication/Treatment</label>
				<textarea class='form-control' rows='5' readonly>".$rowtreatment['medication']."</textarea>
			</div>
			<div class='form-group'>
				<label>Laboratory Findings/Impression</label>
				<textarea class='form-control' rows='5' readonly>".$rowtreatment['lab_findings']."</textarea>
			</div>

    	";

    }
    $output .= "</table></div>";
    echo $output;


}



?>