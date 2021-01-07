<?php

include("db_connect.php");


if(isset($_POST['accountid']))
{
	$output = "";
    $sqlselect = "SELECT account.username, account.password, account.usertype, account.barangay, acc_info.fname, acc_info.lname, acc_info.bdate, acc_info.gender, acc_info.email from account join acc_info on acc_info.ai_id=account.ai_id where account_id = '".$_POST['accountid']."'";
    $resultselect = mysqli_query($con,$sqlselect);

    $output .= '
    <div class="table-responsive">
    	<table class="table table-bordered">';
    while($row = mysqli_fetch_array($resultselect))
    {
    	$output .= "
    		<div class='form-group'>
                                            <label>Username</label>
                                            <input class='form-control' placeholder='Username' name='f_user' id='f_user' value='".$row['username']."' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Password</label>
                                            <input class='form-control' type='password' placeholder='Password' name='f_pass' id='f_pass' value='".$row['password']."' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Usertype</label>
                                            <input class='form-control' name='f_usertype'  id='f_usertype' value='".$row['usertype']."' readonly>
                                        </div>  
                                        <div class='form-group'>
                                            <label>Lastname</label>
                                            <input class='form-control' placeholder='Lastname' id='f_lname' name='f_lname' value='".$row['lname']."' readonly>
                                            <label>Firstname</label>
                                            <input class='form-control' placeholder='Firstname' name='f_fname' id='f_fname' value='".$row['fname']."' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Gender</label>
                                            <input class='form-control' placeholder='Female/Male' name='f_gender' id='f_gender' value='".$row['gender']."' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Date of Birth</label>                                                    
                                            <input class='form-control' placeholder='1990-01-01' name='f_bdate' id='f_bdate' value='".$row['bdate']."' readonly>
                                        </div>
                                        
                                        
                                        <div class='form-group'>
                                            <label>Email</label>
                                            <input class='form-control' placeholder='juandelacruz@gmail.com' name='f_email' id='f_email' value='".$row['email']."' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Barangay Assigned</label>
                                            <input class='form-control' name='f_brgy' id='f_brgy' value='".$row['barangay']."' readonly>
                                        </div>	

    	";

    }
    $output .= "</table></div>";
    echo $output;


}



?> 