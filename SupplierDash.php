<?php session_start(); ?>
 <html>
 <body>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
include("DBConnect.php");
?>

<!-- Load an icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar">
  <a class="active" href="SupplierDash.php"><i class="fa fa-dashboard"></i> DashBoard</a>
  <a href="ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="#"><i class="fa fa-address-card-o"></i> View Profile</a>
  <a style=float:right href="SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">
</body>
</html>