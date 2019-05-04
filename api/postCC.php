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
if(isset($_POST['uid'])){
$uid = $_POST['uid'];
$number = $_POST['number'];
$name = $_POST['name'];
$month = $_POST['month'];
$year = $_POST['year'];
$cvc = $_POST['cvc'];
$date = $year . "-" . $month . "-" . "01";
$balance = "100";

$insert = mysqli_query($conn, "INSERT INTO credit_card(fk_user,name_holder,cc_number,cvc,expire_date,balance)  VALUES ('" . $uid . "','" . $name . "','" . $number . "','" . $cvc . "','" . $date . "','" . $balance . "')") or die(mysqli_error($conn));
if($insert){
echo"added successfully";
}else{

    echo"try again";

}
}
?>