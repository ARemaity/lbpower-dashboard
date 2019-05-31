<!DOCTYPE html>
<?php
session_start();
 ?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<?php
if(isset($_SESSION['cname']) || isset($_SESSION['admin']))
{
	if($_SESSION['role']==1){
    $message = "<h2 class='text-danger'>Already Logged in</h2>";
	echo $message;
	header("refresh:1;url=supplier/supplierdash.php");}
	else if($_SESSION['role']==2){
    $message = "<h2 class='text-danger'>Already Logged in</h2>";
	echo $message;
	header("refresh:1;url=admin/admindash.php");}
}

$message = '';
include("DBConnect.php");

if(isset($_POST['submit'])){
	 $sql ="select role, person.email, status, password
			from person, pass
			where person.email='".$_POST['email']."'
			and person.email=pass.email";
	$statement = mysqli_query($connect,$sql);
	$row=mysqli_fetch_assoc($statement);
	$_SESSION['role']= $row['role'];
	$count = mysqli_num_rows($statement);
	if($count > 0)
	{
			if($row['status'] == 1)
			{
				if(password_verify($_POST["pass"], $row["password"]))
				//if($row["user_password"] == $_POST["user_password"])
				{
						if($_SESSION['role']==1){

							$getid =mysqli_query($connect,"select supplier.id as ids from supplier,person where supplier.PID=person.PID AND person.email= '".$_POST['email']."'");
							$getobject=mysqli_fetch_object($getid);
							$id=(int)$getobject->ids;
							$_SESSION['id']=$id;
						$sql2 ="SELECT person.email, role, fname, supplier.PID, comapany_name
						FROM person, supplier, pass
						WHERE person.email= '".$_POST['email']."'
						AND person.email=pass.email
						AND Supplier.PID=Person.PID
						AND supplier.SID=pass.SID";
						$result = mysqli_query($connect,$sql2);
						$row2=mysqli_fetch_assoc($result);
						$_SESSION['PID'] = $row2['PID'];
						$_SESSION['name'] = $row2['fname'];
						$_SESSION['email'] = $row2['email'];
						$_SESSION['cname']=$row2['comapany_name'];
						header("refresh:1;url=supplier/supplierdash.php");
						}
								
						else if($_SESSION['role']==2){
						$sql2 ="SELECT person.email, role, fname, admin.PID
						FROM person, admin, pass
						WHERE person.email='".$_POST['email']."'
						AND person.email=pass.email
						AND admin.PID=Person.PID
						AND admin.SID=pass.SID";
						$result = mysqli_query($connect,$sql2);
						$row2=mysqli_fetch_assoc($result);
						$_SESSION['admin']=$row2['PID'];
						$_SESSION['PID'] = $row2['PID'];
						$_SESSION['name'] = $row2['fname'];
						$_SESSION['email'] = $row2['email'];
						header("refresh:1;url=admin/admindash.php");
						}
				}
				else
				{
					$message = "<h2 class='text-danger'>Wrong Password</h2>";
					echo $message;
				}
			}
			else
			{
				$message = "<h2 class='text-danger'>Please First Verify, your email address</h2>";
				echo $message;
			}
	}
	else
	{
		$message = "<h2 class='text-danger'>Wrong Email Address</h2>";
		echo $message;
	}	 
	
	mysqli_close($connect);
}
?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form  method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="email">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="pass" class="form-control" placeholder="Password" required="required">
              <label for="password">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="admin/register.php">Register an Account</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
