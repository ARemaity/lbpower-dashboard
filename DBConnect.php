<?php
$servername = "id9282114_lbpower";
$username = "id9282114_bibs";
$password ="google123";
$db="id9282114_lbpower";
$connect=mysqli_connect($servername,$username,$password,$db);
if(mysqli_connect_errno()){
die("cannot connect to database".mysql_connect_error())	;
	
}
else{
	//echo("database is connected ");

}

?>
