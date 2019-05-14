<?php 
session_start();
include("../DBConnect.php");
?>

<html lang="en">
<head>
	<title>Add Device</title>
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
//$key=$_SESSION['cPID'];
//echo $key;
$cPID=$_SESSION['ID'];
echo $cPID;
	
if(isset($_GET['submit'])){	//	page submitted

	$sql =" INSERT INTO device(id_device, device_sn, deive_type, amper_capacity, fk_client)
		    VALUES (default, '".$_GET["sn"]."' ,'".$_GET["type"]."', '".$_GET["capacity"]."', '".$_GET["cPID"]."') ";
	$result = mysqli_query($connect,$sql);

		//If the sql returns an error
	if(!$result)
			die("Something went wrong");
	else
			echo ' <h2 style="color:green;">Device Added Successfully</h2>';
			header("refresh:1;url=ViewUsers.php");
}
?>
<div class="limiter">
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="GET">
					
					
					<span class="login100-form-title p-b-34 p-t-27">
						Add Device
					</span>
					
						<div class="wrap-input100 validate-input" data-validate = "PID">
						
						<input class="input100" type="hidden" name="cPID" value = <?php echo $cPID; ?> >
					</div>
				
					<div class="wrap-input100 validate-input" data-validate = "Serial Number">
						<label>Serial Number</label>
						<input class="input100" type="number" name="sn" >
						<span data-placeholder="Serial Number"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Type">
					<label> Device Type</label>
						<input class="input100" type="text" name="type" >
						<span data-placeholder="Device Type"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Amper Capacity">
					<label> Amper Capacity</label>
						<input class="input100" type="text" name="capacity" >
						<span data-placeholder="Amper Capacity"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn" name="submit">
							Add
						</button>
						<input type="button" class="login100-form-btn" value="Cancel" onclick="window.location.href='viewusers.php'" name="cancel" />
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