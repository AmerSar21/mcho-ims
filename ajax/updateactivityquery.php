<?php
include("db_connect.php");
	if(isset($_POST['activityid']))
	{
		
		$accID = $_POST['activityid'];
		$sql = "SELECT * from activity where act_id='$accID';";
		$result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
		$row = mysqli_fetch_array($result);

		echo json_encode($row);
    
}

?>