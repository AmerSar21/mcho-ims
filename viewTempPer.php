<?php
include("db_connect.php");
include("updatePERquery.php");
session_start();

$tempid = $_GET['tempid'];
    $sqlselect = "SELECT * from temp_per where temPER_id = '$tempid'";
    $resultselect = mysqli_query($con,$sqlselect);
    $row = mysqli_fetch_array($resultselect);
    $fsno = $row['family_serial_no'];
    $pid = $row['patient_id'];
    $lnm = $row['lname'];
    $mnm = $row['mname'];
    $fnm = $row['fname'];
    $sx = $row['sex'];
    $bdt = $row['b_date'];
    $bplc = $row['b_place'];
    $bldtp = $row['bloodtype'];
    $cst = $row['civil_stat'];
    $spnm = $row['spouse_name'];
    $mtnm = $row['mothers_name'];
    $fmpos = $row['fam_position'];
    $hmno = $row['home_no'];
    $strt = $row['street'];
    $brngy = $row['barangay'];
    $cty = $row['city'];
    $prv = $row['province'];
    $cntno = $row['contact_no'];
    $edatt = $row['educ_attainment'];
    $emstat = $row['employ_status'];
    $phmm = $row['ph_member'];
    $phno = $row['ph_no'];
    $mmctg = $row['member_category'];
    $fctyno = $row['facility_no'];
    $dnhts = $row['dswdnhts'];
    if($row['suffix'] == ''){
        $sfx = 'none';
    }else{
        $sfx = $row['suffix'];
    } 
    $addby = $row['added_by'];
    $subby = $row['submitted_by'];
    $dsub = $row['date_submitted'];

if (isset($_POST['deletebutton'])){
    $perid = $_POST['iddelete'];

    $sqlselect = "DELETE FROM temp_per where temPER_id = '$perid'";

    if(!mysqli_query($con,$sqlselect))
    {
        echo "<script type='text/javascript'>
                alert('Unsuccessfully Deleted');
            </script>";
    }
        else
    {
        echo "<script type='text/javascript'>
                alert('Successfully Deleted');
            </script>";
    }

}else if(isset($_POST['acceptbutton'])){
    
    $patientid = $_POST['f_patientid'];
    $famserial = $_POST['f_serialno'];
    $lname = $_POST['f_lname'];
    $fname = $_POST['f_fname'];
    $mname = $_POST['f_mname'];
    if($_POST['f_gender'] == ''){
        $gender = $sx;
    }else{
        $gender = $_POST['f_gender'];
    }
    $bdate = $_POST['f_bdate'];
    $bplace = $_POST['f_bplace'];
    $bloodtype = $_POST['f_bloodtype'];
    if($_POST['f_civstat'] == ''){
        $civstat = $cst;
    }else{
        $civstat = $_POST['f_civstat'];
    }
    $spouse = $_POST['f_spouse'];
    if($_POST['f_educattain'] == ''){
        $educattain = $edatt;
    }else{    
        $educattain = $_POST['f_educattain'];
    }
    if($_POST['f_employstat'] == ''){
        $employstat = $emstat;
    }else{
        $employstat = $_POST['f_employstat'];
    }
    if($_POST['f_famposition'] == ''){
        $famposition = $fmpos;
    }else{
        $famposition = $_POST['f_famposition'];
    }
    $suffix = $_POST['f_suffix'];
    $mother = $_POST['f_mother'];
    $homeno = $_POST['f_homeno'];
    $street = $_POST['f_street'];
    if($_POST['f_brgy'] == ''){
        $brgy = $brngy;
    }else{
        $brgy = $_POST['f_brgy'];
    }
    $city = $_POST['f_city'];
    $province = $_POST['f_province'];
    $contactno = $_POST['f_contactno'];
    if($_POST['f_dswd'] == ''){
        $dswd = $dnhts;
    }else{
        $dswd = $_POST['f_dswd'];
    }
    $facilityno = $_POST['f_facilityno'];
    if($_POST['f_phmember'] == ''){
        $phmember = $phmm;
    }else{
        $phmember = $_POST['f_phmember'];
    }
    if($_POST['f_phnumber'] == ''){
        $phnumber = $phno;
    }else{
        $phnumber = $_POST['f_phnumber'];
    }
    if($_POST['f_phcategory'] == ''){
        $phcategory = $mmctg;
    }else{
        $phcategory = $_POST['f_phcategory'];
    }

    $sqlinsertname = "INSERT INTO name (lname, fname, mname, suffix) VALUES ('$lname' , '$fname' , '$mname', '$suffix')";
    $resultinsertname = mysqli_query($con,$sqlinsertname);
    $nameID = mysqli_insert_id($con);

    $sqlinsertotherinfo = "INSERT INTO other_info (sex, b_date, b_place, bloodtype, civil_stat) VALUES ('$gender' , '$bdate' , '$bplace' , '$bloodtype' , '$civstat');";
    $resultinsertotherinfo = mysqli_query($con,$sqlinsertotherinfo);
    $otherinfoID = mysqli_insert_id($con);

    $sqlinsertrelatedinfo = "INSERT INTO related_info (spouse_name, mothers_name, fam_position) VALUES ('$spouse' , '$mother' , '$famposition')";
    $resultinsertrelatedinfo = mysqli_query($con,$sqlinsertrelatedinfo);
    $relatedinfoID = mysqli_insert_id($con);

    $sqlinsertcontactinfo = "INSERT INTO contact_info (home_no, street, city, province, contact_no, barangay) VALUES ('$homeno' , '$street' , '$city' , '$province' , '$contactno' , '$brgy')";
    $resultinsertcontactinfo = mysqli_query($con,$sqlinsertcontactinfo);
    $contactinfoID = mysqli_insert_id($con);

    $sqlinserteducemploy = "INSERT INTO educ_employ (educ_attainment, employ_status) VALUES ('$educattain' , '$employstat')";
    $resultinserteducemploy = mysqli_query($con,$sqlinserteducemploy);
    $educemployID = mysqli_insert_id($con);

    $sqlinsertphilinfo = "INSERT INTO phil_info (ph_member, ph_no, member_category, facility_no, dswdnhts) VALUES ('$phmember' , '$phnumber' , '$phmember', '$facilityno', '$dswd')";
    $resultinsertphilinfo = mysqli_query($con,$sqlinsertphilinfo);
    $philinfoID = mysqli_insert_id($con);
    $userid = $_SESSION['userid'];
    $sql = "SELECT fname, lname from acc_info where ai_id=$userid";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $addedby =$row['fname']." ".$row['lname'];

    $sqlinsertPER = "INSERT INTO patient_enrollment (family_serial_no, n_id, oi_id, ri_id, ci_id, ee_id, pi_id,added_by, status, patient_id) VALUES ('$famserial', '$nameID', '$otherinfoID', '$relatedinfoID', '$contactinfoID', '$educemployID' ,'$philinfoID','$addedby', 'active','$patientid')";

    echo $addedby;
    die();
            
    if((!mysqli_query($con, $sqlinsertPER)) and (!mysqli_query($con, $resultinsertphilinfo)) and (!mysqli_query($con, $resultinserteducemploy)) and (!mysqli_query($con, $resultinsertcontactinfo)) and (!mysqli_query($con, $resultinsertrelatedinfo)) and (!mysqli_query($con, $resultinsertotherinfo)) and (!mysqli_query($con, $resultinsertname)))
    {   
        echo "<script type='text/javascript'>
                alert('Unsuccessfully Inserted');
            </script>";
    }
    else
    {
        echo " <script type='text/javascript'>
                alert('Succesfully Inserted');
            </script>";
    }

    $sqldeletetemp = "DELETE FROM temp_per where temPER_id='$tempid'";
    $resultdeletee = mysqli_query($con,$sqldeletetemp);

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
        <link href='http://fonts.googleapis.com/csss?family=Righteous' rel='stylesheet' type='text/css'>
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
                                        <span>
                                        <?php 
                                            $id=$_SESSION['userid'];
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
                                $sql="SELECT count(*) as cntupload from temp_per";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITR.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">ITR from User<?php
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
            <li><a href="#">Uploads</a></li>
            <li><a href="#">PER</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-content">
                <h4 class="page-header">Accept Patient Enrollment</h4>
                <form class="form-horizontal" role="form" method="post"enctype='multipart/form-data'>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Family Serial Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Serial Number" readonly value="<?php echo $fsno;?>" name="f_serialno">
                        </div>
                        <label class="col-sm-2 control-label">Patient I.D.</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Patient I.D." readonly value="<?php echo $pid;?>" name="f_patientid">
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-2 control-label">First name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="First name" name="f_fname" value="<?php echo $fnm;?>">
                            <input type="text" class="form-control" placeholder="Middle Name" name="f_mname" value="<?php echo $mnm;?>">
                            <input type="text" class="form-control" placeholder="Last Name" name="f_lname" value="<?php echo $lnm;?>">
                            <input type="text" class="form-control" placeholder="Suffix e.g. Jr., Sr., II, III"  name="f_suffix" value="<?php echo $sfx;?>">
                        </div>
                        <label class="col-sm-2 control-label">Residential Address</label>
                        <div class="col-sm-4">
                            <?php
                             $sqlbrgy="SELECT brgy_name FROM barangay ORDER BY brgy_name ASC";
                             $resultbrgy = mysqli_query($con,$sqlbrgy);
                            $option = '';
                            $option .='<option value="">Select..</option>';
                             while($row = mysqli_fetch_assoc($resultbrgy))
                            {
                              $option .= '<option value = "'.$row['brgy_name'].'">'.$row['brgy_name'].'</option>';
                            }
                            ?>
                            <input type="text" class="form-control" placeholder="Home no." name="f_homeno" value="<?php echo $hmno;?>">
                            <input type="text" class="form-control" placeholder="Street" name="f_street"  value="<?php echo $strt;?>">
                            <select name="f_brgy"> 
                                <?php
                                 echo $option;
                                ?>
                            </select>
                            <input type="text" class="form-control" placeholder="City" name="f_city" value="<?php echo $cty;?>">
                            <input type="text" class="form-control" placeholder="Province" name="f_province" value="<?php echo $prv;?>">
                            <div>
                            </div>
                                <label class="control-label">Current Barangay: <?php echo '<span style="color:green;">'.$brngy.'</span>'?></label>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-4">
                            <select name="f_gender"value="<?php echo $sx;?>">
                                <option value="">Select..</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div>
                                <label class="control-label">Current Gender: <?php echo '<span style="color:green;">'.$sx.'</span>'?></label>
                            </div>
                        </div>
                        <label class="col-sm-2 control-label">Mother's Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Enter here" name="f_mother" value="<?php echo $mtnm;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Birth Date</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" placeholder="Date"  name="f_bdate" value="<?php echo $bdt;?>">
                        </div>
                        <label class="col-sm-2 control-label">Contact Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="0910-123-4567" name="f_contactno" value="<?php echo $cntno;?>">
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Birthplace</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Street, Barangay, City, Province" name="f_bplace" value="<?php echo $bplc;?>">
                        </div>
                        <label class="col-sm-2 control-label">DSWD NHTS?</label>
                        <div class="col-sm-4">
                            <select name="f_dswd" placeholder="Select..." value="<?php echo $dnhts;?>">
                                <option value="">Select..</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            <div>
                                <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$dnhts.'</span>';?></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Blood Type</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="A / B / AB / O" name="f_bloodtype" value="<?php echo $bldtp;?>">
                        </div>

                        <label class="col-sm-2 control-label">Facility Household No.</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Enter here" name="f_facilityno" value="<?php echo $fctyno;?>">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Civil Status</label>
                            <div class="col-sm-4">
                                <select name="f_civstat">
                                    <option value="">Select..</option>
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Annulled">Annulled</option>
                                    <option value="Widow/er">Widow/er</option>
                                    <option value="Separated">Separated</option>
                                    <option value="Co-habitation">Co-habitation</option>
                                </select>
                                <div>
                                    <label class="control-label">Status: <?php echo '<span style="color:green;">'.$cst.'</span>'?></label>
                                </div>
                            </div><label class="col-sm-2 control-label">PhilHealth Member?</label>
                            <div class="col-sm-4">
                                <select name="f_phmember">
                                    <option value="">Select..</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <div>
                                    <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$phmm.'</span>';?></label>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Spouse Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Enter here" name="f_spouse" value="<?php echo $spnm;?>">
                        </div>
                        <label class="col-sm-2 control-label">PhilHealth Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Enter here" name="f_phnumber" value="<?php echo $phno;?>">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Educational Attainment</label>
                            <div class="col-sm-4">
                                <select name="f_educattain">
                                    <option value="">Select..</option>
                                    <option value="No Formal Education">No Formal Education</option>
                                    <option value="HighSchool">HighSchool</option>
                                    <option value="College">College</option>
                                    <option value="Elementary">Elementary</option>
                                    <option value="Vocational">Vocational</option>
                                    <option value="Post-graduate">Post-graduate</option>
                                </select>
                                <div>
                                    <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$edatt.'</span>';?></label>
                                </div>
                            </div>
                            <label class="col-sm-2 control-label">If member, please indicate category</label>
                            <div class="col-sm-4">
                                <select name="f_phcategory">
                                    <option value="">Select..</option>
                                    <option value="FE-Private">FE-Private</option>
                                    <option value="FE-Government">FE-Government</option>
                                    <option value="IE">IE</option>
                                </select>
                                <div>
                                    <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$mmctg.'</span>';?></label>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Employment Status</label>
                            <div class="col-sm-4">
                                <select name="f_employstat">
                                    <option value="">Select..</option>
                                    <option value="Unknown">Unknown</option>
                                    <option value="Student">Student</option>
                                    <option value="Employed">Employed</option>
                                    <option value="Retired">Retired</option>
                                    <option value="None/Unemployed">None/Unemployed</option>
                                </select>
                                <div>
                                    <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$emstat.'</span>';?></label>
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2 control-label">Family Position</label>
                            <div class="col-sm-4">
                                <select name="f_famposition">
                                    <option value="">Select..</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                </select>
                                <div>
                                    <label class="control-label">Choice: <?php echo '<span style="color:green;">'.$fmpos.'</span>';?></label>
                                </div>
                            </div>
                    </div> 
                    <div class="form-group">
                    <div  class="col-md-3 col-md-offset-2">
                         <input type="submit" name="acceptbutton" class="btn btn-primary" value="Approve">
                    </div>
                    </div>
                </form>
            </div>
        </div>
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
        $('.edit_data').click(function(){
            var perid = $(this).attr("id");

            $.ajax({
                url:"viewPERuploadquery.php",
                method:"post",
                data:{perid:perid},
                dataType:"json",
                success:function(data){
                    $('#f_patientid').val(data.patient_id);
                    $('#f_perid').val(perid);
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
            var perid = $(this).attr("id");

            $('#m_iddelete').val(perid);
            $('#deletemodal').modal('show');
        });

        

    });
    
</script>
</body>
</html>
