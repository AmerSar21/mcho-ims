<?php

include ("db_connect.php");

if(isset($_POST['itrID']))
{
    $itrid = $_POST['itrID'];
    $sqlselect = "SELECT * from indiv_treat_rec where itr_id = '".$_POST['itrID']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);
    $patientinfoid = $row['pe_id'];
    $forchurhuid = $row['fcr_id'];
    $reftransactid = $row['ref_tran_id'];
    $treatmentid = $row['treatment_id'];

    $sqlselectpatientinfo = "SELECT patient_enrollment.family_serial_no, name.lname, name.fname, name.mname, name.suffix, contact_info.home_no, contact_info.street,contact_info.barangay, contact_info.city, indiv_treat_rec.itr_id  from indiv_treat_rec inner join patient_enrollment inner join name inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and name.n_id=patient_enrollment.n_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.itr_id='$itrid'";
    $resultselectpatientinfo = mysqli_query($con,$sqlselectpatientinfo);
    
	$sqlselectforchurhu = "SELECT * from for_chu_rhu WHERE fcr_id = '$forchurhuid' ";
    $resultselectforchurhu = mysqli_query($con,$sqlselectforchurhu);

    $sqlselectreftransact = "SELECT * from referral_transaction WHERE ref_tran_id = '$reftransactid' ";
    $resultselectreftransact = mysqli_query($con,$sqlselectreftransact);

    $sqlselecttreatment = "SELECT * from treatment WHERE treatment_id = '$treatmentid' ";
    $resultselectedtreatment = mysqli_query($con,$sqlselecttreatment);



    
    $rowpatientinfo = mysqli_fetch_array($resultselectpatientinfo);
    $rowforchurhu = mysqli_fetch_array($resultselectforchurhu);
    $rowreftransact = mysqli_fetch_array($resultselectreftransact);
    $rowtreatment = mysqli_fetch_array($resultselectedtreatment);


    $arrayrow = array_merge($rowpatientinfo,$rowforchurhu,$rowreftransact,$rowtreatment);
    


    echo json_encode($arrayrow);
    



}





?>