<?php session_start(); ?>
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
  }
  else if($_SESSION['role']==2){
  echo "<a href='../admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";
  echo "<a href='../admin/AddSupplier.php'><i class='fa fa-user-plus'></i> Add Supplier</a>";
  echo "<a class='active' href='../admin/ViewComplaints.php'><i class='fa fa-thumbs-down'></i> Complaints</a>";
  }
  ?>
  <a href="../supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="../logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="../viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
</div>

<link rel="stylesheet" type="text/css" href="../css/Style.css">


<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for complaint type..">

<table id='users'>
    <thead>
        <tr>
            <th>Type</th>
            <th>Details</th>
            <th>Sender Type</th>
        </tr>
    </thead>
    <tbody>
	
    <?php
	//	Write and execute an SQL query
	$sql = "SELECT *
	        FROM complaint";
	$result = mysqli_query($connect,$sql);
	?>
	
    <?php 
		for($i=0;$i<mysqli_num_rows($result);$i++){
		$row = mysqli_fetch_assoc($result); 
		?>
		
        <tr>
            <td><?php echo $row['complaint_type']; ?></td>
            <td><?php echo $row['detials']; ?></td>
            <td><?php echo $row['sender_type']; ?></td>
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
    td = tr[i].getElementsByTagName("td")[0];
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