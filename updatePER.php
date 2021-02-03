 <?php
include("db_connect.php");
include("updatePERquery.php");
session_start();

if (isset($_POST['deletebutton']))
{
    $peid = $_POST['iddelete'];
    $userid = $_SESSION['userid'];
    $sql = "SELECT fname, lname from acc_info where ai_id=$userid";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $archivedby =$row['fname']." ".$row['lname'];
    
    $select = "SELECT fname,mname,lname from name inner join patient_enrollment on name.n_id=patient_enrollment.n_id and patient_enrollment.pe_id='$peid'";
    $resultselect = mysqli_query($con,$select);
    $row = mysqli_fetch_array($resultselect);
    $name = $row['fname']." ".$row['mname']." ".$row['lname'];

    $sqldeletepatientenroll = "UPDATE patient_enrollment set status='inactive', archived_by='$archivedby' where pe_id='$peid'";
    if(!mysqli_query($con,$sqldeletepatientenroll))
    {
        echo "<script type='text/javascript'>
                alert('Unsuccesfully Archived');
            </script>";
    } 
        else
    {
        $sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Archived Patient', '$archivedby', '$name')";
        $resultlog = mysqli_query($con,$sqllog) or die(mysql_error($con));
        echo "<script type='text/javascript'>
                alert('Succesfully Archived');
            </script>";
    }

}

if(isset($_POST['updatebutton']))
{
    $peid = $_POST['f_peid'];
    $patientid = $_POST['f_patientid'];
    $famserial = $_POST['f_serialno'];
    $lname = $_POST['f_lname'];
    $fname = $_POST['f_fname'];
    $mname = $_POST['f_mname'];
    $gender = $_POST['f_gender'];
    $bdate = $_POST['f_bdate'];
    $bplace = $_POST['f_bplace'];
    $bloodtype = $_POST['f_bloodtype'];
    $civstat = $_POST['f_civstat'];
    $spouse = $_POST['f_spouse'];
    $educattain = $_POST['f_educattain'];
    $employstat = $_POST['f_employstat'];
    $famposition = $_POST['f_famposition'];
    $suffix = $_POST['f_suffix'];
    $mother = $_POST['f_mother'];
    $homeno = $_POST['f_homeno'];
    $street = $_POST['f_street'];
    $brgy = $_POST['f_brgy'];
    $city = $_POST['f_city'];
    $province = $_POST['f_province'];
    $contactno = $_POST['f_contactno'];
    $dswd = $_POST['f_dswd'];
    $facilityno = $_POST['f_facilityno'];
    $phmember = $_POST['f_phmember'];
    $phnumber = $_POST['f_phnumber'];
    $phcategory = $_POST['f_phcategory'];

    $sqlselect = "SELECT * from patient_enrollment where pe_id = '$peid'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);
    $nameid = $row['n_id'];
    $otherinfoid = $row['oi_id'];
    $relatedinfoid = $row['ri_id'];
    $contactinfoid = $row['ci_id'];
    $educemployid = $row['ee_id'];
    $philinfoid = $row['pi_id'];

    $sqlupdatepatientid = "UPDATE patient_enrollment SET patient_id='$patientid' where pe_id= '$peid'";
    $resultupdatepatientid = mysqli_query($con,$sqlupdatepatientid);  

    $sqlupdatename = "UPDATE name SET lname='$lname' , fname='$fname', mname='$mname', suffix='$suffix' where n_id= '$nameid'";
    $resultupdatename = mysqli_query($con,$sqlupdatename);  


    $sqlupdateotherinfo = "UPDATE other_info SET sex='$gender', b_date='$bdate', b_place='$bplace', bloodtype='$bloodtype', civil_stat='$civstat' where oi_id='$otherinfoid'";
    $resultupdateotherinfo = mysqli_query($con,$sqlupdateotherinfo);



    $sqlupdaterelatedinfo = "UPDATE related_info SET spouse_name='$spouse', mothers_name='$mother', fam_position='$famposition' where ri_id='$relatedinfoid'";
    $resultupdaterelatedinfo = mysqli_query($con,$sqlupdaterelatedinfo);

    $sqlupdatecontactinfo = "UPDATE contact_info SET home_no ='$homeno', street='$street', city='$city', province='$province', contact_no='$contactno', barangay='$brgy' where ci_id='$contactinfoid'";
    $resultupdatecontactinfo = mysqli_query($con,$sqlupdatecontactinfo);



    $sqlupdateeducemploy = "UPDATE educ_employ SET educ_attainment='$educattain', employ_status='$employstat' where ee_id='$educemployid'";
    $resultupdateeducemploy = mysqli_query($con,$sqlupdateeducemploy);


    $sqlupdatephilinfo = "UPDATE phil_info SET ph_member='$phmember', ph_no='$phnumber', member_category='$phmember', facility_no='$facilityno', dswdnhts='$dswd' where pi_id='$philinfoid'";
    $resultupdatephilinfo = mysqli_query($con,$sqlupdatephilinfo);

    $sqlupdateserial = "UPDATE patient_enrollment set family_serial_no='$famserial' where pe_id='$peid'";
    $resultupdateserial = mysqli_query($con,$sqlupdateserial);

    $id = $_SESSION['userid'];
    $sql = "SELECT fname, lname from acc_info where ai_id=$id";
    $result = mysqli_query($con,$sql);
    $rowuser = mysqli_fetch_array($result);
    $addedby = $rowuser['fname'] . " " . $rowuser['lname'];

    if(!$resultupdatepatientid and !$resultupdateserial and !$resultupdatephilinfo and !$resultupdateeducemploy and !$resultupdatecontactinfo and !$resultupdaterelatedinfo and !$resultupdateotherinfo and !$resultupdatename)
    {
            echo "<script type='text/javascript'>
                alert('Unsuccesfully Updated');
            </script>";
    }
    else
    {
        $sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Edit Patient Information', '$addedby', '$fname $mname $lname')";
        $resultlog = mysqli_query($con,$sqllog) or die(mysql_error($con));
        echo "<script type='text/javascript'>
                alert('Succesfully Updated');
            </script>";
    }

   
   

}




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="img/DOH_logo.png" rel="icon"/>
        <title>MCHOIMS</title>
        <meta name="description" content="description">
        <meta name="author" content="DevOOPS">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
        <link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
        <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
        <link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
        <link href="plugins/select2/select2.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
                <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
<body>
<!--Start Header-->
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
    <div class="devoops-modal">
        <div class="devoops-modal-header">
            <div class="modal-header-name">
                <span>Basic table</span>
            </div>
            <div class="box-icons">
                <a class="close-link">
                    <i class="fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="devoops-modal-inner">
        </div>
        <div class="devoops-modal-bottom">
        </div>
    </div>
</div>
<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                <a href="homeOIC.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">MCHOIMS</a>
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar">
                          <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">                                 
                                    <i class="fa fa-angle-down pull-right"></i>
                                    <div class="user-mini pull-right">
                                        <span class="welcome">Welcome,</span>
                                        <span><?php $id=$_SESSION['userid'];
                                        $sql = "SELECT fname, lname from acc_info where ai_id=$id";
                                        $result = mysqli_query($con,$sql);
                                        $row = mysqli_fetch_array($result);
                                        if(!$row)
                                        {
                                            header("Location: index.php");
                                        }
                                        else{
                                        echo $row['fname'] . " " . $row['lname'];
                                                                                    }
                                        ?></span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    
                                    <li>
                                        <a href="profileofficer.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
                                            <i class="fa fa-user"></i>
                                            <span class="hidden-sm text">Profile</span>
                                        </a>
                                        <a href="index.php">
                                            <i class="fa fa-power-off"></i>
                                            <span class="hidden-sm text">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--End Header-->

<!--Start Container-->
<div id="main" class="container-fluid">
    <div class="row">
        <div id="sidebar-left" class="col-xs-2 col-sm-2">
            <ul class="nav main-menu">
                <li>
                    <a href="homeOIC.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
                        <i class="fa fa-dashboard"></i>
                        <span class="hidden-xs">Home</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-medkit"></i>
                        <span class="hidden-xs">Activities/Programs</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="updateactivity.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Update Activities/Programs</a></li>
                        <li><a href="addactivity.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Add Activities/Programs</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-list-alt"></i>
                         <span class="hidden-xs">Health Records</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-plus-square"></i>
                                <span class="hidden-xs">Patient Enrollment Records</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="viewPER.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">List of Records</a></li>
                                <li><a href="updatePER.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Update Records</a></li>
                                <li><a href="addPER.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Add Record</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-plus-square"></i>
                                <span class="hidden-xs">Individual Treatment Record</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="viewITR.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">List of Records</a></li>
                                <li><a href="updateITR.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Update Records</a></li>
                            </ul>
                        </li>
                    </ul>               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-table"></i>
                         <span class="hidden-xs">Record Request</span><?php
                                $sql="SELECT count(*) as cntupload from temp_per";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               $sql1="SELECT count(*) as cntupload1 from temp_itr";
                                $result1 = mysqli_query($con,$sql1);
                               $row1 = mysqli_fetch_array($result1);
                               $count1 = $row1['cntupload1'];
                               $sum = $count + $count1;
                               if(($count) or ($count1))
                               {
                                echo "<span class='badge'>" . $sum . "</span>   ";
                               }
                               ?>   
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="uploadPER.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">PER from User<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by='user'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITR.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">ITR from User<?php
                                $sql="SELECT count(*) as cntupload from temp_itr where added_by='user'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadPERapp.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">PER from Mobile<?php
                                $sql="SELECT count(*) as cntupload from temp_per";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITRapp.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">ITR from Mobile<?php
                                $sql="SELECT count(*) as cntupload from temp_itr";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>         
                        <li><a href="uploadPERbrgy.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">PER from Barangay<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by='brgy'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITRbrgy.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">ITR from Barangay<?php
                                $sql="SELECT count(*) as cntupload from temp_itr where added_by='brgy'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="generatereport.php" target="_blank" class="dropdown-toggle">
                        <i class="fa fa-desktop"></i>
                         <span class="hidden-xs">Report</span>
                    </a>
                </li>
                
            </ul>
        </div>
        <!--Start Content-->
        <div id="content" class="col-xs-12 col-sm-10">
            

<div class="row">
    <div id="breadcrumb" class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="homeOIC.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">Home</a></li>
            <li><a href="#">Patient Enrollment Record</a></li>
            <li><a href="#">Update</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-medkit"></i>
                    <span>Update Patient's Information</span>
                </div>
                <div class="box-icons">
                    <a class="expand-link">
                        <i class="fa fa-expand"></i>
                    </a>
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-3">
                    <thead>
                        <tr>
                            <th>Family Serial No.</th>
                                        <th>Lastname</th>
                                        <th>Firstname</th>
                                        <th>Middlename</th>
                                        <th>Address</th>
                                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                                    $sql = "SELECT patient_enrollment.pe_id, patient_enrollment.family_serial_no , name.lname, name.fname, name.mname, contact_info.home_no , contact_info.street , contact_info.barangay, contact_info.city from patient_enrollment inner join name inner join contact_info on name.n_id = patient_enrollment.n_id and contact_info.ci_id = patient_enrollment.ci_id and patient_enrollment.status='active';";
                                    $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
                                ?>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($result)) { 
                                        echo( "<tr>
                                            <td class='serialno'>" . $row['family_serial_no'] . "</td>
                                            <td class='lname'>" . $row['lname'] . "</td>
                                            <td class='fname'>" . $row['fname'] . "</td>
                                            <td class='mname'>" . $row['mname'] . "</td>
                                            <td class='address'>" . $row[5] . " " . $row[6] . " " .$row[7]. " " .$row[8] ."</td>
                                            
                                            <td> <input type='button' value='Edit' id='".$row['pe_id']."' class='btn btn-warning edit_data' />                                
                                            <button type='button' id='".$row['pe_id']."' class='btn btn-danger btndelete'>Archive</button> 
                                            </td>
                                            
                                          </tr>"); }

                                      ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form role="form" method="post">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Full Information</h4>
                                        </div>
                                        <div class="modal-body" id="PERdetail">                                            
                                        

                                        <div class='form-group'>
                                            <label>Family Serial Number</label>
                                            <input class='form-control' placeholder='Enter Serial Number' name='f_serialno' id='f_serialno'>
                                            <label>Patient ID</label>
                                            <input class='form-control' placeholder='Enter Serial Number' name='f_patientid' id='f_patientid'>
                                            <input class='form-control' type="hidden" placeholder='Enter Serial Number' name='f_peid' id='f_peid'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Lastname</label>
                                            <input class='form-control' placeholder='Lastname' id='f_lname' name='f_lname'>
                                            <label>Firstname</label>
                                            <input class='form-control' placeholder='Firstname' name='f_fname' id='f_fname'>
                                            <label>Middlename</label>
                                            <input class='form-control' placeholder='Middlename' name='f_mname' id='f_mname'>
                                            <label>Suffix</label>
                                            <input class='form-control' placeholder='e.g. Jr., Sr., II, III' name='f_suffix' id='f_suffix'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Gender</label>
                                            <input class='form-control' placeholder='Female/Male' name='f_gender' id='f_gender'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Date of Birth</label>                                                    
                                            <input class='form-control' placeholder='1990-01-01' name='f_bdate' id='f_bdate'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Birthplace</label>
                                            <input class='form-control' placeholder='Street, Barangay, City, Province' name='f_bplace' id='f_bplace'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Bloodtype</label>
                                            <input class='form-control' placeholder='A / B / AB / O' name='f_bloodtype' id='f_bloodtype'>
                                        </div>  
                                        <div class='form-group'>
                                            <label>Civil Status</label>
                                            <input class='form-control' name='f_civstat'  id='f_civstat'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Spouse's Name</label>
                                            <input class='form-control' placeholder='Lastname, Firstname Middlename' name='f_spouse' id='f_spouse'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Educational Attainment</label>
                                            <input class='form-control' name='f_educattain' id='f_educattain'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Employment Status</label>
                                            <input class='form-control' name='f_employstat'  id='f_employstat'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Family Position</label>
                                            <input class='form-control' name='f_famposition' id='f_famposition'>
                                        </div>
                                                                            
                                        <div class='form-group'>
                                            <label>Mother's Name</label>
                                            <input class='form-control' placeholder='Enter here' name='f_mother' id='f_mother'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Residential Address</label>
                                            <input class='form-control' placeholder='Home Number' name='f_homeno'  id='f_homeno'>
                                        
                                            <input class='form-control' placeholder='Street' name='f_street' id='f_street'>
                                        
                                            <input class='form-control' placeholder='Barangay' name='f_brgy' id='f_brgy'>
                                        
                                            <input class='form-control' placeholder='City' name='f_city' id='f_city'>
                                        
                                            <input class='form-control' placeholder='Province' name='f_province' id='f_province'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Contact Number</label>
                                            <input class='form-control' placeholder='0910-123-4567' name='f_contactno'  id='f_contactno'>
                                        </div>
                                        <div class='form-group'>
                                            <label>DSWD NHTS?</label>
                                            <input class='form-control' name='f_dswd' id='f_dswd'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Facility Household No.</label>
                                            <input class='form-control' name='f_facilityno' id='f_facilityno'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Philhealth Member</label>
                                            <input class='form-control' name='f_phmember' id='f_phmember'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Philhealth Number</label>
                                            <input class='form-control' name='f_phnumber' id='f_phnumber'>
                                        </div>
                                        <div class='form-group'>
                                            <label>If member, please indicate Category</label>
                                            <input class='form-control' name='f_phcategory' id='f_phcategory'>
                                        </div>
                                        <div class='modal-footer'>
                                           <button type='submit' name='updatebutton' class='btn btn-primary'>Save changes</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            
                                        </div>
                                    </div>
                                    </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                </div>
                                <!-- /.modal-dialog -->
                                <!--modaldelete-->

                                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form role="form" method="post">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Archive Patient</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to Archive this Record?</p>
                                                <p class="text-danger">This action cannot be undone.</p>
                                                <input class="form-control" type="hidden" name="iddelete" id="m_iddelete" >
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletebutton" class="btn btn-danger">Archive</button>
                                            </div>
                                         </form>

                                        </div>
                                        <!-- /.modal-content -->
                                    
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                                             

        </div>
        <!--End Content-->
    </div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery-2.1.0.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</body>
<script type="text/javascript">
$(document).ready(function() {
    // Load TimePicker plugin and callback all time and date pickers
    LoadTimePickerScript(AllTimePickers);
    // Create jQuery-UI tabs
    $("#tabs").tabs();
    // Sortable for elements
    $(".sort").sortable({
        items: "div.col-sm-2",
        appendTo: 'div.box-content'
    });
    // Droppable for example of trash
    $(".drop div.col-sm-2").draggable({containment: '.dropbox' });
    $('#trash').droppable({
        drop: function(event, ui) {
            $(ui.draggable).remove();
        }
    });
    var icons = {
        header: "ui-icon-circle-arrow-e",
        activeHeader: "ui-icon-circle-arrow-s"
    };
    // Make accordion feature of jQuery-UI
    $("#accordion").accordion({icons: icons });
    // Create UI spinner
    $("#ui-spinner").spinner();
    // Add Drag-n-Drop to boxes
    WinMove();
});
</script>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
    TestTable1();
    TestTable2();
    TestTable3();
    LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
    $('select').select2();
    $('.dataTables_filter').each(function(){
        $(this).find('label input[type=text]').attr('placeholder', 'Search');
    });
}
$(document).ready(function() {
    // Load Datatables and run plugin on tables 
    LoadDataTablesScripts(AllTables);
    // Add Drag-n-Drop feature
    WinMove();
});
</script>

<script type="text/javascript">

    $(document).ready(function(){
        $('.view_data').click(function(){
            var serialnumber = $(this).attr("id");

            $.ajax({
                url:"viewPERquery.php",
                method:"post",
                data:{serialnumber:serialnumber},
                success:function(data){
                    $('#PERdetail').html(data);
                    $('#viewModal').appendTo('body').modal("show");

                }
            })


            
        });
    });

    </script>
    <script type="text/javascript">


    $(document).ready(function(){
        $('.edit_data').click(function(){
            var peid = $(this).attr("id");

            $.ajax({
                url:"updatePERquery.php",
                method:"post",
                data:{peid:peid},
                dataType:"json",
                success:function(data){
                    $('#f_peid').val(peid);
                    $('#f_patientid').val(data.patient_id);
                    $('#f_serialno').val(data.family_serial_no);
                    $('#f_lname').val(data.lname);
                    $('#f_fname').val(data.fname);
                    $('#f_mname').val(data.mname);
                    $('#f_suffix').val(data.suffix);
                    $('#f_gender').val(data.sex);
                    $('#f_bdate').val(data.b_date);
                    $('#f_bplace').val(data.b_place);
                    $('#f_bloodtype').val(data.bloodtype);
                    $('#f_civstat').val(data.civil_stat);
                    $('#f_spouse').val(data.spouse_name);
                    $('#f_mother').val(data.mothers_name);
                    $('#f_famposition').val(data.fam_position);
                    $('#f_educattain').val(data.educ_attainment);
                    $('#f_employstat').val(data.employ_status);
                    $('#f_homeno').val(data.home_no);
                    $('#f_street').val(data.street);
                    $('#f_city').val(data.city);
                    $('#f_province').val(data.province);
                    $('#f_contactno').val(data.contact_no);
                    $('#f_brgy').val(data.barangay);
                    $('#f_phmember').val(data.ph_member);
                    $('#f_phnumber').val(data.ph_no);
                    $('#f_phcategory').val(data.member_category);
                    $('#f_facilityno').val(data.facility_no);
                    $('#f_dswd').val(data.dswdnhts);
                    $('#editModal').appendTo('body').modal("show");

                }
            })


            
        });


    $('.btndelete').click(function(){
            var peid = $(this).attr("id");

            $('#m_iddelete').val(peid);
            $('#deletemodal').appendTo('body').modal('show');
        });

        

    });
    
     </script>
</body>
</html>
