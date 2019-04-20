<?php
$servername = "localhost";
$username = "id8992783_admin";
$password = "isd4us";
$dbname = "id8992783_lbpower";
header("Content-type: application/json; charset=utf-8");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $result = mysqli_query($conn,"SELECT * FROM `hour_value`");

//Initialize array variable
 $dbdata = array();

//Fetch into associative array
 while ($row= mysqli_fetch_assoc($result))  {
   $dbdata[]=$row;
 }

//Print array in JSON format
echo json_encode($dbdata);
?>