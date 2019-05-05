<?php 
session_start();
?>

<html lang="en">
<head>
	<title>Sign In</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/logo-final.ico"
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
  <a onclick="document.getElementById('id02').style.display='block'" style=float:right href="#"><i class="fa fa-id-card-o"></i> Register</a>
  <a class="active" style=float:right href="Login.php"><i class="fa fa-sign-in"></i> Sign In</a>
  <a style=float:right href="ContactUs.php"><i class="fa fa-envelope"></i> Contact Us</a>
  <a style=float:right href="#"><i class="fa fa-info"></i> About Us</a>
</div>

</head>

<body>

<?php
include("DBConnect.php");
if(isset($_POST['submit'])){
	
	$sql ="SELECT role
	       FROM person, pass
	       WHERE email = '".$_POST['email']."' AND password ='".$_POST['pass']."' ";

	$result = mysqli_query($connect,$sql);

	$res=mysqli_num_rows($result);
	if($res==0){
	echo ' <h2 style="color:red;">email or password are incorrect</h2>';}
             
	else{
           
			echo ' <h2 style="color:green;">Logging in please Wait!</h2>';
			$row = mysqli_fetch_assoc($result);
			if($row['role']==1){
				 $sql ="SELECT email, role, fname, supplier.PID, comapany_name
						FROM person, supplier
						WHERE email= '".$_POST['email']."'
						AND Supplier.PID=Person.PID";
						
				$result = mysqli_query($connect,$sql);
                $row=mysqli_fetch_assoc($result);
				
				$_SESSION['role'] = $row['role'];
				$_SESSION['Name'] = $row['fname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['PID'] = $row['PID'];
				$_SESSION['cname']=$row['comapany_name'];
				header("refresh:1;url=SupplierDash.php");
				}
				
			else if($row['role']==2){
				 $sql ="SELECT email, role, fname, admin.PID
						FROM person, admin
						WHERE email='".$_POST['email']."'
						AND admin.PID=Person.PID";
						
				$result = mysqli_query($connect,$sql);
				$row=mysqli_fetch_assoc($result);
				
				$_SESSION['role']= $row['role'];
				$_SESSION['Name'] = $row['fname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['PID'] = $row['PID'];
				header("refresh:1;url=AdminDash.php");
				}
			}
		 

	mysqli_close($connect);
}
?>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
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