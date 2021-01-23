<?php

include("db_connect.php");


if(isset($_POST['accid']))
{
    $sqlselect = "SELECT account.username, account.password, account.usertype, account.barangay, acc_info.fname, acc_info.lname, acc_info.bdate, acc_info.gender, acc_info.email from account join acc_info on acc_info.ai_id=account.ai_id where account_id = '".$_POST['accid']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);


    echo json_encode($row);
    



}



?>