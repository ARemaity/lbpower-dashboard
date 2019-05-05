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
  <?php
  if($_SESSION['role']==1){
  echo "<a href='SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a class='active' href='ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";

  }
  ?>
  <a href="ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a style=float:right href="SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for supplier..">

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
		    <th>Company Name</th>
		    <th>Cost Per KW</th>
		    <th>User Capacity</th>
        </tr>
    </thead>
    <tbody>
	
    <?php
	//	Write and execute an SQL query
	$sql = "SELECT *
	        FROM person, supplier
			where person.PID=supplier.PID and role=01";
	$result = mysqli_query($connect,$sql);
	?>
	
    <?php 
		for($i=0;$i<mysqli_num_rows($result);$i++){
		$row = mysqli_fetch_assoc($result); 
		?>
		
        <tr>
            <td><?php echo $row['PID']; ?></td>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['street']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['comapany_name']; ?></td>
			<td><?php echo $row['cost_1kw']; ?></td>
			<td><?php echo $row['user_capacity']; ?></td>
			<?php $query="EditSupplier.php?PID=".$row['PID'];
			echo "<td width='50'> <a href=".$query.">Edit</a></td>"; ?>
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
</body>
</html>