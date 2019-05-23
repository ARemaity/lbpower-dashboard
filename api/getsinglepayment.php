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


if ( isset($_GET['fk_client'])&&isset($_GET['id'])) {
 
    $fk_client=$_GET['fk_client'];
   $id=$_GET['id'];

$query = "SELECT  `consumption` ,`costof1`,`Total`,`payment_st`, `issued_date`, `payment_date` FROM `payment` WHERE  fk_client=". $fk_client." AND  id=".$id;

$result= mysqli_query($conn,$query);
$dbdata = array();
$dbdata["data"]=array();

while ($row= mysqli_fetch_assoc($result))  {
    $data = array();
    $data["consumption"] = $row["consumption"];
    $data["costof1"] = $row["costof1"];
    $data["Total"] = $row["Total"];
    $data["payment_st"] = $row["payment_st"];
    $data["issued_date"] = $row["issued_date"];
    if($row["payment_st"]=="0"){
        
        $data["payment_date"] = "0";
        
    }else{
        $data["payment_date"] = $row["payment_date"];
    
    
    
    }
        
  
    
  }





}

echo "there is error"
?>

