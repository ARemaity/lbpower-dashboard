<?php

include('DBConnect.php');

$message = '';
echo "the database name ";
if(isset($_GET['activation_code']))
{
 
    $getdata = mysqli_query($connect , "SELECT * FROM pass Where activation_code='" . $_GET['activation_code'] . "' ORDER BY SID DESC LIMIT 1") or die(mysqli_error($connect));
 
 if(mysqli_num_rows($getdata)>0)
 {
    $cum = mysqli_fetch_object($getdata);
    $emailStatus  = (int)$cum->status;

    echo" the st is ".$emailStatus;
  {
   if($emailStatus == '0'||$emailStatus == 0||$emailStatus == "0")
   {
    $update= mysqli_query($connect,"UPDATE  pass Set `status`= 1 Where activation_code='".$_GET['activation_code']."'");
    if($update)
    {
     $message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
    }
   }
   else
   {
    $message = '<label class="text-info">Your Email Address Already Verified</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">Invalid Link</label>';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <h1 align="center">LBPOWER Email Verification</h1>
  
   <h3><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>
