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
	
	$sql = "update person set 
	fname = '".$_GET['fname']."' , 
	lname = '".$_GET['lname']."' ,
	city = '".$_GET['city']."' , 
	street = '".$_GET['street']."' , 
	phone = '".$_GET['phone']."' , 
	email = '".$_GET['email']."' 
	where PID = ".$_GET['PID'];
	
	$sql2= "update supplier set
	comapany_name = '".$_GET['cname']."' ,
	cost_1kw = '".$_GET['kw']."' ,
	user_capacity = '".$_GET['ucap']."'
	where PID = ".$_GET['PID'];
	
	$result = mysqli_query($connect,$sql);
	$result2 = mysqli_query($connect,$sql2);

	//	If the sql returns an error
	if(!$result || !$result2)
			die("Something went wrong");
	else
			echo ' <h2 style="color:green;">Supplier Updated Successfully</h2>';
			header("refresh:1;url=../admin/ViewSuppliers.php");
}
else{
	$id = $_GET['PID'];

	//	Write and execute an SQL query
	$sql = "select * from person where PID=".$id;
	$sql2= "select * from supplier where PID=".$id;
	$result = mysqli_query($connect,$sql);
	$result2 = mysqli_query($connect,$sql2);

	//	If the sql returns an error
	if(!$result || !$result2)
			die("something went wrong");

	
	$row = mysqli_fetch_assoc($result);
	$row2 = mysqli_fetch_assoc($result2);
?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Supplier</div>
      <div class="card-body">
        <form method="GET">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="hidden" id="PID" name='PID' class="form-control" required="required" autofocus="autofocus" value = <?php echo $row['PID']; ?> >
                </div>
                <div class="form-label-group">
                  <input type="text" id="firstName" name='fname' class="form-control" placeholder="First Name" required="required" autofocus="autofocus" value = <?php echo $row['fname']; ?>>
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lname"  class="form-control" placeholder="Last Name" required="required" value = <?php echo $row['lname']; ?> >
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
		  
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="City"  name="city"  class="form-control" placeholder="City" required="required" autofocus="autofocus" value = <?php echo $row['city']; ?> >
                  <label for="City">City</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="Street" name="street"  class="form-control" placeholder="Street" required="required" value = <?php echo $row['street']; ?> >
                  <label for="Street">Street</label>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="Phone"  name="phone"  class="form-control" placeholder="Phone" required="required" autofocus="autofocus" value = <?php echo $row['phone']; ?> >
                  <label for="City">Phone</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="CompanyName" name="cname"  class="form-control" placeholder="Company Name" required="required" value = <?php echo $row2['comapany_name']; ?> >
                  <label for="CompanyName">Company Name</label>
                </div>
              </div>
            </div>
          </div>
		  
		  <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="CostPerKW"  name="kw"  class="form-control" placeholder="Cost Per KW" required="required" autofocus="autofocus" value = <?php echo $row2['cost_1kw']; ?> >
                  <label for="CostPerKW">Cost Per KW</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="UserCap" name="ucap"  class="form-control" placeholder="User Capacity" required="required" value = <?php echo $row2['user_capacity']; ?> >
                  <label for="UserCap">User Capacity</label>
                </div>
              </div>
            </div>
          </div>		  
		  
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email"  class="form-control" placeholder="Email address" required="required" value = <?php echo $row['email']; ?> >
              <label for="inputEmail">Email address</label>
            </div>
          </div>
		  
          <button class="btn btn-primary btn-block" type="submit" name="submit">Edit</button>
        </form>
      </div>
    </div>
  </div>
  <?php 
}
//	close the connection
	mysqli_close($connect);
?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>