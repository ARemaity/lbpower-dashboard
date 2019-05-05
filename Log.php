<?php 
session_start();
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

form {border: 3px solid #f1f1f1;
background-color:white;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 23%;
  border-radius: 50%;
  object-fit: scale-down;
  overflow: hidden;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
  <a href="index.php"><i class="fa fa-home"></i> Home Page</a>
  <a onclick="document.getElementById('id02').style.display='block'" style=float:right href="#"><i class="fa fa-id-card-o"></i> Register</a>
  <a class="active" style=float:right href="Login.php"><i class="fa fa-sign-in"></i> Sign In</a>
  <a style=float:right href="ContactUs.php"><i class="fa fa-envelope"></i> Contact Us</a>
  <a style=float:right href="#"><i class="fa fa-info"></i> About Us</a>
</div>
</head>

<body>

<link rel="stylesheet" type="text/css" href="css/Style.css">

<?php
if(isset($_POST['submit'])){
	
	$con = mysqli_connect("localhost","root","","isd");
	if(!$con){
		die('error:'.$mysqli_error());
	}
	
	$sql ="SELECT role
	       FROM person, pass
	       WHERE email = '".$_POST['email']."' AND password ='".$_POST['psw']."' ";

	$result = mysqli_query($con,$sql);

	$res=mysqli_num_rows($result);
	if($res==0){
	echo ' <h2 style="color:red;">email or password are incorrect</h2>';}
             
	else{
           
			echo ' <h2 style="color:green;">Logging in please Wait!</h2>';
			$row = mysqli_fetch_assoc($result);
			if($row['role']==1){
				 $sql ="SELECT email, role, fname, supplier.PID, comapany_name
						FROM person, supplier
						WHERE email= '".$_POST['email']."'
						AND Supplier.PID=Person.PID";
						
				$result = mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
				
				$_SESSION['role'] = $row['role'];
				$_SESSION['Name'] = $row['fname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['PID'] = $row['PID'];
				$_SESSION['cname']=$row['comapany_name'];
				header("refresh:1;url=SupplierDash.php");
				}
				
			else if($row['role']==2){
				 $sql ="SELECT email, role, fname, admin.PID
						FROM person, admin
						WHERE email='".$_POST['email']."'
						AND admin.PID=Person.PID";
						
				$result = mysqli_query($con,$sql);
				$row=mysqli_fetch_assoc($result);
				
				$_SESSION['role']= $row['role'];
				$_SESSION['Name'] = $row['fname'];
				$_SESSION['email'] = $row['email'];
				$_SESSION['PID'] = $row['PID'];
				header("refresh:1;url=AdminDash.php");
				}
			}
		 

	mysqli_close($con);
}
?>

<form action="login.php" method="POST">

  <div class="container">
    <div 
     class="imgcontainer">
     <img src="css/img_avatar2.png" alt="Avatar" class="avatar">
    </div>
	
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="submit">Login</button>
   </div>

  <div class="container" style="background-color:#f1f1f1">
  
  </form>
    <a href="creat.php" class="cancelbtn">Register a new user</a>
    <span class="psw"> <a href="forgot.php"> Forgot password?</a></span>
  </div>
 


</body>
</html>
