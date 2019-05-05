<?php 
session_start(); 
?>
 <html>
 <body>
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
 
 <?php
include("../DBConnect.php");
?>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar">
  <?php
  if($_SESSION['role']==1){
	echo "<a href='../supplier/SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
	echo "<a href='../supplier/newuser.html'><i class='fa fa-user-plus'></i> AddUser</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='../admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";

  }
  ?>
  <a class="active" href="../supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="../logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="../viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a style=float:right href="../SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>

<link rel="stylesheet" type="text/css" href="../css/Style.css">

<table id='users'>
  <thead>
    <tr>
	  <th>Ammount</th>
	  <th>Issued Date</th>
	  <th>Payment State</th>
      <th>Date Paid</th>
    </tr>
	</thead>

<?php

$sql="SELECT *
      FROM payment
      WHERE fk_client='".$_GET["PID"]."' ";
	  
$result = mysqli_query($connect,$sql);

while($row = mysqli_fetch_assoc($result)){
?>
	<tr>
	  <td><?php echo $row['balance']; ?></td>
      <td><?php echo $row['issued_date']; ?></td>
	  <?php
	  if($row['payment_st'] == 0){
	  echo '<td>Unpaid</td>';
	  echo '<td>No Date</td>';
	  }
	  else{
		  echo '<td>Paid</td>';
		  echo '<td>'.$row["payment_date"].'</td>';
	  }
	  ?>
	<tr>
<?php			
}
	//	close the connection
	mysqli_close($connect);
?>
</body>
</html>