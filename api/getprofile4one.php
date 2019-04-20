<?php
$servername = "localhost";
$username = "id8992783_root";
$password = "isd4us";
$dbname = "id8992783_isd";
$getCumumlative=0;
header("Content-type: application/json; charset=utf-8");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");


if ( isset($_GET['fk_client'])) {
 
    $fk_client=$_GET['fk_client'];
    $getdata = mysqli_query($conn, "SELECT value FROM  Cumulative ");
   
$query = "SELECT  `id`,`fname`, `lname`, `city`, `street`, `phone`, `email` FROM `person` INNER JOIN `client` on  client.PID = person.PID  WHERE id=". $fk_client ;

$result= mysqli_query($conn,$query);
$dbdata = array();
$dbdata["data"]=array();
$dbdata["value"]=array();
while ($row= mysqli_fetch_assoc($result))  {
    $data = array();
    $data["id"] = $row["id"];
    $data["fname"] = $row["fname"];
    $data["lname"] = $row["lname"];
    $data["city"] = $row["city"];
    $data["street"] = $row["street"];
    $data["phone"] = $row["phone"];
    $data["email"] = $row["email"];
  
  }
  $getdata = mysqli_query($conn, "SELECT value FROM  Cumulative Where fk_id='".$fk_client."'");
  if (mysqli_num_rows($getdata)==0) {
    $dbdata["value"]["Cumulative"]=  0 ;}
    else{
  $cum = mysqli_fetch_object($getdata);
  $getCumumlative  = (int)$cum->value;
$dbdata["value"]["Cumulative"]=  $getCumumlative ;}
  $cost1kw = "SELECT  `cost_1kw` FROM `supplier` INNER JOIN `client` on  client.fk_supplier = supplier.id  WHERE client.id = '". $fk_client."'" ;
 
  $result= mysqli_query($conn,$cost1kw);
  if (mysqli_num_rows($result)==0) {
    $dbdata["value"]["bill"]=  0;
  }
  else{
  $cost = mysqli_fetch_object($result);
  $get1kw  = (int)$cost->cost_1kw;
  $total=$get1kw*$getCumumlative;
  $dbdata["value"]["bill"]=  $total;
 }
 array_push($dbdata["value"],$dbdata["data"],$data);
die(json_encode($dbdata,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

echo "there is error"
?>

