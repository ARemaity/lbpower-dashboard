<!DOCTYPE html>
<html>
<head>
 <head>
<html lang="en">
<head>
	<title>Contact Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<div class="navbar">
  <a href="index.php"><i class="fa fa-home"></i> Home Page</a>
  <a onclick="document.getElementById('id02').style.display='block'" style=float:right href="register.php"><i class="fa fa-id-card-o"></i> Register</a>
  <a onclick="document.getElementById('id01').style.display='block'" style=float:right href="login.php"><i class="fa fa-sign-in"></i> Sign In</a>
  <a class="active" style=float:right href="ContactUs.php"><i class="fa fa-envelope"></i> Contact Us</a>
  <a style=float:right href="#"><i class="fa fa-info"></i> About Us</a>
</div>
</head>
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<div class="container">
					
					<form class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Contact Us
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input class="input100" type="text" name="name" placeholder="Name">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						
					</div>
					
					<div  class="wrap-input100 validate-input" data-validate = "Enter Subject">
					    <input class="input100" type="text" name="Subject" placeholder="Subject">
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter Details">
						<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px; width:350px;"></textarea>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Submit
						</button>
					</div>

				</form>
				</div>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
