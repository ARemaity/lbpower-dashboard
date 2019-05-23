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
if(isset($_POST['id'])){


$insert = mysqli_query($conn, "DELETE FROM `credit_card` WHERE `id_cc` =".$_POST['id']) or die(mysqli_errno($conn));


if($insert){
echo"deleted  successfully";
}else{

    echo"try again";

}
}
?>