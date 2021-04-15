<?php
include "db_connect.php";
session_start();

if (isset($_POST['deletebutton']))
{
    $arid = $_POST['iddelete'];

    $sqldelete= "DELETE FROM acc_req where ar_id='$arid'";

    if(!mysqli_query($con,$sqlselect))
    {
        echo "delete error from temp_per";
    }
        else
    {
        echo "User deleted from temp_per";
    }

}

if(isset($_POST['acceptbutton']))
{
    $id = $_SESSION['userid'];
    $arid = $_POST['f_arid'];
    $username = $_POST['f_user'];
    $password = $_POST['f_pass'];
    $usertype = $_POST['f_usertype'];
    $brgy = $_POST['f_brgy'];
    $lastname = $_POST['f_lname'];
    $firstname = $_POST['f_fname'];
    $gender = $_POST['f_gender'];
    $bdate = $_POST['f_bdate'];
    $email = $_POST['f_email'];

    $sql = "SELECT fname, lname from acc_info where ai_id=$id";
    $result = mysqli_query($con,$sql);
    $rowuser = mysqli_fetch_array($result);
    $addedby = $rowuser['fname'] . " " . $rowuser['lname'];

    $sqlaccinfo = "INSERT INTO acc_info (fname,lname,bdate,gender,email) VALUES ('$firstname','$lastname','$bdate','$gender','$email'); ";
    $resultaccinfo  = mysqli_query($con, $sqlaccinfo);
    $accinfoid = mysqli_insert_id($con);

    $sqlacc= "INSERT INTO account (username,password,usertype,barangay,ai_id,added_by,status) VALUES ('$username','$password','$usertype','$brgy','$accinfoid','$addedby','active'); ";
    $resultacc  = mysqli_query($con, $sqlacc);

    $sqldelete= "DELETE FROM acc_req where ar_id='$arid'";
    if(!mysqli_query($con,$sqldelete) and !$resultacc)
    {
        echo "<script type='text/javascript'>
                alert('Unsuccesfully Accepted');
            </script>";
    }
        else
    {
        echo "<script type='text/javascript'>
                alert('Succesfully Accepted');
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
                <a href="homeadmin.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">MCHOIMS</a>
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
                                        <a href="profileadmin.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
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
                    <a href="homeadmin.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
                        <i class="fa fa-user"></i>
                        <span class="hidden-xs">Home</span>
                    </a>
                </li>
                <li>
                    <a href="updateacc.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
                        <i class="fa fa-edit"></i>
                        <span class="hidden-xs">Update Account</span>
                    </a>
                </li>
                <li>
                    <a href="addacc.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
                        <i class="fa fa-plus-square"></i>
                        <span class="hidden-xs">Add Account</span>
                    </a>
                </li>
                <li>
                    <a href="accreq.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
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
                    <a href="viewarchiveacc.php?userid=<?php $id=$_SESSION['userid']; echo $id; ?>">
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
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-medkit"></i>
                    <span>List of Account Requests</span>
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
                                        <th>Lastname</th>
                                        <th>Firstname</th>
                                        <th>Username</th>
                                        <th>Usertype</th>
                                        <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                                    $sql = "SELECT * from acc_req";
                                    $result = mysqli_query($con, $sql) or die("Query fail: " . mysqli_error());
                                ?>
                    <tbody>
                         <?php while ($row = mysqli_fetch_array($result)) { 
                                        echo( "<tr>
                                            <td class='serialno'>" . $row['lname'] . "</td>
                                            <td class='lname'>" . $row['fname'] . "</td>
                                            <td class='fname'>" . $row['username'] . "</td>
                                            <td class='mname'>" . $row['usertype'] . "</td>
                                            
                                            <td>
                                                <button type='button' id='".$row['ar_id']."' class='btn btn-info view_data'>Full details</button>
                                                <button type='button' id='".$row['ar_id']."' class='btn btn-danger btndelete'>Delete</button>
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
                                    <div class="modal-body" id="uploaddetail">                                            
                                        <input class='form-control' type="hidden" placeholder='Username' name='f_arid' id='f_arid'>
                                        <div class='form-group'>
                                            <label>Username</label>
                                            <input class='form-control' placeholder='Username' name='f_user' id='f_user'readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Password</label>
                                            <input class='form-control' type="password" placeholder='Password' name='f_pass' id='f_pass' readonly>
                                        </div>
                                        <div class='form-group'>
                                            <label>Usertype</label>
                                            <input class='form-control' name='f_usertype'  id='f_usertype'>
                                        </div>  
                                        <div class='form-group'>
                                            <label>Lastname</label>
                                            <input class='form-control' placeholder='Lastname' id='f_lname' name='f_lname'>
                                            <label>Firstname</label>
                                            <input class='form-control' placeholder='Firstname' name='f_fname' id='f_fname'>
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
                                            <label>Email</label>
                                            <input class='form-control' placeholder='juandelacruz@gmail.com' name='f_email' id='f_email'>
                                        </div>
                                        <div class='form-group'>
                                            <label>Barangay Assigned</label>
                                            <input class='form-control' name='f_brgy' id='f_brgy'>
                                        </div>
                                        
                                        <div class='modal-footer'>
                                           <button type='submit' name='acceptbutton' class='btn btn-primary'>Accept</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                                            
                                        </div>
                                    </div>
                                    
                                    </div>
                                    </form>
                                    <!-- /.modal-content -->
                                </div>
                                </div> 
                                <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <form role="form" method="post">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Delete user</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this Record?</p>
                                                <p class="text-danger">This action cannot be undone.</p>
                                                <input class="form-control" type="hidden" name="iddelete" id="m_iddelete" >
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="deletebutton" class="btn btn-danger">Delete</button>
                                            </div>
                                        
                                        </div>
                                        <!-- /.modal-content -->
                                    </form>
                                    </div>
                                    <!-- /.modal-dialog -->
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
<!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
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
            var accid = $(this).attr("id");

            $.ajax({
                url:"viewuploadAccount.php",
                method:"post",
                data:{accid:accid},
                dataType:"json",
                success:function(data){
                	$('#f_arid').val(data.ar_id);
                    $('#f_user').val(data.username);
                    $('#f_pass').val(data.password);
                    $('#f_usertype').val(data.usertype);
                    $('#f_lname').val(data.lname);
                    $('#f_fname').val(data.fname);
                    $('#f_gender').val(data.gender);
                    $('#f_bdate').val(data.bdate);
                    $('#f_email').val(data.email);
                    $('#f_brgy').val(data.barangay);
                    $('#editModal').appendTo('body').modal('show');

                }
            })


            
        });


    $('.btndelete').click(function(){
            var accid = $(this).attr("id");

            $('#m_iddelete').val(accid);
            $('#deletemodal').modal('show');
        });

        

    });
    
</script>	
</body>
</html>
