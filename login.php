<?php
session_start();
if( isset($_SESSION['userid']) ) {
    header('location:index.php'); 
}
require_once('config/koneksi.php');
$userfail = isset($_GET['userfail']);
$passwordfail = isset($_GET['passwordfail']);
$logout = isset($_GET['logout']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>.:: Rania Laundry ::.</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logintemplate/images/icons/RAN2.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="logintemplate/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="logintemplate/css/util.css">
	<link rel="stylesheet" type="text/css" href="logintemplate/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
<?php 
 if ($userfail) {
echo '<div class="alert alert-warning alert-dismissable">
	
	<button class="close" data-dismiss="alert">&times;</button>
	<p>Username / Password Salah !</p>
	</div>';
	}
	else if ($passwordfail) {
echo '<div class="alert alert-warning alert-dismissable">
	
	<button class="close" data-dismiss="alert">&times;</button>
	<p>Username / Password Salah !</p>
	</div>';
	}
	else if ($logout) {
echo '<div class="alert alert-warning alert-dismissable">
	<button class="close" data-dismiss="alert">&times;</button>
	<p>Anda telah berhasil logout</p>
	</div>';
	}


?>				
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="form-login" action="proseslogin.php" method="POST">
				<center>
				   <img src="images/RAN2.png" alt="logo" style="width:50px;height:50px;">	
				</center>
					<span class="login100-form-title p-b-43">
						Login
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					
		
				</form>

				<div class="login100-more" style="background-image: url('images/bg-02.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	<script>
            var resizefunc = [];
        </script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/bootstrap/js/popper.js"></script>
	<script src="logintemplate/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/daterangepicker/moment.min.js"></script>
	<script src="logintemplate/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="logintemplate/js/main.js"></script>

</body>
</html>