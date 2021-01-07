<?php
include "db_connect.php";

$sql = "SELECT brgy_name from barangay";
$result = mysqli_query($con,$sql);

while($row=mysqli_fetch_assoc($result))
{
	$sqlupdate = "INSERT INTO report (barangay) values ('".$row['brgy_name']."')";
	
	if(mysqli_query($con,$sqlupdate))
	{
		echo "inserted";
	}
}


?>