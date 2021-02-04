<?php
include "db_connect.php";
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
                <a href="homeOIC.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">MCHOIMS</a>
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
                                        <span><?php $id=$_GET['userid'];
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
                                        <a href="profileofficer.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
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
                    <a href="homeOIC.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
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
                        <li><a href="updateactivity.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Update Activities/Programs</a></li>
                        <li><a href="addactivity.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Add Activities/Programs</a></li>

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
                                <li><a href="viewPER.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">List of Records</a></li>
                                <li><a href="updatePER.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Update Records</a></li>
                                <li><a href="addPER.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Add Record</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-plus-square"></i>
                                <span class="hidden-xs">Individual Treatment Record</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="viewITR.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">List of Records</a></li>
                                <li><a href="updateITR.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Update Records</a></li>
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
                        <li><a href="uploadPER.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">PER from User<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by = 'user'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITR.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">ITR from User<?php
                                $sql="SELECT count(*) as cntupload from temp_itr where added_by = 'user'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadPERapp.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">PER from Mobile<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by = 'userMobile'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITRapp.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">ITR from Mobile<?php
                                $sql="SELECT count(*) as cntupload from temp_itr where added_by = 'userMobile'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>         
                        <li><a href="uploadPERbrgy.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">PER from Barangay<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by='brgy'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
                        <li><a href="uploadITRbrgy.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">ITR from Barangay<?php
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
            <li><a href="homeOIC.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">Home</a></li>
            <li><a href="#">Patient Enrollment Record</a></li>
            <li><a href="#">View</a></li>
        </ol>
    </div>
</div>

<!--         <div class="row">
            <div class="col-xs-12">
                <input type='button' value='Transfer to barangay'  class='btn btn-info btn-warning transfer'/>
                <div class="box">
                    <div class="box-header">
                        <div class="box-name">
                            <i class="fa fa-medkit"></i>
                            <span>List of Enrolled Patients</span>
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
                                    <th>Patient I.D.</th>
                                                <th>Lastname</th>
                                                <th>Firstname</th>
                                                <th>Middlename</th>
                                                <th>Address</th>
                                                <th>Added/Approved</th>
                                                <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                                            $sql = "SELECT patient_enrollment.family_serial_no , name.lname, name.fname, name.mname, contact_info.home_no , contact_info.street , contact_info.barangay, contact_info.city, patient_enrollment.added_by ,patient_enrollment.patient_id from patient_enrollment inner join name inner join contact_info on name.n_id = patient_enrollment.n_id and patient_enrollment.status='active' and contact_info.ci_id = patient_enrollment.ci_id";
                                            $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
                                        ?>
                            <tbody>
                                 <?php while ($row = mysqli_fetch_array($result)) { 
                                                echo( "<tr class='trID_" .$row['family_serial_no']. "'>
                                                    <td class='serialno'>" . $row['patient_id'] . "</td>
                                                    <td class='lname'>" . $row[1] . "</td>
                                                    <td class='fname'>" . $row[2] . "</td>
                                                    <td class='mname'>" . $row[3] . "</td>
                                                    <td class='address'>" . $row[4] . " " . $row[5] . " " .$row[6] . " " .$row[7] ."</td>                                            
                                                    <td class='added'>" . $row[8] . "</td>
                                                    
                                                    <td>
                                                        <input type='button' value='View' id='".$row['patient_id']."' class='btn btn-info btn-primary view_data'/>
                                                        <input type='button' value='Update' id='".$row['patient_id']."' class='btn btn-info btn-warning update_patient'/>
                                                    </td>
                                                    
                                                  </tr>"); }

                                              ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div> -->

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-medkit"></i>
                    <span>List of New uploads</span>
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
                                        <th>Submitted by</th>
                                        <th>Date Submitted</th>
                                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                                    $sql = "SELECT patient_enrollment.family_serial_no,patient_enrollment.patient_id, name.lname, name.fname, name.mname, contact_info.home_no, contact_info.street,contact_info.barangay, contact_info.city, temp_itr.nature_of_visit, temp_itr.submitted_by, temp_itr.tempitr_id, temp_itr.date_submitted  from temp_itr inner join patient_enrollment inner join name inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and name.n_id=patient_enrollment.n_id and patient_enrollment.patient_id=temp_itr.patient_id";

                                    $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
                                ?>
                                <tbody>
                         <?php while ($row = mysqli_fetch_array($result)) { 
                                        echo( "<tr>
                                            <td class='serialno'>" . $row['family_serial_no'] . "</td>
                                            <td class='lname'>" . $row[2] . "</td>
                                            <td class='fname'>" . $row[3] . "</td>
                                            <td class='mname'>" . $row[4] . "</td>
                                            <td class='address'>" . $row['home_no'] . " " . $row['street'] . " " .$row['barangay'] . " " .$row['city'] ."</td>
                                            <td class='mname'>" . $row['submitted_by'] . "</td>
                                            <td class='mname'>" . $row['date_submitted'] . "</td>
                                            <td> <input type='button' value='View Full Details' id='".$row['tempitr_id']."' class='btn btn-warning edit_data' />
                                            <button type='button' class='btn btn-warning'><a href='viewTempItr.php?tempid=".$row['tempitr_id']."'>View Full Details</a></button>       
                                            <button type='button' id='".$row['tempitr_id']."' class='btn btn-danger btndelete'>Delete</button> 
                                            </td>
                                            
                                          </tr>"); }

                                      ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
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

</body>
<script type="text/javascript">
$(document).ready(function() {
    TinyMCEStart('#wysiwig_simple', null);
    TinyMCEStart('#wysiwig_full', 'extreme');
    WinMove();
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
}
$(document).ready(function() {
    // Load Datatables and run plugin on tables 
    LoadDataTablesScripts(AllTables);
    // Add Drag-n-Drop feature
    WinMove();
});
</script>

<script type="text/javascript">

</script>
</body>
</html>
