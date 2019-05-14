<?php
  header("Content-type: application/json; charset=utf-8");
  $servername = "localhost";
  $username = "id8992783_root";
  $password = "isd4us";
  $dbname = "id8992783_isd";
  date_default_timezone_set("Asia/Beirut");
  $dates = date('Y-m-d');
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  mysqli_set_charset($conn, "utf8");
  if(isset($_POST['uid'])){
    $uid = $_POST['uid'];
    $ccid=$_POST['ccid'];
    $paymentid=$_POST['paymentid'];
    $balance = $_POST['balance'];
    
 $total=$_POST['Total'];

if($total>$balance){



  echo "insufficient funds";
}else{


  $balance=$balance-$total;

  $insert= mysqli_query($conn,"UPDATE  credit_card Set `balance`= '". $balance . "' Where id_cc='".$ccid."'") or die(mysqli_error($conn));
if($insert){

  $insert= mysqli_query($conn,"UPDATE  payment Set `payment_st`= 1,`payment_date`= '". $dates . "' Where id='".$paymentid."'")or die(mysqli_error($conn));
echo "Succcessfully payed";


}else{

echo "error 1 q";

}


}

//TODO:if  total less  than balance update cc.balance <<inside this php>></inside>else notify the user <<<this inside android activity >>

//TODO:update the payment status and payed date if succcefull
  

  }else{

    echo "no uid is inserted";
  }


