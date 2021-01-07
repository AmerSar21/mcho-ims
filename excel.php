<?php
include("db_connect.php");
$output = '';

	$sql = "SELECT patient_enrollment.family_serial_no , name.lname, name.fname, name.mname, name.suffix, other_info.sex, other_info.b_date, other_info.b_place, other_info.bloodtype, other_info.civil_stat, contact_info.home_no , contact_info.street , contact_info.barangay, contact_info.city, contact_info.province, contact_info.contact_no, related_info.spouse_name, related_info.mothers_name, related_info.fam_position, educ_employ.educ_attainment, educ_employ.employ_status, phil_info.ph_member, phil_info.ph_no, phil_info.member_category, phil_info.facility_no, phil_info.dswdnhts from patient_enrollment inner join name inner join other_info inner join related_info inner join educ_employ inner join phil_info inner join contact_info on other_info.oi_id = patient_enrollment.oi_id and related_info.ri_id = patient_enrollment.ri_id and educ_employ.ee_id = patient_enrollment.ee_id and phil_info.pi_id = patient_enrollment.pi_id and name.n_id = patient_enrollment.n_id and contact_info.ci_id = patient_enrollment.ci_id";
	$result = mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
		$output .= '
			<table class="table" bordered="1">
				<tr>
					<th>Family Serial No.</th>
                                        <th>Lastname</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Suffix</th>
                                        <th>Home Number</th>
                                        <th>street</th>
                                        <th>Barangay</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Contact Number</th>
                                        <th>Gender</th>
                                        <th>Birthdate</th>
                                        <th>Birthplace</th>
                                        <th>Bloodtype</th>
                                        <th>Civil Status</th>                                  
                                        <th>Spouse Name</th>
                                        <th>Mothers Name</th>
                                        <th>Family Position</th>
                                        <th>Educational Attainment</th>
                                        <th>Employment Status</th>
                                        <th>Philhealth Member</th>
                                        <th>Philhealth Number</th>
                                        <th>Member Category</th>
                                        <th>Facility No.</th>
                                        <th>Member Category</th>
				</tr>';
		while($row=mysqli_fetch_array($result))
		{
			$output .='
				<tr>
					<td>'.$row['family_serial_no'].'</td>
					<td>'.$row['lname'].'</td>
					<td>'.$row['fname'].'</td>
					<td>'.$row['mname'].'</td>
					<td>'.$row['suffix'].'</td>
					<td>'.$row['home_no'].'</td>
					<td>'.$row['street'].'</td>
					<td>'.$row['barangay'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['province'].'</td>
					<td>'.$row['contact_no'].'</td>
					<td>'.$row['sex'].'</td>
					<td>'.$row['b_date'].'</td>
					<td>'.$row['b_place'].'</td>
					<td>'.$row['bloodtype'].'</td>
					<td>'.$row['civil_stat'].'</td>
					<td>'.$row['spouse_name'].'</td>
					<td>'.$row['mothers_name'].'</td>
					<td>'.$row['fam_position'].'</td>
					<td>'.$row['educ_attainment'].'</td>
					<td>'.$row['employ_status'].'</td>
					<td>'.$row['ph_member'].'</td>
					<td>'.$row['ph_no'].'</td>
					<td>'.$row['member_category'].'</td>
					<td>'.$row['facility_no'].'</td>
					<td>'.$row['dswdnhts'].'</td>

				</tr>
			';
		}
		$output .='</table>';
		
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
		echo $output;
	}


?>