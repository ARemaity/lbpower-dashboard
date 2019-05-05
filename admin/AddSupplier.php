<?php 
session_start();
include("../DBConnect.php");
?>

<html lang="en">
<head>
	<title>Add Supplier</title>
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
  echo "<a class='active' href='../supplier/SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../supplier/newuser.html'><i class='fa fa-user-plus'></i> Add User</a>";
  echo "<a href='../supplier/ViewMonthlyRev.php'><i class='fa fa-area-chart'></i> Monthly Revenue</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='../admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";
  echo "<a href='../admin/AddSupplier.php'><i class='fa fa-user-plus'></i> Add Supplier</a>";
  echo "<a href='../admin/ViewComplaints.php'><i class='fa fa-thumbs-down'></i> Complaints</a>";

  }
  ?>
  <a href="../supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a href="../SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
  <a href="../viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a href="../logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
</div>

</head>

 <body>
 
 
<?php
	
if(isset($_GET['submit'])){	//	page submitted
	
	if($_GET['password'] == $_GET['passwordr']){
	$sql3 = "INSERT INTO pass(SID, password)
			 VALUES('".$_GET["SID"]."', '".$_GET["password"]."')";
	$result = mysqli_query($connect,$sql3);
			 
	$sql="INSERT INTO person(PID, role, fname, lname, city, street, phone, email)
		   VALUES(default, 1, '".$_GET["fname"]."', '".$_GET["lname"]."', '".$_GET["city"]."', '".$_GET["street"]."', '".$_GET["phone"]."', '".$_GET["email"]."')";
	$result = mysqli_query($connect,$sql);
	
	$checkLastid = mysqli_query($connect, "SELECT PID FROM person ORDER BY PID DESC LIMIT 1 ");
    $value = mysqli_fetch_object($checkLastid);
	$last = (int)$value->PID;
	
	
	$sql2 =" INSERT INTO supplier(id, PID, SID, comapany_name, cost_1kw, user_capacity)
		    VALUES (default, '".$last."' ,'".$_GET["SID"]."' ,'".$_GET["cname"]."', '".$_GET["cpkw"]."', '".$_GET["ucap"]."') ";
	$result2 = mysqli_query($connect,$sql2);
	}
	else{
		echo '<h2 style="color:red;">Passwords Must Match</h2>';
			  header("refresh:1;url=../web/admin/AddSupplier.php");
	}
		//If the sql returns an error
	if(!$result || !$result2){
			die("Something went wrong");
	}
	else{
			echo ' <h2 style="color:green;">Supplier Added Successfully</h2>';
			header("refresh:1;url=../admin/ViewSuppliers.php");
	}
}


?>
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="GET">
					
					
					<span class="login100-form-title p-b-34 p-t-27">
						Add Supplier
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "First Name">
						<label>First Name</label>
						<input class="input100" type="text" name="fname" >
						<span data-placeholder="First Name"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Last Name">
						<label>Last Name</label>
						<input class="input100" type="text" name="lname" >
						<span data-placeholder="Last Name"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "City">
						<label>City</label>
						<input class="input100" type="text" name="city" >
						<span data-placeholder="City"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Street">
						<label>Street</label>
						<input class="input100" type="text" name="street" >
						<span data-placeholder="Street"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Phone">
						<label>Phone</label>
						<input class="input100" type="text" name="phone" >
						<span data-placeholder="Phone"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Email">
						<label>Email</label>
						<input class="input100" type="text" name="email" >
						<span data-placeholder="Email"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "SID">
						<label>SID</label>
						<input class="input100" type="text" name="SID" >
						<span data-placeholder="SID"></span>
					</div>
				
					<div class="wrap-input100 validate-input" data-validate = "Company Name">
						<label>Company Name</label>
						<input class="input100" type="text" name="cname" >
						<span data-placeholder="Company Name"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Cost Per KW">
					<label> Cost Per KW</label>
						<input class="input100" type="number" name="cpkw" >
						<span data-placeholder="Cost Per KW"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "User Capacity">
					<label> User Capacity</label>
						<input class="input100" type="number" name="ucap" >
						<span data-placeholder="User Capacity"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password">
					<label> Password</label>
						<input class="input100" type="password" name="password" >
						<span data-placeholder="Password"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password">
					<label>Repeat Password</label>
						<input class="input100" type="password" name="passwordr" >
						<span data-placeholder="Repeat Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Add
						</button>
						<input type="button" class="login100-form-btn" value="Cancel" onclick="window.location.href='../admin/viewsuppliers.php'" name="cancel" />
					</div>
				</form>
			</div>
		</div>	
	</div>
<?php 
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