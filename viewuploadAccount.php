<?php

include("db_connect.php");


if(isset($_POST['accid']))
{	
	$acc_id=$_POST['accid'];
    $sqlselect = "SELECT * from acc_req where ar_id = '$acc_id'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);

    echo json_encode($row);


}



?>