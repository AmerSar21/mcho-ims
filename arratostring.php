<?php
$sqlgetbrgy="SELECT brgy_name FROM barangay where brgy_name='$brngy'";
if($res = mysqli_query($con,$sqlgetbrgy)){
	if(mysqli_num_rows($res) > 0){
		while($rowb = mysqli_fetch_array($res)){
			$dbselected = $rowb['brgy_name'];
		}
	}
}

$option = array();

function subArraysToString($ar, $sep = ', ') {
    $str = '';
    foreach ($ar as $val) {
        $str .= implode($sep, $val);
        $str .= $sep; // add separator between sub-arrays
    }
    $str = rtrim($str, $sep); // remove last separator
    return $str;
}

	$sqlbrgy="SELECT brgy_name FROM barangay ORDER BY brgy_name ASC";
	$resultbrgy = mysqli_query($con,$sqlbrgy);
 while($row = mysqli_fetch_assoc($resultbrgy))
{
	array_push($option,$row);
}

$opt = '';
foreach ($option as $key) {
	if($dbselected == $key){
		$opt .= '<option selected="selected" value='.$option.'>'.$option.'</option>';
	}else{
		$opt .= '<option value="'.$option.'">"'.$option.'"</option>';
	}
}
?>