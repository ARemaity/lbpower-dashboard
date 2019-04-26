  <?php
  $servername = "localhost";
  $username = "id8992783_root";
  $password = "isd4us";
  $dbname = "id8992783_isd";
  $getCumumlative=0;
  header("Content-type: application/json; charset=utf-8");
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 
  mysqli_set_charset($conn,"utf8");


  if ( isset($_GET['fk_client'])) {
  
      $fk_client=$_GET['fk_client'];
    
  $query = "SELECT  `fname`, `lname`, `city`, `street`, `phone`, `email` FROM `person` INNER JOIN `client` on  client.PID = person.PID  WHERE id=". $fk_client ;

  $result= mysqli_query($conn,$query);
  $dbdata = array();
  $dbdata["data"]=array();
  while ($row= mysqli_fetch_assoc($result))  {
      $data = array();
      $data["fname"] = $row["fname"];
      $data["lname"] = $row["lname"];
      $data["city"] = $row["city"];
      $data["street"] = $row["street"];
      $data["phone"] = $row["phone"];
      $data["email"] = $row["email"];
    
    }
    
  array_push($dbdata["data"],$data);
  die(json_encode($dbdata,JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
  }

  echo "there is error"
  ?>

