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
	echo "<a href='../supplier/ViewMonthlyRev.php'><i class='fa fa-area-chart'></i> Monthly Revenue</a>";
	echo "<a href='../supplier/newuser.html'><i class='fa fa-user-plus'></i> Add User</a>";
	echo  '<a style=float:right href="../SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>';
	
  }
  else if($_SESSION['role']==2){
  echo "<a href='../admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";
  echo "<a href='../admin/AddSupplier.php'><i class='fa fa-user-plus'></i> Add Supplier</a>";
  echo "<a href='../admin/ViewComplaints.php'><i class='fa fa-thumbs-down'></i> Complaints</a>";
  }
  ?>
  <a class="active" href="../supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="../logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="../viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
</div>

<link rel="stylesheet" type="text/css" href="../css/Style.css">

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
			<th>Edit</th>
			<th>User Payments</th>
			<th>Device</th>
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
					$sql="SELECT client.PID, fname, lname, city, street, phone, email, Supplier_Company
								FROM person, client, supplier
								WHERE person.PID=client.PID
								AND Supplier_Company=comapany_name
								AND person.role=0";
					$result = mysqli_query($connect,$sql);
			}
		//for($i=0;$i<mysqli_num_rows($result);$i++){
		//$row = mysqli_fetch_assoc($result);
		while($row = mysqli_fetch_assoc($result)){
			$rows[]=$row;
		}
		foreach($rows as $key=>$row){
		//Check if user does NOT have a device
		$devicecheck=	'SELECT PID
						 FROM client
						 WHERE NOT EXISTS(select fk_client
										  				from device
															where fk_client='.$row['PID'].')';
															
		$result2 = mysqli_query($connect,$devicecheck);
		$row2= mysqli_fetch_assoc($result2);
		
		?>
		
        <tr>
      <td><?php echo $row['PID']; ?></td>
      <td><?php echo $row['fname']; ?></td>
      <td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td><?php echo $row['street']; ?></td>
			<td><?php echo $row['phone']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<?php
				$query="../supplier/editUser.php?PID=".$row['PID'];
				echo "<td width='90'> <a href=".$query.">Edit User</a></td>";
				$query3="../supplier/ViewUserPayments.php?PID=".$row['PID'];
				echo "<td width='90'> <a href=".$query3.">Payments</a></td>";
				if($row['PID']=$row2['PID']){
					$query2="../supplier/AddDevice.php?ID=".$id=$rows[$key]['PID'];
					//$_SESSION['cPID']=$rows[$key]['PID'];
					//TODO: comment here for better undertstanding
					$_SESSION['ID']=$id;
					echo "<td width='100'> <a href=".$query2.">Add Device</a></td>";
				}
				else{
					echo '<td>Exists</td>';
				}

			?>
        </tr>
		<?php } //}?>
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