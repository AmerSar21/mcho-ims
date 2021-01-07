<?php
include("db_connect.php");

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
				<a href="homeadmin.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">MCHOIMS</a>
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
										<a href="profileadmin.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
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
					<a href="homeadmin.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
						<i class="fa fa-user"></i>
						<span class="hidden-xs">Home</span>
					</a>
				</li>
				<li>
					<a href="updateacc.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
						<i class="fa fa-edit"></i>
						<span class="hidden-xs">Update Account</span>
					</a>
				</li>
				<li>
					<a href="addacc.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
						<i class="fa fa-plus-square"></i>
						<span class="hidden-xs">Add Account</span>
					</a>
				</li>
				<li>
					<a href="accreq.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
						<i class="fa fa-mail-forward "></i>
						<span class="hidden-xs">Account Request<?php
                                $sql="SELECT count(*) as cntupload from acc_req";
                                $result = mysqli_query($con,$sql);
                               $row = mysqli_fetch_array($result);
                               $count = $row['cntupload'];
                               if($count)
                               {
                                echo "<span class='badge'>". $count ."</span>";
                               }
                               ?></a></span>
					</a>
				</li>
				<li>
                    <a href="viewarchiveacc.php?userid=<?php $id=$_GET['userid']; echo $id; ?>">
                        <i class="fa fa-archive"></i>
                        <span class="hidden-xs">Archived Accounts</span>
                    </a>
                </li>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			
<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="homeOIC.php">Home</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Account</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Add Account</h4>
				<form class="form-horizontal" role="form" method="post" enctype='multipart/form-data'>
					<div class="form-group">
						<label class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_fname" required>
						</div>
						<label class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_lname" required>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Gender</label>
						<div class="col-sm-4">
								<select class="form-control" name="f_gender">
                                    <option>Male</option>
                                    <option>Female</option>                                                        
                                </select>
						</div>
						<label class="col-sm-2 control-label">Birthdate</label>
						<div class="col-sm-4">
							<input type="date" class="form-control" placeholder="Date"  name="f_bdate" id="f_bdate">
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_username" required>
						</div>
						<label class="col-sm-2 control-label">Usertype</label>
						<div class="col-sm-4">
								<select class="form-control" name="f_usertype" required>
                                    <option value="admin">Admin</option>
                                    <option value="officer">CHO Officer</option>
                                    <option value="officer">Nurse</option>
                                    <option value="user">BHC Officer</option>
                                    <option value="user">Fieldworker</option>                                                        
                                </select>
						</div>

					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" placeholder="Enter here" name="f_password" required>
						</div>
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_email" required>
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Confirm Password	</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" placeholder="Enter here" name="f_confirmpass" required>
							<?php
							if(isset($_POST['subbutton']))
								{
									$firstname = $_POST['f_fname'];
									$lastname = $_POST['f_lname'];
									$bdate = $_POST['f_bdate'];
									$gender = $_POST['f_gender'];
									$username = $_POST['f_username'];
									$password = $_POST['f_password'];
									$confirmpass = $_POST['f_confirmpass'];
									$email = $_POST['f_email'];
									$usertype = $_POST['f_usertype'];
									$barangay = $_POST['f_brgy'];
									if($password==$confirmpass)
									{
										$sql ="INSERT INTO acc_req(`fname`, `lname`, `bdate`, `gender`, `username`, `password`, `email`, `usertype`, `barangay`) VALUES ('$firstname','$lastname','$bdate','$gender','$username','$password','$email','$usertype','$barangay');";
										if(!mysqli_query($con, $sql))
										{
											echo "not inserted";
										}
										else
										{
											echo "inserted";
										}
									}
									else
									{
										echo "<p class='bg-danger'>Password is not same</p>";	
									}

								}
							?>
						</div>
						<label class="col-sm-2 control-label">Barangay Assigned</label>
						<div class="col-sm-4">
							<?php
						 $sqlbrgy="SELECT brgy_name FROM barangay ORDER BY brgy_name ASC";
						 $resultbrgy = mysqli_query($con,$sqlbrgy);
						$option = '';
						 while($row = mysqli_fetch_assoc($resultbrgy))
						{
						  $option .= '<option value = "'.$row['brgy_name'].'">'.$row['brgy_name'].'</option>';
						}
						?><select class="form-control" name="f_brgy" required> 
								<?php echo $option; ?>
							</select>
						</div>
					<div class="form-group">
					<div  class="col-md-3 col-md-offset-2">
						 <input type="submit" name="addbutton" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn btn-default ">Reset</button>
					</div>
					</div>
				
				</form>
			</div>
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
<?php
if(isset($_POST['addbutton']))
{
	$firstname = $_POST['f_fname'];
	$lastname = $_POST['f_lname'];
	$bdate = $_POST['f_bdate'];
	$gender = $_POST['f_gender'];
	$username = $_POST['f_username'];
	$password = $_POST['f_password'];
	$confirmpass = $_POST['f_confirmpass'];
	$email = $_POST['f_email'];
	$usertype = $_POST['f_usertype'];
	$barangay = $_POST['f_brgy'];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$id = $_GET['userid'];
	$sql = "SELECT fname, lname from acc_info where ai_id=$id";
    $result = mysqli_query($con,$sql);
    $rowuser = mysqli_fetch_array($result);
    $addedby = $rowuser['fname'] . " " . $rowuser['lname'];

    $from = new DateTime($bdate);
	$to   = new DateTime('today');
	$age =$from->diff($to)->y; 
	echo $age;

	if($age>=18)
	{
		if($password==$confirmpass)
		{
			$sql ="INSERT INTO acc_info(fname, lname, bdate, gender, email) VALUES ('$firstname','$lastname','$bdate','$gender','$email');";
			$result = mysqli_query($con,$sql);
		    $accinfoid = mysqli_insert_id($con);	    
		    $sql1 ="INSERT INTO account(username, password, usertype, barangay, ai_id, added_by, status) VALUES ('$username','$hashed_password','$usertype','$barangay','$accinfoid','$addedby','active');";
		    $sql1result = mysqli_query($con,$sql1) or die (mysqli_error($con));
			if((!$result) AND (!$sql1result))
		    {
		            echo "<script type='text/javascript'>
					alert('Unsuccesfully Added');
				</script>";
		    }
		    else
		    {
		    	$name = $firstname ." ".$lastname;
		    	$sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Add Account', '$addedby', '$name')";
		    	$resultlog = mysqli_query($con,$sqllog) or die(mysql_error($con));
		        echo "<script type='text/javascript'>
					alert('Succesfully Added');
				</script>";
		    }
		    

	     }
 	}
	else
	{
		echo "<script type='text/javascript'>
					alert('Unsuccesfully Added. Age must be 18+');
				</script>";
	}

}


?>