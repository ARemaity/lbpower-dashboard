<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safety_school";
$resonse=array();
$resonse["data"] = array();
header("Content-type: application/json; charset=utf-8");
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");

$query = "SELECT * FROM gas_sensor";

$result= mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($result)){


    


        
 
		// Push all the items 
       // array_push($resonse["data"], $data);
    $resonse["data"]=$row;

}


die(json_encode($resonse,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
?>

