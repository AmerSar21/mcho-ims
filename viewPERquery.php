<?php

include("db_connect.php");


if(isset($_POST['patientid']))
{
	$output = "";
    $sqlselect = "SELECT * from patient_enrollment where patient_id = '".$_POST['patientid']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);
    $nameid = $row['n_id'];
    $otherinfoid = $row['oi_id'];
    $relatedinfoid = $row['ri_id'];
    $contactinfoid = $row['ci_id'];
    $educemployid = $row['ee_id'];
    $philinfoid = $row['pi_id'];

    $sqlselectname = "SELECT * from name WHERE n_id = '$nameid' ";
    $resultselectname = mysqli_query($con,$sqlselectname);
    
	$sqlselectotherinfo = "SELECT * from other_info WHERE oi_id = '$otherinfoid' ";
    $resultselectotherinfo = mysqli_query($con,$sqlselectotherinfo);

    $sqlselectrelatedinfo = "SELECT * from related_info WHERE ri_id = '$relatedinfoid' ";
    $resultselectrelatedinfo = mysqli_query($con,$sqlselectrelatedinfo);

    $sqlselecteducemploy = "SELECT * from educ_employ WHERE ee_id = '$educemployid' ";
    $resultselecteducemploy = mysqli_query($con,$sqlselecteducemploy);

    $sqlselectcontactinfo = "SELECT * from contact_info WHERE ci_id = '$contactinfoid' ";
    $resultselectcontactinfo = mysqli_query($con,$sqlselectcontactinfo);

    $sqlselectphilinfo = "SELECT * from phil_info WHERE pi_id = '$philinfoid' ";
    $resultselectphilinfo = mysqli_query($con,$sqlselectphilinfo);

    $output .= '
    <div class="table-responsive">
    	<table class="table table-bordered">';
    while($rowname = mysqli_fetch_array($resultselectname) AND $rowotherinfo = mysqli_fetch_array($resultselectotherinfo) AND $rowrelatedinfo = mysqli_fetch_array($resultselectrelatedinfo) AND $roweducemploy = mysqli_fetch_array($resultselecteducemploy) AND $rowcontactinfo = mysqli_fetch_array($resultselectcontactinfo) AND $rowphilinfo = mysqli_fetch_array($resultselectphilinfo))
    {
    	$output .= "
    		<div class='form-group'>
                <label>Family Serial Number</label>
                <input class='form-control' value = '".$row['family_serial_no']."' readonly>
                <label>Patient ID</label>
                <input class='form-control' value = '".$row['patient_id']."' readonly>
            </div>
            <div class='form-group'>
				<label>Lastname</label>
				<input class='form-control' value='".$rowname['lname']."' readonly>
				<label>Firstname</label>
				<input class='form-control' value='".$rowname['fname']."' readonly>
				<label>Middlename</label>
				<input class='form-control' value='".$rowname['mname']."' readonly>
			</div>
			<div class='form-group'>
				<label>Gender</label>
				<input class='form-control' value='".$rowotherinfo['sex']."' readonly>
			</div>
			<div class='form-group'>
				<label>Date of Birth</label>                                                    
				<input class='form-control' value='".$rowotherinfo['b_date']."'readonly>
			</div>
			<div class='form-group'>
				<label>Birthplace</label>
				<input class='form-control' value='".$rowotherinfo['b_place']."' readonly>
			</div>
			<div class='form-group'>
				<label>Bloodtype</label>
				<input class='form-control' value='".$rowotherinfo['bloodtype']."' readonly>
			</div>	
			<div class='form-group'>
				<label>Civil Status</label>
				<input class='form-control' value='".$rowotherinfo['civil_stat']."' readonly>
			</div>
			<div class='form-group'>
				<label>Spouse's Name</label>
				<input class='form-control' value='".$rowrelatedinfo['spouse_name']."' readonly>
			</div>
			<div class='form-group'>
				<label>Educational Attainment</label>
				<input class='form-control' value='".$roweducemploy['educ_attainment']."' readonly>
			</div>
			<div class='form-group'>
				<label>Employment Status</label>
				<input class='form-control' value='".$roweducemploy['employ_status']."' readonly>
			</div>
			<div class='form-group'>
				<label>Family Position</label>
				<input class='form-control' value='".$rowrelatedinfo['fam_position']."' readonly>
			</div>
                                                
			<div class='form-group'>
				<label>Mother's Name</label>
				<input class='form-control' value='".$rowrelatedinfo['mothers_name']."' readonly>
			</div>
			<div class='form-group'>
				<label>Residential Address</label>
				<input class='form-control' value='".$rowcontactinfo['home_no']."' readonly>
			
				<input class='form-control' value='".$rowcontactinfo['street']."' readonly>
			
				<input class='form-control' value='".$rowcontactinfo['barangay']."' readonly>
			
				<input class='form-control' value='".$rowcontactinfo['city']."' readonly>
			
				<input class='form-control' value='".$rowcontactinfo['province']."' readonly>
			</div>
			<div class='form-group'>
				<label>Contact Number</label>
				<input class='form-control' value='".$rowcontactinfo['contact_no']."' readonly>
			</div>
			<div class='form-group'>
				<label>DSWD NHTS?</label>
				<input class='form-control' value='".$rowphilinfo['dswdnhts']."' readonly>
			</div>
			<div class='form-group'>
				<label>Facility Household No.</label>
				<input class='form-control' value='".$rowphilinfo['facility_no']."' readonly>
			</div>
			<div class='form-group'>
				<label>Philhealth Member</label>
				<input class='form-control' value='".$rowphilinfo['ph_member']."' readonly>
			</div>
			<div class='form-group'>
				<label>Philhealth Number</label>
				<input class='form-control' value='".$rowphilinfo['ph_no']."' readonly>
			</div>
			<div class='form-group'>
				<label>If member, please indicate Category</label>
				<input class='form-control' value='".$rowphilinfo['member_category']."' readonly>
			</div>

    	";

    }
    $output .= "</table></div>";
    echo $output;


}



?> 