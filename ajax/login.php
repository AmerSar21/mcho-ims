<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="keyword" content="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="../css/style.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="text-right">
				<a href="page_register.html" class="txt-default">Need an account?</a>
			</div>
			<form method="post">
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">MCHOIMS Login</h3>
					</div>
					<div class="form-group">
						<label class="control-label">Username</label>
						<input type="text" class="form-control" name="username" required/>
					</div>
					<div class="form-group">
						<label class="control-label">Password</label>
						<input type="password" class="form-control" name="password" required/>
					</div>

								<?php
                                    include "db_connect.php";

                                    if(isset($_POST['but_submit']))
                                    {
                                        $con = mysqli_connect("localhost", "root", "", "mchoims_database");
                                        if(!$con)
                                        {
                                            echo "not connected to server";
                                        }
                                        $uname = $_POST['username'];
                                        $pass = $_POST['password'];

                                        if ($uname != "" && $pass != "")
                                        {

                                            $sql_query = "select count(*) as cntUser from acc where user='$uname' and pass='$pass'";
                                            $result = mysqli_query($con,$sql_query);
                                            $row = mysqli_fetch_array($result);
                                            $sql_queryusertype = "select acc_id, user_type from acc where user='$uname' and pass='$pass'";
                                            $resultusertype = mysqli_query($con,$sql_queryusertype);
                                            $rowuser = mysqli_fetch_array($resultusertype);
                                            $count = $row['cntUser'];
                                            $usertype = $rowuser['user_type'];
                                            $userID = $rowuser['acc_id'];
                                            if($count > 0)
                                            {
                                                session_start();
                                                $_SESSION['uname'] = $uname;
                                                $_SESSION['usertype'] = $usertype;
                                                $_SESSION['userid'] = $userID;
                                                if(($_SESSION['usertype']=='admin') || ($_SESSION['usertype']=='Admin'))
                                                {
                                                    header('Location: viewacc.php?userid=' . $_SESSION['userid'] );
                                                }
                                                else if(($_SESSION['usertype']=='officer') || ($_SESSION['usertype']=='Officer'))
                                                {
                                                    header('Location: homeOIC.php?userid=' . $_SESSION['userid'] );
                                                }
                                                else if(($_SESSION['usertype']=='user') || ($_SESSION['usertype']=='User'))
                                                {
                                                    header('Location: homeuser.php?userid=' . $_SESSION['userid'] );
                                                }
                                            }
                                            else
                                            {

                                                echo "<div class='alert alert-danger'>Invalid username and password.</div>";
                                            }

                                        }

                                    }
                                    ?>

					<div class="text-center">
						<button href="#" type="submit" class="ajax-link" name="but_submit" class="btn btn-primary">Sign in</buttom>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>
