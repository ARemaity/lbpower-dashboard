<?php session_start()?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

  input[type="radio"] {
    margin-left:10px;
}

}
</style>
</head>
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
  echo "<a href='../web/supplier/SupplierDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../supplier/ViewMonthlyRev.php'><i class='fa fa-area-chart'></i> Monthly Revenue</a>";
  echo "<a href='../supplier/newuser.html'><i class='fa fa-user-plus'></i> Add User</a>";
  }
  else if($_SESSION['role']==2){
  echo "<a href='../admin/AdminDash.php'><i class='fa fa-dashboard'></i> DashBoard</a>";
  echo "<a href='../admin/ViewSuppliers.php'><i class='fa fa-bolt'></i> View Suppliers</a>";
  echo "<a href='../admin/AddSupplier.php'><i class='fa fa-user-plus'></i> Add Supplier</a>";
  echo "<a href='../admin/ViewComplaints.php'><i class='fa fa-thumbs-down'></i> Complaints</a>";

  }
  ?>
  <a href="../web/supplier/ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="viewprofile.php"><i class="fa fa-address-card-o"></i> Profile</a>
  <a class="active" style=float:right href="SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">

<?php
if(isset($_POST['submit'])){
$role=$_SESSION['role'];
$type=$_POST["ctype"];
$text=$_POST["subject"];
$sql="INSERT INTO complaint(complaint_type,detials,sender_type,fk_sender) VALUES ('$type','$text','$role',default)";
$result = mysqli_query($connect,$sql);
echo ' <h2 style="color:green;">Complaint is sent and will be reviewed by admins shortly</h2>';
mysqli_close($connect);
}
 ?>

<form action="SubmitComplaint.php" method="POST">

  <div class="container">
    <label for="ctype"><b>Type</b></label>
    <input type="text" placeholder="eg. Software, Hardware, Other(Please Specify)" name="ctype" required>

    <label for="subject"><b>Subject</b></label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px" required></textarea>
	
        
    <button type="submit" name="submit">Submit</button>
   </div>
  
</form>

</body>
</html>