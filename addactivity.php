<?php
include("db_connect.php");
session_start();

if(isset($_POST['addbutton']))
{
    $title = $_POST['f_title'];
    $dateconducted = $_POST['f_dateconducted'];
    $description = $_POST['f_description'];

    $id = $_SESSION['userid'];
	$sql = "SELECT fname, lname from acc_info where ai_id=$id";
    $result = mysqli_query($con,$sql);
    $rowuser = mysqli_fetch_array($result);
    $addedby = $rowuser['fname'] . " " . $rowuser['lname'];

    $sqlinsertactivity = "INSERT INTO activity (name, description, actdate ,status) VALUES ('$title' , '$description' , '$dateconducted', 'active')";
    $resultinsertactivity  = mysqli_query($con, $sqlinsertactivity);
    if(!$resultinsertactivity)
    {
        echo "<script type='text/javascript'>
                alert('Unsuccesfully Added');
            </script>";
    }   
    else
    {
    	$sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Add Activity', '$addedby', '$title')";
		$resultlog = mysqli_query($con,$sqllog) or die(mysql_error($con));
        echo "<script type='text/javascript'>
                alert('Succesfully Added');
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
                                echo "<span class='badge'>" . $sum . "</span>	";
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
			<li><a href="homeOIC.php">Home</a></li>
			<li><a href="#">Activities/Programs</a></li>
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
					<span>Add Activity/Program</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<h4 class="page-header">Add Activity form</h4>
				<form class="form-horizontal" role="form" method="post" enctype='multipart/form-data'>

					<div class="form-group">
						<label class="col-sm-2 control-label">Activity Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" placeholder="Title" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="f_title" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Date Conducted</label>
						<div class="col-sm-3">
							<input type="date" class="form-control" placeholder="Date" data-toggle="tooltip" data-placement="bottom" title="Tooltip for name" name="f_dateconducted" required>
						</div>
					</div>
                               	                
					<div class="form-group">
						<label class="col-sm-2 control-label" for="form-styles">Description</label>
						<div class="col-sm-9">
								<textarea class="form-control" rows="5" name="f_description" required></textarea>
						</div>
					</div>
						 <input type="submit" name="addbutton" class="btn btn-primary" value="Submit">
                                <button type="reset" class="btn btn-default">Reset</button>
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

</body>
</html>
