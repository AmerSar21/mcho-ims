 <?php
include "db_connect.php";
session_start();
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
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-6 col-sm-offset-3">
			
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">Register</h3>
					</div>
					<form id="defaultForm" class='form-horizontal' role="form" method="post" enctype='multipart/form-data'>
					<div class="text-center">
					<i>
					User registration is subject for approval and review. The user account will be submitted via email once it has been approved by the administrator. Be sure to check your email. 
					</i>
					</div>
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
							<input type="date" class="form-control" placeholder="Date"  name="f_bdate" >
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
							<input type="password" class="form-control" placeholder="Enter here" name="password" required>
						</div>
						<label class="col-sm-2 control-label">Confirm Password	</label>
						<div class="col-sm-4">
							<input type="password" class="form-control" placeholder="Enter here" name="confirmPassword" required>
							
						</div>
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_email" required>
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

					</div>
					<div class="form-group text-center">						
							
							<div>
								<input type="submit" value="Register" name="addbutton" class="btn btn-primary">
							</div>
							<div>
								<a href="index.php">Already have an account?</a>
							</div>
					</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
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
	$password = $_POST['password'];
	$confirmpass = $_POST['confirmPassword'];
	$email = $_POST['f_email'];
	$usertype = $_POST['f_usertype'];
	$barangay = $_POST['f_brgy'];

	$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	$from = new DateTime($bdate);
	$to   = new DateTime('today');
	$age =$from->diff($to)->y; 
	echo $age;

	$sqlcheckuser = "SELECT count(*) as cntuser from account where username = '$username' and status='active'";
	$result = mysqli_query($con,$sqlcheckuser) or die (mysqli_error($con));
	$row = mysqli_fetch_assoc($result);
	$countuser= $row['cntuser'];

	if($age>=18)
	{
		if($countuser)
		{
			echo "<script type='text/javascript'>
					alert('Username Already Taken!');
				</script>";
		}

		else if($password==$confirmpass)
		{
			$sql ="INSERT INTO acc_req (fname, lname, bdate, gender, email,username, password, usertype, barangay) VALUES ('$firstname','$lastname','$bdate','$gender','$email','$username','$hashed_password','$usertype','$barangay');";
			$result = mysqli_query($con,$sql) or die (mysqli_error($con));
			if(!$result)
		    {
		            echo "<script type='text/javascript'>	
					alert('Unsuccesfully Submitted');
				</script>";
		    }
		    else
		    {
		        echo "<script type='text/javascript'>
					alert('Succesfully Submitted');
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