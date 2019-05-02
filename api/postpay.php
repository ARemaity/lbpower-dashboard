<?php
  header("Content-type: application/json; charset=utf-8");
  $servername = "localhost";
  $username = "id8992783_root";
  $password = "isd4us";
  $dbname = "id8992783_isd";
  $getCumumlative = 1;
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn, "utf8");
  
     $expire_date=$_POST['expire_date'];//TODO:<<<CHECK IF EXPIRE DATE outdated inside android activity >></CHECK>

    $balance=$_POST['balance'];
    
    $ccid=$_POST['ccid'];

//TODO:if  total less  than balance update cc.balance <<inside this php>></inside>else notify the user <<<this inside android activity >>

//TODO:update the payment status and payed date if succcefull
    $paymentid=$_POST['paymentid'];

    $total=$_POST['Total'];



?>