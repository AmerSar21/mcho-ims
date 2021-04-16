<?php

include("db_connect.php");
session_start();

$userid = $_SESSION['userid'];
$sql = "SELECT fname, lname from acc_info where ai_id=$userid";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$submittedby =$row['fname']." ".$row['lname'];
$row=0;

 if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];      
        $date = date("Y/m/d");
 
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file)) !== FALSE)
             {
                $row++;

                if($row == 1) continue;

                if ($getData[0])
                {
               $sql1 = "INSERT into temp_itr (`family_serial_no`, `age`, `mode_transaction`, `blood_pressure`, `height`, `temperature`, `weight`, `date_consultation`, `time_consultation`, `name_of_attending`, `nature_of_visit`, `referred_from`, `referred_to`, `reason_of_referral`, `referred_by`, `name_health_careprovider`, `chief_complaints`, `diagnosis`, `performed_lab_test`,`medication`,`lab_findings`,added_by,submitted_by, patient_id,date_submitted) 
                   values ('".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."','".$getData[23]."','user', '$submittedby', '".$getData[25]."','$date')";
                   $result1 = mysqli_query($conn, $sql1);
                   
                if(!isset($result1))
                {
                    echo "<script type='text/javascript'>
                        alert('CSV File has been successfully Imported');                        
                    window.location.href = 'addITRuser.php?userid=".$userid."';
                    </script>";       
                }
                else {
                      echo "<script type='text/javascript'>
                        alert('CSV File has been successfully Imported');                        
                    window.location.href = 'addITRuser.php?userid=".$userid."';
                    </script>";
                }
                }
             }
            
             fclose($file); 
         }
    }    
 
 
 ?>