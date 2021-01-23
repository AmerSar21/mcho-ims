<?php

include("db_connect.php");

if(isset($_POST['peid']))
{
    $sqlselect = "SELECT * from patient_enrollment where pe_id = '".$_POST['peid']."'";
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

    
    $rowname = mysqli_fetch_array($resultselectname);
    $rowotherinfo = mysqli_fetch_array($resultselectotherinfo);
    $rowrelatedinfo = mysqli_fetch_array($resultselectrelatedinfo);
    $roweducemploy = mysqli_fetch_array($resultselecteducemploy);
    $rowcontactinfo = mysqli_fetch_array($resultselectcontactinfo);
    $rowphilinfo = mysqli_fetch_array($resultselectphilinfo);

    $arrayrow = array_merge($row, $rowname,$rowotherinfo,$rowrelatedinfo,$roweducemploy,$rowcontactinfo,$rowphilinfo);
    


    echo json_encode($arrayrow);
    



}



?>