<?php session_start(); ?>
 <html>
 <body>
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color:white
}
</style>
</head>
<?php
include("DBConnect.php");
?>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar">
  <?php
  if($_SESSION['role']==1){
  echo "<a href='../web/supplier/SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../supplier/ViewMonthlyRev.php'><i class='fa fa-area-chart'></i> Monthly Revenue</a>";
  echo "<a href='../supplier/newuser.html'><i class='fa fa-user-plus'></i> Add User</a>";
  echo  '<a style=float:right href="../SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>';
  }
  else if($_SESSION['role']==2){
  echo "<a href='../web/admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../web/admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";
  echo "<a href='../web/admin/AddSupplier.php'><i class='fa fa-user-plus'></i> Add Supplier</a>";
  echo "<a href='../web/admin/ViewComplaints.php'><i class='fa fa-thumbs-down'></i> Complaints</a>";

  }
  ?>
  <a href="../web/supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="../web/logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a class="active" style=float:right href="../web/viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">


<form>
<div class="card">
  <h1>Name: <?php echo ($_SESSION['Name']); ?></h1>
  
<?php
if($_SESSION['role']==1){
echo '<p>Company: '.$_SESSION['cname'].' </p>';
}
?>
  


  <p>Email: <?php echo ($_SESSION['email']); ?></p>
  
  <p>Role: <?php if($_SESSION['role']==1){ echo 'Supplier'; } 
                 else if($_SESSION['role']==0){ echo 'Client'; } 
				 else if($_SESSION['role']==2){ echo 'Admin'; }?> </p>
</div>
</form>
</body>
</html>
