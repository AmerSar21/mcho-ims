<?php
include("db_connect.php");

if(isset($_POST['tempitr']))
{
    $sqlselect = "SELECT * from temp_itr where tempitr_id = '".$_POST['tempitr']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);
    $patientid = $row['patient_id'];

    $sqlselectother = "SELECT patient_enrollment.family_serial_no, name.lname, name.fname, name.mname, contact_info.home_no, contact_info.street,contact_info.barangay, contact_info.city, temp_itr.nature_of_visit, patient_enrollment.patient_id  from temp_itr inner join patient_enrollment inner join name inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and name.n_id=patient_enrollment.n_id and patient_enrollment.patient_id='$patientid'";
    $resultselectother = mysqli_query($con,$sqlselectother);
    $rowother = mysqli_fetch_array($resultselectother);

    $arrayrow = array_merge($row,$rowother);
    echo json_encode($arrayrow);


}


?>