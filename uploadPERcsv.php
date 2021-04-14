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
        // echo "Filename: " . $_FILES['file']['name']."<br>";
        // echo "Type : " . $_FILES['file']['type'] ."<br>";
        // echo "Size : " . $_FILES['file']['size'] ."<br>";
        // echo "Temp name: " . $_FILES['file']['tmp_name'] ."<br>";
        // echo "Error : " . $_FILES['file']['error'] . "<br>";
        // die();

         if($_FILES["file"]["size"] > 0)
         {
            $file = fopen($filename,"r");
            while (($getData = fgetcsv($file)) !== FALSE)
             {
                $row++;

                if($row == 1) continue;

                if ($getData[0]) {
               $sql = "INSERT into temp_per (family_serial_no,lname,fname,mname,suffix,sex,b_place,b_date,bloodtype,civil_stat,spouse_name,educ_attainment,employ_status,fam_position,patient_id,home_no,street,barangay,city,province,mothers_name,contact_no,dswdnhts,facility_no,ph_member,ph_no,added_by,submitted_by,member_category,date_submitted) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."','".$getData[10]."','".$getData[11]."','".$getData[12]."','".$getData[13]."','".$getData[14]."','".$getData[15]."','".$getData[16]."','".$getData[17]."','".$getData[18]."','".$getData[19]."','".$getData[20]."','".$getData[21]."','".$getData[22]."','".$getData[23]."','".$getData[24]."','".$getData[25]."','user', '$submittedby','".$getData[26]."','$date')";
                   $result = mysqli_query($con, $sql);
                   // echo "sql: " . $sql . "</br";
                   // var_dump($result);
                   // die();

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