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
  $dbdata = array();
  $dbdata["data"] = array();
  if (isset($_GET['fk_client'])) {
    $data = array();
    $fk_client = $_GET['fk_client'];
    $getdata = mysqli_query($conn, "SELECT value FROM  cumulative Where fk_id='" . $fk_client . "'") or die(mysqli_error($conn));
    if (mysqli_num_rows($getdata) == 0) {
      $data["kw"] =  0;
    } else {
      $cum = mysqli_fetch_object($getdata);
      $getCumumlative  = (int)$cum->value;
      $data["kw"] =  $getCumumlative;
    }

    $costQ = "SELECT `cost_1kw` FROM `supplier`,`client` where client.fkSupplier = supplier.id and client.id ='" . $fk_client . "'"  or die(mysqli_error($conn));
    $phone = "SELECT `phone` FROM `supplier`,`client`,`person` where client.fkSupplier = supplier.id and supplier.PID=person.PID and client.id ='" . $fk_client . "'"  or die(mysqli_error($conn));

    $result = mysqli_query($conn, $costQ);
    $result2 = mysqli_query($conn, $phone);
    if (mysqli_num_rows($result) == 0) {
      $data["bill"] =  0;
    } else {
      $cost = mysqli_fetch_object($result);
      $get1kw  = (int)$cost->cost_1kw;
      $total = $get1kw * $getCumumlative;
      $data["bill"] =  $total;
    }

    if (mysqli_num_rows($result2) == 0) {
      $data["phone"] =  0;
    } else {
      $num = mysqli_fetch_object($result2);
      $phones  = (int)$num->phone;
      $data["phone"] =  $phones;
    }
    array_push($dbdata["data"], $data);


    die(json_encode($dbdata, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
  } else {
    echo "there is error";
  }
  ?>