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
  <a href="SupplierDash.php"><i class="fa fa-dashboard"></i> DashBoard</a>
  <a href="ViewUsers.php"><i class="fa fa-users"></i> View Users</a>
  <a style=float:right href="logout.php"><i class="fa fa-sign-out"></i> Sign Out</a>
  <a style=float:right href="#"><i class="fa fa-address-card-o"></i> View Profile</a>
  <a class="active" style=float:right href="SubmitComplaint.php"><i class="fa fa-bug"></i> Submit Complaint</a>
</div>

<link rel="stylesheet" type="text/css" href="css/Style.css">

<div class="container">
  <form action="SubmitComplaint.php">
    <label for="fname">Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
	</br>
	</br>
	<form
    <label class="radio-inline">
	<label for="radio-inline">Complaint Type: </label>
      <input type="radio" name="Hardware" checked>Hardware
    </label>
    <label class="radio-inline">
      <input type="radio" name="Software">Software
    </label>
    <label class="radio-inline">
      <input type="radio" name="Other">Other
    </label>
	</form>
	</br>
	</br>
    <label for="subject">Type Complaint details: </label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</body>
</html>