 
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "mchoims_database");  
 include ("PHPExcel/IOFactory.php");  

$filename=$_POST['filename'];
 $html="<table border='1'>";
 $file = "upload/" . $filename; 
 $objPHPExcel = PHPExcel_IOFactory::load($file);  
 foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)   
 {  
      $highestRow = $worksheet->getHighestRow();  
      for ($row=2; $row<=$highestRow; $row++)  
      {  
           $html.="<tr>";  
           $famserialno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue()); 
           $lastname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue()); 
           $firstname = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
           $middlename = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue()); 
           $suffix = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
           $homeno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
           $street = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue()); 
           $brgy = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
           $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
           $province = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
           $contactno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
           $gender = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue()); 
           $bdate = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
           $bplace = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
           $bloodtype = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue()); 
           $civilstat = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
           $spousename = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue());
           $mothername = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue()); 
           $famposition = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
           $educattain = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue());
           $employstat = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue()); 
           $phmember = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(21, $row)->getValue());
           $phno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue());
           $membercategory = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(23, $row)->getValue()); 
           $facilityno = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(24, $row)->getValue()); 
           $dswdnhts = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(25, $row)->getValue());         
           $sql = "INSERT INTO temp_per(`family_serial_no`, `lname`, `fname`, `mname`, `sex`, `b_date`, `b_place`, `bloodtype`, `civil_stat`, `spouse_name`, `mothers_name`, `fam_position`, `home_no`, `street`, `barangay`, `city`, `province`, `contact_no`, `educ_attainment`, `employ_status`, `ph_member`, `ph_no`, `member_category`, `facility_no`, `dswdnhts`, `suffix`, added_by) VALUES ('".$famserialno."','".$lastname."', '".$firstname."' , '".$middlename."' , '".$gender."',  '".$bdate."', '".$bplace."', '".$bloodtype."', '".$civilstat."', '".$spousename."', '".$mothername."', '".$famposition."', '".$homeno."', '".$street."', '".$brgy."', '".$city."', '".$province."','".$contactno."', '".$educattain."', '".$employstat."', '".$phmember."', '".$phno."', '".$membercategory."', '".$facilityno."', '".$dswdnhts."' , '".$suffix."', 'user')";  
           mysqli_query($connect, $sql);  
           $html.= '<td>'.$lastname.'</td>';  
           $html .= '<td>'.$firstname.'</td>';
           $html.= '<td>'.$middlename.'</td>';  
           $html .= '<td>'.$suffix.'</td>';  
           $html .= "</tr>";  
      }  
 }  
 $html .= '</table>';  
 echo $html;  
echo '<br />Data Inserted';  

 ?>