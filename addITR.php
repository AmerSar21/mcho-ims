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
			<li><a href="#">Individual Treatment Recods</a></li>
			<li><a href="#">Add</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-search"></i>
					<span>Individual Treatment Record</span>
				</div>
				<div class="box-icons">
					
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Add ITR form</h4>
				<form class='form-horizontal' role="form" method="post" enctype='multipart/form-data'>
					<div class="form-group">
						<?php
                                            
                                            if(isset($_GET['patientid']))
                                            {
                                                $patientid = $_GET['patientid'];
                                                $sql="SELECT count(*) as cntno, n_id, ci_id, family_serial_no from patient_enrollment where patient_id = '$patientid'";
                                                $result = mysqli_query($con,$sql);
                                               $row = mysqli_fetch_array($result);
                                               $serialno = $row['family_serial_no'];
                                               $count = $row['cntno'];
                                               $nameid = $row['n_id'];
                                               $contactid = $row['ci_id'];
                                               if($count)
                                               {

                                                $sqlname = "SELECT * from name where n_id = '$nameid'";
                                                $resultname = mysqli_query($con,$sqlname);
                                                $rowname = mysqli_fetch_array($resultname);
                                                $firstname = $rowname['fname'];
                                                $middlename = $rowname['mname'];
                                                $lastname = $rowname['lname'];
                                                $suffix = $rowname['suffix'];
                                                $sqlcontact = "SELECT * from contact_info where ci_id = '$contactid'";
                                                $resultcontact = mysqli_query($con,$sqlcontact);
                                                $rowncontact = mysqli_fetch_array($resultcontact);
                                                $homeno= $rowncontact['home_no'];
                                                $street= $rowncontact['street'];
                                                $barangay= $rowncontact['barangay'];
                                                $city= $rowncontact['city'];
                                                
                                                }
                                                
                                            }
                                            ?>
						<label class="col-sm-2 control-label">Family Serial Number</label>						
						<div class="col-sm-4">
							<input class='form-control' placeholder='Serial Number' value='<?php echo $serialno; ?>' name='f_serialno' required readonly>

							<input class='form-control' placeholder='Serial Number' type='hidden' value='<?php echo $patientid; ?>' name='f_patientid' required readonly>
						</div>                                                    
					</div>
						
						
                                            <div class='form-group'>
                                                    <label class='col-sm-2 control-label'>First name</label>
													<div class='col-sm-4'>
                                                    <input type='text' class='form-control' value='<?php echo $firstname; ?>' placeholder='First name' name='f_fname' readonly>
													<input type='text' class='form-control' value='<?php echo $middlename; ?>' placeholder='Middle Name' name='f_mname' readonly>
													<input type='text' class='form-control' value='<?php echo $lastname; ?>'  placeholder='Last Name' name='f_lname' readonly>
													<input type='text' class='form-control' value='<?php echo $suffix; ?>' placeholder='Suffix e.g. Jr., Sr., II, III' name='f_suffix' readonly>

                                                </div>
                                                </div>
                                                <div class='form-group'>
													<label class='col-sm-2 control-label'>Residential Address</label>
													<div class='col-sm-4'>
                                                    <input class='form-control' value='<?php echo $homeno." ".$street." ".$barangay." ".$city; ?>' placeholder='Street, Barangay, City, Province' name='f_address' readonly>
                                                	
                                                </div>
                                                </div>
         
					<div class="form-group">	
                    	<label class="col-sm-3">For CHU/RHU Personnel Only</label>
                    </div>
					<div class="form-group">	
							<label class="col-sm-2 control-label">Mode of Transaction</label>
							<div class="col-sm-4">
								<select class="form-control" name="f_modeoftransact" id="f_modeoftransact">
									<option value="Walk-in">Walk-in</option>
									<option value="Visited">Visited</option>
									<option value="Referral">Referral</option>

								</select>
							</div>
						<label class="col-sm-2 control-label">Date of Consultation</label>
						<div class="col-sm-4">
							<input type="date" class="form-control" placeholder="Date"  name="f_dateofconsult" >
						</div>
						
					</div>
					
				
					<div class="form-group">
						<label class="col-sm-2 control-label">Consultation Time</label>
						<div class="col-sm-4">
							<input type="time" class="form-control" placeholder="e.g. 12:00 am " name="f_consulttime">
						</div>
						<label class="col-sm-2 control-label">Age</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_age">
						</div>
						
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Blood Pressure</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="e.g. 80/120" name="f_bloodpressure">
						</div>
						<label class="col-sm-2 control-label">Height(cm)</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="" name="f_height">
						</div>
						
					</div>
                   
					<div class="form-group">
							<label class="col-sm-2 control-label">Temperature</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="e.g. 36 degree C" name="f_temp">
						</div>
						<label class="col-sm-2 control-label">Weight(KG)</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="" name="f_weight">
						</div>
							
					</div>
					<div class="form-group">
						
						<label class="col-sm-2 control-label">Name of Attending Officer</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="e.g. Juan Dela Cruz" name="f_attendingofficer">
						</div>
						<label class="col-sm-2 control-label">Nature of Visit</label>
							<div class="col-sm-4">
								<select class="form-control" name="f_natureofvisit">
                                                        <option>New Consultation/Case</option>
                                                        <option>New Admission</option>
                                                        <option>Follow-up Visit</option>
                                                        <option>General</option>
                                                        <option>Prenatal</option>
                                                        <option>Dental Care</option>
                                                        <option>Child Care</option>
                                                        <option>Child Nutrition</option>
                                                        <option>Injury</option>
                                                        <option>Adult Immunization</option>
                                                        <option>Family Planning</option>
                                                        <option>Postpartum</option>
                                                        <option>Tuberculosis</option>
                                                        <option>Child Immunization</option>
                                                        <option>Sick Children</option>
                                                        <option>Firecracker Injury</option>
                                                    </select>
							</div>
					</div>
					<div class="form-group">	
                    	<label class="col-sm-3">For Referral Transaction Only</label>
                    </div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Referred From</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_referredfrom" id="f_referredfrom">
						</div>
						<label class="col-sm-2 control-label">Referred to</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Enter here" name="f_referredto" id="f_referredto">
						</div>

					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Referred by</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" placeholder="Juan Dela Cruz" name="f_referredby" id="f_referredby">
						</div>
						
						
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Reason of Referral</label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="4" name="f_reasonofref" id="f_reasonofref"></textarea>
						</div>
						<label class="col-sm-2 control-label" for="form-styles">Chief Complaints</label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="4" name="f_chiefcomplaints" id="f_chiefcomplaints"></textarea>
						</div>
					
					</div>

										
					 <div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Diagnosis</label>
						<div class="col-sm-9">
								<textarea class="form-control" rows="5" name="f_diagnosis"></textarea>
						</div>
					</div>

					 <div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Medication/Treatment</label>
						<div class="col-sm-9">
								<textarea class="form-control" rows="5" name="f_medication"></textarea>
						</div>
					</div>

					 <div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Laboratory Findings/Impression</label>
						<div class="col-sm-9">
								<textarea class="form-control" rows="5" name="f_labfindings"></textarea>
						</div>
					</div>
					 <div class="form-group">
					  <label class="col-sm-2 control-label" for="form-styles">Performed Laboratory Test</label>
						<div class="col-sm-4">
								<textarea class="form-control" rows="4" name="f_labtest"></textarea>
						</div>
						<label class="col-sm-2 control-label">Name of Health Care Provider</label>
						<div class="col-sm-4">
						<?php
						 $sql="SELECT fname,lname FROM doctor ORDER BY lname ASC";
						 $result = mysqli_query($con,$sql);
						$option = '';
						 while($row = mysqli_fetch_assoc($result))
						{
						  $option .= '<option value = "'.$row['fname'].' '.$row['lname'].'">'.$row['fname'].' '.$row['lname'].'</option>';
						}
						?>
							<select class="form-control" name="f_healthcare" > 
								<?php echo $option; ?>
							</select>
							<div class="col-md-offset-8">
							<button type="button" class="btn btn-primary add_doctor" >Add doctor</button>
							</div>
						</div>
						
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

                                <div class="modal fade" id="doctormodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form role="form" method="post">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Add Doctor</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Firstname</label>
                                                    <input class="form-control" placeholder="Firstname" name="f_doctorfname" id="m_actnumber" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Lastname</label>
                                                    <input class="form-control" placeholder="Lastname" name="f_doctorlname" id="m_title" required>
                                                </div>                                                   
                                               
                                                <div class="form-group">
                                                    <label>Specialization</label>
                                                    <input class="form-control" id="m_dateconducted" name="f_specialization" placeholder="Specialization" required>
                                                </div>
                                                
                                            </div>
                                            <div class='modal-footer'>
                                           <button type='submit' name='adddoctorbtn' class='btn btn-primary'>Accept</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            
                                        </div>
                                        </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
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

<script type="text/javascript">
	$(document).ready(function(){
        $('.add_doctor').click(function(){
        	$('#doctormodal').appendTo('body').modal("show");
        })
    });

    $("#f_modeoftransact").change(function() {
    var disabled = (this.value == "Walk-in" || this.value == "Visited");
    $("#f_referredfrom").prop("disabled", disabled);
    $("#f_referredto").prop("disabled", disabled);
    $("#f_referredby").prop("disabled", disabled);
    $("#f_reasonofref").prop("disabled", disabled);
    $("#f_chiefcomplaints").prop("disabled", disabled);
}).change(); 
</script>
</body>
</html>
<?php

if(isset($_POST['adddoctorbtn']))
{
	$fname = $_POST['f_doctorfname'];
	$lname = $_POST['f_doctorlname'];
	$specialization = $_POST['f_specialization'];

	$sqladd = "INSERT INTO doctor (fname,lname,specialization) VALUES ('$fname','$lname','$specialization') ";
	if(!mysqli_query($con,$sqladd))
	{
		echo "not inserted to doctor";
	}
	else
	{
		echo "inserted to doctor";
		echo '<meta http-equiv="refresh" content="0">';
	}
}

if(isset($_POST['addbutton']))
{
	$patientid = $_POST['f_patientid'];
    $serialno = $_POST['f_serialno'];
    $lname = $_POST['f_lname'];
    $mname = $_POST['f_mname'];
    $fname = $_POST['f_fname'];
    $suffix = $_POST['f_suffix'];
    $age = $_POST['f_age'];
    $address = $_POST['f_address'];
    $modetransact = $_POST['f_modeoftransact'];
    $dateconsult = $_POST['f_dateofconsult'];
    $timeconsult = $_POST['f_consulttime'];
    $bloodpressure = $_POST['f_bloodpressure'];
    $temperature = $_POST['f_temp'];
    $height = $_POST['f_height'];
    $weight = $_POST['f_weight'];
    $nameofattending = $_POST['f_attendingofficer'];    
    $referredfrom = $_POST['f_referredfrom'];
    $referredto = $_POST['f_referredto'];
    $reasonofref = $_POST['f_reasonofref'];
    $referredby = $_POST['f_referredby'];
    $natureofvisit = $_POST['f_natureofvisit'];
    $chiefcomplaints = $_POST['f_chiefcomplaints'];
    $diagnosis = $_POST['f_diagnosis'];
    $medication = $_POST['f_medication'];
    $labfindings = $_POST['f_labfindings'];
    $healthcare = $_POST['f_healthcare'];
    $labtest = $_POST['f_labtest'];


    $sqlselectenroll = "SELECT pe_id from patient_enrollment where patient_id='$patientid';";
    $resultselectenroll = mysqli_query($con, $sqlselectenroll); 
    $patientenroll = mysqli_fetch_assoc($resultselectenroll);
    $patientenrollID = $patientenroll['pe_id'];

    $sqlinsertforchurhu = "INSERT INTO for_chu_rhu (mode_transaction, date_consultation, time_consultation, blood_pressure, temperature, height, weight, name_of_attending, age) VALUES ('$modetransact', '$dateconsult' , '$timeconsult' , '$bloodpressure', '$temperature' , '$height', '$weight' ,'$nameofattending', '$age')";
    $resultinsertforchurhu  = mysqli_query($con, $sqlinsertforchurhu);
    $forchurhuID = mysqli_insert_id($con);

    $sqlinsertrefertransact = "INSERT INTO referral_transaction (referred_from, referred_to, reason_of_referral, referred_by) VALUES ('$referredfrom', '$referredto' , '$reasonofref' , '$referredby')";
    $resultinsertrefertransact  = mysqli_query($con, $sqlinsertrefertransact);
    $refertransactID = mysqli_insert_id($con);

    $sqlinserttreatment = "INSERT INTO treatment (nature_of_visit, chief_complaints, diagnosis, medication, lab_findings, name_health_careprovider, performed_lab_test) VALUES ('$natureofvisit', '$chiefcomplaints' , '$diagnosis' , '$medication', '$labfindings' , '$healthcare', '$labtest')";
    $resultinserttreatment  = mysqli_query($con, $sqlinserttreatment);
    $treatmentID = mysqli_insert_id($con);
    $userid = $_GET['userid'];
    $sql = "SELECT fname, lname from acc_info where ai_id=$userid";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $addedby =$row['fname']." ".$row['lname'];
    $sqlinsertITR = "INSERT INTO indiv_treat_rec (pe_id, fcr_id, treatment_id, ref_tran_id,added_by,status) VALUES ('$patientenrollID' , '$forchurhuID' , '$treatmentID', '$refertransactID','$addedby','active')";
    $resultinsertITR  = mysqli_query($con, $sqlinsertITR);
    if(!$resultinsertITR and !$resultinsertforchurhu and !$resultinserttreatment and !$resultinsertrefertransact)
    {
        echo "<script type='text/javascript'>
				alert('Unsuccesfully Added');
				window.location.href = 'viewITR.php?userid=".$userid."'
			</script> ";
    }   
    else
    {
    	$sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Add Patient Treatment', '$addedby', '$fname $mname $lname')";
        $resultlog = mysqli_query($con,$sqllog) or die(mysql_error($con));
        echo "<script type='text/javascript'>
				alert('Succesfully Added');
				window.location.href = 'viewITR.php?userid=".$userid."'
			</script>";
    }       
}
 




?>