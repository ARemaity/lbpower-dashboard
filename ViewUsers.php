 <?php
include("DBConnect.php");
?>
<?php

	//	Write and execute an SQL query
	$sql = "select * from person where role=00";
	$result = mysqli_query($con,$sql);

	//	If the sql returns an error
	if(!$result)
			die("something went wrong");

	echo "<table border='1'>
		<tr><td>First Name</td><td>Last Name</td><td>City</td><td>Street</td><td>Phone</td><td>Email</td><td>Edit</td></tr>";
	
	for($i=0;$i<mysqli_num_rows($result);$i++){
		$row = mysqli_fetch_assoc($result);
		echo "<tr>";
		echo "<td width='100'>".$row['PID']."</td>";
		echo "<td width='200'>".$row['fname']."</td>";
		echo "<td width='100'>".$row['lname']."</td>";
		echo "<td width='100'>".$row['city']."</td>";
		echo "<td width='200'>".$row['street']."</td>";
		echo "<td width='100'>".$row['phone']."</td>";
	    echo "<td width='100'>".$row['phone']."</td>";
		if($_SESSION['isAdmin']==1){
		$query="removeBook.php?bookId=".$row['bid'];
			echo "<td width='100'><a href=".$query.">Remove</a></td>";
			
			$query="editClient.php?=".$row['bid'];
			echo "<td width='100'><a href=".$query.">Edit this book</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	
	echo "</br>";
	echo "";
	//	close the connection
	mysqli_close($con);



?>