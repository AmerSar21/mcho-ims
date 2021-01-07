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
           $modeoftransaction = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue()); 
           $dateconsultation = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
           $timeconsultation = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue()); 
           $bloodpressure = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
           $temperature = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
           $height = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11, $row)->getValue()); 
           $weight = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12 ,$row)->getValue());
           $nameofattending = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
           $age = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14, $row)->getValue());
           $referredfrom = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
           $referredto = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16, $row)->getValue()); 
           $reasonofreferral = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17, $row)->getValue());
           $referredby = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18, $row)->getValue());
           $natureofvisit = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19, $row)->getValue()); 
           $chiefcomplaints = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20, $row)->getValue());
           $diagnosis = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(21, $row)->getValue());
           $medication = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22, $row)->getValue()); 
           $labfindings = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(23, $row)->getValue());
           $namehealthcare = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(24, $row)->getValue());
           $performedlabtest = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(25, $row)->getValue()); 
           $chronicdisease = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(26, $row)->getValue());     
           $sql = "INSERT INTO temp_itr(`family_serial_no`, `age`, `mode_transaction`, `date_consultation`, `time_consultation`, `blood_pressure`, `temperature`, `height`, `weight`, `name_of_attending`, `nature_of_visit`, `chief_complaints`, `diagnosis`, `medication`, `lab_findings`, `name_health_careprovider`, `performed_lab_test`, `chronic_disease`, `referred_from`, `referred_to`, `reason_of_referral`, `referred_by`, added_by) VALUES ('".$famserialno."','".$age."', '".$modeoftransaction."' , '".$dateconsultation."' , '".$timeconsultation."',  '".$bloodpressure."', '".$temperature."', '".$height."', '".$weight."', '".$nameofattending."', '".$natureofvisit."', '".$chronic_disease."', '".$diagnosis."', '".$medication."', '".$labfindings."', '".$namehealthcare."', '".$performedlabtest."','".$chronicdisease."', '".$referredfrom."', '".$referredto."', '".$reasonofreferral."', '".$referredby."', 'user')";  
           mysqli_query($connect, $sql);   
           $html .= "</tr>";  
      }  
 }  
 $html .= '</table>';  
 echo $html;  
echo '<br />Data Inserted';  

 ?>