<?php
$servername = "localhost";
$username = "id8992783_root";
$password ="isd4us";
$db="id8992783_isd";



$connect=mysqli_connect($servername,$username,$password,$db);
if(mysqli_connect_error()){
die("cannot connect to database".mysql_connect_error())	;	
}
?>
