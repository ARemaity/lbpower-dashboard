<?php 
session_start();
include("../DBConnect.php");
?>

<html lang="en">
<head>
	<title>Edit User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->

<div class="navbar">
  <?php
  if($_SESSION['role']==1){
  echo "<a class='active' href='../web/supplier/SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='../web/admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../web/admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";

  }
  ?>
  <a href="../web/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a href="../web/SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
  <a href="../web/viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a href="../web/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
</div>

</head>

 <body>
 
 
<?php
	
if(isset($_GET['submit'])){	//	page submitted
	
	$sql = "update person set 
	fname = '".$_GET['fname']."' , 
	lname = '".$_GET['lname']."' ,
	city = '".$_GET['city']."' , 
	street = '".$_GET['street']."' , 
	phone = '".$_GET['phone']."' , 
	email = '".$_GET['email']."' 
	where PID = ".$_GET['PID'];
	$result = mysqli_query($connect,$sql);

	//	If the sql returns an error
	if(!$result)
			die("Something went wrong");
	else
			echo ' <h2 style="color:green;">User Updated Successfully</h2>';
			header("refresh:1;url=../supplier/ViewUsers.php");
}
else{
	$id = $_GET['PID'];

	//	Write and execute an SQL query
	$sql = "select * from person where PID=".$id;
	$result = mysqli_query($connect,$sql);

	//	If the sql returns an error
	if(!$result)
			die("something went wrong");

	
	$row = mysqli_fetch_assoc($result);
?>
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="GET">
					
					
					<span class="login100-form-title p-b-34 p-t-27">
						Edit User
					</span>
				
					<div class="wrap-input100 validate-input" data-validate = "PID">
						<input class="input100" type="Hidden" name="PID" value = <?php echo $row['PID']; ?> >
					</div>
				
					<div class="wrap-input100 validate-input" data-validate = "First Name">
						<label> First Name</label>
						<input class="input100" type="text" name="fname" value = <?php echo $row['fname']; ?> >
						<span data-placeholder="First Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Last Name">
					<label> Last Name</label>
						<input class="input100" type="text" name="lname" value = <?php echo $row['lname']; ?> >
						<span data-placeholder="Last Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "City">
					<label> City</label>
						<input class="input100" type="text" name="city" value = <?php echo $row['city']; ?> >
						<span data-placeholder="City"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Street">
					<label> Street</label>
						<input class="input100" type="text" name="street" value = <?php echo $row['street']; ?> >
						<span data-placeholder="Street"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Phone">
					<label> Phone Number</label>
						<input class="input100" type="text" name="phone" value = <?php echo $row['phone']; ?> >
						
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "email">
					<label> Email Address</label>
						<input class="input100" type="text" name="email" value = <?php echo $row['email']; ?> >
						<span data-placeholder="Email"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Submit
						</button>
						<input type="button" class="login100-form-btn" value="Cancel" onclick="window.location.href='viewusers.php'" name="cancel" />
					</div>
				</form>
			</div>
		</div>	
	</div>
<?php 
}
//	close the connection
	mysqli_close($connect);
?>

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