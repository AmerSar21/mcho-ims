<?php

include("db_connect.php");


if(isset($_POST['perid']))
{
    $sqlselect = "SELECT * from temp_per where temPER_id = '".$_POST['perid']."'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);

    echo json_encode($row);


}



?>