<?php
$servername = "localhost";
$username = "id8992783_root";
$password = "isd4us";
$dbname = "id8992783_isd";
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
   
$query = "SELECT `id_cc`, `name_holder`, `cc_number`, `cvc`, `expire_date`, `balance` FROM `credit_card` WHERE  fk_user='". $fk_client."'";

$result= mysqli_query($conn,$query);
$dbdata = array();
$dbdata["data"]=array();
while ($row= mysqli_fetch_assoc($result))  {
    $data = array();
    $data["id_cc"] = $row["id_cc"];
    $data["name_holder"] = $row["name_holder"];
    $data["cc_number"] = $row["cc_number"];
    $data["cvc"] = $row["cvc"];
    $data["expire_date"] = $row["expire_date"];
    $data["balance"] = $row["balance"];
  array_push($dbdata["data"],$data);
  }
  

die(json_encode($dbdata,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

echo "there is error"
?>