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

  <title>Add Device</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

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

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Device</div>
      <div class="card-body">
        <form method="GET">
          <div class="form-group">
            <div class="form-row">  
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="SerialNumber" name='sn' class="form-control" placeholder="Serial Number" required="required" autofocus="autofocus">
                  <label for="SerialNumber">Serial Number</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="hidden" id="PID" name='cPID' class="form-control" value = <?php echo $cPID; ?> placeholder="PID" required="required" autofocus="autofocus">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="type" name="type" class="form-control" placeholder="type" required="required">
                  <label for="type">Type</label>
                </div>
              </div>
            </div>
          </div>
		  
		   <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="AmperCapacity"  name="capacity" class="form-control" placeholder="capacity" required="required" autofocus="autofocus">
                  <label for="AmperCapacity">Amper Capacity</label>
                </div>
              </div>
            </div>
          </div>	  
		  
          <button class="btn btn-primary btn-block" type="submit" name="submit">Add</button>
        </form>
      </div>
    </div>
  </div>
  
 <?php 
mysqli_close($connect);
?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
