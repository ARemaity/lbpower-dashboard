<?php
//register.php
include_once('src/PHPMailer.php');
include_once('src/SMTP.php');
include_once('src/Exception.php');
include('DBConnect.php');

if(isset($_SESSION['id']))
{
 header("location:index.php");
}

$message = '';

if(isset($_POST["register"]))
{


    $getdata = mysqli_query($connect , "SELECT * FROM pass Where email='" . $_POST['email'] . "'");

    if (mysqli_num_rows($getdata) > 0) 
 {

   
  $message = '<label class="text-danger">Email Already Exits</label>';
 }
 else
 {
  $user_password = rand(100000,999999);
  $user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
  $user_activation_code = md5(rand());
  $insert = mysqli_query($connect, "INSERT INTO pass(password,email,status,activation_code)  VALUES ('" . $user_encrypted_password . "','"  . $_POST['email'] . "','" . 0 . "','" . $user_activation_code . "')") or die(mysqli_error($conn));
  if($insert)
  {
   $base_url = "http://localhost/final/LBPOWER/";
   $mail_body = "
   <p>Thanks for Registration. Your password is ".$user_password.", This password will work only after your email verification.</p>
   <p>Please Open this link to verified your email address - ".$base_url."emailver.php?activation_code=".$user_activation_code."
   <p>Best Regards,<br />LBPOWER</p>
   ";





   ///////////////////////////
   $mail = new PHPMailer\PHPMailer\PHPMailer();
   $mail->IsSMTP(); // enable SMTP
  // $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   //authentication SMTP enabled
   $mail->SMTPAuth = true; 
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.gmail.com";
   //indico el puerto que usa Gmail 465 or 587
   $mail->Port = 465; 
   
   $mail->Username = "lbpowerinfo@gmail.com";
   $mail->Password = "kHthw4zd123";
   $mail->SetFrom("lbpowerinfo@gmail.com","LBPOWER Verfiy");  //Sets the From email address for the message
      //Sets the From name of the message
   $mail->AddAddress($_POST['email']);
  //Adds a "To" address   
   $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
   $mail->IsHTML(true);       //Sets message type to HTML    
   $mail->Subject = 'Email Verification';   //Sets the Subject of the message
   $mail->Body = $mail_body;       //An HTML or plain text message body
   if($mail->Send())        //Send an Email. Return true on success or false on error
   {
    $message = '<label class="text-success">Register Done, Please check your mail.</label>';
   }
  }else{


    echo '<script> window.alert("there is error try again");</script>';
  }
 }
}

?>

<!DOCTYPE html>
<html>
 <head>
  <title>PHP Register Login Script with Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container" style="width:100%; max-width:600px">
   <h2 align="center">PHP Register Login Script with Email Verification</h2>
   <br />
   <div class="panel panel-default">
    <div class="panel-heading"><h4>Register</h4></div>
    <div class="panel-body">
     <form method="post" id="register_form">
      <?php echo $message; ?>
      <div class="form-group">
       <label>User Email</label>
       <input type="email" name="email" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
      </div>
     </form>
     <p align="right"><a href="login.php">Login</a></p>
    </div>
   </div>
  </div>
 </body>
</html>
