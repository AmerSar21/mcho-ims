<?php
include "db_connect.php";

if(isset($_POST['subbutton']))
{
	$brgy = $_POST['f_brgy'];
	$sql = "INSERT INTO barangay(brgy_name) values('$brgy')";
	$result = mysqli_query($con,$sql) or die(mysqli_error($con));
	$sqlreport = "INSERT INTO report(barangay) values('$brgy')";
	$resultreport = mysqli_query($con,$sqlreport) or die(mysqli_error($con));
	$id = $_GET['userid'];
    $sql = "SELECT fname, lname from acc_info where ai_id=$id";
    $result = mysqli_query($con,$sql);
    $rowuser = mysqli_fetch_array($result);
    $addedby = $rowuser['fname'] . " " . $rowuser['lname'];
	if(!$result and !$resultreport)
    {
        echo "<script type='text/javascript'>
                alert('Unsuccesfully Added');
            </script>";
    }
        else
    {
        $sqllog = "INSERT INTO system_log (date_time,action,user,subject) values( CURRENT_TIMESTAMP, 'Add Barangay', '$addedby', '$brgy')";
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
			<li><a href="homeuser.php">Home</a></li>
		</ol>
	</div>
</div>
<input type='button' value='Add new Barangay'  class='btn btn-success addbrgy'/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-medkit"></i>
                    <span>List of Accounts</span>
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
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>User Type</th>
                                        <th>Added/Approved by</th>
                                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                                    $sql = "SELECT account.account_id, acc_info.lname, acc_info.fname, account.username, account.usertype,account.added_by from account join acc_info on account.ai_id=acc_info.ai_id where account.status='active';";
                                    $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
                                ?>
                    <tbody>
                         <?php while ($row = mysqli_fetch_array($result)) { 
                                        echo( "<tr>
                                            <td class='lname'>" . $row[1] . "</td>
                                            <td class='fname'>" . $row[2] . "</td>
                                            <td class='username'>" . $row[3] . "</td>
                                            <td class='usertype'>" . $row[4] . "</td>
                                            <td class='approved'>" . $row[5] . "</td>
                                            <td>
                                                <input type='button' value='View' id='".$row['account_id']."' class='btn btn-info view_data'/>
                                            </td>
                                            
                                          </tr>"); }

                                      ?>
                    </tbody>

                </table>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Full Information</h4>
                                        </div>
                                        <div class="modal-body" id="accountdetail">                                             
                                            
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div> 
                            <div class="modal fade" id="addbrgy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <form role="form" method="post" enctype='multipart/form-data'>
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add New Barangay</h4>
                                        </div>
                                        <div class="modal-body">                                             
                                            
                                            <div class="form-group">
                                                <label>Barangay Name</label>
                                                <div >
                                                    <input type="text" class="form-control" placeholder="Enter here" name="f_brgy" required>
                                                </div>

                                            </div>
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" name="subbutton" class="btn btn-primary" value="Submit">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            
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
            var accountid = $(this).attr("id");

            $.ajax({
                url:"viewaccquery.php",
                method:"post",
                data:{accountid:accountid},
                success:function(data){
                    $('#accountdetail').html(data);
                    $('#viewModal').appendTo('body').modal("show");

                }
            })


            
        });

        $('.addbrgy').click(function(){
            $('#addbrgy').appendTo('body').modal("show");
        });

    });

    </script>
</body>
</html>
