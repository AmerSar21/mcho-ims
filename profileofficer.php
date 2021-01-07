<?php
include "db_connect.php";


if(isset($_POST['updatebutton']))
{
	$id = $_GET['userid'];
	$firstname = $_POST['f_fname'];
	$lastname = $_POST['f_lname'];
	$bdate = $_POST['f_bdate'];
	$gender = $_POST['f_gender'];
	$username = $_POST['f_username'];
	$password = $_POST['f_password'];
	$email = $_POST['f_email'];
	$usertype = $_POST['f_usertype'];
	$barangay = $_POST['f_brgy'];

	$updateaccinfo = "UPDATE acc_info set fname='$firstname', lname='$lastname', bdate='$bdate', gender='$gender', email='$email' where ai_id ='$id' ";
	$resultaccinfo = mysqli_query($con,$updateaccinfo) or die (mysqli_error($con));
	$updateacc = "UPDATE account set username='$username', password='$password', usertype='$usertype', barangay='$barangay' where ai_id ='$id' ";
	$resultacc = mysqli_query($con,$updateacc) or die (mysqli_error($con));

	if((!$resultaccinfo) AND (!$resultacc))
	    {
	            echo "<script type='text/javascript'>
				alert('Unsuccesfully Update Account');
			</script>";
	    }
	    else
	    {
	        echo "<script type='text/javascript'>
				alert('Succesfully Update Account');
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
                                echo "<span class='badge'>" . $sum . "</span>	";
                               }
                               ?>	
					</a>
					<ul class="dropdown-menu">
						<li><a href="uploadPER.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">PER from User<?php
                                $sql="SELECT count(*) as cntupload from temp_per where added_by='user'";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></li>
						<li><a href="uploadITR.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">ITR from User<?php
                                $sql="SELECT count(*) as cntupload from temp_itr where added_by='user'";
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
			<li><a href="#">Profile</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>User Profile</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">User Details</h4>
				<form class="form-horizontal" role="form" method="post" enctype='multipart/form-data'>
				<?php
				$selectuser = "SELECT acc_info.fname,acc_info.lname,acc_info.bdate,acc_info.gender,acc_info.email, account.username,account.password,account.usertype,account.barangay from acc_info inner join account where account.ai_id='$id' and acc_info.ai_id='$id';";
				$result = mysqli_query($con,$selectuser) or die(mysqli_error($con));
				$rowuser = mysqli_fetch_array($result);
				?>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $rowuser['fname'];?>" class="form-control" placeholder="Enter here" name="f_fname" required>
						</div>
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $rowuser['lname'];?>" class="form-control" placeholder="Enter here" name="f_lname" required>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-4">
								<select class="form-control" name="f_gender">
									<option value="" selected disabled hidden><?php echo $rowuser['gender'];?></option>
                                    <option>Male</option>
                                    <option>Female</option>                                                        
                                </select>
						</div>
						<label class="col-sm-2 control-label">Birthdate</label>
						<div class="col-sm-4">
							<input type="date" value="<?php echo $rowuser['bdate'];?>" class="form-control" placeholder="Date"  name="f_bdate" >
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $rowuser['username'];?>" placeholder="Enter here" name="f_username" required readonly>
						</div>
						<label class="col-sm-2 control-label">Usertype</label>
						<div class="col-sm-4">
								<select class="form-control" name="f_usertype" required readonly>
									<option selected disabled hidden><?php echo $rowuser['usertype'];?></option>
                                                                                          
                                </select>
						</div>

					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" value="<?php echo $rowuser['password'];?>" placeholder="Enter here" name="f_password" required>
						</div>
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" value="<?php echo $rowuser['email'];?>" placeholder="Enter here" name="f_email" required>
						</div>

					</div>
					<div class="form-group">
						
						<label class="col-sm-2 control-label">Barangay Assigned</label>
						<div class="col-sm-4">
							<select class="form-control" name="f_brgy" required readonly>
							<option value="" selected disabled hidden><?php echo $rowuser['barangay'];?></option> 
								
							</select>
						</div>
					<div class="form-group">
					<div  class="col-md-3 col-md-offset-2">
						 <input type="submit" name="updatebutton" class="btn btn-primary" value="Update">
					</div>
					</div>
				
				</form>
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

<script type="text/javascript">
// Run Select2 plugin on elements
function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();
}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}
$(document).ready(function() {
	// Create Wysiwig editor for textare
	TinyMCEStart('#wysiwig_simple', null);
	TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
});
</script>
</body>
</html>
