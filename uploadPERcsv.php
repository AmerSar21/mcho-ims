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
        
        $filename=$_FILES["file"]["name"];      

        // echo "Filename: " . $_FILES['file']['name']."<br>";
        // echo "Type : " . $_FILES['file']['type'] ."<br>";
        // echo "Size : " . $_FILES['file']['size'] ."<br>";
        // echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
        // echo "Error : " . $_FILES['file']['error'] . "<br>";
        // die();

         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename, "r");
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
             {
                $row++;

                if($row == 1) continue;

                if ($getData[0]) {
               $sql = "INSERT into temp_per (`family_serial_no`, `lname`, `fname`, `mname`, `sex`, `b_date`, `b_place`, `bloodtype`, `civil_stat`, `spouse_name`, `mothers_name`, `fam_position`, `home_no`, `street`, `barangay`, `city`, `province`, `contact_no`, `educ_attainment`, `employ_status`, `ph_member`, `ph_no`, `member_category`, `facility_no`, `dswdnhts`, `suffix`, added_by, submitted_by, patient_id) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."','".$getData[23]."','".$getData[24]."','".$getData[25]."','user', '$submittedby','".$getData[26]."')";
                   $result = mysqli_query($con, $sql);
                   var_dump($result);
                   die();

                if(!isset($result))
                {
                    echo "<script type='text/javascript'>
                            alert('Invalid File:Please Upload CSV File.');                        
                            window.location.href = 'addPERuser.php?userid=".$userid."';
                          </script>";
                }
                else {
                      echo "<script type='text/javascript'>
                        alert('CSV File has been successfully Imported');                        
                    window.location.href = 'addPERuser.php?userid=".$userid."';
                    </script>";

                }
                }
             }
            
             fclose($file);
         }

    }    
 
 
 ?>