<!DOCTYPE html>
<?php 
session_start();
include("../DBConnect.php");
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Add Supplier</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<?php
	
if(isset($_GET['submit'])){	//	page submitted
	
	if($_GET['password'] == $_GET['passwordr']){
	$sql3 = "INSERT INTO pass(SID, password)
			 VALUES(default, '".$_GET["password"]."')";
	$result = mysqli_query($connect,$sql3);
			 
	$sql="INSERT INTO person(PID, role, fname, lname, city, street, phone, email)
		   VALUES(default, 1, '".$_GET["fname"]."', '".$_GET["lname"]."', '".$_GET["city"]."', '".$_GET["street"]."', '".$_GET["phone"]."', '".$_GET["email"]."')";
	$result = mysqli_query($connect,$sql);
	
	$checkLastid = mysqli_query($connect, "SELECT PID FROM person ORDER BY PID DESC LIMIT 1 ");
    $value = mysqli_fetch_object($checkLastid);
	$last = (int)$value->PID;
	
	$getsid = mysqli_query($connect,"SELECT SID FROM pass WHERE password = '".$_GET["password"]."'");
	$sid = mysqli_fetch_object($getsid);
	$sidval = $sid->SID;
	
	$sql2 =" INSERT INTO supplier(id, PID, SID, comapany_name, cost_1kw, user_capacity)
		    VALUES (default, '".$last."' ,'".$sidval."' ,'".$_GET["cname"]."', '".$_GET["cpkw"]."', '".$_GET["ucap"]."') ";
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
			mysqli_close($connect);
			header("refresh:1;url=../admin/ViewSuppliers.php");
	}
}
?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Supplier</div>
      <div class="card-body">
        <form method="GET">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name='fname' class="form-control" placeholder="First Name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last Name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
		  
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="City"  name="city" class="form-control" placeholder="City" required="required" autofocus="autofocus">
                  <label for="City">City</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="Street" name="street" class="form-control" placeholder="Street" required="required">
                  <label for="Street">Street</label>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="Phone"  name="phone" class="form-control" placeholder="Phone" required="required" autofocus="autofocus">
                  <label for="City">Phone</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="CompanyName" name="cname" class="form-control" placeholder="Company Name" required="required">
                  <label for="CompanyName">Company Name</label>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="CostPerKW"  name="cpkw" class="form-control" placeholder="Cost Per KW" required="required" autofocus="autofocus">
                  <label for="CostPerKW">Cost Per KW</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="UserCap" name="ucap" class="form-control" placeholder="User Capacity" required="required">
                  <label for="UserCap">User Capacity</label>
                </div>
              </div>
            </div>
          </div>		  
		  
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
		  
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword" name="passwordr" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit">Add</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
