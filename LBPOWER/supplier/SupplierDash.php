<!DOCTYPE html>
<?php
session_start();
///TODO: this is FOR THE SECUIRTY
if(isset($_SESSION['cname'])){
  
  $id=''.$_SESSION['cname'].'';
}else{

////in case the user return to the main dashboard get id is null so must check if there a session(id) value
header('Location:http://localhost/final/LBPOWER/login.php');
}

include("../DBConnect.php");
//Number of Users For Specific Supplier
$numclient="Select * from client WHERE fkSupplier='".$_SESSION['PID']."'";
$resnumclient=mysqli_query($connect,$numclient);
    if( mysqli_num_rows($resnumclient)==0){
     $row=0;
    }else{
     $row=mysqli_num_rows($resnumclient);
    }
	
$revenue="SELECT sum(total) FROM payment, client WHERE payment_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND fk_client=client.PID AND client.fkSupplier=".$_SESSION['PID']."";
$resrevenue=mysqli_query($connect,$revenue);
	if(mysqli_num_rows($resrevenue)==0){
		$total=0;
	}else{
		$row2=mysqli_fetch_assoc($resrevenue);
		$total = (double)$row2['sum(total)'];
		$eleven=$total*(11/100);
		$total=$total-$eleven;
	}
	
$consumption="SELECT sum(consumption) FROM payment, client WHERE issued_date > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND fk_client=client.PID AND client.fkSupplier=".$_SESSION['PID']."";
$resconsumption=mysqli_query($connect,$consumption);
	if(mysqli_num_rows($resconsumption)==0){
		$totalc=0;
	}else{
		$row3=mysqli_fetch_assoc($resconsumption);
		$totalc = (double)$row3['sum(consumption)'];
	}
	
$payments = "SELECT payment_st from payment, client, supplier WHERE fk_client=client.PID AND client.fkSupplier=supplier.PID AND payment_st=0 AND supplier.PID=".$_SESSION['PID']."";
$respayments=mysqli_query($connect,$payments);
	if(mysqli_num_rows($respayments)==0){
		$totalp=0;
	}else{
		$row4=mysqli_fetch_assoc($respayments);
		$totalp = mysqli_num_rows($respayments);
	}
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supplier Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="SupplierDash.php">Welcome <?php echo ''.$_SESSION['name'].''; ?></a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>


  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="SupplierDash.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="ViewUsers.php">
          <i class="fas fa-fw fa-table"></i>
          <span>View Users</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newuser.html">
          <i class="fa fa-user-plus"></i>
          <span>Add User</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="SubmitComplaint.php">
          <i class="fa fa-thumbs-down"></i>
          <span>Submit Complaint</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">
          <i class="fas fa-user-circle fa-fw"></i>
          <span>Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fa fa-sign-out"></i>
          <span>Log Out</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="SupplierDash.php">Dashboard</a>
          </li>
        </ol>
		
<!-- Icon Cards-->
<div class="row">
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-plug"></i>
        </div>
        <div class="mr-5"><font color="black">My user count: <?php echo $row;?></font></div>
      </div>
      <!-- <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a> -->
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-money-bill-wave"></i>
        </div>
        <div class="mr-5"><font color="black">This months revenue: <?php echo $total;?> L.L </font></div>
      </div>
      <!-- <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a> -->
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-file-invoice-dollar"></i>
        </div>
        <div class="mr-5"><font color="black">KW Consumption this month: <?php echo $totalc;?>KW</font></div>
      </div>
      <!-- <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a> -->
    </div>
  </div>
    <div class="col-xl-3 col-sm-6 mb-3">
    <div class="card text-white bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
        <i class="fas fa-angle-right"></i>
        </div>
        <div class="mr-5"><font color="black">Unpaid payments total: <?php echo $totalp;?></font></div>
      </div>
      <!-- <a class="card-footer text-white clearfix small z-1" href="#">
        <span class="float-left">View Details</span>
        <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
      </a> -->
    </div>
  </div>

</div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © LBPOWER 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
