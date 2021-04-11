<?php

// $host="localhost"; // Host name.
// $db_user="root"; //mysql user
// $db_password=""; //mysql pass
// $db='mchoims_database'; // Database name.
// $conn=mysqli_connect($host,$db_user,$db_password, $db) or die (mysqli_error());
include("db_connect.php");
session_start();

$userid = $_SESSION['userid'];
$sql = "SELECT fname, lname from acc_info where ai_id=$userid";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$submittedby =$row['fname']." ".$row['lname'];
$row=0;
 
 if(isset($_POST["Import"])){
        
        $filename=$_FILES["file"]["tmp_name"];      
 
         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                $row++;

                if($row == 1) continue;

                if ($getData[0])
                {
               $sql1 = "INSERT into temp_itr (`family_serial_no`, `age`, `mode_transaction`, `date_consultation`, `time_consultation`, `blood_pressure`, `temperature`, `height`, `weight`, `name_of_attending`, `nature_of_visit`, `chief_complaints`, `diagnosis`, `medication`, `lab_findings`, `name_health_careprovider`, `performed_lab_test`, `referred_from`, `referred_to`, `reason_of_referral`, `referred_by`, added_by, submitted_by, patient_id) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','user', '$submittedby', '".$getData[21]."')";
                   $result1 = mysqli_query($con, $sql1);
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