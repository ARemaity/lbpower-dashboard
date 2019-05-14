<?php
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LBPOWER</title>
	<link rel="stylesheet" href="../css/graph.css">

	<!-- Firebase App is always required and must be first -->
	<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-app.js"></script>
	<!-- Add additional services that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/5.5.9/firebase-database.js"></script>

	<!-- Include Plotly.js -->
	<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	<!-- Include the moment.js library -->
	<script src="https://momentjs.com/downloads/moment.js"></script>
</head>
<body>
<script >

var id='<?php echo $id;?>';

</script>
	<Button onclick="getuid()"></Button>
	<!-- Plotly chart will be drawn inside this div. -->
	<div id="myPlot" style="width: 100vw; max-height:75vh"></div>

	
	<script src="https://www.gstatic.com/firebasejs/4.8.1/firebase.js"></script>
	<script src="../js/auth.js"></script>
	<script src="../js/graph.js"></script>
	
</body>

</html>