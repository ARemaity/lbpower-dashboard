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

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit User</div>
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
                  <input type="hidden" id="email"  name="email"  class="form-control" placeholder="email" required="required" autofocus="autofocus" value = <?php echo $row['email']; ?> >
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit">Edit</button>
        <div class="text-center">
          <a class="d-block small mt-3" href="ViewUsers.php">Cancel</a>
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

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>