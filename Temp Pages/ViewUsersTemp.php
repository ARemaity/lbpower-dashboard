<?php 
session_start(); 
?>
<html>
<body>
<head>
	<title>View Users</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<div class="navbar">
  <?php
  if($_SESSION['role']==1){
  echo "<a href='SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";

  }
  ?>
  <a class="active" href="ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a style=float:right href="SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>
</head>
 
 <?php
include("DBConnect.php");
?>




<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for user..">

<table id='users'>
    <thead>
        <tr>
            <th>PID</th>
            <th>First Name</th>
            <th>Last Name</th>
			<th>City</th>
		    <th>Street</th>
		    <th>Phone</th>
		    <th>Email</th>
			<th>Supplier Name</th>
			
        </tr>
    </thead>
    <tbody>
	
    <?php
    
	if($_SESSION['role'] == 1){
		$sql = "SELECT client.PID, fname, lname, city, street, phone, email, Supplier_Company
            FROM person, client, supplier
            WHERE person.PID=client.PID
            AND client.fk_supplier= ".$_SESSION['PID']."
			AND Supplier_Company=comapany_name
			AND person.role=0";
	$result = mysqli_query($connect,$sql);
	}
	else if($_SESSION['role'] == 2){
		$sql="SELECT *
			  FROM person, client, supplier
			  WHERE person.PID=client.PID
			  AND Supplier_Company=comapany_name
			  AND person.role=0";
	    $result = mysqli_query($connect,$sql);
	}
	?>
	
    <?php 
		for($i=0;$i<mysqli_num_rows($result);$i++){
		$row = mysqli_fetch_assoc($result);
		$query="editUser.php?PID=".$row['PID'];
		?>
		
        <tr>
            <td><?php echo $row['PID']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['street']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['Supplier_Company']; ?></td>
			<?php $query="EditUser.php?PID=".$row['PID'];
			echo "<td width='100'> <a href=".$query.">Edit User</a></td>"; ?>
			
        </tr>
		<?php } ?>
    </tbody>
</table>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("users");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

<?php
	//	close the connection
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
</html>