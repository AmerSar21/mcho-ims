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
<style>
body, html {
  height: 100%;
  margin: 0;
}

.container {
  /* The image used */
  background-image: url("img/background1.png");

  /* Full height */
 
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
}

</style>

</head>
<body style="background-image: url('img/background1.png'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
<div class="container-fluid" >
	<div id="page-login" class="row" style = "position:relative; top:200px;">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			
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
                                    include "ajax/db_connect.php";

                                    if(isset($_POST['but_submit']))
                                    {
                                        $con = mysqli_connect("localhost", "root", "", "mchoims_database");
                                        if(!$con)
                                        {
                                            echo "not connected to server";
                                        }
                                        $uname = $_POST['username'];
                                        $pass = $_POST['password'];

                                        $sqlgetpass = "SELECT password from account where username='$uname'";
                                        $result = mysqli_query($con,$sqlgetpass);
                                        $row = mysqli_fetch_array($result);
                                        $passfromdb = $row['password'];

                                       
                                        if ($uname != "" && $pass != "")
                                        {
                                            if(password_verify($pass, $passfromdb))
                                            {
                                                $sql_query = "select count(*) as cntUser from account where username='$uname' and status='active'";
                                                $result = mysqli_query($con,$sql_query);
                                                $row = mysqli_fetch_array($result);                                            
                                                $count = $row['cntUser'];

                                                if($count > 0)
                                                {
                                                    $sql_queryusertype = "select ai_id, usertype from account where username='$uname'";
                                                $resultusertype = mysqli_query($con,$sql_queryusertype);
                                                $rowuser = mysqli_fetch_array($resultusertype);
                                                $usertype = $rowuser['usertype'];
                                                $userID = $rowuser['ai_id'];
                                                    session_start();
                                                    $_SESSION['uname'] = $uname;
                                                    $_SESSION['usertype'] = $usertype;
                                                    $_SESSION['userid'] = $userID;
                                                    if(($_SESSION['usertype']=='admin') || ($_SESSION['usertype']=='Admin'))
                                                    {
                                                        header('Location: homeadmin.php?userid=' . $_SESSION['userid'] );
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
                                            else
                                                {

                                                    echo "<div class='alert alert-danger'>Invalid username and password.</div>";
                                                }
                                        }
                                    }
                                    ?>

					<div class="text-center">
						<button type="submit" name="but_submit" class="btn btn-primary">Sign in</button>
                        <div class="text-center">
                <a href="register.php" >Need an account?</a>
            </div>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
